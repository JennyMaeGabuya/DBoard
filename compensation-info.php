<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
    exit();
}

include "dbcon.php";

if (isset($_POST['compsavebtn'])) {
    $emp_no = $_POST['emp_no'];

    //service records
    /* $date_started= $_POST['date_started'];
    $salary= $_POST['salary'];
    $abs_wo_pay= $_POST['abs_wo_pay'];
    $date_ended= $_POST['date_ended'];
    $station_place= $_POST['station_place'];
    $date_separated= $_POST['date_separated'];
    $designation= $_POST['designation'];
    $status= $_POST['status'];
    $branch= $_POST['branch'];
    $separation= $_POST['separation'];
*/
    // Compensation data
    $created_at = date('Y-m-d');
    $updated_at = date('Y-m-d');
    $salary = $_POST['salary'];
    $pera = $_POST['pera'];
    $rt_allowance = $_POST['rt_allowance'];
    $allowance = $_POST['allowance'];
    $clothing = $_POST['clothing'];
    $midyear = $_POST['midyear'];
    $yearend = $_POST['yearend'];
    $cash_gift = $_POST['gift'];
    $incentive = $_POST['incentive'];
    $issued_date = $_POST['issued'];

    // Check if the compensation record already exists
    $checkQuery = "SELECT * FROM compensation WHERE employee_no = ?";
    $checkStmt = $con->prepare($checkQuery);
    $checkStmt->bind_param("s", $emp_no);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Record exists, update it
        $updateComp = "UPDATE compensation SET 
            salary = ?, 
            pera = ?, 
            rt_allowance = ?, 
            allowance = ?, 
            clothing = ?, 
            mid_year = ?, 
            year_end_bonus = ?, 
            cash_gift = ?, 
            productivity_incentive = ?, 
            issued_date = ?, 
            updated_at = ? 
            WHERE employee_no = ?";

        $stmt = $con->prepare($updateComp);
        $stmt->bind_param("iiiiiiiiisss", $salary, $pera, $rt_allowance, $allowance, $clothing, $midyear, $yearend, $cash_gift, $incentive, $issued_date, $updated_at, $emp_no);

        if ($stmt->execute()) {
            $_SESSION['display'] = 'Compensation records updated!';
            $_SESSION['title'] = 'Success';
            $_SESSION['success'] = 'success';
        } else {
            $_SESSION['display'] = 'Failed to update records!';
            $_SESSION['title'] = 'Error';
            $_SESSION['success'] = 'error';
        }
    } else {
        // Record does not exist, insert a new one
        $insertComp = "INSERT INTO compensation (employee_no, salary, pera, rt_allowance, allowance, clothing, mid_year, year_end_bonus, cash_gift, productivity_incentive, issued_date, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($insertComp);
        $stmt->bind_param("siiiiiiiiisss", $emp_no, $salary, $pera, $rt_allowance, $allowance, $clothing, $midyear, $yearend, $cash_gift, $incentive, $issued_date, $created_at, $updated_at);

        if ($stmt->execute()) {
            $_SESSION['display'] = 'Compensation records added!';
            $_SESSION['title'] = 'Success';
            $_SESSION['success'] = 'success';
        } else {
            $_SESSION['display'] = 'Failed to insert records!';
            $_SESSION['title'] = 'Error';
            $_SESSION['success'] = 'error';
        }
    }

    // Redirect to the appropriate page
    $previous_page = $_SERVER['HTTP_REFERER'];
    header("Location: $previous_page");
    exit();
}
?>