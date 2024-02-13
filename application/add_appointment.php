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

    button {
        flex: 1;
        background-color: #007BFF;
        color: white;
        padding: 8px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        font-size: 0.8rem;
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
            <h1 class="m-0">Add New Appointment</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="container">
  

    <form action="process_add_appointment.php" method="post">
     
        <label for="patientName">PatientName:</label>
        <input type="text" name="patientName" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="contact">Contact:</label>
        <input type="tel" name="contact" required>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <label for="appointmentDate">AppointmentDate:</label>
        <input type="date" name="appointmentDate" required>

        <label for="appointmentTime">AppointmentTime:</label>
        <input type="time" name="appointmentTime" required>

        <label for="service">Service:</label>
        <input type="text" name="service" required>

        <label for="consultantDoctor">ConsultantDoctor:</label>
        <input type="text" name="consultantDoctor" required>

      

        <button type="submit">Add Appointment</button>
    </form>
</div>


<?php

include "footer.php";                 
?>
