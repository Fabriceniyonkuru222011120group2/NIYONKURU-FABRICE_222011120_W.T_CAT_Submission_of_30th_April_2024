<?php
include('database_connection.php');


// Check if LandlordID is set
if(isset($_REQUEST['LandlordID'])) {
    $LandlordID = $_REQUEST['LandlordID'];
    
    $rms = $connection->prepare("SELECT * FROM landlords WHERE LandlordID = ?");
    $rms->bind_param("i", $LandlordID);
    $rms->execute();
    $result = $rms->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    
        $y = $row['FirstName'];
        $z = $row['LastName'];
        $w = $row['Email'];
        $o = $row['Phone'];
    } else {
        echo "Landlord not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update landlord</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update landlord form -->
    <h2><u>Update Form of landlord</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="FirstName"> FirstName:</label>
        <input type="text" name="FirstName" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="LastName">LastName:</label>
        <input type="text" name="LastName" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="Email">Email:</label>
        <input type="Email" name="Email" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

        <label for="Phone">Phone:</label>
        <input type="number" name="Phone" value="<?php echo isset($o) ? $o : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    
    // Update the landlord in the database
    $rms = $connection->prepare("UPDATE landlords SET FirstName=?, LastName=?, Email=?, Phone=? WHERE LandlordID =?");
    $rms->bind_param("ssssi", $FirstName, $LastName, $Email, $Phone, $LandlordID);
    $rms->execute();
    
    // Redirect to landlord.php
    header('Location: landlord.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
