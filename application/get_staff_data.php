<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<!-- MATERIAL ICONS FROM GOOGLE --> <!-- MATERIAL ICONS FROM GOOGLE -->

<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">


<!-- the css link --><!-- the css link --><!-- the css link --><!-- the css link --><!-- the css link -->

<link rel="stylesheet" href="css/style.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<body>

    <!-- NAVIGATION NAVIGATION NAVIGATION NAVIGATION NAVIGATION NAVIGATION -->
    <div class="container">
        <div class="navigation">
        <img src="nya-logo.jpg" height="70" width="290">
            <ul>
                <!-- <li>
                    <a href="http://">
                        <span class="material-symbols-outlined">emergency</span>
                        <span class="title">Admin's dashboard</span>
                    </a>
                </li> -->


                <li>
                    <a href="a-index.php">
                        <span class="material-symbols-outlined">dashboard</span>
                        <span class="title">Admin's Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="a-handle-visits.php">
                        <span class="material-symbols-outlined">bookmark</span>
                        <span class="title">Handle Visit</span>
                    </a>
                </li>

                <li>
                    <a href="a-handle-users.php">
                        <span class="material-symbols-outlined">glucose</span>
                        <span class="title">Handle Users</span>
                    </a>
                </li>

                

                <li>
                    <a href="a-handle-meds.php">
                        <span class="material-symbols-outlined">forum</span>
                        <span class="title">Handle Medicine</span>
                    </a>
                </li>

                <li>
                    <a href="database/logout.php">
                        <span class="material-symbols-outlined">logout</span>
                        <span class="title">Log out</span>
                    </a>
                </li>

                
            </ul>
        </div>
    </div>

    <!---------------------------------MAIN--------------------------------------------------->

    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <span class="material-symbols-outlined">menu</span>
                        
            </div>

            <div class="search">
                <label for="search">
                    
                    <input type="search" name="search" id="search" value="Search here">
                </label>
            </div>
            
            <!-- <div class="user">
                <img src="" alt="" >
            </div> -->

        </div>
<?php
// Establish a connection to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nyalife";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get filter values from query parameters
$recordsPerPage = isset($_GET['recordsPerPage']) ? (int)$_GET['recordsPerPage'] : 10;
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Fetch data from the "staff" table with filtering and searching
$sql = "SELECT * FROM staff WHERE CONCAT(id, role, designation, department, specialization, first_name, last_name, gender, email, phone) LIKE '%$search%' LIMIT $recordsPerPage";
$result = $conn->query($sql);

// Check for errors
if (!$result) {
    echo 'Error fetching data: ' . $conn->error;
    die();
}

// Display the data in a table
echo '<table class="staff-table">';
echo '<tr>';
echo '<th>ID</th>';
echo '<th>Role</th>';
echo '<th>Designation</th>';
echo '<th>Department</th>';
echo '<th>Specialization</th>';
echo '<th>First Name</th>';
echo '<th>Last Name</th>';
echo '<th>Gender</th>';
echo '<th>Email</th>';
echo '<th>Phone</th>';
echo '<th>Action</th>';
echo '</tr>';

while ($row = $result->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row['id'] . '</td>';
    echo '<td>' . $row['role'] . '</td>';
    echo '<td>' . $row['designation'] . '</td>';
    echo '<td>' . $row['department'] . '</td>';
    echo '<td>' . $row['specialization'] . '</td>';
    echo '<td>' . $row['first_name'] . '</td>';
    echo '<td>' . $row['last_name'] . '</td>';
    echo '<td>' . $row['gender'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['phone'] . '</td>';
    echo '<td>';
    echo '<a href="view_staff.php?id=' . $row['id'] . '">View</a>';
    echo '<a href="update_staff.php?id=' . $row['id'] . '">Update</a>';
    echo '<a href="delete_staff.php?id=' . $row['id'] . '">Delete</a>';
    echo '</td>';
    echo '</tr>';
}

echo '</table>';

$conn->close();
?>
