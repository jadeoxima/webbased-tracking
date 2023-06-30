<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_address']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_address']);

    $query = "DELETE FROM tbladdress WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Address Deleted Successfully";
        header("Location: add.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Address Not Deleted";
        header("Location: add.php");
        exit(0);
    }
}

if(isset($_POST['update_address']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $brgy = mysqli_real_escape_string($con, $_POST['brgy']);
    $purok = mysqli_real_escape_string($con, $_POST['purok']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $province = mysqli_real_escape_string($con, $_POST['province']);

    $query = "UPDATE tbladdress SET brgy='$brgy', purok='$purok', city='$city', province='$province' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Address Updated Successfully";
        header("Location: add.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Address Not Updated";
        header("Location: add.php");
        exit(0);
    }

}


if(isset($_POST['save_address']))
{
    $name = mysqli_real_escape_string($con, $_POST['brgy']);
    $email = mysqli_real_escape_string($con, $_POST['purok']);
    $phone = mysqli_real_escape_string($con, $_POST['city']);
    $course = mysqli_real_escape_string($con, $_POST['province']);

    $query = "INSERT INTO tbladdress (brgy,purok,city,province) VALUES ('$brgy','$purok','$city','$province')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Address Created Successfully";
        header("Location: add.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Address Not Created";
        header("Location: add.php");
        exit(0);
    }
}

?>