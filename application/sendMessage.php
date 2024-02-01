<?php
$conn = new mysqli("localhost", "root", "", "nyalife");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$senderId = 1; // Replace with the actual sender's ID
$receiverId = isset($_POST['receiver_id']) ? $_POST['receiver_id'] : null;
$message = isset($_POST['message']) ? $_POST['message'] : null;

$stmt = $conn->prepare("INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $senderId, $receiverId, $message);
$stmt->execute();

$stmt->close();
$conn->close();
?>
