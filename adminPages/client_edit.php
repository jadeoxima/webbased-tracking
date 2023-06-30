<?php
session_start();
require 'dp.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM wh_add WHERE whname='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header("Location:client.php");
        exit(0);
    }
    else
    {
        header("Location:Delstat.php");
        exit(0);
    }
}
if(isset($_POST['update_address']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
	$code = mysqli_real_escape_string($con, $_POST['code']);
         $price = mysqli_real_escape_string($con, $_POST['price']);


    $query = "UPDATE tbladdress SET code='$code',price='$price',shipping='$shipping',quantity='$quantity',    brgy='$brgy', purok='$purok', city='$city', province='$province',plates='$plates', drirversname='$drirversname' ,vantype='$vantype',Remarks='$Remarks' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        header("Location: add.php");
        exit(0);
    }
    else
    {
        header("Location: add.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
     $whname = mysqli_real_escape_string($con, $_POST['whname']);
         $city = mysqli_real_escape_string($con, $_POST['city']);
             $barangay = mysqli_real_escape_string($con, $_POST['barangay']);
        

    $query = "INSERT INTO wh_add (whname,city,barangay) VALUES ('$whname','$city','$barangay')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        header("Location: client.php");
        exit(0);
    }
    else
    {
     header("Location: client.php");
        exit(0);
    }
}

?>
