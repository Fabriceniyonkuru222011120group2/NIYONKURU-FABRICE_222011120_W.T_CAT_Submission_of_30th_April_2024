<?php
// Connection details
$host = "localhost";
$user = "root";
$pass = "";
$database = "rental_managementsystem";

// Creating connection
$connection = new mysqli($host, $user, $pass, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>