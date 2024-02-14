<?php

include "doctor_header.php";                 
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


        h2 {
            text-align: center;
            color: #333;
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
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
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

        <label for="service"></label>
        <input type="text" name="service" required>

        <label for="service">Service:</label>
        <select name="service" required>
            <option value="Obstetrics">Obstetrics</option>
            <option value="Gynecology">Gynecology</option>
            <option value="Teens Health">Teens Health</option>
            <option value="Surgeries">Surgeries</option>
            <option value="In Office Procedures">In Office Procedures</option>
        </select>

   
        <label for="consultantDoctor">ConsultantDoctor:</label>
        <select name="consultantDoctor" required>
            <option value="Dr Schola Airo">Dr Schola Airo</option>
       
        </select>

     

        <button type="submit">Add Appointment</button>
    </form>
</div>

<?php

include "footer.php";                 
?>
