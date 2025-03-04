<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
  exit();
}

include "dbcon.php";

if (isset($_GET['id']) && isset($_GET['empno'])) {
    $employee_no = $_GET['empno'];
    $id = $_GET['id'];

$updateService = "UPDATE service_records SET 
from_date = ?, 
to_date = ?, 
designation = ?, 
`status` = ?, 
salary = ?, 
station_place = ?, 
branch = ?, 
abs_wo_pay = ?, 
date_separated = ?, 
cause_of_separation = ?, 
updated_at = ? 
WHERE employee_no = ? and id = ?";

$stmt = $con->prepare($updateService);
$stmt->bind_param("ssssisssssssi", $date_started, $date_ended, $designation, $status, $salary, $station, $branch, $abs_wo_pay, $separated, $separation, $updated_at, $employee_no, $id );

if ($stmt->execute()) {
$_SESSION['display'] = 'Service Records updated!';
$_SESSION['title'] = 'Good Job';
$_SESSION['success'] = 'success';
} else {
$_SESSION['display'] = 'Failed to update records!';
$_SESSION['title'] = 'Error';
$_SESSION['success'] = 'error';
}
}
?>