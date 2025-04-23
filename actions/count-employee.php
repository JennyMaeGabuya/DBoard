<?php
include 'dbcon.php';

date_default_timezone_set('Asia/Manila');
$today = date('Y-m-d');

// Count HR Staffs (excluding Mayor) - and all active employees
$sqlHR = "SELECT COUNT(*) AS hr_count 
          FROM employee
          WHERE LOWER(role) NOT LIKE '%mayor%' 
          AND account_status = 1
          AND hr_staff = 1";

$resultHR = $con->query($sqlHR);
$rowHR = $resultHR->fetch_assoc();
$totalHR = $rowHR['hr_count'];

// Count Total Active Employees
$sqlEmployees = "SELECT COUNT(*) AS employee_count 
                 FROM employee 
                 WHERE account_status = 1";
$resultEmployees = $con->query($sqlEmployees);
$rowEmployees = $resultEmployees->fetch_assoc();
$totalEmployees = $rowEmployees['employee_count'];

// Calculate percentage (avoid division by zero)
$percentage = ($totalEmployees > 0) ? round(($totalHR / $totalEmployees) * 100, 2) : 0;
?>