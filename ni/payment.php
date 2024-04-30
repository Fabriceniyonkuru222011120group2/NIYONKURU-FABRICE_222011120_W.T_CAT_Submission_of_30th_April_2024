<!DOCTYPE html>
<html>
<head>
    <title>Payment Form</title>
</head>
<head>
  <!-- Linking to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="style.css" title="style 1" media="screen, tv, projection, handheld, print"/>
  <!-- Defining character encoding -->
  <meta charset="utf-8">
  <!-- Setting viewport for responsive design -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>All About System</title>
  <style>
    /* Normal link */
    a {
      padding: 10px;
      color: white;
      background-color: skyblue;
      text-decoration: none;
      margin-right: 15px;
    }

    /* Visited link */
    a:visited {
      color: purple;
    }
    /* Unvisited link */
    a:link {
      color: brown; /* Changed to lowercase */
    }
    /* Hover effect */
    a:hover {
      background-color: white;
    }

    /* Active link */
    a:active {
      background-color: red;
    }

    /* Extend margin left for search button */
    button.btn {
      margin-left: 15px; /* Adjust this value as needed */
      margin-top: 4px;
    }
    /* Extend margin left for search button */
    input.form-control {
      margin-left: 1300px; /* Adjust this value as needed */
      padding: 8px;
    }
    section{
      padding:180px;
    }
       header{
  background-color: #F4A460;
  padding: 20px;
}
footer{
  background-color: #F4A460;
  padding: 20px;
}

    /* Dropdown container */
    .dropdown {
      float: right; /* Align to the right */
      margin-right: 100px; /* Adjust margin as needed */
      position: relative;
    }

    /* Dropdown content */
    .dropdown-contents {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    /* Show dropdown content on hover */
    .dropdown:hover .dropdown-contents {
      display: block;
    }
  </style>
   <script>
            function confirmInsert() {
                return confirm('Are you sure you want to insert this record?');
            }
        </script>
</head>
<body bgcolor="gray">

<header>
  
<!-- <div class="col-3 offset">-->
<form class="d-flex" role="search" action="search.php">
  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name ="query">
  <button class="btn btn-outline-success" type="submit">Search</button>
</form>
  <ul style="list-style-type: none; padding: 0;">
    <li style="display: inline; margin-right: 10px;">


      <a href="./home.html">HOME</a>
    </li>
    <li style="display: inline; margin-right: 10px;"><a href="./about.html">ABOUT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./contact.html">CONTACT</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./customer.php">customer</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./employee.php">employee</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./landlord.php">landlords</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./leases.php">leases</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./maintenancerequest.php">maintainancerequest</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./payment.php">payments</a></li>
    <li style="display: inline; margin-right: 10px;"><a href="./properties.php">properties</a></li>
  
    <li class="dropdown">
      <a href="#" style="color: white; background-color: darkgreen; text-decoration: none; margin-right: 15px;">Settings</a>
      <div class="dropdown-contents">
        <!-- Links inside the dropdown menu -->
        <a href="login.html">Login</a>
        <a href="register.html">Register</a>
        <a href="logout.php">Logout</a>
      </div>
    </li>
  </ul>


</header>
    <h1>Payment Form</h1>
   <form method="post" onsubmit="return confirmInsert();">
        <label for="paymentID">PaymentID:</label><br>
        <input type="id" id="paymentid" name="paymentid" required><br><br>
        
        <label for="lease_id">Lease ID:</label><br>
        <input type="text" id="lease_id" name="lease_id" required><br><br>
        
        <label for="paymentdate">Payment Date:</label><br>
        <input type="text" id="payment date" name="payment date" placeholder="MM/YY" required><br><br>
        
        <label for="amount">Amount:</label><br>
        <input type="number" id="amount" name="amount" required><br><br>
        
        <input type="submit" value="Submit">
        <a href="./home.html">Go Back to Home</a>
    </form>
</body>
</html>

<?php
include('database_connection.php');


// Check if the form is submitted for insert
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insert section
    $rms = $connection->prepare("INSERT INTO payments(PaymentID, LeaseID, PaymentDate, Amount) VALUES (?, ?, ?, ?)");
    $rms->bind_param("sssd", $PaymentID, $LeaseID, $PaymentDate, $Amount);

    // Set parameters from POST and execute
    $PaymentID = $_POST['paymentid'];
    $LeaseID = $_POST['lease_id'];
    $PaymentDate = $_POST['payment_date'];
    $Amount = $_POST['amount'];

    if ($rms->execute()) {
        echo "New record has been added successfully";

             
    } else {
        echo "Error inserting data: " . $rms->error;
    }

    $rms->close();
}
?>


<?php
// Connection details
$host = "localhost";
$user = "root";
$pass = "";
$database = "rental_managementsystem";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}


// SQL query to fetch data from the Product table
$sql = "SELECT * FROM payments";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of Product</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Table of payments</h2></center>
    <table>
        <tr>
            <th>PaymentID</th>
            <th>LeaseID</th>
            <th>PaymentDate</th>
            <th>Amount</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["PaymentID"] . "</td>
                <td>" . $row["LeaseID"] . "</td>
                <td>" . $row["PaymentDate"] . "</td> 
                <td>" . $row["Amount"] . "</td>
                <td><a style='padding:4px' href='delete payment.php?PaymentID=".$row['PaymentID']."'>Delete</a></td> 
                <td><a style='padding:4px' href='update payment.php?PaymentID=".$row['PaymentID']."'>Update</a></td> 
              </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        // Close connection
        $connection->close();
        ?>
    </table>
    <footer>
  <center> 
    <b><h2>UR CBE BIT &copy, 2024 &reg, Designer by:FABRICE NIYONKURU </h2></b>
  </center>
</footer>
</body>
</html>
