<?php

/**
 * @author Jorge Sanabria jesanabriah@correo.udistrital.edu.co
 * Grupo Linux de la universidad Distrital (GLUD)
 */
  
use setasign\Fpdi\Fpdi;

require_once('fpdf/fpdf.php');
require_once('fpdi2/src/autoload.php');

//get certificate for $name
function getCertificate($name) {

  //Letter size
  $width_page = 279.4;//mm
  $height_page = 215.9;//mm

  //Name max size
  $width_name = 150;//mm
  $height_name = 10;//mm

  // initiate FPDI
  $pdf = new Fpdi();
  // add a page
  $pdf->AddPage();
  // set the source file
  $pdf->setSourceFile('template.pdf');
  // import page 1
  $tplIdx = $pdf->importPage(1);
  // use the imported page and place it at position 10,10 with a width of 100 mm
  $pdf->useTemplate($tplIdx, ['adjustPageSize' => true]);

  // now write some text above the imported page
  $pdf->SetFont('Courier', 'B', 20);
  $pdf->SetTextColor(0, 0, 0);
  $pdf->SetXY($width_page/2 - $width_name/2, $height_page/2);//x, y
  $pdf->Cell($width_name, $height_name, $name, 0, 1, 'C');//w, h
  $pdf->Output();
}
