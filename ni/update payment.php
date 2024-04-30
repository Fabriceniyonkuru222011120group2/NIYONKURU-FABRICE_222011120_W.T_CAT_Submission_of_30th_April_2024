<?php
include('database_connection.php');

// Check if PaymentID is set
if(isset($_REQUEST['PaymentID'])) {
    $PaymentID = $_REQUEST['PaymentID'];
    
    $rms = $connection->prepare("SELECT * FROM payments WHERE PaymentID=?");
    $rms->bind_param("i", $PaymentID);
    $rms->execute();
    $result = $rms->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $LeaseID = $row['LeaseID'];
        $PaymentDate = $row['PaymentDate'];
        $Amount = $row['Amount'];
    } else {
        echo "Payment not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>payment</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update payment form -->
    <h2><u>Update Form of payment</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="LeaseID">LeaseID:</label>
        <input type="id" name="LeaseID" value="<?php echo isset($LeaseID) ? $LeaseID : ''; ?>">
        <br><br>

        <label for="PaymentDate">PaymentDate:</label>
        <input type="date" name="PaymentDate" value="<?php echo isset($PaymentDate) ? $PaymentDate : ''; ?>">
        <br><br>

        <label for="Amount">Amount:</label>
        <input type="number" name="Amount" value="<?php echo isset($Amount) ? $Amount : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $LeaseID = $_POST['LeaseID'];
    $PaymentDate = $_POST['PaymentDate'];
    $Amount = $_POST['Amount'];
    
    // Update the product in the database
    $rms = $connection->prepare("UPDATE payments SET LeaseID=?, PaymentDate=?, Amount=? WHERE PaymentID=?");
    $rms->bind_param("sssi", $LeaseID, $PaymentDate, $Amount, $PaymentID);
    $rms->execute();
    
    // Redirect to payment.php
    header('Location: payment.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
