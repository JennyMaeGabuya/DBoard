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

    function addPosition($x, $y, $name, $title, $image, $connect_to = null)
    {
        $profile_image = !empty($image) ? 'img/profile/' . $image : 'img/mk-logo.png';
        $this->Image($profile_image, $x - 10, $y, 20);

        $this->SetXY($x - 30, $y + 20);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(60, 5, $name, 0, 1, 'C');
        $this->SetX($x - 30);
        $this->SetFont('Times', '', 11);
        $this->Cell(60, 5, $title, 0, 1, 'C');

        if ($connect_to !== null) {
            $this->Line($x, $y + 30, $x, $connect_to);
        }
    }
}

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();

// Initial Y position after the header
$start_y = 55;
$x_center = 105;

// Fetch staff data from the database
$query = "SELECT e.firstname, e.middlename, e.lastname, e.name_extension, e.image, e.role 
          FROM employee e where hr_staff = 1
          ORDER BY FIELD(e.role,  'MHRMO','Municipal Mayor' ) DESC";
$result = mysqli_query($con, $query);

$staff = [];
while ($row = mysqli_fetch_assoc($result)) {
    $full_name = $row['firstname'] . ' ' . ($row['middlename'] ? substr($row['middlename'], 0, 1) . '. ' : '') . $row['lastname'];
    if (!empty($row['name_extension'])) {
        $full_name .= ' ' . $row['name_extension'];
    }
    if ($row['role'] == 'Municipal Mayor') {
        $staff[] = [
            'name' => 'Hon. ' . strtoupper($full_name),
            'title' => strtoupper($row['role']),
            'image' => $row['image']
        ];
    } else {
        $staff[] = [
            'name' => strtoupper($full_name),
            'title' => strtoupper($row['role']),
            'image' => $row['image']
        ];
    }
}

// Assign positions dynamically while keeping the same layout
$pdf->addPosition($x_center, $start_y, $staff[0]['name'] ?? 'N/A', $staff[0]['title'] ?? 'MUNICIPAL MAYOR', $staff[0]['image'] ?? '', $start_y + 45);
$pdf->addPosition($x_center, $start_y + 45, $staff[1]['name'] ?? 'N/A', $staff[1]['title'] ?? 'MHRMO', $staff[1]['image'] ?? '', $start_y + 85);
$pdf->addPosition($x_center, $start_y + 85, $staff[2]['name'] ?? 'N/A', $staff[2]['title'] ?? 'ADMIN OFFICER IV', $staff[2]['image'] ?? '', $start_y + 125);

$spacing = 65;
$fourth_positions = [-$spacing, 0, $spacing];
$pdf->Line($x_center - $spacing, $start_y + 125, $x_center + $spacing, $start_y + 125);
for ($i = 0; $i < 3; $i++) {
    $pdf->addPosition($x_center + $fourth_positions[$i], $start_y + 125, $staff[$i + 3]['name'] ?? 'N/A', $staff[$i + 3]['title'] ?? 'N/A', $staff[$i + 3]['image'] ?? '', $start_y + 167);
}

$spacing = 65;
$fifth_positions = [-$spacing / 2, $spacing / 2];
$pdf->Line($x_center - $spacing / 1, $start_y + 167, $x_center + $spacing / 1, $start_y + 167);
for ($i = 0; $i < 2; $i++) {
    $pdf->addPosition($x_center + $fifth_positions[$i], $start_y + 167, $staff[$i + 6]['name'] ?? 'N/A', $staff[$i + 6]['title'] ?? 'N/A', $staff[$i + 6]['image'] ?? '');
}

$pdf->Output();
?>