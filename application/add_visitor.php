<?php

include "reception_header.php";                 
?>


<head>
   
<style>
    .container {
        max-width: 100%;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 1.5rem;
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    form {
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

    input[type="submit"] {
        background-color: #007BFF;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        font-size: 0.9rem;
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
            <h1 class="m-0">Add Visitor</h1> 
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $purpose = $_POST['purpose'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $visit_to = $_POST['visit_to'];
    $number_of_person = $_POST['number_of_person'];
    $visit_date = $_POST['visit_date'];
    $time_in = $_POST['time_in'];
    $time_out = $_POST['time_out'];
    $note = $_POST['note'];

    // Insert data into visitors table
    $sql = "INSERT INTO visitors (purpose, name, phone, visit_to, number_of_person, visit_date, time_in, time_out, note)
            VALUES ('$purpose', '$name', '$phone', '$visit_to', '$number_of_person', '$visit_date', '$time_in', '$time_out', '$note')";

    if ($conn->query($sql) === TRUE) {
        echo "Visitor information added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<div class="form-container">

    <form action="add_visitor.php" method="post">
        <label for="purpose">Purpose:</label>
        <input type="text" name="purpose" required>

        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" required>

     
        <label for="visit_to">Visit To:</label>
        <select name="visit_to" required>
            <option value="Male">Staff</option>
            <option value="OPD Patient">OPD Patient</option>
            <option value="IPD Patient">IPD Patient</option>
        </select>

        <label for="number_of_person">Number of Persons:</label>
        <input type="number" name="number_of_person" required>

        <label for="visit_date">Visit Date:</label>
        <input type="date" name="visit_date" required>

        <label for="time_in">Time In:</label>
        <input type="time" name="time_in" required>

        <label for="time_out">Time Out:</label>
        <input type="time" name="time_out" >

        <label for="note">Note:</label>
        <textarea name="note"></textarea>

        <input type="submit" value="Add Visitor">
    </form>
</div>




<?php

include "footer.php";                 
?>
