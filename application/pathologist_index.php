 
<?php

include "pathologist_header.php";                 
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
            
              <a href="" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
            
          </div>

        </div>
 
          
          <div>
       
     
<head>
  





 
<?php

include "footer.php";                 
?>

