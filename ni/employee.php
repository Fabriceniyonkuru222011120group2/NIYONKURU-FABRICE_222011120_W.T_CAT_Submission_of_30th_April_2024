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
    <a href="./employee.html"></a>

    <h1>Employee Information Form</h1>
    <form method="post" onsubmit="return confirmInsert();">
        <label for="employeeid">employee Id:</label>
        <input type="number" id="employeeid" name="employeeid" required><br><br>
        
         <label for="FirstName">FirstName:</label>
        <input type="text" id="FirstName" name="FirstName" required><br><br>

       <label for="lastName">LastName:</label>
        <input type="text" id="LastName" name="LastName" required><br><br>

          <label for="Position">position:</label>
        <input type="text" id="position" name="Position" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="phone">Phone :</label><br>
        <input type="tel" id="phone" name="phone" required><br><br>
        
        <input type="submit" name="submit" value="Submit">
        <a href="./home.html">Go Back to Home</a>
    </form>

    <?php
   include('database_connection.php');


    // Check if the form is submitted for insert
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        // Insert section
        $rms = $connection->prepare("INSERT INTO employees(EmployeeID, FirstName, LastName, Position, Email, Phone) VALUES (?, ?, ?, ?, ?, ?)");
        $rms->bind_param("isssss", $EmployeeID, $FirstName, $LastName, $Position, $email, $phone);

        // Set parameters from POST and execute
        $EmployeeID = $_POST['employeeid'];
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $Position = $_POST['Position'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        if ($rms->execute()) {
            echo "New record has been added successfully.<br><br>
                  <a href='employees.html'>Back to Form</a>";
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
    <title>EMPLOYEE INFORMATION</title>
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
    <center><h2>Table of employees</h2></center>
    <table>
        <tr>
            <th>EmployeeID</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Position</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        // Creating connection
        $connection = new mysqli($host, $user, $pass, $database);

        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // SQL query to fetch data from the employees table
        $sql = "SELECT * FROM employees";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $EmployeeID = $row["EmployeeID"];
                echo "<tr>
                        <td>" . $row["EmployeeID"] . "</td>
                        <td>" . $row["FirstName"] . "</td>
                        <td>" . $row["LastName"] . "</td>
                        <td>" . $row["Position"] . "</td>
                        <td>" . $row["Email"] . "</td>
                        <td>" . $row["Phone"] . "</td>
                        <td><a style='padding:4px' href='delete employee.php?EmployeeID=$EmployeeID'>Delete</a></td>
                        <td><a style='padding:4px' href='update employee.php?EmployeeID=$EmployeeID'>Update</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No data found</td></tr>";
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