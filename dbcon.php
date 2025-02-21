<?php
$servername = "localhost"; // e.g., "localhost"
$username = "root";
$password = "";
$database = "hr_records";

$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
