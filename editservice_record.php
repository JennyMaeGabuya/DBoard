<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
  exit();
}

include "dbcon.php";

if (isset($_POST['serviceupdatebtn'])) {
  $empid = $_POST['empid'];
  $empno = $_POST['empno'];
  $date_started = $_POST['from'];
  $date_ended = $_POST['to'];
  $designation = $_POST['designation'];
  $status = $_POST['status'];
  $salary = $_POST['salary'];
  $station = $_POST['station'];
  $branch = $_POST['branch'];
  $abs = $_POST['abs'];
  $date = $_POST['date'];
  $cause = $_POST['cause'];

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
  $stmt->bind_param("ssssisssssssi", $date_started, $date_ended, $designation, $status, $salary, $station, $branch, $abs, $date, $cause, $updated_at, $empno, $empid);

  if ($stmt->execute()) {
    $_SESSION['display'] = 'Service Records updated!';
    $_SESSION['title'] = 'Record Updated';
    $_SESSION['success'] = 'success';
  } else {
    $_SESSION['display'] = 'Failed to update records!';
    $_SESSION['title'] = 'Error';
    $_SESSION['success'] = 'error';
  }
  $previous_page = $_SERVER['HTTP_REFERER'];
  header("Location: $previous_page");
  exit();
}
?>