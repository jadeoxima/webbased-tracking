
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
              <li class="nav-item">
                <a href="add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Delivery Status</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="tracking.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tracking</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="testing.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales</p>
                </a>
              </li>
 <li class="nav-item">
                <a href="client.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Client Info</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="kito.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Records</p>
                </a>
              </li>
            
            
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
     

     <!-- Rest of your HTML and CSS code -->
<!DOCTYPE html>
<html>
<head>
    <title>Filter Form</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* CSS for print */
        @media print {
            body * {
                visibility: hidden;
            }
            .print-table, .print-table * {
                visibility: visible;
            }
            .print-table {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>
<body>

<?php
require 'dp.php';
?>

<div class="container mt-5">
    <h2>Filter Form</h2>
    <form method="GET" action="" class="mb-3">
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo isset($start_date) ? $start_date : ''; ?>">
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo isset($end_date) ? $end_date : ''; ?>">
        </div>
        <!-- Add a submit button to submit the form -->
        <button type="submit" class="btn btn-primary">Filter</button>
        <button class="btn btn-primary" onclick="window.print()">Print</button>


    </form>

    <?php
    // Check if the form is submitted
    if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
        // Get the start and end date filter values from the form submission
        $start_date = $_GET['start_date'];
        $end_date = $_GET['end_date'];

        // Modify the SQL query according to your table structure and filter requirements
        $query = "SELECT * FROM tbladdress WHERE dateInput BETWEEN '$start_date' AND '$end_date'";
        $query_run = mysqli_query($con, $query);

        // Output the filtered results
        if (mysqli_num_rows($query_run) > 0) {
            $totalQuantity = 0; // Initialize the variable for total quantity
            $totalShipping = 0; // Initialize the variable for total shipping
            $totalPrice = 0;    // Initialize the variable for total price
            $totalSale = 0;     // Initialize the variable for total sale

            echo '<button class="btn btn-danger mb-3" onclick="closeData()">Close</button>';

            // Add the "print-table" class to the table for printing
            echo '<table class="table mt-3 print-table">';
echo '<thead>';
echo '<tr>';
echo '<th scope="col">Code</th>';
echo '<th scope="col">Price</th>';
echo '<th scope="col">Shipping</th>';
echo '<th scope="col">Quantity</th>';
echo '<th scope="col">Sale Price</th>';
echo '<th scope="col">Barangay</th>';
echo '<th scope="col">Purok</th>';
echo '<th scope="col">City</th>';
echo '<th scope="col">Province</th>';
echo '<th scope="col">Plates</th>';
echo '<th scope="col">Driver\'s Name</th>';
echo '<th scope="col">Van Type</th>';
echo '<th scope="col">Date Input</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
while ($student = mysqli_fetch_assoc($query_run)) {
    echo '<tr>';
    echo '<td>' . $student['code'] . '</td>';
    echo '<td>' . $student['price'] . '</td>';
    echo '<td>' . $student['shiiping'] . '</td>';
    echo '<td>' . $student['quantity'] . '</td>';

    // Calculate the sale price based on the original price (discounted by 10%)
    $salePrice = $student['price'] * 0.9;

    echo '<td>' . $salePrice . '</td>';
    echo '<td>' . $student['brgy'] . '</td>';
    echo '<td>' . $student['purok'] . '</td>';
    echo '<td>' . $student['city'] . '</td>';
    echo '<td>' . $student['province'] . '</td>';
    echo '<td>' . $student['plates'] . '</td>';
    echo '<td>' . $student['drirversname'] . '</td>';
    echo '<td>' . $student['vantype'] . '</td>';
    echo '<td>' . $student['dateInput'] . '</td>';
    echo '</tr>';

    $totalQuantity += $student['quantity']; // Add the quantity to the total quantity
    $totalShipping += $student['shiiping']; // Add the shipping to the total shipping
    $totalPrice += $student['price']; // Add the price to the total price
    $totalSale += $salePrice; // Add the sale price to the total sale
}

// Add the total rows to the table
echo '<tr>';
echo '<td colspan="3"></td>';
echo '<td>Total Quantity: ' . $totalQuantity . '</td>';
echo '<td>Total Sale: ' . $totalSale . '</td>';
echo '<td colspan="8"></td>';
echo '</tr>';

echo '<tr>';
echo '<td colspan="3"></td>';
echo '<td>Total Shipping: ' . $totalShipping . '</td>';
echo '<td>Total Price: ' . $totalPrice . '</td>';
echo '<td colspan="8"></td>';
echo '</tr>';

echo '</tbody>';
echo '</table>';

        } else {
            echo '<div class="alert alert-info mt-3">No records found.</div>';
        }
    }
    ?>
</div>

<!-- Add the necessary JavaScript code -->
<!-- Include the jsPDF library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
<!-- Include the html2canvas library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js"></script>

<!-- Convert filtered data to PDF -->
<script>
    function convertToPDF() {
        const doc = new jsPDF();

        // Get the table HTML element
        const table = document.querySelector('.print-table');

        // Convert the table to a data URL using html2canvas
        html2canvas(table).then(function(canvas) {
            const tableDataURL = canvas.toDataURL();

            // Add the table data URL to the PDF document
            doc.addImage(tableDataURL, 'PNG', 10, 10, 190, 0);

            // Save the PDF document
            doc.save('filtered_data.pdf');
        });
    }
    
    function closeData() {
        // Reload the page to clear the filtered results
        location.reload();
    }
</script>



      
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


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
