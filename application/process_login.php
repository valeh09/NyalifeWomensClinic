<?php
// Replace these values with your actual database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nyalife";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data

$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password (assuming it's stored as a hash in the database)
$hashedPassword = hash('sha256', $password);

// Check user credentials in the "staff" table
$sql = "SELECT * FROM staff WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $_SESSION['id'] = $row['id'];
    $role = $row['role'];

    // Redirect based on the user's role
    switch ($role) {
        case 'Doctor':
            header("Location: doctor_index.php");
            break;

        case 'Receptionist':
            header("Location: reception_index.php");
            break;

        case 'Administrator':
            header("Location: admin_index.php");
            break;

        // Add more cases for additional roles if needed

        default:
            // Redirect to a default page if the role is not recognized
            header("Location: default_index.php");
            break;
    }
} else {
    echo "Invalid email or password. Please try again.";
}

// Close connection
$conn->close();
?>
