<?php
// Connection details
include('database_connection.php');

// Check if RequestID is set
if(isset($_REQUEST['RequestID'])) {
    $RequestID = $_REQUEST['RequestID'];
    
    // Prepare the DELETE statement
    $stmt = $connection->prepare("DELETE FROM maintenancerequests WHERE RequestID=?");
    $stmt->bind_param("i", $RequestID);
    
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
            <input type="hidden" name="RequestID" value="<?php echo $RequestID; ?>">
            <input type="submit" value="Delete">
        </form>
        <a href='maintenancerequest.php'>OK</a>
    </body>
    </html>
    <?php
} else {
    echo "RequestID is not set.";
}

// Close connection
$connection->close();
?>
