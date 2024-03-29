<?php
require('./fpdf.php');



class PDF extends FPDF
{
// Page header
function Header()
{

    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(40,10,'Datos y horario',0,0,'C');
    // Line break
    $this->Ln(20);
    $this->cell(40,10, 'Cedula:',0,0,'C',0);
     $this->cell(40,10, 'Nombre:',0,0,'C',0);
     $this->cell(40,10,  'Apellido:',0,1,'C',0);

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
include '../include/ver.php';
$resultado;


$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
foreach($resultado as $fila){
    $pdf->cell(40,10,  $fila['cedula'],0,0,'C',0);
     $pdf->cell(40,10,  $fila['nombre'],0,0,'C',0);
     $pdf->cell(40,10,  $fila['apellido'],0,1,'C',0);

}
$pdf->Output();



?>