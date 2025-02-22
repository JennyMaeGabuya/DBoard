<?php
require('../fpdf/fpdf.php');
include('dbcon.php');

// Create new class extending fpdf class for multi-cell tables
class PDF_MC_Table extends FPDF
{
    var $widths;
    var $aligns;
    var $lineHeight;

    function SetWidths($w)
    {
        $this->widths = $w;
    }

    function SetAligns($a)
    {
        $this->aligns = $a;
    }

    function SetLineHeight($h)
    {
        $this->lineHeight = $h;
    }

    function Row($data, $fill = false)
    {
        $nb = 0;
        for ($i = 0; $i < count($data); $i++) {
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        }
        $h = $this->lineHeight * $nb;
        $this->CheckPageBreak($h);
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            $x = $this->GetX();
            $y = $this->GetY();
            $this->Rect($x, $y, $w, $h);
            $this->MultiCell($w, $this->lineHeight, $data[$i], 0, $a);
            $this->SetXY($x + $w, $y);
        }
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        if ($this->GetY() + $h > $this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
    }

    function NbLines($w, $txt)
    {
        $cw = &$this->CurrentFont['cw'];
        if ($w == 0) $w = $this->w - $this->rMargin - $this->x;
        $wmax = ($w - 2 * $this->cMargin) * 1000 / $this->FontSize;
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 and $s[$nb - 1] == "\n") $nb--;
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
                } else $i = $sep + 1;
                $sep = -1;
                $j = $i;
                $l = 0;
                $nl++;
            } else $i++;
        }
        return $nl;
    }
}

class PDF extends PDF_MC_Table
{
    private $fyAdded = false;
    function Header()
    {
        // Insert the logo image with specific positioning and size
        $this->Image('../img/mk-logo.png', 32, 17, 26);

        // Insert the logo image with specific positioning and size
        $this->Image('../img/Bagong-Pilipinas.png', 157, 18, 30);

        $this->Ln(5);
        // Set font and size for the first line
        $this->SetFont('Arial', '', 12);
        // Adjust spacing before the text
        $this->Cell(10); // Horizontal space
        $this->Cell(0, 10, 'Republic of the Philippines', 0, 1, 'C');

        // Set font and size for the second line
        $this->SetFont('Arial', '', 12);
        // Adjust spacing before the text
        $this->Cell(10); // Horizontal space
        $this->Cell(0, 0.5, 'Province of Batangas', 0, 1, 'C');

        // Set font and color for the third line
        $this->SetFont('Arial', 'B', 12);
        // Adjust spacing before the text
        $this->Cell(10); // Horizontal space
        $this->Cell(0, 10, 'MUNICIPALITY OF MATAASNAKAHOY', 0, 1, 'C');

        // Set font and size for the fourth line
        $this->SetFont('Arial', '', 11);
        $this->SetTextColor(0, 0, 0);
        // Adjust spacing before the text
        $this->Cell(10); // Horizontal space
        $this->Cell(0, 0.5, 'Tel. No.: (043) 784-1088', 0, 1, 'C');

        // Set font and size for the fifth line
        $this->SetFont('Arial', 'B', 12);
        // Adjust spacing before the text
        $this->Cell(10); // Horizontal space
        $this->Cell(0, 10, 'hrmo_lgumataasnakahoy@yahoo.com', 0, 1, 'C');

        // Set font and color for the eighth line
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(221, 0, 42);
        // Adjust the horizontal space (X position) to add margin
        $this->Cell(8); // Adds space/margin to the left
        $this->Cell(0, 13, 'OFFICE OF THE MUNICIPAL HUMAN RESOURCE MANAGEMENT', 0, 1, 'C');

        // Set font and color for the eighth line
        $this->SetFont('Arial', 'BI', 16);
        $this->SetTextColor(0, 0, 0);
        // Adjust the horizontal space (X position) to add margin
        $this->Cell(8); // Adds space/margin to the left
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

    // DisplayText function
    function DisplayText($data)
    {
        $this->SetFont('Times', '', 12); // Set font
        $this->SetY(75); // Adjust starting position

        // Title
        $this->Cell(10);
        $this->Cell(0, 10, 'TO WHOM IT MAY CONCERN:', 0, 1, 'L');

        $this->Cell(10);

        // Justified text with bold inline formatting
        $this->SetFont('Times', '', 12);
        $text1 = 'THIS IS TO CERTIFY that per records available in this office ';
        $text2 = 'Hon. Atty. ROWELL B. MALABAG';
        $text3 = ' was duly elected as a member of the Sangguniang Bayan on July 1, 2022, to present for National and Local election. His annual compensation is as follows:';

        // Combine text with inline bold formatting
        $this->MultiCell(0, 5, $text1 . $this->SetFont('Times', 'B', 12) . $text2 . $this->SetFont('Times', '', 12) . $text3, 0, 'J');

        $this->Ln(7);
        $this->Cell(20);
        $this->AddDashedRow('Salary', 'P 847,188.00');
        $this->Cell(20);
        $this->AddDashedRow('PERA', '24,000.00');
        $this->Cell(20);
        $this->AddDashedRow('Representation and Transportation Allowance', '153,000.00', 0, 'J');
        $this->Cell(20);
        $this->AddDashedRow('Clothing', '7,000.00');
        $this->Cell(20);
        $this->AddDashedRow('Mid-Year Bonus', '70,599.00');
        $this->Cell(20);
        $this->AddDashedRow('Year-End Bonus', '70,599.00');
        $this->Cell(20);
        $this->AddDashedRow('Cash Gift', '5,000.00');
        $this->Cell(20);
        $this->AddDashedRow('Productivity Enhancement Incentive', '5,000.00');

        // Add a Single Underline for the Subtotal
        $this->Cell(130);
        $this->Cell(30, 1, '', 'T', 1, 'R');

        $this->Ln(1);
        // Add Total (with Double Underline)
        $this->Cell(30);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(90, 5, 'TOTAL', 0, 0, 'L');
        $this->Cell(40, 5, 'P 1,182,386.00', 0, 1, 'R');

        // Double Underline for Total
        $this->Cell(130);
        $this->Cell(30, 1, '', 'T', 1, 'R');
        $this->Cell(130);
        $this->Cell(30, 1, '', 'T', 1, 'R');

        $this->Ln(10);
        $this->SetFont('Times', '', 12);
        // Closing statement
        $this->Cell(10);
        $this->MultiCell(0, 5, 'Issued this 30th day of January 2025 upon request of Hon. Malabag for whatever purpose it may lawfully serve.', 0, 'J');

        $this->Ln(20);
        // Signature
        $this->Cell(10);
        $this->SetFont('TImes', 'B', 12);
        $this->MultiCell(0, 5, 'GALLY D. TIPAN', 0, 'J');
        $this->Cell(10);
        $this->SetFont('Times', '', 12);
        $this->MultiCell(0, 5, 'Mun. Human Res. Mgt. Officer', 0, 'J');
    }

    function Footer()
    {
        // Set the position at 13mm from the bottom
        $this->SetY(-13);

        // Add the image
        $this->Image('../img/JMi.png', 15, 240, 185);
    }
}

// Determine the action based on the URL parameter
$action = isset($_GET['action']) ? $_GET['action'] : '';

$pdf = new PDF('P', 'mm', 'A4');
$pdf->AddPage();

$pdf->DisplayText([]);

// Handle the action
if ($action === 'download') {
    // Output the PDF as a download
    $pdf->Output('D', 'CoEC-elected.pdf');
} else {
    // Default output to the browser
    $pdf->Output();
}
