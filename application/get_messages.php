<?php
include "config.php";

$recipientId = $_GET['recipient_id'];

$result = $conn->query("
    SELECT message, timestamp
    FROM messages
    WHERE recipient_id = '$recipientId'
    ORDER BY timestamp ASC
");

$messages = array();

while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

$conn->close();

echo json_encode($messages);
?>
