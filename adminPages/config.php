<?php
if(isset($_POST['addPayroll']))
{
  $_SESSION['start_month'] = $_POST['dateFrom'];
  $_SESSION['end_month'] = $_POST['dateTo'];
}
?>