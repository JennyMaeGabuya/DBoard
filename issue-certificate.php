<?php
session_start();
header('Content-Type: application/json'); // Ensure JSON response

if (!isset($_SESSION['user_id'])) {
  echo json_encode(["status" => "error", "message" => "Unauthorized access."]);
  exit();
}

include "dbcon.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo json_encode(["status" => "error", "message" => "Invalid request method."]);
  exit();
}

$type = $_POST['type'] ?? null;
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

// Validate required fields
if (empty($type) || empty($fullname) || empty($lastname) || empty($sex) || empty($start_date) || empty($position) || empty($salary) || empty($pera) || empty($rta) || empty($clothing) || empty($mid_year_bonus) || empty($year_end_bonus) || empty($cash_gift) || empty($productivity_enhancement) || empty($date_issued)) {
  echo json_encode(["status" => "error", "message" => "All fields are required."]);
  exit();
}

if ($type === 'appointed') {
  $office_appointed = $_POST['office_appointed'] ?? null;
  if (!$office_appointed) {
    echo json_encode(["status" => "error", "message" => "Office Appointed is required for appointed certificates."]);
    exit();
  }

  $query = "INSERT INTO appointed_cert_issuance (fullname, lastname, sex, start_date, position, office_appointed, salary, pera, rta, clothing, mid_year_bonus, year_end_bonus, cash_gift, productivity_enhancement, date_issued) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $con->prepare($query);
  $stmt->bind_param("ssssssdddddddds", $fullname, $lastname, $sex, $start_date, $position, $office_appointed, $salary, $pera, $rta, $clothing, $mid_year_bonus, $year_end_bonus, $cash_gift, $productivity_enhancement, $date_issued);
} else {
  $query = "INSERT INTO elected_cert_issuance (fullname, lastname, sex, start_date, position, salary, pera, rta, clothing, mid_year_bonus, year_end_bonus, cash_gift, productivity_enhancement, date_issued) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  $stmt = $con->prepare($query);
  $stmt->bind_param("sssssdddddddds", $fullname, $lastname, $sex, $start_date, $position, $salary, $pera, $rta, $clothing, $mid_year_bonus, $year_end_bonus, $cash_gift, $productivity_enhancement, $date_issued);
}

// Execute and retrieve the ID
if ($stmt->execute()) {
  $inserted_id = $stmt->insert_id; // Get the last inserted ID
  echo json_encode(["status" => "success", "message" => "Certificate issued successfully.", "id" => $inserted_id]);
} else {
  echo json_encode(["status" => "error", "message" => "Failed to issue certificate: " . $stmt->error]);
}

$stmt->close();
$con->close();
?>