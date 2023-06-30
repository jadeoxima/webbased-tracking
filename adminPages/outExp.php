<?php 
    include_once '../config.php';

    $id = $_REQUEST["id"];
    $plateNo = $_REQUEST["plateNo"];
    $fromDest = $_REQUEST["fromDest"];
    $toDest = $_REQUEST["toDest"];
    $beginning = $_REQUEST["beginning"];
    $ending = $_REQUEST["ending"];
    $rates = $_REQUEST["rates"];
    $gas = $_REQUEST["gas"];
    $tollFee = $_REQUEST["tollFee"];
    $meals = $_REQUEST["meals"];
    $accomodation = $_REQUEST["accomodation"];
    $repairs = $_REQUEST["repairs"];
    $photocopy = $_REQUEST["photocopy"];
    $telephone = $_REQUEST["telephone"];
    $others = $_REQUEST["others"];
    $totalExpenses = $_REQUEST["totalExpenses"];
    $grossProfits = $_REQUEST["grossProfits"];
    $remarks = $_REQUEST["remarks"];
    
    

    $result = mysqli_query($link, "INSERT INTO tbldirectoperation(id, plateNo, fromDest, toDest, beginning, ending, rates, gas, tollFee,
                                                                  meals, accomodation, repairs, photocopy, telephone, others,
                                                                  totalExpenses, grossProfits, remarks)
                                   VALUES('$id', '$plateNo', '$fromDest', '$toDest', '$beginning', '$ending', '$rates', '$gas',
                                          '$tollFee', '$meals', '$accomodation', '$repairs', '$photocopy', '$telephone',
                                          '$others', '$totalExpenses', '$grossProfits', '$remarks')"); 

    $sql = "SELECT * FROM tbldirectoperation";
    $result = $link-> query($sql);

    if($result->num_rows > 0) {
        while($row = $result-> fetch_assoc()) {
            echo "<tr align='center'>" . 
                "<td>" . $row["plateNo"] .
                "<td>" . $row["fromDest"] .
                "<td>" . $row["toDest"] .
                "<td>" . $row["beginning"] .
                "<td>" . $row["ending"] .
                "<td>" . $row["rates"] .
                "<td>" . $row["gas"] .
                "<td>" . $row["tollFee"] .
                "<td>" . $row["meals"] .
                "<td>" . $row["accomodation"] .
                "<td>" . $row["repairs"] .
                "<td>" . $row["photocopy"] .
                "<td>" . $row["telephone"] .
                "<td>" . $row["others"] .
                "<td>" . $row["totalExpenses"] .
                "<td>" . $row["grossProfits"] .
                "<td>" . $row["remarks"] .
                "<td>" . $row["dateInput"] .
                "<td>" . "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#update_details'>Edit</button>" .
                "&nbsp&nbsp&nbsp&nbsp" .
                "<a class='btn btn-primary' href='directOperationsDel.php?id=$row[id]'>Delete</a>";
        }
    } 

?>