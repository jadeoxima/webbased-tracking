<?php 
    include_once '../config.php';

    $id = $_REQUEST["id"];
    $employee_name = $_REQUEST["employee_name"];
    $monthly_rate = $_REQUEST["monthly_rate"];
    $semi_monthly_rate = $_REQUEST["semi_monthly_rate"];
    $hourly_rate = $_REQUEST["hourly_rate"];
    $total_hrs = $_REQUEST["total_hrs"];
    $total_deduct = $_REQUEST["total_deduct"];
    $dateFrom = $_REQUEST["dateFrom"];
    $dateTo = $_REQUEST["dateTo"];
    $payroll = $_REQUEST["payroll"];
    
    $result = mysqli_query($link, "INSERT INTO emp_payroll(id, employee_name, monthly_rate, semi_monthly_rate, 
                                                       hourly_rate, total_hrs, total_deduct, dateFrom, dateTo, payroll)
                                   VALUES('$id', '$employee_name', '$monthly_rate', '$semi_monthly_rate', 
                                          '$hourly_rate', '$total_hrs', '$total_deduct', '$dateFrom', '$dateTo', '$payroll')"); 

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