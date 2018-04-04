<?php
// header('Content-type: application/pdf');
// header('Content-Disposition: attachment; filename="' . basename($filename) . '"');
// header('Content-Transfer-Encoding: binary');
// readfile($filename);


require 'fpdf/fpdf.php';

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

$pdf->Rect(5,5,200,288,D);
$pdf->Rect(153,14.3,42,48,D);
$pdf->Image('images/abc.png',155,16,38,44,'PNG');
$pdf->SetFont("Arial","",16);
$pdf->Ln(5);
$pdf->Cell(0,10,"Details",0,1,C);
$pdf->Ln(10);
$pdf->Cell(0,10,"Full Name:     a",0,1,'');


$pdf->Ln(8);
$pdf->Cell(0,10,"Mobile No:     a",0,1);
$pdf->Ln(8);
$pdf->Cell(0,10,"Email Id:        a",0,1);
$pdf->Ln(8);
//$pdf->Ln(20);
$pdf->Cell(0,10,"Marks:",0,1,'');
$pdf->Ln(1);
$pdf->Cell(0,10,"Marks",1,1,C);

$pdf->Cell(150,10,"English",1,0);
$pdf->Cell(40,10,"90",1,1,C);

$pdf->Cell(150,10,"Math",1,0);
$pdf->Cell(40,10,"80",1,1,C);

$pdf->output(F,"images/doc.pdf");
// $pdf->output(D);
$pdf->output(D,'resume.pdf');
$pdf->output();
//$pdf->output("tokens.pdf","D");

