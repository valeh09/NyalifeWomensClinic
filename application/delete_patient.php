<?php
// Replace these values with your actual database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nyalife";

// Get the patient ID from the URL parameter
$patientID = $_GET['id'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete patient record from the "patients" table
$sql = "DELETE FROM patients WHERE PatientID = $patientID"; // Using 'PatientID'

if ($conn->query($sql) === TRUE) {
    echo "Patient record deleted successfully!";
} else {
    // Handle delete error
    echo "Error deleting patient record: " . $conn->error;
}

// Close connection
$conn->close();
?>
