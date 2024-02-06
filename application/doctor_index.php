 
<?php

include "doctor_header.php";                 
?>


<?php

        // database connection
        require_once "config.php";

         $currentDay = date( 'Y-m-d', strtotime("today") );
         $tomarrow = date( 'Y-m-d', strtotime("+1 day") );

         $today_leave = 0;
         $tomarrow_leave = 0;
         $this_week = 0;
         $next_week = 0;
            $i = 1;
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php
              
              
  
              // localhost is localhost 
              // servername is root 
              // password is empty 
              // database name is database 
              $conn = mysqli_connect("localhost","root","","nyalife"); 
                
                  // SQL query to display row count 
                  // in building table 
                  $sql = "SELECT * from appointments"; 
                
                  if ($result = mysqli_query($conn, $sql)) { 
                
                  // Return the number of rows in result set 
                  $rowcount = mysqli_num_rows( $result ); 
                    
                  // Display result 
                  printf(" %d\n", $rowcount); 
              } 
                
              // Close the connection 
              mysqli_close($conn); 
                
              ?> 
</h3>

                <p>Appointments</p>
              </div>
              <div class="icon">
                <i class="fas fa-calendar-check mr-2"></i>
              </div>
              <a href="doctor_manage_appointments.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
             
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php
              
              
  
              // localhost is localhost 
              // servername is root 
              // password is empty 
              // database name is database 
              $conn = mysqli_connect("localhost","root","","nyalife"); 
                
                  // SQL query to display row count 
                  // in building table 
                  $sql = "SELECT * from patients"; 
                
                  if ($result = mysqli_query($conn, $sql)) { 
                
                  // Return the number of rows in result set 
                  $rowcount = mysqli_num_rows( $result ); 
                    
                  // Display result 
                  printf(" %d\n", $rowcount); 
              } 
                
              // Close the connection 
              mysqli_close($conn); 
                
              ?> </h3>

                <p>Patients Profiles</p>
              </div>
              <div class="icon">
                <i class="fas fa-users mr-2"></i>
              </div>
              <a href="doctor_manage_patients.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php
              
              
  
              // localhost is localhost 
              // servername is root 
              // password is empty 
              // database name is database 
              $conn = mysqli_connect("localhost","root","","nyalife"); 
                
                  // SQL query to display row count 
                  // in building table 
                  $sql = "SELECT * from tasks"; 
                
                  if ($result = mysqli_query($conn, $sql)) { 
                
                  // Return the number of rows in result set 
                  $rowcount = mysqli_num_rows( $result ); 
                    
                  // Display result 
                  printf(" %d\n", $rowcount); 
              } 
                
              // Close the connection 
              mysqli_close($conn); 
                
              ?> </h3>

                <p>Tasks</p>
              </div>
              <div class="icon">
                <i class="fas fa-tasks"></i>
              </div>
            
              <a href="doctor_task.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark mr-2">
              <div class="inner">
                <h3>0</h3>

                <p>Telemedicine</p>
              </div>
              <div class="icon">
                <i class="fas fa-headphones"></i>
              </div>
              <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              
            </div>
            
          </div>

        </div>
 
          
          <div>
       
     
<head>
  

<head>
 
    <style>
        /* Your existing CSS styles go here */
        .tables-container {
            display: flex;
            margin-bottom: 20px;
            width: 100%;
        }

        table {
            flex: 1;
            width: 100%;
            border-collapse: collapse;
            margin-right: 10px;
         
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
          background-color: #A9A9A9;
        }

        .choices-container {
            display: flex;
            margin-bottom: 20px;
        }

        .choice-column {
            flex: 1;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }

        .active-choice {
            background-color: #A9A9A9;
        }
    </style>
</head>
<body>

    <div class="choices-container">
        <div class="choice-column" onclick="showTable('outpatientsTable'); setActiveChoice(this);">Outpatients</div>
        <div class="choice-column" onclick="showTable('inpatientsTable'); setActiveChoice(this);">Inpatients</div>
        <div class="choice-column" onclick="showTable('upcomingVisitsTable'); setActiveChoice(this);">Upcoming Visits</div>
    </div>

    <div class="tables-container">
        <table id="outpatientsTable">
            <tr>
                <th>Arrival Time</th>
                <th>Patient Name</th>
                <th>Waiting Time</th>
            </tr>
            <!-- Outpatients table rows will be dynamically added here using JavaScript -->
        </table>

        <table id="inpatientsTable">
            <tr>
                <th>Admission Time</th>
                <th>Patient Name</th>
                <th>Time Since Admission</th>
            </tr>
            <!-- Inpatients table rows will be dynamically added here using JavaScript -->
        </table>

        <table id="upcomingVisitsTable">
            <tr>
                <th>Due Date</th>
                <th>Patient Name</th>
                <th>Phone Number</th>
            </tr>
            <!-- Upcoming visits table rows will be dynamically added here using JavaScript -->
        </table>
    </div>

    <script>
        // Sample data for demonstration
        const outpatientsData = [
            { arrivalTime: '2024-01-11 09:00', patientName: 'Samantha Otieno', waitingTime: '0h:15m' },
            { arrivalTime: '2024-01-11 09:30', patientName: 'Patricia Achieng', waitingTime: '1h:30m' }
            // Add more data as needed
        ];

        const inpatientsData = [
            { admissionTime: '2024-01-10 15:45', patientName: 'Mary Johnson', timeSinceAdmission: '18h:30m' },
            { admissionTime: '2024-01-11 08:00', patientName: 'Robert Brown', timeSinceAdmission: '1h:15m' }
            // Add more data as needed
        ];

        const upcomingVisitsData = [
            { dueDate: '2024-01-12', patientName: 'Samantha Otieno', phoneNumber: '123-456-7890' }
            // Add more data as needed
        ];

        // Function to populate a table with data
        function populateTable(tableId, data) {
            const table = document.getElementById(tableId);
            data.forEach(item => {
                const row = table.insertRow();
                for (const key in item) {
                    const cell = row.insertCell();
                    cell.textContent = item[key];
                }
                // Add click event to each row for patient selection
                row.addEventListener('click', function() {
                    goToPatientOverview(item.patientName);
                });
            });
        }

        // Function to show a specific table and hide others
        function showTable(tableId) {
            const tables = document.querySelectorAll('table');
            tables.forEach(table => {
                if (table.id === tableId) {
                    table.style.display = 'table';
                } else {
                    table.style.display = 'none';
                }
            });
        }

        // Function to set the active choice and highlight it
        function setActiveChoice(choiceElement) {
            const choices = document.querySelectorAll('.choices-container .choice-column, h2');
            choices.forEach(choice => {
                choice.classList.remove('active-choice');
            });
            choiceElement.classList.add('active-choice');
        }

        // Function to navigate to patient overview page with the selected patient's name
        function goToPatientOverview(patientName) {
            window.location.href = `patient_overview.php?name=${encodeURIComponent(patientName)}`;
        }

        // Populate tables with sample data
        populateTable('outpatientsTable', outpatientsData);
        populateTable('inpatientsTable', inpatientsData);
        populateTable('upcomingVisitsTable', upcomingVisitsData);

        // Show the first table by default and set it as active
        showTable('outpatientsTable');
        setActiveChoice(document.querySelector('.choices-container .choice-column'));
    </script>



 
<?php

include "footer.php";                 
?>

