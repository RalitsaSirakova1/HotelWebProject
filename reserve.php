<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = trim($_POST["name"] ?? '');
    $email    = trim($_POST["email"] ?? '');
    $phone    = trim($_POST["phone"] ?? '');
    $room     = trim($_POST["room"] ?? '');
    $checkin  = $_POST["checkin"] ?? '';
    $checkout = $_POST["checkout"] ?? '';
    $notes    = trim($_POST["notes"] ?? '');

    if (empty($name) || empty($email) || empty($phone) || empty($room) || empty($checkin) || empty($checkout)) {
        die("Моля попълнете всички задължителни полета.");
    }

    $conn = new mysqli("localhost", "root", "", "hotel_db");
    if ($conn->connect_error) {
        die("Грешка при връзка с базата: " . $conn->connect_error);
    }

    $checkStmt = $conn->prepare("SELECT total_rooms, booked_rooms FROM room_availability WHERE room_type = ?");
    if (!$checkStmt) {
        die("Грешка при подготовка на заявката: " . $conn->error);
    }
    
    $checkStmt->bind_param("s", $room);
    $checkStmt->execute();
    $checkStmt->bind_result($total, $booked);
    $checkStmt->fetch();
    $checkStmt->close();

    if ($total === null) {
        die("Невалиден тип стая: " . htmlspecialchars($room));
    }

    if ($booked >= $total) {
        echo "<h3 style='color: red; text-align: center;'>Няма налични стаи от този тип в момента.</h3>";
        echo "<p style='text-align: center;'><a href='javascript:history.back()'>Назад</a></p>";
        exit();
    }

    $conn->autocommit(FALSE);

    try {
        $stmt = $conn->prepare("
            INSERT INTO reservations (name, email, phone, room, checkin, checkout, notes) 
            VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        if (!$stmt) {
            throw new Exception("Грешка при подготовка на резервацията: " . $conn->error);
        }

        $stmt->bind_param("sssssss", $name, $email, $phone, $room, $checkin, $checkout, $notes);
        
        if (!$stmt->execute()) {
            throw new Exception("Грешка при запис на резервацията: " . $stmt->error);
        }
        $stmt->close();

        $updateStmt = $conn->prepare("UPDATE room_availability SET booked_rooms = booked_rooms + 1 WHERE room_type = ?");
        if (!$updateStmt) {
            throw new Exception("Грешка при подготовка на актуализацията: " . $conn->error);
        }

        $updateStmt->bind_param("s", $room);
        
        if (!$updateStmt->execute()) {
            throw new Exception("Грешка при актуализация на наличността: " . $updateStmt->error);
        }

        if ($updateStmt->affected_rows === 0) {
            throw new Exception("Няма актуализирани записи за тип стая: " . $room);
        }
        $updateStmt->close();
        $conn->commit();
        header("Location: confirmation.html");
        exit();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Грешка: " . $e->getMessage();
    }

    $conn->close();
} else {
    echo "Невалидна заявка.";
}
?>