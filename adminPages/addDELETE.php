<?php
// include database connection file
include_once("../config.php");

// Get id from URL to delete that user
$whname= $_GET['whname'];

// Delete user row from table based on given id
$result = mysqli_query($link, "DELETE FROM wh_add WHERE whname='$whname'");

// After delete redirect to Home, so that latest user list will be displayed.
header("Location:addDelete.php");
?>