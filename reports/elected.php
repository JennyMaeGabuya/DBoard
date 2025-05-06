<?php
require('../fpdf/fpdf.php');
include('../dbcon.php');

// Ensure an ID is provided
$certificate_id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$certificate_id) {
    die("Error: No certificate selected for generation.");
}

// Fetch the issued certificate details from the `appointed_cert_issuance` table
$query = "SELECT * FROM elected_cert_issuance WHERE id = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $certificate_id);
$stmt->execute();
$result = $stmt->get_result();
$certificate = $result->fetch_assoc();

if (!$certificate) {
    die("Error: No certificate found.");
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
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(221, 0, 42);
        $this->Cell(0, 13, 'OFFICE OF THE MUNICIPAL HUMAN RESOURCE MANAGEMENT', 0, 1, 'C');
        $this->SetFont('Arial', 'BI', 16);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 10, 'CERTIFICATE OF EMPLOYMENT AND COMPENSATION', 0, 1, 'C');
        $this->Ln(5);
    }

    // Add DashedRow function
    function AddDashedRow($label, $amount)
    {
        // Set font
        $this->SetFont('Times', '', 12);

        // Save current position
        $startX = $this->GetX();
        $startY = $this->GetY();

        // Left margin and label (supports wrapping)
        $this->Cell(10); // Indent from the left
        $labelWidth = 70; // Width allocated for label
        $this->MultiCell($labelWidth, 5, $label, 0, 'L');

        // Determine new Y position after label wraps
        $newY = $this->GetY();

        // Set X position for the dashed line (right after wrapped label)
        $this->SetXY($startX + $labelWidth + 10, $startY);

        // Calculate remaining space for dashes
        $dashStartX = $this->GetX();
        $dashEndX = 130; // Fixed position before amount
        while ($dashStartX < $dashEndX) {
            $this->Cell(2, 5, '-', 0, 0, 'C');
            $dashStartX = $this->GetX();
        }

        // Move to the correct position for the amount
        $this->SetXY($dashEndX, $startY);

        // Add amount, right-aligned
        $this->Cell(40, 5, $amount, 0, 1, 'R');

        // Ensure the next row starts from the lowest Y position (to avoid overlap)
        $this->SetY(max($newY, $this->GetY()));
    }

    function Footer()
{
    $this->SetY(-30); // Adjust vertical position as needed

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

// Certificate Details
$pdf->Ln(5);
$pdf->Cell(10);
$pdf->Cell(0, 10, 'TO WHOM IT MAY CONCERN:', 0, 1, 'L');

$pdf->Cell(10);
$pdf->MultiCell(0, 5, 'THIS IS TO CERTIFY that as per records available in this office, ' .
    $certificate['fullname'] . ' was duly elected as a member of the '
    . $certificate['position'] . ' on ' .
    date("F d, Y", strtotime($certificate['start_date'])) .
    ' to present for National and Local election. Their annual compensation is as follows:', 0, 'J');

$pdf->Ln(7);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(20);
$pdf->AddDashedRow('Salary', 'P ' . number_format($certificate['salary'], 2));

$pdf->Cell(20);
$pdf->AddDashedRow('PERA', '' . number_format($certificate['pera'], 2));

$pdf->Cell(20);
$pdf->AddDashedRow('Representation and Transportation Allowance', '' . number_format($certificate['rta'], 2));

$pdf->Cell(20);
$pdf->AddDashedRow('Clothing', '' . number_format($certificate['clothing'], 2));

$pdf->Cell(20);
$pdf->AddDashedRow('Mid-Year Bonus', '' . number_format($certificate['mid_year_bonus'], 2));

$pdf->Cell(20);
$pdf->AddDashedRow('Year-End Bonus', '' . number_format($certificate['year_end_bonus'], 2));

$pdf->Cell(20);
$pdf->AddDashedRow('Cash Gift', '' . number_format($certificate['cash_gift'], 2));

$pdf->Cell(20);
$pdf->AddDashedRow('Productivity Enhancement Incentive', '' . number_format($certificate['productivity_enhancement'], 2));

// Add a Single Underline for the Subtotal
$pdf->Cell(130);
$pdf->Cell(30, 1, '', 'T', 1, 'R');

$pdf->Ln(1);
// Add Total (with Double Underline)
$pdf->Cell(30);
$pdf->SetFont('Times', 'B', 12);
$pdf->Cell(90, 5, 'TOTAL', 0, 0, 'L');

$total = $certificate['salary'] + $certificate['pera'] + $certificate['rta'] + $certificate['clothing'] +
    $certificate['mid_year_bonus'] + $certificate['year_end_bonus'] + $certificate['cash_gift'] +
    $certificate['productivity_enhancement'];

$pdf->Cell(40, 5, 'P ' . number_format($total, 2), 0, 1, 'R');

// Double Underline for Total
$pdf->Cell(130);
$pdf->Cell(30, 1, '', 'T', 1, 'R');
$pdf->Cell(130);
$pdf->Cell(30, 1, '', 'T', 1, 'R');

$pdf->Ln(10);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(10);
$salutation = ($certificate['sex'] === 'Male') ? 'Mr.' : 'Ms.';

$pdf->MultiCell(0, 5, 'Issued this ' . date("jS \of F Y") .
    ' upon request of ' . $salutation . ' ' . ($certificate['lastname']) .
    ' for whatever purpose it may lawfully serve.', 0, 'J');

$pdf->Ln(20);
$pdf->Cell(10);
$pdf->SetFont('Times', 'B', 12);
$pdf->MultiCell(0, 5, 'GALLY D. TIPAN', 0, 'J');
$pdf->Cell(10);
$pdf->SetFont('Times', '', 12);
$pdf->MultiCell(0, 5, 'Mun. Human Res. Mgt. Officer', 0, 'J');

$pdf->Output();
