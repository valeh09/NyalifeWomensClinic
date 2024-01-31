<?php
$conn = new mysqli("localhost", "root", "", "nyalife");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$patientName = isset($_GET['name']) ? $conn->real_escape_string($_GET['name']) : '';

$query = "SELECT dashboard_data FROM patients WHERE name = '$patientName'";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo $data['dashboard_data'];
} else {
    echo "No data available.";
}

$conn->close();
?>
