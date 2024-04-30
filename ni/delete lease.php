<?php
// Connection details
include('database_connection.php');

// Check if LeaseID is set
if(isset($_REQUEST['LeaseID'])) {
    $LeaseID = $_REQUEST['LeaseID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM leases WHERE LeaseID=?");
    $stmt->bind_param("i", $LeaseID);
    
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
            <input type="hidden" name="LeaseID" value="<?php echo $LeaseID; ?>">
            <input type="submit" value="Delete">
        </form>
        <a href='lease.php'>OK</a>
    </body>
    </html>
    <?php
} else {
    echo "LeaseID is not set.";
}

// Close connection
$connection->close();
?>
