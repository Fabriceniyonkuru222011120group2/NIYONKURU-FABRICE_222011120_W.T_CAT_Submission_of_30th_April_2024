<?php
include('database_connection.php');

// Check if LeaseID is set
if(isset($_REQUEST['LeaseID'])) {
    $LeaseID = $_REQUEST['LeaseID'];
    
    $rms = $connection->prepare("SELECT * FROM leases WHERE LeaseID = ?");
    $rms->bind_param("i", $LeaseID);
    $rms->execute();
    $result = $rms->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
       
        $y = $row['CustomerID'];
        $z = $row['PropertyID'];
        $w = $row['LeaseStart'];
        $o = $row['LeaseEnd'];
    } else {
        echo "Lease not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update lease</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update lease form -->
    <h2><u>Update Form of lease</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="CustomerID"> CustomerID :</label>
        <input type="text" name="CustomerID" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="PropertyID">PropertyID:</label>
        <input type="text" name="PropertyID" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="LeaseStart">LeaseStart:</label>
        <input type="date" name="LeaseStart" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="LeaseEnd">LeaseEnd:</label>
        <input type="date" name="LeaseEnd" value="<?php echo isset($o) ? $o : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $CustomerID = $_POST['CustomerID'];
    $PropertyID = $_POST['PropertyID'];
    $LeaseStart = $_POST['LeaseStart'];
    $LeaseEnd = $_POST['LeaseEnd'];
    
    // Update the lease in the database
    $rms = $connection->prepare("UPDATE leases SET CustomerID=?, PropertyID=?, LeaseStart=?, LeaseEnd=? WHERE LeaseID =?");
    $rms->bind_param("iisss", $CustomerID, $PropertyID, $LeaseStart, $LeaseEnd, $LeaseID);
    $rms->execute();
    
    // Redirect to lease.php
    header('Location: leases.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
