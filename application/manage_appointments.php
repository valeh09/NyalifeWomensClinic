<?php

include "reception_header.php";                 
?>


<head>
    
<style>
        

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Enable horizontal scroll on small screens */
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #ddd; /* Add border to the table */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd; /* Add border to cells */
        }

        th {
            background-color: #f2f2f2;
        }

        .add-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-block; /* Make the button inline with text */
            margin-bottom: 20px;
        }

        .search-form {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .search-form input[type="text"] {
            width: 70%;
            padding: 10px;
            box-sizing: border-box;
        }

        .search-form button {
            width: 25%;
            padding: 10px;
            box-sizing: border-box;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>

      
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Appointments List</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="container">
  

    <a href="add_appointment.php" class="add-button">Add New Appointment</a>

    <form action="manage_appointments.php" method="get" class="search-form">
        <input type="text" name="search" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>AppointmentID</th>
            
                <th>PatientName</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Gender</th>
                <th>AppointmentDate</th>
                <th>AppointmentTime</th>
                <th>Service</th>
                <th>ConsultantDoctor</th>
                <th>AppointmentStatus</th>
            </tr>
        </thead>
        <tbody>
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

            // Search functionality
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $searchCondition = !empty($search) ? "WHERE PatientName LIKE '%$search%' OR ConsultantDoctor LIKE '%$search%' OR AppointmentStatus LIKE '%$search%'" : '';

            // Fetch appointment records from the database
            $sql = "SELECT * FROM appointments $searchCondition";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['AppointmentID']}</td>
                         
                            <td>{$row['PatientName']}</td>
                            <td>{$row['Email']}</td>
                            <td>{$row['Contact']}</td>
                            <td>{$row['Gender']}</td>
                            <td>{$row['AppointmentDate']}</td>
                            <td>{$row['AppointmentTime']}</td>
                            <td>{$row['Service']}</td>
                            <td>{$row['ConsultantDoctor']}</td>
                            <td>{$row['AppointmentStatus']}</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No records found.</td></tr>";
            }

            // Close connection
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

</body>


<?php

include "footer.php";                 
?>

