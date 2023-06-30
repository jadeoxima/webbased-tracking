<?php
include('../config.php');
include('config.php');
require 'dbcon.php';

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
    <title>Create User | CLM</title>
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
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">

                        <a href="#" class="d-block">
                            <i class="fas fa-user fa-fw"></i>
                            Logged in as:
                            <?php if (isset($_SESSION['user'])) : ?>
                                <strong><?php echo ucfirst($_SESSION['user']['username']); ?></strong>

                                <small>
                                    <i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['userType']); ?>)</i>
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
                            <h1>Customer info&nbsp;<a href="address.php" class="btn btn-success">Add data</a></h1>

                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="admin_homepage.php">Home</a></li>
                                <li class="breadcrumb-item active">Address</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- Main content -->
            <?php


            ?>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

            <div class="card-body">

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Quantity</th>
                            <th>Barangay</th>
                            <th>Purok</th>
                            <th>City</th>
                            <th>Province</th>
                            <th>Drivers Name</th>
                            <th>Vantype</th>
                            <th>Plate Number</th>
                            <th>Remarks</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM `tbladdress` ORDER BY `tbladdress`.`Remarks`, `province`";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $student) {
                        ?>
                                <tr>
                                    <td><?= ucwords($student['code']); ?></td>
                                    <td><?= ucwords($student['quantity']); ?></td>
                                    <td><?= ucwords($student['brgy']); ?></td>
                                    <td><?= ucwords($student['purok']); ?></td>
                                    <td><?= ucwords($student['city']); ?></td>
                                    <td><?= ucwords($student['province']); ?></td>
                                    <td><?= ucwords($student['drirversname']); ?></td>
                                    <td><?= ucwords($student['vantype']); ?></td>
                                    <td><?= ucwords($student['plates']); ?></td>
                                    <td><?= ucwords($student['remarks']); ?></td>

                                    <td>
                                        <a href="#" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?= $student['id']; ?>">Edit</a>
                                        <form action="code.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_btn" class="btn btn-danger btn-sm">Delete</button>.
                                            <a href="kito.php" class="btn btn-success btn-sm">record
                                            <input type="hidden" name="delete_student" value="<?= $student['id']; ?>">
                                        </form>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <!-- Edit Modal -->
<div class="modal fade" id="editModal<?= $student['id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="code.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?= $student['id']; ?>">
                    <div class="form-group">
                        <label for="code">Code</label>
                        <input type="text" class="form-control" id="code" name="edit_code" value="<?= $student['code']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="edit_quantity" value="<?= $student['quantity']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="brgy">Barangay</label>
                        <input type="text" class="form-control" id="brgy" name="brgy" value="<?= $student['brgy']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="purok">Purok</label>
                        <input type="text" class="form-control" id="purok" name="purok" value="<?= $student['purok']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?= $student['city']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="province">Province</label>
                        <input type="text" class="form-control" id="province" name="province" value="<?= $student['province']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="driversname">Driver's Name</label>
                        <input type="text" class="form-control" id="driversname" name="driversname" value="<?= $student['drirversname']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="vantype">Vantype</label>
                        <input type="text" class="form-control" id="vantype" name="vantype" value="<?= $student['vantype']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="plates">Plate Number</label>
                        <input type="text" class="form-control" id="plates" name="plates" value="<?= $student['plates']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <select name="remarks" class="form-control">
                            <option value="Cancel" <?= ($student['remarks'] == 'Cancel') ? 'selected' : ''; ?>>Cancel</option>
                            <option value="Delivered" <?= ($student['remarks'] == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                        </select>
                    </div>
                    <button type="submit" name="update_address" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "No record found";
                        }
                        ?>
                    </tbody>
                </table>
               
                </form>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.4/dist/umd/popper.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.1.0
            </div>
            <strong>&copy; 2023 <a href="#">Company Name</a>.</strong> All rights
            reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            //$('#example2').DataTable({
            //  "paging": true,
            //  "lengthChange": false,
            //  "searching": false,
            //  "ordering": true,
            //  "info": true,
            //  "autoWidth": false,
            //  "responsive": true,
            //});
        });
    </script>
</body>

</html>
