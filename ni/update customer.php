<?php
include('database_connection.php');

// Check if Product_Id is set
if(isset($_REQUEST['CustomerID'])) {
    $CustomerID = $_REQUEST['CustomerID'];
    
    $rms = $connection->prepare("SELECT * FROM customers WHERE CustomerID=?");
    $rms->bind_param("i", $CustomerID);
    $rms->execute();
    $result = $rms->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['CustomerID'];
        $y = $row['FirstName'];
        $z = $row['LastName'];
        $w = $row['Email'];
        $o = $row['Phone'];
    } else {
        echo "customer not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update customer</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update customer form -->
    <h2><u>Update Form of customer</u></h2>
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
    
    // Update the product in the database
    $rms = $connection->prepare("UPDATE customers SET FirstName=?, LastName=?,Email=?,Phone=? WHERE CustomerID =?");
    $rms->bind_param("sssdi", $FirstName, $LastName, $Email,$Phone, $CustomerID);
    $rms->execute();
    
    // Redirect to product.php
    header('Location: customer.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
 