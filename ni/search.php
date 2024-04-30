<?php
// Check if the 'query' GET parameter is set
if (isset($_GET['query'])) {
    // Connection details
   include('database_connection.php');

    // Sanitize input to prevent SQL injection
    $searchTerm = $connection->real_escape_string($_GET['query']);

    // Perform the search query for customer
    $sql = "SELECT * FROM customers WHERE FirstName LIKE '%$searchTerm%'";
    $result_customers = $connection->query($sql);

    // Perform the search query for employee
    $sql = "SELECT * FROM employees WHERE FirstName LIKE '%$searchTerm%'";
    $result_employees = $connection->query($sql);

    // Perform the search query for landlord
    $sql = "SELECT * FROM landlords WHERE firstname LIKE '%$searchTerm%'";
    $result_landlords = $connection->query($sql);

    // Perform the search query for lease
    $sql = "SELECT * FROM leases WHERE LeaseID LIKE '%$searchTerm%'";
    $result_leases = $connection->query($sql);

    // Perform the search query for maintencerequest
    $sql = "SELECT * FROM maintenancerequests WHERE Description LIKE '%$searchTerm%'";
    $result_maintenancerequests = $connection->query($sql);

     // Perform the search query for payment
    $sql = "SELECT * FROM payments WHERE PaymentID LIKE '%$searchTerm%'";
    $result_payments = $connection->query($sql);

     // Perform the search query for properties
    $sql = "SELECT * FROM properties WHERE address LIKE '%$searchTerm%'";
    $result_properties = $connection->query($sql);

    // Output search results
    echo "<h2><u>Search Results:</u></h2>";
    echo "<h3>customers:</h3>";
    if ($result_customers->num_rows > 0) {
        while ($row = $result_customers->fetch_assoc()) {
            echo "<p>" . $row['FirstName'] . "</p>";
        }
    } else {
        echo "<p>No customers found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>employees:</h3>";
    if ($result_employees->num_rows > 0) {
        while ($row = $result_employees->fetch_assoc()) {
            echo "<p>" . $row['FirstName'] . "</p>";
        }
    } else {
        echo "<p>No employee found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>landlords:</h3>";
    if ($result_landlords->num_rows > 0) {
        while ($row = $result_landlords->fetch_assoc()) {
            echo "<p>" . $row['FirstName'] . "</p>";
        }
    } else {
        echo "<p>No landlord found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>leases:</h3>";
    if ($result_leases->num_rows > 0) {
        while ($row = $result_leases->fetch_assoc()) {
            echo "<p>" . $row['LeaseID'] . "</p>";
        }
     } else {
        echo "<p>No LEASE found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>payment:</h3>";
    if ($result_payments->num_rows > 0) {
        while ($row = $result_payments->fetch_assoc()) {
            echo "<p>" . $row['PaymentDate'] . "</p>";
        }
     } else {
        echo "<p>No LEASE found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>properties:</h3>";
    if ($result_properties->num_rows > 0) {
        while ($row = $result_properties->fetch_assoc()) {
            echo "<p>" . $row['Address'] . "</p>";
        }
    } else {
        echo "<p>No LEASE found matching the search term: " . $searchTerm . "</p>";
    }

    echo "<h3>maintenancerequests:</h3>";
    if ($result_maintenancerequests->num_rows > 0) {
        while ($row = $result_maintenancerequests->fetch_assoc()) {
            echo "<p>" . $row['Description'] . "</p>";
        }
    } else {
        echo "<p>No Request found matching the search term: " . $searchTerm . "</p>";
    }
    $connection->close();
} 


else {
    echo "No search term was provided.";
}
?>
