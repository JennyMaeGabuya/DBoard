<?php
include "dbcon.php";

header('Content-Type: application/json');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$extra_salary_json = $_POST['extra_salary_json'] ?? null;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
    exit();
}

$id = $_POST['edit_id'] ?? null;
$type = $_POST['edit_type'] ?? null;
$fullname = $_POST['fullname'] ?? null;
$lastname = $_POST['lastname'] ?? null;
$sex = $_POST['sex'] ?? null;
$start_date = $_POST['start_date'] ?? null;
$position = $_POST['position'] ?? null;
$salary = $_POST['salary'] ?? null;
$pera = $_POST['pera'] ?? null;
$rta = $_POST['rta'] ?? null;
$clothing = $_POST['clothing'] ?? null;
$mid_year_bonus = $_POST['mid_year_bonus'] ?? null;
$year_end_bonus = $_POST['year_end_bonus'] ?? null;
$cash_gift = $_POST['cash_gift'] ?? null;
$productivity_enhancement = $_POST['productivity_enhancement'] ?? null;
$date_issued = $_POST['date_issued'] ?? null;
$extra_salary_json = $_POST['extra_salary_json'] ?? '{}';

if (
    !$id || !$type || !$fullname || !$lastname || !$sex || !$start_date || !$position ||
    !$salary || !$pera || !$rta || !$clothing || !$mid_year_bonus || !$year_end_bonus ||
    !$cash_gift || !$productivity_enhancement || !$date_issued
) {
    echo json_encode(["status" => "error", "message" => "All fields are required."]);
    exit();
}

$table = ($type === "appointed") ? "appointed_cert_issuance" : "elected_cert_issuance";

if ($type === "appointed") {
    $office_appointed = $_POST['office_appointed'] ?? null;
    if (!$office_appointed) {
        echo json_encode(["status" => "error", "message" => "Office Appointed is required for appointed certificates."]);
        exit();
    }

    $query = "UPDATE $table 
    SET fullname = ?, lastname = ?, sex = ?, start_date = ?, position = ?, 
        office_appointed = ?, salary = ?, pera = ?, rta = ?, clothing = ?, 
        mid_year_bonus = ?, year_end_bonus = ?, cash_gift = ?, 
        productivity_enhancement = ?, date_issued = ?, extra_salary = ?
    WHERE id = ?";

    $stmt = $con->prepare($query);
    $stmt->bind_param(
        "ssssssddddddddssi",
        $fullname,
        $lastname,
        $sex,
        $start_date,
        $position,
        $office_appointed,
        $salary,
        $pera,
        $rta,
        $clothing,
        $mid_year_bonus,
        $year_end_bonus,
        $cash_gift,
        $productivity_enhancement,
        $date_issued,
        $extra_salary_json,
        $id
    );
} else {
    $query = "UPDATE $table 
    SET fullname = ?, lastname = ?, sex = ?, start_date = ?, position = ?, 
        salary = ?, pera = ?, rta = ?, clothing = ?, mid_year_bonus = ?, 
        year_end_bonus = ?, cash_gift = ?, productivity_enhancement = ?, 
        date_issued = ?, extra_salary = ?
    WHERE id = ?";

    $stmt = $con->prepare($query);
    $stmt->bind_param(
        "sssssdddddddssi",
        $fullname,
        $lastname,
        $sex,
        $start_date,
        $position,
        $salary,
        $pera,
        $rta,
        $clothing,
        $mid_year_bonus,
        $year_end_bonus,
        $cash_gift,
        $productivity_enhancement,
        $date_issued,
        $extra_salary_json,
        $id
    );
}

if ($stmt->execute()) {
    echo json_encode(["status" => "success", "message" => "Certificate updated successfully."]);
} else {
    echo json_encode(["status" => "error", "message" => "Failed to update certificate: " . $stmt->error]);
}

$stmt->close();
$con->close();
?>