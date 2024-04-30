<?php
include('database_connection.php');


// Check if RequestID is set
if(isset($_REQUEST['RequestID'])) {
    $RequestID = $_REQUEST['RequestID'];
    
    $rms = $connection->prepare("SELECT * FROM maintenancerequests WHERE RequestID = ?");
    $rms->bind_param("i", $RequestID);
    $rms->execute();
    $result = $rms->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
       
        $y = $row['PropertyID'];
        $z = $row['Description'];
        $o = $row['DateRequested'];
        $w = $row['Status'];
    } else {
        echo "Maintenance request not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update maintainancerequest</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update maintainancerequest form -->
    <h2><u>Update Form of maintainancerequest</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="PropertyID">PropertyID:</label>
        <input type="text" name="PropertyID" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="Description">Description:</label>
        <input type="text" name="Description" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="DateRequested">DateRequested:</label>
        <input type="date" name="DateRequested" value="<?php echo isset($o) ? $o : ''; ?>">
        <br><br>

        <label for="Status">Status:</label>
        <input type="text" name="Status" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $PropertyID = $_POST['PropertyID'];
    $Description = $_POST['Description'];
    $DateRequested = $_POST['DateRequested'];
    $Status = $_POST['Status'];
    
    // Update the maintenance request in the database
    $rms = $connection->prepare("UPDATE maintenancerequests SET PropertyID=?, Description=?, DateRequested=?, Status=? WHERE RequestID =?");
    $rms->bind_param("isssi", $PropertyID, $Description, $DateRequested, $Status, $RequestID);
    $rms->execute();
    
    // Redirect to maintenancerequest.php
    header('Location: maintenancerequest.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
