<?php
$servername = "localhost"; // e.g., "localhost"
$username = "root";
$password = "";
$database = "hr_records";

$con = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>
