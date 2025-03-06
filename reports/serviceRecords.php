<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('../fpdf/fpdf.php');
include('dbcon.php');

// Ensure an ID is provided
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    die("Error: Something went wrong, Try again!.");
}

// Fetch the employee details from the `employee` table
$query = "SELECT e.employee_no as employee_no, 
e.firstname, e.lastname as lastname, e.middlename as middlename,
 e.name_extension as name_extension, e.dob as dob, s.from_date as from_date, 
 s.to_date as todate, s.designation as designation, s.status as s_status, s.salary
  as salary, s.station_place as station, s.branch as branch, s.abs_wo_pay as abs,
   s.date_separated as datesep, s.cause_of_separation as cause from employee e 
   JOIN service_records s ON e.employee_no=s.employee_no 
WHERE e.employee_no =?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();

if (!$employee) {
    $_SESSION['display'] = 'No service record found';
    $_SESSION['title'] = 'Something went wrong';
    $_SESSION['success'] = 'error';
    $previous_page = $_SERVER['HTTP_REFERER'];
    header("Location: $previous_page");
    exit();
}

class PDF_MC_Table extends FPDF
{
    var $widths;
    var $aligns;

    function SetWidths($w)
    {
        $this->widths = $w;
    }

    function SetAligns($a)
    {
        $this->aligns = $a;
    }

    function Header()
    {
        $this->Image('../img/mk-logo.png', 32, 17, 26);
        $this->Image('../img/Bagong-Pilipinas.png', 157, 18, 30);
        $this->Ln(5);
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'Republic of the Philippines', 0, 1, 'C');
        $this->Cell(0, 0.5, 'Province of Batangas', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'MUNICIPALITY OF MATAASNAKAHOY', 0, 1, 'C');
        $this->SetFont('Arial', '', 11);
        $this->Cell(0, 0.5, 'Tel. No.: (043) 784-1088', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'hrmo_lgumataasnakahoy@yahoo.com', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 11.5);
        $this->Cell(0, 5, 'SERVICE RECORD', 0, 1, 'C');
        $this->Ln(1);
    }

    function CreateTable($employee, $con)
    {
        $this->SetFont('Times', '', 11.5);
        $name = strtoupper($employee['lastname']) . ', ' . strtoupper($employee['firstname']) . ' ' . strtoupper($employee['middlename']) . ' ' . strtoupper($employee['name_extension']);

        $this->Cell(40, 8, 'NAME:  ' . $name, 0);
        $this->SetXY(107, $this->GetY());
        $this->MultiCell(0, 8, '(If married woman, give also maiden name)', 0, 'J');

        $dob = $employee['dob'];
        $date = new DateTime($dob);
        $birthday = $date->format('F j, Y');

        $this->Cell(40, 8, 'BIRTHDATE:  ' . $birthday, 0);
        $this->SetXY(107, $this->GetY());
        $this->MultiCell(0, 5, '(Date herein should be checked from birth or baptismal certificate or some other reliable documents)', 0, 'J');
        $this->Ln(3);

        $this->MultiCell(0, 5, "This is to certify that the employee named herein above actually rendered services in the office as shown by the service record below, each line of which is supported by the appointment and other papers actually issued by this office and approved by the authorities concerned.", 0, 'J');
        $this->Ln(5);

        // Table Header
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(20, 7, 'From', 1, 0, 'C');
        $this->Cell(20, 7, 'To', 1, 0, 'C');
        $this->Cell(30, 7, 'Designation', 1, 0, 'C');
        $this->Cell(20, 7, 'Status', 1, 0, 'C');
        $this->Cell(20, 7, 'Station', 1, 0, 'C');
        $this->Cell(20, 7, 'Salary', 1, 0, 'C');
        $this->Cell(20, 7, 'Branch', 1, 0, 'C');
        $this->Cell(20, 7, 'Abs. W/o Pay', 1, 0, 'C');
        $this->Cell(20, 7, ' Date', 1, 0, 'C');
        $this->Cell(20, 7, 'Cause', 1, 1, 'C');

        $this->SetFont('Arial', '', 9);
        $stmt = $con->prepare("SELECT * FROM service_records WHERE employee_no = ?");
        $stmt->bind_param("s", $employee['employee_no']);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $this->Cell(20, 6, $row['from_date'], 1);
            $this->Cell(20, 6, $row['to_date'], 1);
            $this->Cell(30, 6, $row['designation'], 1);
            $this->Cell(20, 6, $row['status'], 1);
            $this->Cell(20, 6, $row['station_place'], 1);
            $this->Cell(20, 6, $row['salary'], 1);
            $this->Cell(20, 6, $row['branch'], 1);
            $this->Cell(20, 6, $row['abs_wo_pay'], 1);
            $this->Cell(20, 6, $row['date_separated'], 1);
            $this->Cell(20, 6, $row['cause_of_separation'], 1, 1);
        }
    }
}

$pdf = new PDF_MC_Table('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);
$pdf->CreateTable($employee, $con);
$pdf->Output();
