<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Address Edit</title>
</head>
<body>
  
    <div class="container mt-5">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Address Edit 
                            <a href="add.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM tbladdress WHERE id='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="student_id" value="<?= $student['id']; ?>">
                                    <div class="mb-3">
                                        <label>Code</label>
                                        <input type="text" name="code" value="<?=$student['code'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Quantity</label>
                                        <input type="text" name="quantity" value="<?=$student['quantity'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Price</label>
                                        <input type="text" name="price" value="<?=$student['price'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Shipping</label>
                                        <input type="text" name="shipping" value="<?=$student['shipping'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Barangay</label>
                                        <input type="text" name="brgy" value="<?=$student['brgy'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Purok</label>
                                        <input type="text" name="purok" value="<?=$student['purok'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>City</label>
                                        <input type="text" name="city" value="<?=$student['city'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Province</label>
                                        <input type="text" name="province" value="<?=$student['province'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>plates</label>
                                        <input type="text" name="plates" value="<?=$student['plates'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Drivers</label>
                                        <input type="text" name="drirversname" value="<?=$student['drirversname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Vantype</label>
                                        <input type="text" name="vantype" value="<?=$student['vantype'];?>" class="form-control">
                                    </div>
					<div class="mb-3">
                                        <label>Remarks</label>
                                        <input type="text" name="Remarks" value="<?=$student['Remarks'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_address" class="btn btn-primary">
                                            Update Address 
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
