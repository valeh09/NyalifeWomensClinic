
<?php

include "booking_header.php";                 
?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Available Services</h1> 
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd; /* Add border to cells */
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>List of Services and Prices</h2>

    <table>
        <thead>
            <tr>
                <th>Service</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Obstetrics</td>
                <td>Ksh. 3,000</td>
            </tr>
            <tr>
                <td>Gynecology</td>
                <td>Ksh. 3,000</td>
            </tr>
            <tr>
                <td>Teens Health</td>
                <td>Ksh. 2,500</td>
            </tr>
            <tr>
                <td>Surgeries</td>
                <td>Varies</td>
            </tr>
            <tr>
                <td>In Office Procedures</td>
                <td>Ksh. 10,000</td>
            </tr>
        </tbody>
    </table>
</div>

</body>



<?php

include "footer.php";                 
?>

