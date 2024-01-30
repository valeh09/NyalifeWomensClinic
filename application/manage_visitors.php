<?php

include "reception_header.php";                 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Visitor List</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Visitors</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .table-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .add-button {
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: bold;
        }

        .search-form {
            display: flex;
        }

        input[type="text"] {
            width: 200px;
            padding: 8px;
            box-sizing: border-box;
            margin-right: 10px;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .edit-button, .view-button, .delete-button {
            background-color: #007BFF;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            text-decoration: none;
            cursor: pointer;
            margin-right: 5px;
        }

        .edit-button:hover, .view-button:hover, .delete-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

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
$searchCondition = !empty($search) ? "WHERE name LIKE '%$search%' OR purpose LIKE '%$search%' OR phone LIKE '%$search%' OR visit_to LIKE '%$search%'" : '';

// Fetch visitor records from the database
$sql = "SELECT id, purpose, name, phone, visit_to, number_of_person, visit_date, time_in, time_out, note FROM visitors $searchCondition";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<div class="table-container">
    <div class="header">
        <a href="add_visitor.php" class="add-button">Add New Visitor</a>
        <form action="manage_visitors.php" method="get" class="search-form">
            <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Purpose</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Visit To</th>
            <th>Number of Persons</th>
            <th>Date</th>
            <th>Time In</th>
            <th>Time Out</th>
            <th>Note</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['purpose']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['visit_to']}</td>
                        <td>{$row['number_of_person']}</td>
                        <td>{$row['visit_date']}</td>
                        <td>{$row['time_in']}</td>
                        <td>{$row['time_out']}</td>
                        <td>{$row['note']}</td>
                        <td>
                            <a href='edit_visitor.php?id={$row['id']}' class='edit-button'>Edit</a>
                            <a href='view_visitor.php?id={$row['id']}' class='view-button'>View</a>
                            <button class='delete-button' onclick='confirmDelete({$row['id']})'>Delete</button>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='11'>No records found.</td></tr>";
        }
        ?>
    </table>
</div>

<script>
function confirmDelete(id) {
    var confirmDelete = confirm("Are you sure you want to delete this visitor record?");
    
    if (confirmDelete) {
        window.location.href = 'delete_visitor.php?id=' + id;
    }
}
</script>

</body>
</html>


<?php

include "footer.php";                 
?>