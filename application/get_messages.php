<?php
include "config.php";

$recipientId = $_GET['recipient_id'];

$result = $conn->query("
    SELECT m.message, m.timestamp, s.first_name as sender
    FROM messages m
    JOIN staff s ON m.sender_id = s.id
    WHERE m.recipient_id = '$recipientId'
    ORDER BY m.timestamp ASC
");

$messages = array();

while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

$conn->close();

echo json_encode($messages);
?>
