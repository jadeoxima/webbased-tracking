<?php
include('../config.php');
include('config.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../loginForm.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: ../loginForm.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="icon" href="../dist/img/CLM.png" type="image/icon type">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CLM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <!-- Chart.js Script -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>
<body class="hold-transition sidebar-mini">
    
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="admin_homepage.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Print Direct/Sub Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-print" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a class="dropdown-item dropdown-footer" href="printDirect.php">Print Direct Operations</a>
          <a class="dropdown-item dropdown-footer" href="printSub.php">Print Sub Contractors</a>
        </div>
      </li>
      <!-- Logout Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-cog" aria-hidden="true"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a class="dropdown-item dropdown-footer" href="admin_homepage.php?logout='1'">Logout</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside  class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin_homepage.php" class="brand-link">
      <img src="../dist/img/CLM.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CLM</span>
    </a>

    <!-- Sidebar -->
    <div  class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">

          <a href="#" class="d-block">
            <i class="fas fa-user fa-fw"></i>
            Logged in as: 
            <?php  if (isset($_SESSION['user'])) : ?>
            <strong><?php echo ucfirst($_SESSION['user']['username']); ?></strong>
        
            <small>
              <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['userType']); ?>)</i>
            </small>
        
            <?php endif ?>
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="admin_homepage.php" class="nav-link">
              
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="testing.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Sales
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="createuser.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Create User
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Expenses
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="directOperations.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Direct Operations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="subContractors.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Contractors</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Truck Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="truckDetailsDirectOp.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Direct Operations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="truckDetailsSubCon.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Contractors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="testing.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Delivery Status</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="payroll.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Payroll
              </p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin_homepage.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
                  <?php
                    $result = mysqli_query($link, 'SELECT COUNT(*) as count FROM tbladdress;'); 
                    $row = mysqli_fetch_assoc($result); 
                    $count = $row['count'];
                    
                    echo "" . $count;
                  ?>
                </h3>

                <p>Total Order</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
        
            </div>
          </div>
               <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
              <?php
                    $result = mysqli_query($link, 'SELECT MONTHNAME(dateInput), SUM(shipping) AS value_sum FROM tbladdress GROUP BY YEAR(dateInput), MONTH(dateInput)'); 
                    $row = mysqli_fetch_assoc($result); 
                    $sum = $row['value_sum'];
                    
                    echo "₱" . $sum;
                  ?>
                </h3>

                <p>Daily Income</p>
                
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              
            </div>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
              <?php
                    $result = mysqli_query($link, 'SELECT MONTHNAME(dateInput), SUM(shipping) AS value_sum FROM tbladdress GROUP BY YEAR(dateInput), MONTH(dateInput)'); 
                    $row = mysqli_fetch_assoc($result); 
                    $sum = $row['value_sum'];
                    
                    echo "₱" . $sum;
                  ?>
                </h3>

                <p>Weekly Income</p>
                
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                 <h3>
                  <?php
                    $result = mysqli_query($link, 'SELECT MONTHNAME(dateInput), SUM(shipping) AS value_sum FROM tbladdress GROUP BY YEAR(dateInput), MONTH(dateInput)'); 
                    $row = mysqli_fetch_assoc($result); 
                    $sum = $row['value_sum'];
                    
                    echo "₱" . $sum;
                  ?>
                </h3>

                <p>Monthly Income</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              
            </div>
        </div>

        
        <!-- /.row -->

        
        <!-- DIRECT OPERATIONS MONTHLY EXPENSES OF VEHICLE -->
        <div class="card" style="width: 600px; margin-left: 8px;">
          <div class="card-header">
            <?php 
              $sql = "SELECT brgy, SUM(shipping) AS shipping FROM tbladdress GROUP BY brgy, dateInput";
              $result = $link-> query($sql);

              foreach($result as $data) {
                $brgy1[] = $data['brgy'];
                $shipping1[] = $data['shipping'];
              };

            ?>
            <canvas id="chart1"></canvas>
            <script>
              // === include 'setup' then 'config' above ===
              const labels = <?php echo json_encode($brgy1) ?>;
              const data1 = {
                labels: labels,
                datasets: [{
                  label: 'Place Tracking',
                  data: <?php echo json_encode($shipping1) ?>,
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                  ],
                  borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                  ],
                  borderWidth: 1
                }]
              };

              const config1 = {
                type: 'bar',
                data: data1,
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                },
              };

              var chart1 = new Chart(
                document.getElementById('chart1'),
                config1
              );
            </script>
          </div>
        </div>

        <!-- DIRECT OPERATIONS MONTHLY GROSS PROFITS OF VEHICLE -->
        <div class="card" style="width: 600px; margin-left: 6px;">
          <div class="card-header">
            <?php 
              $sql = "SELECT plateNo, SUM(grossProfits) AS grossProfits FROM tbldirectoperation GROUP BY plateNo, dateInput";
              $result = $link-> query($sql);

              foreach($result as $data) {
                $plateNo2[] = $data['plateNo'];
                $grossProfits2[] = $data['grossProfits'];
              };

            ?>
            
            <canvas id="chart2"></canvas>            

            <script>
              // === include 'setup' then 'config' above ===
              const data2 = {
                labels: labels,
                datasets: [{
                  label: 'Direct Operations Monthly Gross Profits of Vehicle',
                  data: <?php echo json_encode($grossProfits2) ?>,
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                  ],
                  borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                  ],
                  borderWidth: 1
                }]
              };

              const config2 = {
                type: 'bar',
                data: data2,
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                },
              };

              var chart2 = new Chart(
                document.getElementById('chart2'),
                config2
              );
            </script>
           </div>
        </div>

         <!-- SUB CONTRACTORS MONTHLY EXPENSES OF VEHICLE -->
         <div class="card" style="width: 600px; margin-left: 8px;">
          <div class="card-header">
            <?php 
              $sql = "SELECT plateNo, SUM(totalExpenses) AS totalExpenses FROM tblsuboperation GROUP BY plateNo, dateInput";
              $result = $link-> query($sql);

              foreach($result as $data) {
                $plateNo3[] = $data['plateNo'];
                $totalExpenses3[] = $data['totalExpenses'];
              };

            ?>

            <canvas id="chart3"></canvas>
            <script>
              // === include 'setup' then 'config' above ===
              const data3 = {
                labels: labels,
                datasets: [{
                  label: 'Sub Contractors Monthly Expenses of Vehicle',
                  data: <?php echo json_encode($totalExpenses3) ?>,
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                  ],
                  borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                  ],
                  borderWidth: 1
                }]
              };

              const config3 = {
                type: 'bar',
                data: data3,
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                },
              };

              var chart3 = new Chart(
                document.getElementById('chart3'),
                config3
              );
            </script>
          </div>
        </div>

        <div class="card" style="width: 600px; margin-left: 6px;">
          <div class="card-header">
            <?php 
              $sql = "SELECT plateNo, SUM(grossProfits) AS grossProfits FROM tblsuboperation GROUP BY plateNo, dateInput";
              $result = $link-> query($sql);

              foreach($result as $data) {
                $plateNo4[] = $data['plateNo'];
                $grossProfits4[] = $data['grossProfits'];
              };

            ?>

            <canvas id="chart4"></canvas>
            <script>
              // === include 'setup' then 'config' above ===
              const data4 = {
                labels: labels,
                datasets: [{
                  label: 'Sub Contractors Monthly Gross Profits of Vehicle',
                  data: <?php echo json_encode($grossProfits4) ?>,
                  backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                  ],
                  borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                  ],
                  borderWidth: 1
                }]
              };

              const config4 = {
                type: 'bar',
                data: data4,
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                },
              };

              var chart4 = new Chart(
                document.getElementById('chart4'),
                config4
              );
            </script>
          </div>
        </div>
            
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


       
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
