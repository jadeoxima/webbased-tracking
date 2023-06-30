<?php
    
    include_once '../config.php';
    
    $whname = $_REQUEST["whname"];
    $city = $_REQUEST["city"];
    $barangay = $_REQUEST["barangay"];
    $vantype= $_REQUEST["vantype"];
    $drivername = $_REQUEST["drivername"];

    $result = mysqli_query($link, "INSERT INTO wh_add(whname, barangay, vanType,  city, drivername)
                            VALUES('$whname', '$barangay', '$vantype', '$city', '$drivername')");

    $sql = "SELECT * FROM wh_add";
    $result = $link-> query($sql);

    if($result->num_rows > 0) {
        while($row = $result-> fetch_assoc()) {
            echo "<tr align='center'>" . 
                
                "<td>" . $row["whname"] .
                "<td>" . $row["city"] .
                "<td>" . $row["barangay"].
                "<td>" . $row["vantype"] .
                "<td>" . $row["drivername"] . 
                "<td>" . "<a class='btn btn-primary' href=''>Edit</a>" . 
                "&nbsp&nbsp&nbsp" . 
                "<a class='btn btn-primary' href='addDELETE.php?city=$row[city]'>Delete</a>";
        }
    }

?>