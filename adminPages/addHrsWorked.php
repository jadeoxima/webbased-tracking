<?php
  include_once '../config.php';

  $year = date("Y");
  $month = date("m");
  $start_date = "$year-$month-01";
  $end_date = date("$year-$month-t", strtotime($start_date));
  
  // Retrieve the selection value
  $selection = $_GET['value'];
  
  // Write a SQL query
  $query = "SELECT SUM(attendance_hour) AS attendance_hour FROM emp_attendance WHERE attendance_date BETWEEN '$start_date' AND '$end_date' AND employee_name = '$selection'";
  
  // Execute the query
  $result = mysqli_query($link, $query);
  
  // Check if the query was successful
  if (!$result) {
    die('Error: Could not execute query: ' . mysqli_error($link));
  }
  
  // Fetch the data
  while ($row = mysqli_fetch_assoc($result)) {
    $data = floatval($row['attendance_hour']);
  }
  
  // Close the connection
  mysqli_close($link);
  
  // Echo the data as a JSON-formatted string
  echo json_encode($data);
?>