<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="profile-container">
    <h2>Staff Profile</h2>
    <?php
    // Replace with actual PHP code to fetch staff profile details from the 'staff' table in the 'nyalife' database
    $conn = new mysqli('your_db_host', 'your_db_username', 'your_db_password', 'nyalife');
    $staffId = $_GET['id'];
    $result = $conn->query("SELECT * FROM staff WHERE id = '$staffId'");
    $staffProfile = $result->fetch_assoc();

    foreach ($staffProfile as $key => $value) {
        echo "<div><strong>{$key}:</strong> {$value}</div>";
    }

    $conn->close();
    ?>
</div>

<script src="profile-scripts.js"></script>
</body>
</html>
