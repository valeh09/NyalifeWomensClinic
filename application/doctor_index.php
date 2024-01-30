 
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
                <h3>4</h3>

                <p>Tasks</p>
              </div>
              <div class="icon">
                <i class="fas fa-tasks"></i>
              </div>
            
              <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger mr-2">
              <div class="inner">
                <h3>6</h3>

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
   
    <style>
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
            background-color: #f2f2f2;
        }

        h2 {
            color: #333;
            cursor: pointer;
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
            background-color: #ddd;
        }
    </style>
</head>
<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "nyalife";

// Create connection
$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Function to fetch outpatient data
function getOutpatientsData($conn) {
    $stmt = $conn->query("SELECT arrivalTime, patientName, waitingTime FROM appointments WHERE type = 'outpatient'");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to fetch inpatient data
function getInpatientsData($conn) {
    $stmt = $conn->query("SELECT admissionTime, patientName, timeSinceAdmission FROM patients WHERE type = 'inpatient'");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Function to fetch upcoming visits data
function getUpcomingVisitsData($conn) {
    $stmt = $conn->query("SELECT AppointmentDate, PatientName, Contact FROM appointments WHERE AppointmentDate > NOW()");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Close connection
$conn = null;
?>

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
        // Function to populate a table with data
        function populateTable(tableId, data) {
            const table = document.getElementById(tableId);
            data.forEach(item => {
                const row = table.insertRow();
                for (const key in item) {
                    const cell = row.insertCell();
                    cell.textContent = item[key];
                }
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

        // Fetch and populate tables with data from PHP
        fetch('data.php') // Assume your PHP script is named data.php
            .then(response => response.json())
            .then(data => {
                populateTable('outpatientsTable', data.outpatientsData);
                populateTable('inpatientsTable', data.inpatientsData);
                populateTable('upcomingVisitsTable', data.upcomingVisitsData);
            })
            .catch(error => console.error('Error fetching data from PHP:', error));

        // Show the first table by default and set it as active
        showTable('outpatientsTable');
        setActiveChoice(document.querySelector('.choices-container .choice-column'));
    </script>
 
<?php

include "footer.php";                 
?>

