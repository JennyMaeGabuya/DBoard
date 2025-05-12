<?php
require('fpdf/fpdf.php');

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

    function addPosition($x, $y, $name, $title, $imagePath, $connect_to = null)
    {
        $defaultImage = 'img/mk-logo.png';
        $finalImage = (file_exists($imagePath) && !empty($imagePath)) ? $imagePath : $defaultImage;

        $this->Image($finalImage, $x - 10, $y, 20);

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

$start_y = 55;
$x_center = 105;

// Fixed staff data
$staff = [
    'Hon. JANET M. ILAGAN' => [
        'name' => 'Hon. JANET M. ILAGAN',
        'title' => 'MUNICIPAL MAYOR',
        'image' => 'img/Organizational Chart/Janet.png'
    ],
    'GALLY D. TIPAN' => [
        'name' => 'GALLY D. TIPAN',
        'title' => 'MHRMO',
        'image' => 'img/Organizational Chart/Gally.png'
    ],
    'NOEMI T. TIPAN' => [
        'name' => 'NOEMI T. TIPAN',
        'title' => 'ADMIN OFFICER IV',
        'image' => 'img/Organizational Chart/Noemi.png'
    ],
    'GELYN M. KATIMBANG' => [
        'name' => 'GELYN M. KATIMBANG',
        'title' => 'ADMIN OFFICER II',
        'image' => 'img/Organizational Chart/Gelyn.png'
    ],
    'ELMIE H. PANGANIBAN' => [
        'name' => 'ELMIE H. PANGANIBAN',
        'title' => 'ADMIN AIDE VI',
        'image' => 'img/Organizational Chart/Elmie.png'
    ],
    'MARJORIE O. CABRERA' => [
        'name' => 'MARJORIE O. CABRERA',
        'title' => 'ADMIN AIDE IV',
        'image' => 'img/Organizational Chart/Marjorie.png'
    ],
    'LENARD JOSEPH V. ARIOLA' => [
        'name' => 'LENARD JOSEPH V. ARIOLA',
        'title' => 'JOB ORDER',
        'image' => 'img/Organizational Chart/Lenard.png'
    ],
    'GILBERT O. GONZALES' => [
        'name' => 'GILBERT O. GONZALES',
        'title' => 'ADMIN AIDE I',
        'image' => 'img/Organizational Chart/Gilbert.png'
    ]
];

// Chart layout
$positions = [
    ['name' => 'Hon. JANET M. ILAGAN', 'x' => $x_center, 'y' => $start_y],
    ['name' => 'GALLY D. TIPAN', 'x' => $x_center, 'y' => $start_y + 45],
    ['name' => 'NOEMI T. TIPAN', 'x' => $x_center, 'y' => $start_y + 85],
    ['name' => 'GELYN M. KATIMBANG', 'x' => $x_center - 65, 'y' => $start_y + 125],
    ['name' => 'ELMIE H. PANGANIBAN', 'x' => $x_center, 'y' => $start_y + 125],
    ['name' => 'MARJORIE O. CABRERA', 'x' => $x_center + 65, 'y' => $start_y + 125],
    ['name' => 'LENARD JOSEPH V. ARIOLA', 'x' => $x_center - 32.5, 'y' => $start_y + 167],
    ['name' => 'GILBERT O. GONZALES', 'x' => $x_center + 32.5, 'y' => $start_y + 167],
];

// Vertical lines connecting each level
$pdf->Line($x_center, $start_y + 30, $x_center, $start_y + 45);   // Mayor to MHRMO
$pdf->Line($x_center, $start_y + 75, $x_center, $start_y + 85);   // MHRMO to Admin Officer IV
$pdf->Line($x_center, $start_y + 115, $x_center, $start_y + 125); // Admin Officer IV to 3 staff
$pdf->Line($x_center, $start_y + 157, $x_center, $start_y + 167); // Center staff to bottom two

// Horizontal lines connecting grouped staff
$pdf->Line($x_center - 65, $start_y + 125, $x_center + 65, $start_y + 125);   // Connect 3 mid staff
$pdf->Line($x_center - 32.5, $start_y + 167, $x_center + 32.5, $start_y + 167); // Connect bottom 2

// Draw each person
foreach ($positions as $pos) {
    $person = $staff[$pos['name']] ?? ['name' => 'N/A', 'title' => 'N/A', 'image' => ''];
    $pdf->addPosition($pos['x'], $pos['y'], $person['name'], $person['title'], $person['image']);
}

$pdf->Output();
?>