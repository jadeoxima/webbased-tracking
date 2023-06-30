<?php
// include database connection file
include_once("../config.php");

// Get id from URL to delete that user
$plateNo = $_GET['plateNo'];

// Delete user row from table based on given id
$result = mysqli_query($link, "DELETE FROM truckdetailsdirectoperation WHERE plateNo='$plateNo'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:truckDetailsDirectOp.php");
?>