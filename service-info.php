<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

if (isset($_POST['servicesavebtn'])) {
    $emp_no = $_POST['emp_no'];

    //service records
    $date_started = $_POST['date_started'];
    $salary = $_POST['servicesalary'];
    $abs_wo_pay = $_POST['abs_wo_pay'];
    $date_ended = $_POST['date_ended'];
    $station = $_POST['station'];
    $separated = $_POST['separated'];
    $designation = $_POST['designation'];
    $status = $_POST['status'];
    $branch = $_POST['branch'];
    $separation = $_POST['separation'];

    // Service records data
    $created_at = date('Y-m-d');
    $updated_at = date('Y-m-d');

    // Record does not exist, insert a new one
    $insertComp = "INSERT INTO service_records (employee_no, from_date, to_date, designation, `status`, salary, station_place, branch, abs_wo_pay , date_separated, cause_of_separation, created_at, updated_at ) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($insertComp);
    $stmt->bind_param("sssssisssssss", $emp_no, $date_started, $date_ended, $designation, $status, $salary, $station, $branch, $abs_wo_pay, $separated, $separation, $created_at, $updated_at);

    if ($stmt->execute()) {
        $_SESSION['display'] = 'Service record added!';
        $_SESSION['title'] = 'Success';
        $_SESSION['success'] = 'success';
    } else {
        $_SESSION['display'] = 'Failed to insert records!';
        $_SESSION['title'] = 'Error';
        $_SESSION['success'] = 'error';
    }

    // Redirect to the appropriate page
    $previous_page = $_SERVER['HTTP_REFERER'];
    header("Location: $previous_page");
    exit();
}
?>