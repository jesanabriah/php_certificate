<?php

/**
 *  Php_certificate
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *  Copyright (2019) Jorge Eliécer Sanabria Hernández
 *
 *  e-mail: jesanabriah@gmail.com
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
