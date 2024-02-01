<?php
$conn = new mysqli("localhost", "root", "", "nyalife");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$receiverId = isset($_GET['receiver_id']) ? $_GET['receiver_id'] : null;

$stmt = $conn->prepare("SELECT * FROM messages WHERE receiver_id = ? ORDER BY created_at DESC");
$stmt->bind_param("i", $receiverId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='message'>{$row['message']}</div>";
    }
} else {
    echo "No messages found.";
}

$stmt->close();
$conn->close();
?>
