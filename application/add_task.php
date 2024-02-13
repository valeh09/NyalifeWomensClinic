<?php

include "reception_header.php";                 
?>


<head>
   

    <style>
       

        .form-container  {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    label {
        flex: 1;
        margin-bottom: 8px;
        font-weight: bold;
        font-size: 0.8rem;
    }

    input,
    select {
        flex: 2;
        padding: 8px;
        box-sizing: border-box;
        font-size: 0.8rem;
    }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
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
            <h1 class="m-0">Add Task</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<?php
  include "config.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $taskName = $_POST['task_name'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $deadline = $_POST['deadline'];
 

    // Insert data into tasks table
    $sql = "INSERT INTO tasks (task_name, description, priority, deadline) 
            VALUES ('$taskName', '$description', '$priority', '$deadline')";

    if ($conn->query($sql) === TRUE) {
        echo "Task added successfully!";
      
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<div class="form-container">

    <form action="add_task.php" method="post">
   

        <label for="task_name">Task Name:</label>
        <select name="task_name" required>
        <option value="Patient Registration">Patient Registration</option>
        <option value="Appointment scheduling">Appointment scheduling</option>
        <option value="Appointment Cancellations and Rescheduling">Appointment Cancellations and Rescheduling</option>
            <option value="Equipment Maintenance">Equipment Maintenance</option>
            <option value="Clinical Support">Clinical Support</option>
        <option value="Billing and Insurance Claims">Billing and Insurance Claims</option>
            <option value="Medical Records Management">Medical Records Management</option>
            <option value="Patient Communication">Patient Communication</option>
            <option value="Follow-Up Call">Follow-Up Call</option>
            <option value="Lab and Test Result">Lab and Test Result</option>
        </select>

        <label for="description">Description:</label>
        <textarea name="description" rows="4"></textarea>

        <label for="priority">Priority:</label>
        <select name="priority" required>
            <option value="High">High</option>
            <option value="Medium">Medium</option>
            <option value="Low">Low</option>
        </select>

        <label for="deadline">Deadline:</label>
        <input type="date" name="deadline" required>

    <!--    <label for="status">Status:</label>
        <select name="status" required>
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>
--->
        <button type="submit">Add Task</button>
    </form>
</div>

<?php

include "footer.php";                 
?>

