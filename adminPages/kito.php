<!DOCTYPE html>
<html>
<head>
    <title>Filter Form</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        /* CSS for print */
        @media print {
            body * {
                visibility: hidden;
            }
            .print-table, .print-table * {
                visibility: visible;
            }
            .print-table {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>
<body>

<?php
session_start();
require 'dp.php';
?>

<div class="container mt-5">
    <h2>Filter Form</h2>
    <form method="GET" action="" class="mb-3">
        <div class="form-group">
            <label for="start_date">Start Date:</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo isset($start_date) ? $start_date : ''; ?>">
        </div>
        <div class="form-group">
            <label for="end_date">End Date:</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo isset($end_date) ? $end_date : ''; ?>">
        </div>
        <!-- Add a submit button to submit the form -->
        <button type="submit" class="btn btn-primary">Filter</button>
        <button class="btn btn-primary" onclick="window.print()">Print</button>


    </form>

    <?php
    // Check if the form is submitted
    if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
        // Get the start and end date filter values from the form submission
        $start_date = $_GET['start_date'];
        $end_date = $_GET['end_date'];

        // Modify the SQL query according to your table structure and filter requirements
        $query = "SELECT * FROM tbladdress WHERE dateInput BETWEEN '$start_date' AND '$end_date'";
        $query_run = mysqli_query($con, $query);

        // Output the filtered results
        if (mysqli_num_rows($query_run) > 0) {
            $totalQuantity = 0; // Initialize the variable for total quantity
            $totalShipping = 0; // Initialize the variable for total shipping
            $totalPrice = 0;    // Initialize the variable for total price
            $totalSale = 0;     // Initialize the variable for total sale

            echo '<button class="btn btn-danger mb-3" onclick="closeData()">Close</button>';

            // Add the "print-table" class to the table for printing
            echo '<table class="table mt-3 print-table">';
echo '<thead>';
echo '<tr>';
echo '<th scope="col">Code</th>';
echo '<th scope="col">Price</th>';
echo '<th scope="col">Shipping</th>';
echo '<th scope="col">Quantity</th>';
echo '<th scope="col">Sale Price</th>';
echo '<th scope="col">Barangay</th>';
echo '<th scope="col">Purok</th>';
echo '<th scope="col">City</th>';
echo '<th scope="col">Province</th>';
echo '<th scope="col">Plates</th>';
echo '<th scope="col">Driver\'s Name</th>';
echo '<th scope="col">Van Type</th>';
echo '<th scope="col">Date Input</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody>';
while ($student = mysqli_fetch_assoc($query_run)) {
    echo '<tr>';
    echo '<td>' . $student['code'] . '</td>';
    echo '<td>' . $student['price'] . '</td>';
    echo '<td>' . $student['shiiping'] . '</td>';
    echo '<td>' . $student['quantity'] . '</td>';

    // Calculate the sale price based on the original price (discounted by 10%)
    $salePrice = $student['price'] * 0.9;

    echo '<td>' . $salePrice . '</td>';
    echo '<td>' . $student['brgy'] . '</td>';
    echo '<td>' . $student['purok'] . '</td>';
    echo '<td>' . $student['city'] . '</td>';
    echo '<td>' . $student['province'] . '</td>';
    echo '<td>' . $student['plates'] . '</td>';
    echo '<td>' . $student['drirversname'] . '</td>';
    echo '<td>' . $student['vantype'] . '</td>';
    echo '<td>' . $student['dateInput'] . '</td>';
    echo '</tr>';

    $totalQuantity += $student['quantity']; // Add the quantity to the total quantity
    $totalShipping += $student['shiiping']; // Add the shipping to the total shipping
    $totalPrice += $student['price']; // Add the price to the total price
    $totalSale += $salePrice; // Add the sale price to the total sale
}

// Add the total rows to the table
echo '<tr>';
echo '<td colspan="3"></td>';
echo '<td>Total Quantity: ' . $totalQuantity . '</td>';
echo '<td>Total Sale: ' . $totalSale . '</td>';
echo '<td colspan="8"></td>';
echo '</tr>';

echo '<tr>';
echo '<td colspan="3"></td>';
echo '<td>Total Shipping: ' . $totalShipping . '</td>';
echo '<td>Total Price: ' . $totalPrice . '</td>';
echo '<td colspan="8"></td>';
echo '</tr>';

echo '</tbody>';
echo '</table>';

        } else {
            echo '<div class="alert alert-info mt-3">No records found.</div>';
        }
    }
    ?>
</div>

<!-- Add the necessary JavaScript code -->
<!-- Include the jsPDF library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
<!-- Include the html2canvas library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js"></script>

<!-- Convert filtered data to PDF -->
<script>
    function convertToPDF() {
        const doc = new jsPDF();

        // Get the table HTML element
        const table = document.querySelector('.print-table');

        // Convert the table to a data URL using html2canvas
        html2canvas(table).then(function(canvas) {
            const tableDataURL = canvas.toDataURL();

            // Add the table data URL to the PDF document
            doc.addImage(tableDataURL, 'PNG', 10, 10, 190, 0);

            // Save the PDF document
            doc.save('filtered_data.pdf');
        });
    }
    
    function closeData() {
        // Reload the page to clear the filtered results
        location.reload();
    }
</script>
</body>
</html>
