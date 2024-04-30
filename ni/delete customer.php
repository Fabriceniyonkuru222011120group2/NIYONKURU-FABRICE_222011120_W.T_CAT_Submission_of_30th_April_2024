<?php
// Include database connection file
include('database_connection.php');

// Check if CustomerID is set
if(isset($_REQUEST['CustomerID'])) {
    $CustomerID = $_REQUEST['CustomerID'];

    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM customers WHERE CustomerID=?");
    $stmt->bind_param("i", $CustomerID);
    if ($stmt->execute()) {
        echo "Record deleted successfully.<br><br>";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    // Close statement
    $stmt->close();

    // Close connection
    $connection->close();
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
    <a href='customer.php'>OK</a>
</body>
</html>

<?php
} else {
    echo "CustomerID is not set.";
}
?>
