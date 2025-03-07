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

// Fetch the employee details
$query = "SELECT e.employee_no, e.firstname, e.lastname, e.middlename, e.name_extension, 
e.dob, s.from_date, s.to_date, s.designation, s.status, s.salary, s.station_place, 
s.branch, s.abs_wo_pay, s.date_separated, s.cause_of_separation 
FROM employee e 
JOIN service_records s ON e.employee_no = s.employee_no 
WHERE e.employee_no = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();

if (!$employee) {
    $_SESSION['display'] = 'No service record found';
    $_SESSION['title'] = 'Something went wrong';
    $_SESSION['success'] = 'error';
    header("Location: " . $_SERVER['HTTP_REFERER']);
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

    function Row($data)
    {
        $nb = 0;
        for ($i = 0; $i < count($data); $i++) {
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        }
        $h = 5 * $nb;
        $this->CheckPageBreak($h);
        
        $x = $this->GetX();
        $y = $this->GetY();
        
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'C';
    
            // Draw cell borders but exclude leftmost and rightmost borders of the table
            if ($i > 0) { 
                $this->Line($x, $y, $x, $y + $h); 
            }
            if ($i < count($data) - 1) { 
                $this->Line($x + $w, $y, $x + $w, $y + $h); 
            }
    
            // Draw top and bottom borders for all columns
            $this->Line($x, $y, $x + $w, $y); // Top border
            $this->Line($x, $y + $h, $x + $w, $y + $h); // Bottom border
            
            // Print cell content
            $this->MultiCell($w, 5, $data[$i], 0, $a);
            
            // Move to the next column
            $x += $w;
            $this->SetXY($x, $y);
        }
        
        $this->Ln($h);
    }
    

    function CheckPageBreak($h)
    {
        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage($this->CurOrientation);
        }
    }

    function NbLines($w, $txt)
    {
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0) $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 && $s[$nb - 1] == "\n") $nb--;
        $sep = -1;
        $i = 0;
        $j = 0;
        $l = 0;
        $nl = 1;
        while ($i < $nb) {
            $c = $s[$i];
            if ($c == "\n") {
                $i++;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
                continue;
            }
            if ($c == ' ') $sep = $i;
            $l += $cw[$c];
            if ($l > $wmax) {
                if ($sep == -1) {
                    if ($i == $j) $i++;
                } else {
                    $i = $sep + 1;
                }
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else {
                $i++;
            }
        }
        return $nl;
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
        $this->SetFont('Times', '', 11);
        $name = strtoupper($employee['lastname']) . ', ' . strtoupper($employee['firstname']) . ' ' . strtoupper($employee['middlename']) . ' ' . strtoupper($employee['name_extension']);

        $this->Cell(40, 10, 'NAME:  ' . $name, 0);
        $this->SetXY(107, $this->GetY());
        $this->MultiCell(0, 10, '(If married woman, give also maiden name)', 0, 'J');

        $dob = $employee['dob'];
        $date = new DateTime($dob);
        $birthday = $date->format('F j, Y');

        $this->Cell(40, 8, 'BIRTHDATE:  ' . $birthday, 0);
        $this->SetXY(107, $this->GetY());
        $this->MultiCell(0, 5, '(Date herein should be checked from birth or baptismal certificate or some other reliable documents)', 0, 'J');
        $this->Ln(5);

        $this->SetFont('Times', '', 11);
        $this->MultiCell(0, 5, "This is to certify that the employee named herein above actually rendered services in the office as shown by the service record below, each line of which is supported by the appointment and other papers actually issued by this office and approved by the authorities concerned.", 0, 'J');
        $this->Ln(2);

        // Table Header
        $this->SetFont('Times', '', 9);
        $this->Cell(34, 7, 'SERVICE', 'TRB',  0, 'C');
        $this->Cell(59, 7, 'RECORD OF APPOINTMENT', 1, 0, 'C');
        $this->Cell(57, 7, 'OFFICE/ENTITY/DIVISION', 1, 0, 'C');
        $this->Cell(37, 7, 'SEPARATION', 'TBL', 0,  'C');
        $this->Ln(7);
        $this->Cell(34, 7, 'Inclusive Date', 'TRB',  0, 'C');
        $this->Cell(21, 7, '', 1, 0, 'C');
        $this->Cell(18, 7, '', 1, 0, 'C');
        $this->Cell(20, 7, '', 1, 0, 'C');
        $this->Cell(20, 7, '', 1, 0, 'C');
        $this->Cell(20, 7, '', 1, 0, 'C');
        $this->Cell(17, 7, '', 1, 0, 'C');
        $this->Cell(17, 7, '', 1, 0, 'C');
        $this->Cell(20, 7, '', 'TBL',  0, 'C');
        $this->Ln(7);
        $this->SetWidths([17, 17, 21, 18, 20, 20, 20, 17, 17, 20]);
        $this->Row(['From', 'To', 'Designation', 'Status', 'Station', 'Salary', 'Branch', 'Abs. W/o Pay', 'Date', 'Cause']);

        $this->SetFont('Times', '', 9);
        $stmt = $con->prepare("SELECT * FROM service_records WHERE employee_no = ?");
        $stmt->bind_param("s", $employee['employee_no']);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $this->Row([
                !empty($row['from_date']) ? date('F j, Y', strtotime($row['from_date'])) : '',
                !empty($row['to_date']) ? date('F j, Y', strtotime($row['to_date'])) : '',
                $row['designation'],
                $row['status'],
                $row['station_place'],
                number_format($row['salary'], 2),
                $row['branch'],
                $row['abs_wo_pay'],
                !empty($row['date_separated']) ? date('F j, Y', strtotime($row['date_separated'])) : '',
                $row['cause_of_separation']
            ]);
        }
    }
}

$pdf = new PDF_MC_Table('P', 'mm', 'A4');
$pdf->AddPage();
$pdf->CreateTable($employee, $con);
$pdf->Output();
?>
