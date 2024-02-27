 
<?php
include "config.php";
include "doctor_header.php";                 
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
              
              
  
              include "config.php";
                
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
              
              
  
            
              include "config.php";
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
              
              
              include "config.php";
                
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
         

          <!DOCTYPE html>
<html lang="en">
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

        /* Additional style for clickable rows */
        tbody tr {
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
require 'config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sample SQL queries to retrieve data for each table
$outpatientsQuery = "SELECT time_added, FirstName, TIMESTAMPDIFF(MINUTE, time_added, NOW()) AS waiting_time FROM patients WHERE type = 'Outpatient'";
$inpatientsQuery = "SELECT time_added, FirstName, TIMESTAMPDIFF(MINUTE, time_added, NOW()) AS waiting_time FROM patients WHERE type = 'Inpatient'";
$upcomingVisitsQuery = "SELECT AppointmentDate, PatientName, TIMESTAMPDIFF(MINUTE, AppointmentDate, NOW()) AS waiting_time FROM appointments WHERE AppointmentStatus = 'Scheduled'";

// Function to execute query and return data as an associative array
function fetchData($conn, $query) {
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } else {
        return array();
    }
}

// Fetch data for each table
$outpatientsData = fetchData($conn, $outpatientsQuery);
$inpatientsData = fetchData($conn, $inpatientsQuery);
$upcomingVisitsData = fetchData($conn, $upcomingVisitsQuery);

// Close database connection
$conn->close();
?>

<div class="choices-container">
    <div class="choice-column" onclick="showTable('outpatientsTable'); setActiveChoice(this);">Outpatients</div>
    <div class="choice-column" onclick="showTable('inpatientsTable'); setActiveChoice(this);">Inpatients</div>
    <div class="choice-column" onclick="showTable('upcomingVisitsTable'); setActiveChoice(this);">Upcoming Visits</div>
</div>

<div class="tables-container">
    <table id="outpatientsTable">
        <!-- Table headings will be dynamically added here using JavaScript -->
    </table>

    <table id="inpatientsTable">
        <!-- Table headings will be dynamically added here using JavaScript -->
    </table>

    <table id="upcomingVisitsTable">
        <!-- Table headings will be dynamically added here using JavaScript -->
    </table>
</div>

<script>
    // Function to populate a table with data
    function populateTable(tableId, data) {
        const table = document.getElementById(tableId);
        table.innerHTML = ''; // Clear existing content

        if (data.length === 0) {
            return; // No data, nothing to populate
        }

        // Add table headings
        const headingsRow = table.insertRow();
        for (const key in data[0]) {
            const th = document.createElement('th');
            th.textContent = key;
            headingsRow.appendChild(th);
        }

        // Add table data
        data.forEach(item => {
            const row = table.insertRow();
            for (const key in item) {
                const cell = row.insertCell();
                // Display waiting time in hours and minutes
                if (key === 'waiting_time') {
                    const hours = Math.floor(item[key] / 60);
                    const minutes = item[key] % 60;
                    cell.textContent = `${hours} hours ${minutes} minutes`;
                } else {
                    cell.textContent = item[key];
                }
            }

            row.onclick = function () {
    console.log('PatientID:', item['PatientID']); // Debugging line
    window.location.href = 'patient_overview.php?patient_id=' + item['PatientID'];
};
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
        const choices = document.querySelectorAll('.choices-container .choice-column');
        choices.forEach(choice => {
            choice.classList.remove('active-choice');
        });
        choiceElement.classList.add('active-choice');
    }

    // Replace the sample data with fetched PHP data
    const outpatientsData = <?php echo json_encode($outpatientsData); ?>;
    const inpatientsData = <?php echo json_encode($inpatientsData); ?>;
    const upcomingVisitsData = <?php echo json_encode($upcomingVisitsData); ?>;

    // Populate tables with fetched PHP data
    populateTable('outpatientsTable', outpatientsData);
    populateTable('inpatientsTable', inpatientsData);
    populateTable('upcomingVisitsTable', upcomingVisitsData);

    // Show the first table by default and set it as active
    showTable('outpatientsTable');
    setActiveChoice(document.querySelector('.choices-container .choice-column'));
</script>

</body>
</html>


 
<?php

include "footer.php";                 
?>

