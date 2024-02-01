<?php
$conn = new mysqli("localhost", "root", "", "nyalife");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, first_name FROM staff";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<li data-userid='{$row['id']}'>{$row['first_name']}</li>";
    }
} else {
    echo "No users found.";
}

$conn->close();
?>
