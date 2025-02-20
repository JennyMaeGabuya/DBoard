<?php
include 'dbcon.php';

date_default_timezone_set('Asia/Manila');
$today = date('Y-m-d');

// Count HR Staffs (excluding "Mayor" roles)
$sqlHR = "SELECT COUNT(*) AS hr_count 
          FROM employee e
          JOIN hr_staffs h ON e.employee_no = h.employee_no
          WHERE LOWER(h.role) NOT LIKE '%mayor%'";
$resultHR = $con->query($sqlHR);
$rowHR = $resultHR->fetch_assoc();
$totalHR = $rowHR['hr_count'];

// Count Total Employees from employee table
$sqlEmployees = "SELECT COUNT(*) AS employee_count FROM employee";
$resultEmployees = $con->query($sqlEmployees);
$rowEmployees = $resultEmployees->fetch_assoc();
$totalEmployees = $rowEmployees['employee_count'];

// Calculate percentage (avoid division by zero)
$percentage = ($totalEmployees > 0) ? round(($totalHR / $totalEmployees) * 100, 2) : 0;
?>