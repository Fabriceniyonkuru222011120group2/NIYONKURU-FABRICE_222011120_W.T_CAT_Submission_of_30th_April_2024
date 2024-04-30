<?php
include('database_connection.php');

// Check if PropertyID is set
if(isset($_REQUEST['PropertyID'])) {
    $PropertyID = $_REQUEST['PropertyID'];
    
    $rms = $connection->prepare("SELECT * FROM properties WHERE PropertyID=?");
    $rms->bind_param("i", $PropertyID);
    $rms->execute();
    $result = $rms->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Address = $row['Address'];
        $Type = $row['Type'];
        $Bedrooms = $row['Bedrooms'];
        $Bathrooms = $row['Bathrooms'];
        $MonthlyRent = $row['MonthlyRent'];
    } else {
        echo "Property not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>properties</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update properties form -->
    <h2><u>Update Form of properties</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        
        <label for="Address">Address:</label>
        <input type="text" name="Address" value="<?php echo isset($Address) ? $Address : ''; ?>">
        <br><br>

        <label for="Type">Type:</label>
        <input type="text" name="Type" value="<?php echo isset($Type) ? $Type : ''; ?>">
        <br><br>

        <label for="Bedrooms">Bedrooms:</label>
        <input type="number" name="Bedrooms" value="<?php echo isset($Bedrooms) ? $Bedrooms : ''; ?>">
        <br><br>

        <label for="Bathrooms">Bathrooms:</label>
        <input type="number" name="Bathrooms" value="<?php echo isset($Bathrooms) ? $Bathrooms : ''; ?>">
        <br><br>

        <label for="MonthlyRent">MonthlyRent:</label>
        <input type="number" name="MonthlyRent" value="<?php echo isset($MonthlyRent) ? $MonthlyRent : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $Address = $_POST['Address'];
    $Type = $_POST['Type'];
    $Bedrooms = $_POST['Bedrooms'];
    $Bathrooms = $_POST['Bathrooms'];
    $MonthlyRent = $_POST['MonthlyRent'];
    
    // Update the property in the database
    $rms = $connection->prepare("UPDATE properties SET Address=?, Type=?, Bedrooms=?, Bathrooms=?, MonthlyRent=? WHERE PropertyID=?");
    $rms->bind_param("ssssdi", $Address, $Type, $Bedrooms, $Bathrooms, $MonthlyRent, $PropertyID);
    $rms->execute();
    
    // Redirect to properties.php
    header('Location: properties.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
