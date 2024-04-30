<?php
// Connection details
include('database_connection.php');

// Check if LandlordID is set
if(isset($_REQUEST['LandlordID'])) {
    $LandlordID = $_REQUEST['LandlordID'];
    
    // Prepare and execute the DELETE statement
    $rms = $connection->prepare("DELETE FROM landlords WHERE LandlordID=?");
    $rms->bind_param("i", $LandlordID);
    
    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($rms->execute()) {
            echo "Record deleted successfully.<br><br>";
        } else {
            echo "Error deleting data: " . $rms->error;
        }
        $rms->close();
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
            <input type="hidden" name="LandlordID" value="<?php echo $LandlordID; ?>">
            <input type="submit" value="Delete">
        </form>
        <a href='landlord.php'>OK</a>
    </body>
    </html>
    <?php
} else {
    echo "LandlordID is not set.";
}

// Close connection
$connection->close();
?>
