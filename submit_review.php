<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name        = $_POST["name"];
    $rating      = (int)$_POST["rating"];
    $review_text = $_POST["review_text"];
    $image_path  = null;

    if (!empty($_FILES["review_image"]["name"])) {
        $target_dir = "uploads/reviews/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $target_file = $target_dir . time() . "_" . basename($_FILES["review_image"]["name"]);
        move_uploaded_file($_FILES["review_image"]["tmp_name"], $target_file);
        $image_path = $target_file;
    }

    $conn = new mysqli("localhost", "root", "", "hotel_db");
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $stmt = $conn->prepare("INSERT INTO reviews (name, rating, review_text, image_path) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $name, $rating, $review_text, $image_path);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header("Location: index.php");
    exit();
}
?>
