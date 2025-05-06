<?php
session_start();
require('../fpdf/fpdf.php');
include('dbcon.php');

// Ensure an ID is provided
$empid = isset($_GET['id']) ? $_GET['id'] : null;

if (!$empid) {
    die("Error: No Personal Data sheet selected for generation.");
}

// Fetch the employee details from the `employee` table
$query = "SELECT e.employee_no as employee_no, 
e.firstname,
e.lastname as lastname,
e.middlename as middlename,
e.name_extension as name_extension,
e.dob as dob,
e.pob as pob, 
e.sex as sex,
e.civil_status as civil_status,
e.address as address, 
e.blood_type as blood_type,
e.mobile_no as mobile_no,
e.email_address as email,
e.image as pic,
 g.tin_no as tin_no, g.sss_no as sss_no,
 g.philhealth_no as philhealth_no, g. pag_ibig_no as pag_ibig_no, g.gsis_no as gsis_no FROM employee e
LEFT JOIN government_info g ON e.employee_no=g.employee_no 
WHERE e.employee_no = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $empid);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();

if (!$employee) {
    $_SESSION['display'] = 'No Employee found';
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
        $this->Ln(5);
    }

    function CreateTable($employee)
    {
        // Set font for the table
        $this->SetFont('Arial', 'B', 20);
        $this->Ln(5);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(0, 10, 'PERSONAL DATA SHEET', 1, 1, 'C', true);
        $this->Ln(0);

        $photoPath = $employee['pic'];

        // Check if the image path is empty
        if (empty($photoPath)) {
            $photoPath = '../mk-logo.png'; // Path to the default image
        }
        // Add Employee Photo

        $this->Image('../img/profile/' . $photoPath, 10, $this->GetY(), 40, 40);
        $this->Cell(40, 40, '', 1); // Empty cell to create space for the photo
        $this->SetFont('Times', '', 12);
        $this->Cell(43, 10, 'SURNAME:', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(0, 10, $employee['lastname'], 1);

        $this->Ln(); // Move to the next line

        $this->Cell(40, 40, '', 0); // Empty cell for space     
        // First Name
        $this->SetFont('Times', '', 12);
        $this->Cell(43, 10, 'FIRST NAME', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(0, 10, $employee['firstname'], 1); // Use 0 to take the remaining width
        $this->Ln(); // Move to the next line

        // Middle Name
        $this->Cell(40, 40, '', 0); // Empty cell for space     
        $this->SetFont('Times', '', 12);
        $this->Cell(43, 10, 'MIDDLE NAME', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(0, 10, $employee['middlename'], 1); // Use 0 to take the remaining width
        $this->Ln(); // Move to the next line

        // Name Extension
        $this->Cell(40, 40, '', 0); // Empty cell for space     
        $this->SetFont('Times', '', 12);
        $this->Cell(43, 10, 'NAME EXTENSION', 1);
        $this->SetFont('Times', 'B', 12);

        // Check if name extension is empty and set the appropriate font style
        if (!empty($employee['name_extension'])) {
            $this->Cell(0, 10, $employee['name_extension'], 1);
        } else {
            $this->SetFont('Times', 'BI', 12); // Italicize "N/A"
            $this->Cell(0, 10, 'N/A', 1);
        }

        $this->Ln(); // Move to the next line

        // Additional rows
        $this->SetFont('Times', '', 12);
        $this->Cell(40, 10, 'CONTACT NO', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(43, 10, $employee['mobile_no'], 1);

        $this->SetFont('Times', '', 12);
        $this->Cell(27, 10, 'EMAIL ADD', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(80, 10, $employee['email'], 1);
        $this->Ln();

        $this->SetFont('Times', '', 12);
        $this->Cell(40, 10, 'ADDRESS', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(150, 10, $employee['address'], 1);
        $this->Ln();

        $this->SetFont('Times', '', 12);
        $this->Cell(40, 10, 'PLACE OF BIRTH', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(150, 10, $employee['pob'], 1);
        $this->SetFont('Times', '', 12);
        $this->Ln();

        $this->Cell(40, 10, 'CIVIL STATUS', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(43, 10, $employee['civil_status'], 1);
        $this->SetFont('Times', '', 12);
        $this->Cell(29, 10, 'SEX', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(78, 10, $employee['sex'], 1);

        $dob = $employee['dob'];
        $date = new DateTime($dob);
        $birthday = $date->format('F j, Y');
        $this->SetFont('Times', '', 12);
        $this->Ln();

        $this->Cell(40, 10, 'BIRTHDATE', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(43, 10, $birthday, 1);

        $this->SetFont('Times', '', 12);
        $this->Cell(29, 10, 'BLOOD TYPE', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(78, 10, $employee['blood_type'], 1);
        $this->Ln();

        // Government Information Header
        $this->SetFillColor(200, 200, 200);
        $this->Cell(0, 10, 'GOVERNMENT INFORMATION', 1, 1, 'C', true);
        $this->Ln(0);

        // Government Information Table
        $this->SetFont('Times', '', 12);
        $this->Cell(40, 10, 'GSIS NO:', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(50, 10, !empty($employee['gsis_no']) ? $employee['gsis_no'] : 'N/A', 1);

        $this->SetFont('Times', '', 12);
        $this->Cell(50, 10, 'SSS NO:', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(50, 10, !empty($employee['sss_no']) ? $employee['sss_no'] : 'N/A', 1);
        $this->Ln();

        $this->SetFont('Times', '', 12);
        $this->Cell(40, 10, 'PHILHEALTH NO:', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(50, 10, !empty($employee['philhealth_no']) ? $employee['philhealth_no'] : 'N/A', 1);

        $this->SetFont('Times', '', 12);
        $this->Cell(50, 10, 'PAG-IBIG NO:', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(50, 10, !empty($employee['pag_ibig_no']) ? $employee['pag_ibig_no'] : 'N/A', 1);
        $this->Ln();

        $this->SetFont('Times', '', 12);
        $this->Cell(40, 10, 'TIN NO:', 1);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(50, 10, !empty($employee['tin_no']) ? $employee['tin_no'] : 'N/A', 1);

        $this->SetFont('Times', '', 11.5);
        $this->Cell(50, 10, 'AGENCY EMPLOYEE NO:', 1);
        $this->SetFont('Times', 'B', 11);
        $this->Cell(50, 10, $employee['employee_no'], 1);
        $this->Ln();
    }


    function Footer()
    {
        $this->SetY(-45); // Adjust vertical position as needed

        // Path to the log file that stores recent footers
        $logFile = '../img/footer/footer_log.txt';

        if (file_exists($logFile)) {
            $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $lastLine = end($lines);
            list($filename) = explode('|', $lastLine);

            $footerPath = '../img/footer/' . $filename;

            if (file_exists($footerPath)) {
                $this->Image($footerPath, 15, $this->GetY(), 180); // Adjust X, Y, Width
            } else {
                $this->SetFont('Arial', 'I', 8);
                $this->Cell(0, 10, 'Footer image not found.', 0, 0, 'C');
            }
        } else {
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, 'No footer log found.', 0, 0, 'C');
        }
    }
}

// Create PDF
$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Times', '', 12);

// Create the table with employee details
$pdf->CreateTable($employee);

// Output the PDF
$pdf->Output();
