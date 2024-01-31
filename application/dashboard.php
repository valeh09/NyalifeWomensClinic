<?php
// Sample data for Samantha Otieno
$patientInfo = array(
    'FirstName' => 'Samantha',
    'LastName' => 'Otieno',
    'PhoneNumber' => '123-456-7890',
    'EmailAddress' => 'samantha@example.com',
    'NextOfKin' => 'John Otieno',
    'NextOfKinPhoneNumber' => '987-654-3210',
    'Gender' => 'Female',
    'DOB' => '1990-05-15',
    'BloodGroup' => 'O+',
    'MaritalStatus' => 'Single',
    'Allergies' => 'None',
    'IDNumber' => 'ID123456',
    'Occupation' => 'Software Developer',
    'Medication' => 'Painkiller, Vitamin C',
);

// Sample image URL (replace with the actual image URL)
$imageURL = 'dist/img/height.jpg'; // Placeholder image URL

// Function to format date of birth
function formatDateOfBirth($dob)
{
    return date('F j, Y', strtotime($dob));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <style>
        /* Your styles for the dashboard go here */
        .patient-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .patient-info img {
            max-height: 200px;
            max-width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .patient-details {
            flex: 1;
            margin-left: 20px;
        }
    </style>
</head>
<body>

    <h2>Patient Dashboard - <?php echo $patientInfo['FirstName'] . ' ' . $patientInfo['LastName']; ?></h2>

    <div class="patient-info">
        <img src="<?php echo $imageURL; ?>" alt="Patient Height Image">
        <div class="patient-details">
            <p><strong>Full Name:</strong> <?php echo $patientInfo['FirstName'] . ' ' . $patientInfo['LastName']; ?></p>
            <p><strong>Phone Number:</strong> <?php echo $patientInfo['PhoneNumber']; ?></p>
            <p><strong>Email Address:</strong> <?php echo $patientInfo['EmailAddress']; ?></p>
            <p><strong>Next of Kin:</strong> <?php echo $patientInfo['NextOfKin']; ?></p>
            <p><strong>Next of Kin Phone Number:</strong> <?php echo $patientInfo['NextOfKinPhoneNumber']; ?></p>
            <p><strong>Gender:</strong> <?php echo $patientInfo['Gender']; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo formatDateOfBirth($patientInfo['DOB']); ?></p>
            <p><strong>Blood Group:</strong> <?php echo $patientInfo['BloodGroup']; ?></p>
            <p><strong>Marital Status:</strong> <?php echo $patientInfo['MaritalStatus']; ?></p>
            <p><strong>Allergies:</strong> <?php echo $patientInfo['Allergies']; ?></p>
            <p><strong>ID Number:</strong> <?php echo $patientInfo['IDNumber']; ?></p>
            <p><strong>Occupation:</strong> <?php echo $patientInfo['Occupation']; ?></p>
            <p><strong>Medication:</strong> <?php echo $patientInfo['Medication']; ?></p>
        </div>
    </div>

    <!-- Add more sections as needed for additional patient information -->

</body>
</html>

