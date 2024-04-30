<?php
// Connection details
include('database_connection.php');

if(isset($_REQUEST['EmployeeID'])) {
    $EmployeeID = $_REQUEST['EmployeeID'];
    
    // Prepare and execute the DELETE statement
    $rms = $connection->prepare("DELETE FROM employees WHERE EmployeeID=?");
    $rms->bind_param("i", $EmployeeID);
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
            <input type="hidden" name="EmployeeID" value="<?php echo $EmployeeID; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($rms->execute()) {
       echo "Record deleted successfully.<br><br>
             <a href='employee.php'>OK</a>";
    } else {
        echo "Error deleting data: " . $rms->error;
    }
}
?>
</body>
</html>
<?php

    $rms->close();
} else {
    echo "EmployeeID is not set.";
}

$connection->close();
?>
