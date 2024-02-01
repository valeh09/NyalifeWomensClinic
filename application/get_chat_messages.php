<?php
include_once "config.php";

// Get the receiver ID from the AJAX request
$receiverId = $_GET['receiverId'];

// Fetch chat messages based on the receiver ID
$getChatMessagesQuery = "SELECT sender_id, message, timestamp FROM messages WHERE (sender_id = $userId AND receiver_id = $receiverId) OR (sender_id = $receiverId AND receiver_id = $userId) ORDER BY timestamp";
$chatMessagesResult = $conn->query($getChatMessagesQuery);

// Display chat messages
while ($row = $chatMessagesResult->fetch_assoc()) {
    echo '<div class="message">';
    echo '<strong>User ' . $row['sender_id'] . ':</strong> ' . $row['message'];
    echo '</div>';
}

// Close the database connection
$conn->close();
?>
