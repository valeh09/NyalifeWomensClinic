<?php

include "admin_header.php";                 
?>

    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.table-container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.add-button {
    background-color: #3498db;
    color: #fff;
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 5px;
}

.search-form {
    display: flex;
    margin-top: 10px;
}

input[type="text"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button[type="submit"] {
    background-color: #2ecc71;
    color: #fff;
    padding: 8px 12px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.staff-table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

.staff-table th, .staff-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.staff-table th {
    background-color: #3498db;
    color: #fff;
}

.staff-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.edit-button, .view-button, .delete-button {
    background-color: #3498db;
    color: #fff;
    padding: 6px 10px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    margin-right: 5px;
}

.edit-button, .view-button, .delete-button {
            background-color: #008CBA;
            color: white;
            padding: 5px 8px;
            text-decoration: none;
            border-radius: 3px;
            margin-right: 5px;
            cursor: pointer;
        }
.delete-button {
            background-color: #f44336;
        }
        </style>
    
</head>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manage Staff</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

       <?php
  include "config.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Search functionality
$search = isset($_GET['search']) ? $_GET['search'] : '';
$searchCondition = !empty($search) ? "WHERE first_name LIKE '%$search%' OR Designation LIKE '%$search%' OR Department LIKE '%$search%' OR Email LIKE '%$search%' OR Phone LIKE '%$search%'" : '';

// Fetch staff records from the database
$sql = "SELECT ID, first_name, Designation, Department, Email, Phone FROM Staff $searchCondition";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>



<div class="table-container">
    <div class="header">
        <a href="add_staff.php" class="add-button">Add New Staff</a>
        <form action="manage_staff.php" method="get" class="search-form">
            <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <table class="staff-table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Designation</th>
            <th>Department</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['ID']}</td>
                        <td>{$row['first_name']}</td>
                        <td>{$row['Designation']}</td>
                        <td>{$row['Department']}</td>
                        <td>{$row['Email']}</td>
                        <td>{$row['Phone']}</td>
                        <td>
                        <button onclick=\"location.href='update_staff.php?id={$row['ID']}'\" class='edit-button'>Edit</button>
                            <button onclick=\"location.href='view_staff.php?id={$row['ID']}'\" class='view-button'>View</button>
                        <button class='delete-button' onclick='confirmDelete({$row['ID']})'>Delete</button>
        
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No records found.</td></tr>";
        }
        ?>
    </table>
</div>





       <!--- End Main page Content------>
        
            </div>

    
        </div>

        
    </div>
</body>
<script>
function confirmDelete(id) {
    var confirmDelete = confirm("Are you sure you want to delete this staff record?");
    
    if (confirmDelete) {
        window.location.href = 'delete_staff.php?id=' + id;
    }
}
</script>

 
<?php

include "footer.php";                 
?>
