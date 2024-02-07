<?php
include "config.php";

$data = json_decode(file_get_contents('php://input'), true);

$recipientId = $data['recipient_id'];
$message = $conn->real_escape_string($data['message']);

$result = $conn->query("
    INSERT INTO messages (sender_id, recipient_id, message)
    VALUES ('1', '$recipientId', '$message')
");

if ($result) {
    $timestamp = $conn->query("SELECT timestamp FROM messages WHERE id = LAST_INSERT_ID()")->fetch_assoc()['timestamp'];
    $conn->close();
    echo json_encode(['timestamp' => $timestamp]);
} else {
    $conn->close();
    echo json_encode(['error' => 'Error sending message']);
}
?>
