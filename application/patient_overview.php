<?php

include "doctor_header.php";                 
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0"> Patient Dashboard</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<head>
  
    <style>
       

       .overview-container {
    display: flex;
    justify-content: space-evenly;
    padding: 5px; /* Adjusted padding */
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

}

        .overview-item {
            flex: 1;
            text-align: center;
            padding: 12px;
            margin: 7px;
            background-color: #98FB98;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
            cursor: pointer;
          
        }

        .overview-item:hover {
            background-color:  #f2f2f2;
        }

        .overview-content {
            margin: 20px;
        }
    </style>
</head>

  

    <?php
        // Dummy data for patient overview
        $patientName = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '';
        $patientDashboard = 'Patient Dashboard Data';
        $triage = 'Triage Data';
        $ptHist = 'Patient History Data';
        $curtHist = 'Current History Data';
        $phyExam = 'Physical Examination Data';
        $impression = 'Impression Data';
        $lab = 'Lab Data';
        $imaging = 'Imaging Data';
        $diagnosis = 'Diagnosis Data';
        $prescription = 'Prescription Data';
        $procedure = 'Procedure Data';
    ?>

    <h2><?php echo $patientName; ?></h2>

    <div class="overview-container">
  
   
        <div class="overview-item" onclick="showContent('dashboard')">Dashboard</div>
        <div class="overview-item" onclick="showContent('triage')">Triage</div>
        <div class="overview-item" onclick="showContent('ptHist')">Patient History</div>
        <div class="overview-item" onclick="showContent('curtHist')">Current History</div>
        <div class="overview-item" onclick="showContent('phyExam')">Physical Examination</div>
        <div class="overview-item" onclick="showContent('impression')">Impression</div>
        <div class="overview-item" onclick="showContent('lab')">Lab</div>
        <div class="overview-item" onclick="showContent('imaging')">Imaging</div>
        <div class="overview-item" onclick="showContent('diagnosis')">Diagnosis</div>
        <div class="overview-item" onclick="showContent('prescription')">Prescription</div>
        <div class="overview-item" onclick="showContent('procedure')">Procedure</div>
    </div>
    

    <div class="overview-content" id="dashboard-content">
        <h3>Dashboard</h3>
        <p><?php echo $patientDashboard; ?></p>
    </div>

    <div class="overview-content" id="triage-content" style="display: none;">
        <h3>Triage</h3>
        <p><?php echo $triage; ?></p>
    </div>

    <div class="overview-content" id="ptHist-content" style="display: none;">
        <h3>Patient History</h3>
        <p><?php echo $ptHist; ?></p>
    </div>

    <div class="overview-content" id="curtHist-content" style="display: none;">
        <h3>Current History</h3>
        <p><?php echo $curtHist; ?></p>
    </div>

    <div class="overview-content" id="phyExam-content" style="display: none;">
        <h3>Physical Examination</h3>
        <p><?php echo $phyExam; ?></p>
    </div>

    <div class="overview-content" id="impression-content" style="display: none;">
        <h3>Impression</h3>
        <p><?php echo $impression; ?></p>
    </div>

    <div class="overview-content" id="lab-content" style="display: none;">
        <h3>Lab</h3>
        <p><?php echo $lab; ?></p>
    </div>

    <div class="overview-content" id="imaging-content" style="display: none;">
        <h3>Imaging</h3>
        <p><?php echo $imaging; ?></p>
    </div>

    <div class="overview-content" id="diagnosis-content" style="display: none;">
        <h3>Diagnosis</h3>
        <p><?php echo $diagnosis; ?></p>
    </div>

    <div class="overview-content" id="prescription-content" style="display: none;">
        <h3>Prescription</h3>
        <p><?php echo $prescription; ?></p>
    </div>

    <div class="overview-content" id="procedure-content" style="display: none;">
        <h3>Procedure</h3>
        <p><?php echo $procedure; ?></p>
    </div>

    <script>
        function showContent(contentId) {
            const contents = document.querySelectorAll('.overview-content');
            contents.forEach(content => {
                if (content.id === `${contentId}-content`) {
                    content.style.display = 'block';
                } else {
                    content.style.display = 'none';
                }
            });
        }
    </script>






<?php

include "footer.php";                 
?>

