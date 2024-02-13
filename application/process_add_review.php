<?php
  include "config.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data

$name = $_POST['name'];
$email = $_POST['email'];
$review = $_POST['review'];

// Insert review into the reviews table
$sql = "INSERT INTO reviews (name, email, review) VALUES ('$name', '$email', '$review')";

if ($conn->query($sql) === TRUE) {
    echo "Review added successfully!";
} else {
    echo "Error adding review: " . $conn->error;
}

// Close connection
$conn->close();
?>
