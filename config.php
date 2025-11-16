<?php
// Database connection settings
$host = "localhost";
$user = "root";
$pass = "rootkarthik";
$dbname = "smart_university_erp";

// Create connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>
