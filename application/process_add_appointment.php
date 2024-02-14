<?php
include "config.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $patientName = $_POST["patientName"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $gender = $_POST["gender"];
    $appointmentDate = $_POST["appointmentDate"];
    $appointmentTime = $_POST["appointmentTime"];
    $service = $_POST["service"];
    $consultantDoctor = $_POST["consultantDoctor"];

    // Insert data into the database
    $query = "INSERT INTO appointments (patientName, email, contact, gender, appointmentDate, appointmentTime, service, consultantDoctor) VALUES ('$patientName', '$email', '$contact', '$gender', '$appointmentDate', '$appointmentTime', '$service', '$consultantDoctor')";

    if ($conn->query($query) === TRUE) {
        echo "Appointment added successfully!";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
