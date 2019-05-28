<?php
require('../lib/fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Move to the right
    $this->Cell(50);
    // Title
    $this->Cell(90,20,'RS AUTOWERKPLAATS',1,0,'C');
    // Line break
    $this->Ln(30);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetFontSize(22);

$pdf->Cell(0,10,'Overeenkomst',0,1, "C");

$pdf->SetFontSize(18);

$pdf->Ln(15);

$pdf->Cell(0,10,'Verhuurder',0,1);

$pdf->SetFontSize(14);
$pdf->Cell(0,10,'RS AUTOVERHUUR',0,1);
$pdf->Cell(0,10,'Telefoon: +597 8458112',0,1);
$pdf->Cell(0,10,'Adres: Jaggernath lachmonstraat 55',0,1);

$pdf->Ln(15);

$pdf->SetFontSize(18);

$pdf->Cell(0,10,'Huurder',0,1);

$pdf->SetFontSize(14);
$pdf->Cell(0,10,'Naam: Shaniel Samadhan',0,1);
$pdf->Cell(0,10,'Telefoon: +597 8958112',0,1);
$pdf->Cell(0,10,'Adres: Vierkinderenweg 16',0,1);

$pdf->Ln(15);
$pdf->Cell(0,10,'Handtekenening Verhuurder:',0,1);
$pdf->Ln(20);
$pdf->Cell(0,10,'Handtekenening Huurder:',0,1);

$pdf->Output();
?>