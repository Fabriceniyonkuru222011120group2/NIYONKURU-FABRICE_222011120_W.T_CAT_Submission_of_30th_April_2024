<?php
// Connection details
include('database_connection.php');

// Check if PaymentID is set
if(isset($_REQUEST['PaymentID'])) {
    $PaymentID = $_REQUEST['PaymentID'];
    
    // Prepare the DELETE statement
    $stmt = $connection->prepare("DELETE FROM payments WHERE PaymentID=?");
    $stmt->bind_param("i", $PaymentID);
    
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Execute the DELETE statement
        if ($stmt->execute()) {
            echo "Record deleted successfully.<br><br>";
        } else {
            echo "Error deleting data: " . $stmt->error;
        }
        $stmt->close();
    }
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="PaymentID" value="<?php echo $PaymentID; ?>">
            <input type="submit" value="Delete">
        </form>
        <a href='payment.php'>OK</a>
    </body>
    </html>
    <?php
} else {
    echo "PaymentID is not set.";
}

// Close connection
$connection->close();
?>
