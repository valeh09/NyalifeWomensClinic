<?php
  include "config.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$service = $_POST['service'];
$doctor = $_POST['doctor'];
$date = $_POST['date'];
$time = $_POST['time'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// Insert new appointment into the "appointments" table
$sql = "INSERT INTO appointments (PatientName, Email, Contact, Gender, AppointmentDate, AppointmentTime, Service, ConsultantDoctor, AppointmentStatus)
        VALUES ('$name', '$email', '$phone', 'Unknown', '$date', '$time', '$service', '$doctor', 'Scheduled')";

if ($conn->query($sql) === TRUE) {
    echo "Appointment booked successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
