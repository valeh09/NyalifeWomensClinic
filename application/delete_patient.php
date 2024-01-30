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

// Fetch patient information based on the provided ID
$sql = "SELECT * FROM patients WHERE id = $patientID";
$result = $conn->query($sql);

if ($result === FALSE) {
    // Handle SQL query error
    echo "Error fetching patient record: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        // Delete patient record from the "patients" table
        $deleteSql = "DELETE FROM patients WHERE id = $patientID";

        if ($conn->query($deleteSql) === TRUE) {
            echo "Patient record deleted successfully!";
        } else {
            // Handle delete error
            echo "Error deleting patient record: " . $conn->error;
        }
    } else {
        echo "Patient not found.";
    }
}

// Close connection
$conn->close();
?>
