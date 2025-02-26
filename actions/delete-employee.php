<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php"; // Adjust path if needed

if (isset($_GET['employee_no'])) {
    $employee_no = $_GET['employee_no'];

    // Check if the employee exists in the admin table
    $checkAdmin = $con->prepare("SELECT 1 FROM admin WHERE employee_no = ?");
    $checkAdmin->bind_param("s", $employee_no);
    $checkAdmin->execute();
    $checkAdmin->store_result();

    if ($checkAdmin->num_rows > 0) {
        // Redirect with error message if the employee is an admin
        header("Location: ../all-employees.php?error=Cannot delete. Employee is an admin.");
        exit();
    }

    $checkAdmin->close();

    // Check if the employee exists before deleting
    $checkEmployee = $con->prepare("SELECT 1 FROM employee WHERE employee_no = ?");
    $checkEmployee->bind_param("s", $employee_no);
    $checkEmployee->execute();
    $checkEmployee->store_result();

    if ($checkEmployee->num_rows === 0) {
        header("Location: ../all-employees.php?error=Employee not found.");
        exit();
    }

    $checkEmployee->close();

    // Proceed with deletion if employee is not an admin
    $stmt = $con->prepare("DELETE FROM employee WHERE employee_no = ?");
    $stmt->bind_param("s", $employee_no);

    if ($stmt->execute() && $stmt->affected_rows > 0) {
        // Redirect with success message
        header("Location: ../all-employees.php?message=Employee deleted successfully");
    } else {
        // Redirect with error message
        header("Location: ../all-employees.php?error=Failed to delete employee");
    }

    $stmt->close();
}

$con->close();
exit();
?>
