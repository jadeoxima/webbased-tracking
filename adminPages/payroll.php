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

date_default_timezone_set('Asia/Manila');
$time = date("h:i:s");
$today = date("D - F d, Y");
$date = date("Y-m-d");
$in = date("H:i:s");
$out = "12:00:00";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="icon" href="../dist/img/CLM.png" type="image/icon type">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Payroll | CLM</title>

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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin_homepage.php" class="brand-link">
      <img src="../dist/img/CLM.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CLM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
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
            <h1>Payroll</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="admin_homepage.php">Home</a></li>
              <li class="breadcrumb-item active">Payroll</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

      <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
              
              <script>
              $.ajax({
                url: 'outPayroll.php',
                type: 'POST',
                data: {employee_name: ($'#employee_name').val,}
                success: function(data) {
                  var obj = JSON.parse(data);
                  // process the data from the query here
                }
              });
              <?php
              $year = date("Y");
              $month = date("m");
              $start_date = "$year-$month-01";
              $end_date = date("$year-$month-t", strtotime($start_date));

              $employee_name = mysqli_real_escape_string($link, $_POST['employee_name']);
              
              $query = "SELECT MONTH(attendance_date) as month, SUM(attendance_hour) AS total_hr FROM emp_attendance WHERE attendance_date BETWEEN '$start_date' AND '$end_date' GROUP BY MONTH(attendance_date) AND employee_name = '$employee_name'";
              $result = mysqli_query($link, $query);
              $row = mysqli_fetch_assoc($result);
              $total_hr = $row['total_hr'];
              ?>
              </script>


              <form id="formExp" method="POST" action="" onSubmit="return false;">
                <div>
                    
                    <input type="hidden" class="form-control" id="id">
                    
                    <div class="card-footer" style="background-color: #007BFF;">
                      <h4 style="color: #FFFFFF;" align="center">Payroll</h4>
                    </div>
                      <div class="row">
                        <div class="card-body">
                          <label>Employee</label>
                          <select class="form-control" id="employee_name" style="width: 100%;">
                            <option value="" disabled selected>Select Employee</option>
                            <?php
                              include_once 'config.php';
                              $sql = "SELECT username FROM tblusers";
                              $result = $link-> query($sql);

                              while ($row = $result->fetch_assoc()) {
                                unset($users);
                                $users = $row['username'];
                                echo '<option>' . $users . '</option>';
                              }
                              ?>
                            </select>
                        </div>
                      
                        <div class="card-body">
                          <label>Monthly Rate</label>
                          <input type="number" class="form-control" id="monthly_rate">
                        </div>
                      </div>

                      <div class="row">
                        <div class="card-body">
                          <label>Semi-monthly Rate</label>
                          <input type="number" class="form-control" id="semi_monthly_rate" readonly>
                        </div>
                        <div class="card-body">
                          <label>Hourly Rate</label>
                          <input type="number" class="form-control" id="hourly_rate" readonly>
                        </div>
                      </div>

                      <div class="row">
                        <div class="card-body">
                          <label>Total Hours Worked</label>
                          <input type="number" class="form-control" id="total_hrs" readonly>
                        </div>
                        <div class="card-body">
                          <label>Total Deduction</label>
                          <input type="number" class="form-control" id="total_deduct" readonly>
                        </div>
                      </div>

                      <div class="row">
                        <div class="card-body">
                          <label for="dateFrom">Date From:</label>
                          <input type="date" class="form-control" id="dateFrom" name="dateFrom">
                        </div>
                        <div class="card-body">
                          <label for="dateTo">Date To:</label>
                          <input type="date" class="form-control" id="dateTo" name="dateTo">
                        </div>
                      </div>

                      <div class="row">      
                        <div class="card-body">
                          <label>Payroll</label>
                          <input type="number" class="form-control" id="payroll" readonly>
                        </div>
                        
                      </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="addPayroll" name="addPayroll">Compute</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
       
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr align="center">
                    <th>Employee</th>
                    <th>Monthly Rate</th>
                    <th>Semi-Monthly Rate</th>
                    <th>Hourly Rate</th>
                    <th>Total Hours Worked</th>
                    <th>Total Deduction</th>
                    <th>Date From</th>
                    <th>Date To</th>
                    <th>Payroll</th>
                    <th>Date Input</th>
                    <th>Update</th>
                  </tr>
                  </thead>
                  <tbody id="output">
                  <?php
                    $sql = "SELECT * FROM emp_payroll";
                    $result = $link-> query($sql);

                   if($result->num_rows > 0) {
                      while($row = $result-> fetch_assoc()) {
                        echo "<tr align='center'>" . 
                            "<td>" . $row["employee_name"] .
                            "<td>" . $row["monthly_rate"] .
                            "<td>" . $row["semi_monthly_rate"] .
                            "<td>" . $row["hourly_rate"] .
                            "<td>" . $row["total_hrs"] .
                            "<td>" . $row["total_deduct"] .
                            "<td>" . $row["dateFrom"] .
                            "<td>" . $row["dateTo"] .
                            "<td>" . $row["payroll"] .
                            "<td>" . $row["dateInput"] .
                            "<td>" . "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#update_details'>Edit</button>" .
                            "&nbsp&nbsp&nbsp&nbsp" .
                            "<a class='btn btn-primary' href='payrollDel.php?id=$row[id]'>Delete</a>";
                      }
                   }    
                  ?>         
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    

    <script src="addPayroll.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#employee_name').change(function() {
          var value = $(this).val();
          $.ajax({
            url: 'addHrsWorked.php',
            data: {value: value},
            success: function(data) {
              $('#total_hrs').val(data);
            }
          });
        });
      });
    </script>
        <script>
            
            
            $('#addPayroll').click(function() {
            $.ajax({
                type: 'POST',
                url: 'outPayroll.php',
                data: { id: $('#id').val(), 
                        employee_name: ($'#employee_name').val,  
                        monthly_rate: ($'#monthly_rate').val, 
                        semi_monthly_rate: ($'#semi_monthly_rate').val,
                        hourly_rate: ($'#hourly_rate').val,
                        total_hrs: ($'#total_hrs').val,
                        total_deduct: ($'#total_deduct').val,
                        dateFrom: ($'#dateFrom').val,
                        dateTo: ($'#dateTo').val,
                        payroll: ($'#payroll').val},
            });
        </script>

   

  

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
      "responsive": true, "lengthChange": false, "autoWidth": false, scrollX: true,
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