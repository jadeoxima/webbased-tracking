<?php
session_start();
require 'dp.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM tbladdress WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: add.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: add.php");
        exit(0);
    }
}
if(isset($_POST['update_address']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['edit_id']);
    $code = mysqli_real_escape_string($con, $_POST['edit_code']);
    $quantity = mysqli_real_escape_string($con, $_POST['edit_quantity']);
    $brgy = mysqli_real_escape_string($con, $_POST['brgy']);
    $purok = mysqli_real_escape_string($con, $_POST['purok']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $province = mysqli_real_escape_string($con, $_POST['province']);
    $plates = mysqli_real_escape_string($con, $_POST['plates']);
    $driversname = mysqli_real_escape_string($con, $_POST['driversname']);
    $vantype = mysqli_real_escape_string($con, $_POST['vantype']);
    $remarks = mysqli_real_escape_string($con, $_POST['remarks']);

    $query = "UPDATE tbladdress SET code='$code', quantity='$quantity', brgy='$brgy', purok='$purok', city='$city', province='$province', plates='$plates', drirversname='$driversname', vantype='$vantype', remarks='$remarks' WHERE id='$student_id' ";
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
     $code = mysqli_real_escape_string($con, $_POST['code']);
         $price = mysqli_real_escape_string($con, $_POST['price']);
             $shipping = mysqli_real_escape_string($con, $_POST['shipping']);
                 $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $brgy = mysqli_real_escape_string($con, $_POST['brgy']);
    $purok = mysqli_real_escape_string($con, $_POST['purok']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $province = mysqli_real_escape_string($con, $_POST['province']);
    $plates = mysqli_real_escape_string($con, $_POST['plates']);
    $drirversname = mysqli_real_escape_string($con, $_POST['drirversname']);
    $vantype = mysqli_real_escape_string($con, $_POST['vantype']);
	$Remarks = mysqli_real_escape_string($con, $_POST['Remarks']);

    $query = "INSERT INTO tbladdress (code,price,shipping,quantity,brgy,purok,city,province,plates,drirversname,vantype,Remarks) VALUES ('$code','$price','$shipping','$quantity','$brgy','$purok','$city','$province','$plates','$drirversname','$vantype','$Remarks')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        header("Location: address.php");
        exit(0);
    }
    else
    {
     header("Location: address.php");
        exit(0);
    }
}

?>
