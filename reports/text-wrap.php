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
        $this->SetFont('Arial', 'B', 12);
        $this->SetTextColor(221, 0, 42);
        $this->Cell(0, 13, 'OFFICE OF THE MUNICIPAL HUMAN RESOURCE MANAGEMENT', 0, 1, 'C');
        $this->SetFont('Arial', 'BI', 16);
        $this->SetTextColor(0, 0, 0);
        $this->Cell(0, 10, 'CERTIFICATE OF EMPLOYMENT AND COMPENSATION', 0, 1, 'C');
        $this->Ln(5);
    }

    function Row($data, $fill = false, $header_colors = [])
    {
        $nb = 0;
        // Calculate the height of the row based on the maximum number of lines in each cell
        for ($i = 0; $i < count($data); $i++) {
            $nb = max($nb, $this->NbLines($this->widths[$i], $data[$i]));
        }
        $h = 6 * $nb; // Adjust row height (6 is the line height)

        $this->CheckPageBreak($h);

        // Draw the cells of the row
        for ($i = 0; $i < count($data); $i++) {
            $w = $this->widths[$i];
            $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            $x = $this->GetX();
            $y = $this->GetY();

            // Apply fill color if specified
            if (isset($header_colors[$i])) {
                $this->SetFillColor($header_colors[$i][0], $header_colors[$i][1], $header_colors[$i][2]);
                $this->Rect($x, $y, $w, $h, 'F'); // Apply the background color fill
            } elseif ($fill) {
                $this->SetFillColor(249, 203, 156); // Default fill color
                $this->Rect($x, $y, $w, $h, 'F');
            }

            // Draw cell border and add content
            $this->Rect($x, $y, $w, $h); // Cell border
            $this->MultiCell($w, 6, $data[$i], 0, $a);
            $this->SetXY($x + $w, $y); // Move cursor after each cell
        }

        $this->Ln($h); // Move to the next row
    }

    function NbLines($w, $txt)
    {
        // Calculate the number of lines needed for the text to fit within a given width
        $cw = &$this->CurrentFont['cw']; // Character widths
        $w = ($w - 2) * 1000 / $this->FontSize; // Adjust width for padding
        $s = str_replace("\r", '', $txt);
        $nb = strlen($s);
        if ($nb > 0 && $s[$nb - 1] == "\n") {
            $nb--;
        }
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
            if ($c == ' ') {
                $sep = $i;
            }
            $l += $cw[$c];
            if ($l > $w) {
                if ($sep == -1) {
                    if ($i == $j) {
                        $i++;
                    }
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

    function CheckPageBreak($h)
    {
        // If the height of the row exceeds the remaining page space, add a new page
        if ($this->GetY() + $h > $this->PageBreakTrigger) {
            $this->AddPage($this->CurOrientation);
        }
    }
}