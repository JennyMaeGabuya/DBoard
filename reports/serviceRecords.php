<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('../fpdf/fpdf.php');
include('dbcon.php');

// Ensure an ID is provided
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    die("Error: SOmething went wrong, Try again!.");
}

// Fetch the employee details from the `employee` table
$query = "SELECT e.employee_no as employee_no, 
e.firstname, e.lastname as lastname, e.middlename as middlename,
 e.name_extension as name_extension, e.dob as dob, s.from_date as from_date, 
 s.to_date as todate, s.designation as deisgnation, s.status as s_status, s.salary
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
    $_SESSION['display'] = 'Error';
    $_SESSION['title'] = 'Something went wrong';
    $_SESSION['success'] = 'error';
    $previous_page = $_SERVER['HTTP_REFERER'];
    header("Location: $previous_page");
    exit();
}

// Create PDF instance
class PDF extends FPDF
{
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
        $this->Ln(1);
        
    }



    function Footer()
    {
        $this->SetY(-13);
        $this->Image('../img/JMi.png', 15, 240, 185);
    }
}

// Create PDF
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);



// Output the PDF
$pdf->Output();
