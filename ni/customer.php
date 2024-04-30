<!DOCTYPE html>
<html>
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
  <!-- JavaScript validation and content load for insert data-->
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
    <h1>Customer Form</h1>
    <form method="post" onsubmit="return confirmInsert();">
        <label for="custid">Customer Id:</label>
        <input type="number" id="custid" name="custid" required><br><br>

        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" required><br><br>

        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="gend">Gender:</label>
        <select name="gend" id="gend">
            <option>Male</option>
            <option>Female</option>
        </select><br><br>

        <input type="submit" name="add" value="Insert"><br><br>

        <a href="./home.html">Go Back to Home</a>
    </form>

    <?php
    // Connection details
    include('database_connection.php');


    // Check if the form is submitted for insert
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
        // Insert section
        $rms = $connection->prepare("INSERT INTO customers(CustomerID, FirstName, LastName, Email, Phone) VALUES (?, ?, ?, ?, ?)");
        $rms->bind_param("issss", $CustomerID, $FirstName, $LastName, $email, $phone);

        // Set parameters from POST and execute
        $CustomerID = $_POST['custid'];
        $FirstName = $_POST['fname'];
        $LastName = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        if ($rms->execute()) {
            echo "New record has been added successfully.<br><br>
                  <a href='customers.html'>Back to Form</a>";
        } else {
            echo "Error inserting data: " . $rms->error;
        }

        $rms->close();
    }

    // Close connection
    $connection->close();
    ?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> CUSTOMER INFORMATION</title>
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

    <center><h2>Table of customers</h2></center>
    <table border="5">
        <tr>
            <th>CustomerID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
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

        // SQL query to fetch data from the customers table
        $sql = "SELECT * FROM customers";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $CustomerID = $row["CustomerID"];
                echo "<tr>
                        <td>" . $row["CustomerID"] . "</td>
                        <td>" . $row["FirstName"] . "</td>
                        <td>" . $row["LastName"] . "</td>
                        <td>" . $row["Email"] . "</td>
                        <td>" . $row["Phone"] . "</td>
                        <td><a style='padding:4px' href='delete customer.php?CustomerID=$CustomerID'>Delete</a></td>
                        <td><a style='padding:4px' href='update customer.php?CustomerID=$CustomerID'>Update</a></td>
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
