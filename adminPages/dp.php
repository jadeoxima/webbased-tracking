<?php

$con = mysqli_connect("localhost","root","","clm");
$connect = new PDO('mysql:host=localhost;dbname=clm', 'root', '');


if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}



?>