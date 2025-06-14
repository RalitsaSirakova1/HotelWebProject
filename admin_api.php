<?php
header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli("localhost", "root", "", "hotel_db");
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'availability':
        getAvailability($conn);
        break;
    
    case 'reservations':
        getReservations($conn);
        break;
    
    case 'delete':
        deleteReservation($conn);
        break;
    
    case 'recalculate':
        recalculateAvailability($conn);
        break;
    
    default:
        echo json_encode(['error' => 'Invalid action']);
}

$conn->close();

function getAvailability($conn) {
    $result = $conn->query("SELECT room_type, total_rooms, booked_rooms FROM room_availability");
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}

function getReservations($conn) {
    $result = $conn->query("SELECT id, name, email, phone, room, checkin, checkout, notes FROM reservations ORDER BY id DESC");
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}

function deleteReservation($conn) {
    $input = json_decode(file_get_contents('php://input'), true);
    $id = $input['id'] ?? 0;
    $room_type = $input['room_type'] ?? '';
    
    if (!$id || !$room_type) {
        echo json_encode(['success' => false, 'message' => 'Missing ID or room type']);
        return;
    }
    
    $conn->autocommit(FALSE);
    
    try {
        $stmt = $conn->prepare("DELETE FROM reservations WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if (!$stmt->execute()) {
            throw new Exception("Failed to delete reservation");
        }
        
        if ($stmt->affected_rows === 0) {
            throw new Exception("Reservation not found");
        }
        
        $stmt->close();
        
        $updateStmt = $conn->prepare("UPDATE room_availability SET booked_rooms = booked_rooms - 1 WHERE room_type = ? AND booked_rooms > 0");
        $updateStmt->bind_param("s", $room_type);
        
        if (!$updateStmt->execute()) {
            throw new Exception("Failed to update room availability");
        }
        
        $updateStmt->close();

        $conn->commit();
        
        echo json_encode(['success' => true, 'message' => 'Reservation deleted successfully']);
        
    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}

function recalculateAvailability($conn) {
    try {
        $sql = "
            UPDATE room_availability ra
            SET booked_rooms = (
                SELECT COUNT(*) 
                FROM reservations r 
                WHERE r.room = ra.room_type
            )
        ";
        
        if (!$conn->query($sql)) {
            throw new Exception("Failed to recalculate availability: " . $conn->error);
        }
        
        echo json_encode(['success' => true, 'message' => 'Availability recalculated successfully']);
        
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
?>