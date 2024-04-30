<?php
include('database_connection.php');

// Check if EmployeeID is set
if(isset($_REQUEST['EmployeeID'])) {
    $EmployeeID = $_REQUEST['EmployeeID'];
    
    $rms = $connection->prepare("SELECT * FROM employees WHERE EmployeeID = ?");
    $rms->bind_param("i", $EmployeeID);
    $rms->execute();
    $result = $rms->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    
        $y = $row['FirstName'];
        $z = $row['LastName'];
        $p = $row['Position'];
        $w = $row['Email'];
        $o = $row['Phone'];
    } else {
        echo "Employee not found.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update employee</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
</head>
<body><center>
    <!-- Update employee form -->
    <h2><u>Update Form of employee</u></h2>
    <form method="POST" onsubmit="return confirmUpdate();">

        <label for="FirstName"> FirstName:</label>
        <input type="text" name="FirstName" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="LastName">LastName:</label>
        <input type="text" name="LastName" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="Position">Position:</label>
        <input type="text" name="Position" value="<?php echo isset($p) ? $p : ''; ?>">
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
    $Position = $_POST['Position'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    
    // Update the employee in the database
    $rms = $connection->prepare("UPDATE employees SET FirstName=?, LastName=?, Position=?, Email=?, Phone=? WHERE EmployeeID =?");
    $rms->bind_param("ssssdi", $FirstName, $LastName, $Position, $Email, $Phone, $EmployeeID);
    $rms->execute();
    
    // Redirect to employee.php
    header('Location: employee.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
