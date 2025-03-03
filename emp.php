<?php
require('fpdf/fpdf.php');
include('dbcon.php');

// Ensure an ID is provided
$empid = isset($_GET['id']) ? $_GET['id'] : null;

if (!$empid) {
    die("Error: No certificate selected for generation.");
}

// Fetch the employee details from the `employee` table
$query = "SELECT * FROM employee JOIN government_info ON government_info.employee_no = employee.employee_no WHERE employee.employee_no = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $empid);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();

if (!$employee) {
    die("Error: No employee found.");
}

// Create PDF instance
class PDF extends FPDF
{
    function Header()
    {
        $this->Image('img/mk-logo.png', 32, 17, 26);
        $this->Image('img/Bagong-Pilipinas.png', 157, 18, 30);
        $this->Ln(5);
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'Republic of the Philippines', 0, 1, 'C');
        $this->Cell(0, 0.5, 'Province of Batangas', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'MUNICIPALITY OF MATAASNAKAHOY', 0, 1, 'C');
        $this->SetFont('Arial', '', 11);
        $this->Cell(0, 0.5, 'Tel. No.: (043) 784-1088', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'hrmo_lgumatasnakahoy@yahoo.com', 0, 1, 'C');
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(221, 0, 42);

        $this->Ln(5);
    }

    function Footer()
    {
        $this->SetY(-13);
        $this->Image('img/JMi.png', 15, 240, 185);
    }

    function CreateTable($employee)
    {
        // Set font for the table
        $this->SetFont('Arial', 'B', 15);
        $this->Ln(20);
        $this->SetFillColor(200, 200, 200);
        $this->Cell(0, 10, 'PERSONAL DATA SHEET', 1, 1, 'C', true);
        $this->Ln(0);
    
        $photoPath = $employee['image']; 

// Check if the image path is empty
if (empty($photoPath)) {
    $photoPath = 'img/mk-logo.png'; // Path to the default image
}
        // Add Employee Photo
       
        $this->Image('img/profile/' . $photoPath, 10, $this->GetY(), 40, 40); 
        $this->Cell(40, 40, '', 1); // Empty cell to create space for the photo
        $this->SetFont('Arial', '', 11);
        $this->Cell(40, 10, 'SURNAME:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(0, 10, $employee['lastname'], 1); 
  
        $this->Ln(); // Move to the next line
    

        $this->Cell(40, 40, '', 0); // Empty cell for space     
        // First Name
        $this->SetFont('Arial', '', 11);
        $this->Cell(40, 10, 'FIRST NAME:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(0, 10, $employee['firstname'], 1); // Use 0 to take the remaining width
        $this->Ln(); // Move to the next line
    

        // Middle Name
        $this->Cell(40, 40, '', 0); // Empty cell for space     
        $this->SetFont('Arial', '', 11);
        $this->Cell(40, 10, 'MIDDLE NAME:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(0, 10, $employee['middlename'], 1); // Use 0 to take the remaining width
        $this->Ln(); // Move to the next line
    
        // Name Extension
        $this->Cell(40, 40, '', 0); // Empty cell for space     
        $this->SetFont('Arial', '', 11);
        $this->Cell(40, 10, 'NAME EXTENSION:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(0, 10, $employee['name_extension'], 1); // Use 0 to take the remaining width
        $this->Ln(); // Move to the next line
    
        // Additional rows
        $this->SetFont('Arial', '', 11);
        $this->Cell(40, 10, 'Email:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(50, 10, $employee['email_address'], 1);
        $this->SetFont('Arial', '', 11);
        $this->Cell(50, 10, 'Contact No.:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(50, 10, $employee['mobile_no'], 1);
        $this->Ln();
    
        $this->SetFont('Arial', '', 11);
        $this->Cell(40, 10, 'Address:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(150, 10, $employee['address'], 1);
        $this->Ln();
    
        $this->SetFont('Arial', '', 11);
        $this->Cell(40, 10, 'Place of Birth:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(50, 10, $employee['pob'], 1);
        $this->SetFont('Arial', '', 11);
        $this->Cell(50, 10, 'Sex:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(50, 10, $employee['sex'], 1);
        $this->Ln();
    
        $this->SetFont('Arial', '', 11);
        $this->Cell(40, 10, 'Birthday:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(50, 10, $employee['dob'], 1);
        $this->SetFont('Arial', '', 11);
        $this->Cell(50, 10, 'Blood Type:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(50, 10, $employee['blood_type'], 1);
        $this->Ln();
    
        // Government Information Header
        $this->SetFillColor(200, 200, 200);
        $this->Cell(0, 10, 'GOVERNMENT INFORMATION', 1, 1, 'C', true);
        $this->Ln(0);
    
        // Government Information Table
        $this->SetFont('Arial', '', 11);
        $this->Cell(40, 10, 'GSIS NO:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(50, 10, $employee['gsis_no'], 1);
        $this->SetFont('Arial', '', 11);
        $this->Cell(50, 10, 'SSS NO:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(50, 10, $employee['sss_no'], 1);
        $this->Ln();
    
        $this->SetFont('Arial', '', 11);
        $this->Cell(40, 10, 'PHILHEALTH NO:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(50, 10, $employee['philhealth_no'], 1);
        $this->SetFont('Arial', '', 11);
        $this->Cell(50, 10, 'PAG-IBIG NO:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(50, 10, $employee['pag_ibig_no'], 1);
        $this->Ln();
    
        $this->SetFont('Arial', '', 11);
        $this->Cell(40, 10, 'TIN NO:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(50, 10, $employee['tin_no'], 1);
        $this->SetFont('Arial', '', 11);
        $this->Cell(50, 10, 'AGENCY EMPLOYEE NO:', 1);
        $this->SetFont('Arial', 'B', 11);
        $this->Cell(50, 10, $employee['employee_no'], 1);
        $this->Ln();
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
?>