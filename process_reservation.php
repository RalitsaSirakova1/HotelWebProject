<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST["name"] ?? '';
    $email    = $_POST["email"] ?? '';
    $phone    = $_POST["phone"] ?? '';
    $room     = $_POST["room"] ?? '';
    $checkin  = $_POST["checkin"] ?? '';
    $checkout = $_POST["checkout"] ?? '';
    $notes    = $_POST["notes"] ?? '';

    $conn = new mysqli("localhost", "root", "", "hotel_db");
    if ($conn->connect_error) {
        die("Грешка при връзка с базата: " . $conn->connect_error);
    }

    $checkStmt = $conn->prepare("SELECT total_rooms, booked_rooms FROM room_availability WHERE room_type = ?");
    $checkStmt->bind_param("s", $room);
    $checkStmt->execute();
    $checkStmt->bind_result($total, $booked);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($total === null) {
        die("Невалиден тип стая.");
    }

    if ($booked >= $total) {
        echo "<h3 style='color: red; text-align: center;'>Няма налични стаи от този тип в момента.</h3>";
        exit();
    }

    $stmt = $conn->prepare("
        INSERT INTO reservations (name, email, phone, room, checkin, checkout, notes) 
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");
    if (!$stmt) {
        die("Грешка при подготовка: " . $conn->error);
    }

    $stmt->bind_param("sssssss", $name, $email, $phone, $room, $checkin, $checkout, $notes);

    if ($stmt->execute()) {
        $updateStmt = $conn->prepare("UPDATE room_availability SET booked_rooms = booked_rooms + 1 WHERE room_type = ?");
        $updateStmt->bind_param("s", $room);
        $updateStmt->execute();
        $updateStmt->close();

        header("Location: confirmation.html");
        exit();
    } else {
        echo "Грешка при запис: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Невалидна заявка.";
}
