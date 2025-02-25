<?php
require('fpdf/fpdf.php');
include "dbcon.php";

class PDF extends FPDF
{
    function Header()
    {
        // Municipality Logos
        $this->Image('img/mk-logo.png', 25, 10, 26);
        $this->Image('img/Bagong-Pilipinas.png', 157, 10, 30);
        $this->Ln(3);

        // Header Titles
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 6, 'Republic of the Philippines', 0, 1, 'C');
        $this->Cell(0, 5, 'Province of Batangas', 0, 1, 'C');

        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 7, 'MUNICIPALITY OF MATAASNAKAHOY', 0, 1, 'C');

        $this->Ln(5);
        $this->SetFont('Times', 'B', 13);
        $this->Cell(0, 8, 'Municipal Human Resource Management Office', 0, 1, 'C');

        // Ensure Proper Spacing Before Content
        $this->Ln(15);
    }

    function addPosition($x, $y, $name, $title, $connect_to = null)
    {
        // Profile Picture
        $this->Image('img/mk-logo.png', $x - 10, $y, 20);

        // Name & Title
        $this->SetXY($x - 30, $y + 20);
        $this->SetFont('Times', '', 12);
        $this->Cell(60, 5, $name, 0, 1, 'C');
        $this->SetX($x - 30);
        $this->SetFont('Times', 'B', 11);
        $this->Cell(60, 5, $title, 0, 1, 'C');

        // Draw Connection Line if Required
        if ($connect_to !== null) {
            $this->Line($x, $y + 30, $x, $connect_to);
        }
    }
}

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();

// Initial Y position after the header
$start_y = 55;

// Center X
$x_center = 105;

// Mayor
$pdf->addPosition($x_center, $start_y, 'Hon. JANET M. ILAGAN', 'MUNICIPAL MAYOR', $start_y + 45);

// Second Level (MHRMO)
$pdf->addPosition($x_center, $start_y + 45, 'GALLY D. TIPAN', 'MHRMO', $start_y + 85);

// Third Level (Admin Officer)
$pdf->addPosition($x_center, $start_y + 85, 'NOIME T. TIPAN', 'ADMIN OFFICER IV', $start_y + 125);

// Increase Gap Between Fourth Level Staff
$spacing = 60;
$fourth_positions = [-$spacing, 0, $spacing];
$fourth_names = ['GELYN M. KATIMBANG', 'ELMIE H. PANGANIBAN', 'MARJORIE O. CABRERA SR.'];
$fourth_titles = ['ADMIN OFFICER II', 'ADMIN AIDE VI', 'ADMIN AIDE IV'];

// Horizontal Connection for Fourth Level
$pdf->Line($x_center - $spacing, $start_y + 125, $x_center + $spacing, $start_y + 125);

// Fourth Level (3 persons)
for ($i = 0; $i < 3; $i++) {
    $pdf->addPosition($x_center + $fourth_positions[$i], $start_y + 125, $fourth_names[$i], $fourth_titles[$i], $start_y + 167);
}

// Increase Gap Between Fifth Level Staff
$spacing = 60;
$fifth_positions = [-$spacing / 2, $spacing / 2];
$fifth_names = ['LENARD JOSEPH V. ARIOLA', 'GILBERT O. GONZALES'];
$fifth_titles = ['JOB ORDER', 'ADMIN AIDE I'];

// 🔗 Horizontal Connection for Fifth Level
$pdf->Line($x_center - $spacing / 1, $start_y + 167, $x_center + $spacing / 1, $start_y + 167);

// Fifth Level (2 persons)
for ($i = 0; $i < 2; $i++) {
    $pdf->addPosition($x_center + $fifth_positions[$i], $start_y + 167, $fifth_names[$i], $fifth_titles[$i]);
}

// Output PDF
$pdf->Output();
