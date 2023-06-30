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
  <title>Truck Details | Sub Contractors | CLM</title>

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
    <a href="../adminPages/admin_homepage.php" class="brand-link">
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
            <h1>Truck Details | Sub Contractors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../adminPages/admin_homepage.php">Home</a></li>
              <li class="breadcrumb-item active">Truck Details | Sub Contractors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <table class="table table-bordered">
            <thead>
              <tr align="center">
                <th>Truck Type</th>
                <th>Van Type</th>
                <th>Plate No.</th>
                <th>Model</th>
                <th>Assigned Driver</th>
                <th>Update</th>
              </tr>
            </thead>
            <tbody>
              <form id="details" name="details" method="POST" action="" onSubmit="return false;">
                  <tr>
                    <td>
                      <input type="text" class="form-control" id="truckType" name="truckType" placeholder="Enter truck type">
                    </td>
                    <td>
                      <input type="text" class="form-control" id="vanType" name="vanType" placeholder="Enter van type">
                    </td>
                    <td>
                      <input type="text" class="form-control" id="plateNo" name="plateNo" placeholder="Enter plate no.">
                    </td>
                    <td>
                      <input type="text" class="form-control" id="model" name="model" placeholder="Enter model">
                    </td>
                    <td>
                      <input type="text" class="form-control" id="drivername" name="drivername" placeholder="Enter assigned driver">
                    </td>
                    <td>
                      <button type="submit" id="addDetailsSubCon" name="addDetailsSubCon" class="btn btn-primary">Add</button>
                    </td>
                  </tr>   
              </form>              
            </tbody>
          </table>
        </div>

          <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr align="center">
                    <th>Truck Type</th>
                    <th>Van Type</th>
                    <th>Plate Number</th>
                    <th>Model</th>
                    <th>Assigned Driver</th>
                    <th>Update</th>
                  </tr>
                  </thead>
                  <tbody id="output">
                  <?php
      
                  

                  $sql = "SELECT truckType, vanType, plateNo, model, drivername FROM truckdetailssuboperation";
                  $result = $link-> query($sql);

                    if($result->num_rows > 0) {
                        while($row = $result-> fetch_assoc()) {
                            echo "<tr align='center'>" . 
                                "<td>" . $row["truckType"] .
                                "<td>" . $row["vanType"] .
                                "<td>" . $row["plateNo"] .
                                "<td>" . $row["model"] .
                                "<td>" . $row["drivername"] .
                                "<td>" . "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#update_details'>Edit</button>" .
                                "&nbsp&nbsp&nbsp&nbsp" .
                                "<a class='btn btn-primary' href='truckDetailsDirectOpDel.php?plateNo=$row[plateNo]'>Delete</a>";
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="update_details">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form id="modaldetails" name="modaldetails" method="POST" action="" onSubmit="return false;">
                <tr>
                  <td>
                    <label>Truck Type:</label>
                    <input type="text" class="form-control" id="truckType_modal" name="truckType_modal" placeholder="Enter truck type">
                  </td>
                  <td>
                    <label>Van Type:</label>
                    <input type="text" class="form-control" id="vanType_modal" name="vanType_modal" placeholder="Enter van type">
                  </td>
                  <td>
                    <label>Plate No.:</label>
                    <input type="text" class="form-control" id="plateNo_modal" name="plateNo_modal" placeholder="Enter plate no.">
                  </td>
                  <td>
                    <label>Model:</label>
                    <input type="text" class="form-control" id="model_modal" name="model_modal" placeholder="Enter model">
                  </td>
                  <td>
                    <label>Assigned Driver:</label>
                    <input type="text" class="form-control" id="drivername_modal" name="drivername_modal" placeholder="Enter assigned driver">
                  </td>
                </tr>   
              </form>   
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="editDetails" name="editDetails" class="btn btn-primary">Save changes</button>
            </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <script src="addDetailsSubCon.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        $('#addDetailsSubCon').click(function() {
        $.ajax({
            type: 'POST',
            url: 'truckDetailsDirectOpOut.php',
            data: { plateNo: $('#plateNo').val(), truckType: ($'#truckType').val, vanType: ($'#vanType').val,
                    model: ($'#model').val, drivername: ($'#drivername').val},
            
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
