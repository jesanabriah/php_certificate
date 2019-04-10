<?php
use setasign\Fpdi\Fpdi;

require_once('fpdf/fpdf.php');
require_once('fpdi2/src/autoload.php');

$width_page = 279.4;//mm
$height_page = 215.9;//mm

$width_name = 150;//mm
$height_name = 10;//mm

// initiate FPDI
$pdf = new Fpdi();
// add a page
$pdf->AddPage();
// set the source file
$pdf->setSourceFile('certificate.pdf');
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at position 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, ['adjustPageSize' => true]);

// now write some text above the imported page
//$pdf->SetFont('Helvetica');
$pdf->SetFont('Arial','B',16);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY($width_page/2 - $width_name/2, $height_page/2);//x, y
$pdf->Cell($width_name, $height_name, 'JORGE ELIECER SANABRIA HERNANDEZ', 0, 1, 'C');//w, h
$pdf->Output();
