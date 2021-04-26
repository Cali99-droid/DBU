<?php
require('rep/fpdf/fpdf.php');


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('C:\wamp64\www\Proyectos\DBU\public\img\Cabecera.jpg',0,0,220,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(80,55,utf8_decode('Reporte Psicológico'),0,0,'C');
    $this->Cell(1,10,utf8_decode(''),0,1,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}


$psi_controller = new PsiController();
$psi = $psi_controller->get($_POST['idpsicologia']); 
//$dni = $_POST['dni_per'];




$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);

$pdf->Cell(22,10,utf8_decode('Paciente:'),0,0,'L',0);
$pdf->Cell(40,10,utf8_decode($psi[0]['Paciente']),0,0,'L',0);

$pdf->Cell(90,10,utf8_decode('Fecha:'),0,0,'R',0);
$pdf->Cell(30,10,utf8_decode($psi[0]['fecha']),0,1,'R',0);

$pdf->Cell(22,10,utf8_decode('Estado:'),0,0,'L',0);
$pdf->Cell(40,10,utf8_decode($psi[0]['estado_psi']),0,0,'L',0);



$pdf->Cell(40,10,utf8_decode($psi[0]['diagnostico']),0,1,'C',0);
$pdf->Cell(40,10,utf8_decode($psi[0]['tratamiento'],),0,1,'C',0);
$pdf->Cell(40,10,utf8_decode( $psi[0]['idpsicologia']),0,1,'C',0);
//$pdf->Cell(40,10,utf8_decode($dni));
$pdf->Output();
?>