<?php
    
    include_once '../config.php';
    
    $truckType = $_REQUEST["truckType"];
    $vanType = $_REQUEST["vanType"];
    $plateNo = $_REQUEST["plateNo"];
    $model = $_REQUEST["model"];
    $drivername = $_REQUEST["drivername"];

    $result = mysqli_query($link, "INSERT INTO truckdetailsdirectoperation(plateNo, truckType, vanType,  model, drivername)
                            VALUES('$plateNo', '$truckType', '$vanType', '$model', '$drivername')");

    $sql = "SELECT * FROM truckdetailsdirectoperation";
    $result = $link-> query($sql);

    if($result->num_rows > 0) {
        while($row = $result-> fetch_assoc()) {
            echo "<tr align='center'>" . 
                "<td>" . $row["truckType"] .
                "<td>" . $row["vanType"] .
                "<td>" . $row["plateNo"] .
                "<td>" . $row["model"] .
                "<td>" . $row["drivername"] . 
                "<td>" . "<a class='btn btn-primary' href=''>Edit</a>" . 
                "&nbsp&nbsp&nbsp" . 
                "<a class='btn btn-primary' href='truckDetailsDirectOpDel.php?plateNo=$row[plateNo]'>Delete</a>";
        }
    }

?>