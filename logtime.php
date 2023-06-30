<?php
include("config.php");
ini_set('display_errors', 0);
ini_set('display_errors', false);
date_default_timezone_set('Asia/Manila');
$time = date("h:i:s");
$today = date("D - F d, Y");
$date = date("Y-m-d");
$in = date("H:i:s");
$out = "12:00:00";

if(isset($_POST['attendance']))
{
  $_SESSION['expire'] =  date("H:i:s", time() + 1);
  $code = $_POST['operation'];
  if($code == "time-in")
  {
    $id = $_POST['userID'];
    $sql = "SELECT * FROM tblusers WHERE emp_id = '$id'";
    $result = mysqli_query($link, $sql);
    if(!$row = $result->fetch_assoc()) {
      $_SESSION['mess'] = "<div id='time' class='alert alert-danger' role='alert'>
                              <i class='fas fa-times'></i>  Employee ID is not registered !
                              </div>";
      header("Location: logtime.php");
    }
    else {
      $sql2 = "SELECT * FROM emp_attendance WHERE employee_id = '$id' AND attendance_date = '$date'";
      $result2 = mysqli_query($link, $sql2);
      if(!$row2 = $result2->fetch_assoc()) {
        $username = $row['username'];

        $first = new DateTime($in);
        $second = new DateTime($out);
        $interval = $first->diff($second);
        $hrs = $interval->format('%h');
        $mins = $interval->format('%i');
        $mins = $mins/60;
        $int = $hrs + $mins;
        if($int > 4){
          $int = $int - 1;
        }

        $sql3 = "INSERT INTO emp_attendance (employee_id, employee_name, attendance_date, attendance_timein, attendance_timeout, attendance_hour)
                                     VALUES ('$id', '$username', '$date', '$in', '$out', '$int')";
        $result3 = mysqli_query($link, $sql3);
        $_SESSION['mess'] = "<div id='time' class='alert alert-success' role='alert'>
                              <i class='fas fa-check'></i>  Time in: $username
                             </div>";
        header("Location: logtime.php");
      }
      else {
        $_SESSION['mess'] = "<div id='time' class='alert alert-warning' role='alert'>
                                <i class='fas fa-exclamation'></i>  You already have Timed In
                                </div>";
        header("Location: logtime.php");
      }
    }
  }

  if($code == "time-out")
  {
    $id = $_POST['userID'];

    $sql = "SELECT * FROM emp_attendance WHERE employee_id = '$id' AND attendance_date = '$date'";
    $result = mysqli_query($link, $sql);
    if(!$row = $result->fetch_assoc()) {
      $_SESSION['mess'] = "<div id='time' class='alert alert-danger' role='alert'>
                              <i class='fas fa-times'></i>  You did not Timed in !
                              </div>";
      header("Location: logtime.php");
    }
    else {
      $query = "SELECT * FROM emp_attendance WHERE employee_id = '$id' AND attendance_date = '$date'";
      $queryres = mysqli_query($link, $query);
      while($rowres = mysqli_fetch_array($queryres))
      {
        $timein = $row['attendance_timein'];
      }
      $first = new DateTime($timein);
      $second = new DateTime($in);
      $interval = $first->diff($second);
      $hrs = $interval->format('%h');
      $mins = $interval->format('%i');
      $mins = $mins/60;
      $int = $hrs + $mins;
      if($int > 4){
        $int = $int - 1;
      }
      $sql2 = "UPDATE emp_attendance SET attendance_timeout = '$in', attendance_hour = '$int' WHERE employee_id = '$id' AND attendance_date = '$date'";
      $result2 = mysqli_query($link, $sql2);
      $_SESSION['mess'] = "<div id='time' class='alert alert-success' role='alert'>
                            <i class='fas fa-check'></i>  Timed Out
                           </div>";
      header("Location: logtime.php");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <link rel="icon" href="dist/img/CLM.png" type="image/icon type">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Attendance | CLM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Clock -->
  <link rel="stylesheet" href="styles.css">
  <script src="script.js"></script>
  
</head>

<body class="hold-transition login-page">

<div class="login-box">
   
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      
      <h1><b>CLM | Attendance</b><br></h1>
      
    </div>
    <div class="card-body">
      <h4 align="center" id="date"><?php echo $today; ?></h4>
      <br><p class="login-box-msg" id="clock">

      </p><br>

      <form action="#" method="post">
        <div class="input-group mb-3">
          <select name="operation" id="operation" class="form-control" id="plateNo">
          <option value="" disabled selected>Attendance</option>
          <option value="time-in">Time-in</option>
          <option value="time-out">Time-out</option>
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-clock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input type="text" name="userID" id="userID" class="form-control" id="inputEmail" name="email" placeholder="Employee ID" required/>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <a href="loginForm.php">Login Instead</a>
            </div>
          </div>
          <!-- /.col -->
          
          <div class="col-4">
          <button type="submit" name="attendance" class="btn btn-primary btn-block">Confirm</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->

      
      
    </div>
    <!-- /.card-body -->
  </div>
  <?php
    echo $_SESSION['mess'];
    $dd = date("H:i:s");

    if($dd == $_SESSION['expire'])
    {
      session_unset();
    }
    ?>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
