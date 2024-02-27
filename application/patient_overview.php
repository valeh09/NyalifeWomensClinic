<?php
include "doctor_header.php";

// Check if patient_id is provided in the URL
if (isset($_GET['patient_id'])) {
    $patient_id = $_GET['patient_id'];

   require "config.php";

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch patient data from the database using prepared statement
    $patientQuery = "SELECT FirstName, LastName, DOB, Gender, Address, PhoneNumber FROM patients WHERE PatientID = ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($patientQuery);

    // Bind the parameters
    $stmt->bind_param("i", $patient_id);

    // Execute the statement
    $stmt->execute();

    // Bind the result variables
    $stmt->bind_result($FirstName, $LastName, $dob, $gender, $address, $phoneNumber);

    // Fetch the result
    $stmt->fetch();

    // Close the statement
    $stmt->close();

    // Close the connection
    $conn->close();

    // Check if data was fetched successfully
    if (isset($firstName)) {
        // Display patient's name
        $patientData = $FirstName . ' ' . $LastName;
    } else {
        // Handle the case when patient data is not found
        $patientName = "Patient Not Found";
    }
} else {
    // Redirect to an error page or handle the case where patient_id is not provided
    header("Location: error_page.php");
    exit();
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- Display patient's name -->
                    <h1>Patient Overview - <?php echo $patientName['FirstName'] . ' ' . $patientName['LastName']; ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Add links to each section in the overview container -->
    <div class="overview-container">
        <div class="overview-item" onclick="showContent('dashboard')">Dashboard</div>
        <div class="overview-item" onclick="showContent('triage')">Triage</div>
        <div class="overview-item" onclick="showContent('ptHist')">Patient History</div>
        <div class="overview-item" onclick="showContent('curtHist')">Current History</div>
        <div class="overview-item" onclick="showContent('phExam')">Physical Exam</div>
        <div class="overview-item" onclick="showContent('impression')">Impression</div>
        <div class="overview-item" onclick="showContent('lab')">Lab</div>
        <div class="overview-item" onclick="showContent('imaging')">Imaging</div>
        <div class="overview-item" onclick="showContent('diagnosis')">Diagnosis</div>
        <div class="overview-item" onclick="showContent('prescription')">Prescription</div>
        <div class="overview-item" onclick="showContent('procedure')">Procedure</div>
    </div>

    <!-- Add content containers for each section -->
    <div id="dashboard-content" class="overview-content active">
        <?php include('dashboard.php'); ?>
    </div>

    <div id="triage-content" class="overview-content">
        <?php include('triage.php'); ?>
    </div>

    <div id="ptHist-content" class="overview-content">
        <?php include('past_history.php'); ?>
    </div>

    <div id="curtHist-content" class="overview-content">
        <?php include('current_history.php'); ?>
    </div>

    <div id="phExam-content" class="overview-content">
        <?php include('physical_examination.php'); ?>
    </div>

    <div id="impression-content" class="overview-content">
        <?php include('impression.php'); ?>
    </div>

    <div id="lab-content" class="overview-content">
        <?php include('lab.php'); ?>
    </div>

    <div id="imaging-content" class="overview-content">
        <?php include('imaging.php'); ?>
    </div>

    <div id="diagnosis-content" class="overview-content">
        <?php include('diagnosis.php'); ?>
    </div>

    <div id="prescription-content" class="overview-content">
        <?php include('prescription.php'); ?>
    </div>

    <div id="procedure-content" class="overview-content">
        <?php include('procedure.php'); ?>
    </div>

    <script>
        function showContent(contentId) {
            const contents = document.querySelectorAll('.overview-content');
            contents.forEach(content => {
                content.classList.remove('active');
            });

            const selectedContent = document.getElementById(`${contentId}-content`);
            if (selectedContent) {
                selectedContent.classList.add('active');
            }
        }
    </script>
</div>

<?php
include "footer.php";
?>
