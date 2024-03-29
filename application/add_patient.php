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
    .success-message {
        color: #28a745; /* Green color for success message */
        font-size: 1rem;
        text-align: center;
        margin-top: 10px;
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
            <h1 class="m-0">Add New Patient</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
        <?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Replace these values with your actual database connection details
    include "config.php";

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $phoneNumber = $_POST['phone'];
    $emailAddress = $_POST['email'];
    $nextOfKin = $_POST['next_of_kin'];
    $nextOfKinPhoneNumber = $_POST['next_of_kin_phone'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $bloodGroup = $_POST['blood_group'];
    $maritalStatus = $_POST['marital_status'];
    $allergies = $_POST['allergies'];
    $idNumber = $_POST['id_number'];
    $address = $_POST['address'];
    $occupation = $_POST['occupation'];
    $medication = $_POST['medication'];
    $additionalInformation = $_POST['additional_information'];
    $type = $_POST['type'];

    // SQL query to insert patient information into the "patients" table
    $sql = "INSERT INTO patients (FirstName, LastName, PhoneNumber, EmailAddress, NextOfKin, NextOfKinPhoneNumber, 
            Gender, DOB, BloodGroup, MaritalStatus, Allergies, IDNumber, Address, Occupation, Medication, 
            AdditionalInformation, Type) 
            VALUES ('$firstName', '$lastName', '$phoneNumber', '$emailAddress', '$nextOfKin', '$nextOfKinPhoneNumber', 
            '$gender', '$dob', '$bloodGroup', '$maritalStatus', '$allergies', '$idNumber',  '$address','$occupation', 
            '$medication', '$additionalInformation', '$type')";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="success-message">Patient information added successfully!</div>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<div class="form-container">
        <form action="add_patient.php" method="post">
        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required>

        <label for="phone">Phone:</label>
        <input type="tel" name="phone" required>

        <label for="email">Email:</label>
        <input type="email" name="email">

        <label for="next_of_kin">Next of Kin:</label>
        <input type="text" name="next_of_kin" required>

        <label for="next_of_kin_phone">Next of Kin Phone:</label>
        <input type="tel" name="next_of_kin_phone" required>

        <label for="gender">Gender:</label>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob">

        <label for="blood_group">Blood Group:</label>
        <select name="blood_group">
        <option value="Unknown">Unknown</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>

        <label for="marital_status">Marital Status:</label>
        <select name="marital_status">
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Divorced">Divorced</option>
            <option value="Widowed">Widowed</option>
        </select>

       

        <label for="id_number">ID Number:</label>
        <input type="text" name="id_number">

        
        <label for="Address">Address:</label>
        <input type="text" name="address">

        <label for="occupation">Occupation:</label>
        <input type="text" name="occupation">

        <label for="medication">Medication:</label>
        <textarea name="medication"></textarea>

        <label for="additional_information">Additional Information:</label>
        <textarea name="additional_information"></textarea>

        <label for="allergies">Allergies:</label>
        <textarea name="allergies"></textarea>

        
        <label for="type">Type:</label>
        <select name="type">
            <option value="Outpatient">Out-patient</option>
            <option value="Inpatient">In-patient</option>
        </select>

        <input type="submit" value="Add Patient">
    </form>
</div>
            </div>

    
        </div>

        
    </div>
</body>

<?php

include "footer.php";                 
?>
