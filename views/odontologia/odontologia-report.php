<?php
require('rep/fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo

    $this->Image('C:\wamp64\www\Proyectos\DBU\public\img\Cabecera.jpg',0,0,220,45,'');
    $this->Ln(40);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(40);
    // Título
    $this->SetTextColor(37,71,106);
    $this->write(5,utf8_decode('Dirección de Bienestar Universitario'));
    $this->Ln(10);
    $this->SetFont('Arial','B',15);
    $this->Cell(75);
    $this->SetTextColor(37,71,106);
    $this->write(5,utf8_decode('Reporte Odontológico'));
    // Salto de línea
    $this->Ln(15);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    $this->Cell(75);
    $this->write(5,utf8_decode('Area Odontológica - UNASAM'));
    $this->Ln(5);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}


$odon_controller = new OdonController();
$odon = $odon_controller->get($_POST['idodontologo']);
 
//$dni = $_POST['dni_per'];




$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetTitle(utf8_decode('Reporte Odontológico-'.$odon[0]['dni_per']));

$pdf->SetFont('Arial','B',11);
$pdf->write(5,utf8_decode('Paciente: '));
$pdf->SetFont('Arial','',11);
$pdf->write(5,utf8_decode($odon[0]['Paciente']));

$pdf->SetX(-55);
$pdf->SetFont('Arial','B',11);
$pdf->write(5,utf8_decode('Fecha:'),);
$pdf->SetX(-40);
$pdf->SetFont('Arial','',11);
$pdf->write(5,utf8_decode($odon[0]['fecha']));
$pdf->Ln(5);
$pdf->SetFont('Arial','B',11);
$pdf->write(5,utf8_decode('DNI: '));
$pdf->SetFont('Arial','',11);
$pdf->write(5,utf8_decode($odon[0]['dni_per']));

$pdf->Ln(8);

$pdf->SetFont('Arial','B',11);
$pdf->write(5,utf8_decode('Escuela: '));
$pdf->SetFont('Arial','',11);
$pdf->write(5,utf8_decode($odon[0]['escuela']));
$pdf->Ln(5);

$pdf->SetFont('Arial','B',11);
$pdf->write(5,utf8_decode('Facultad: '));
$pdf->SetFont('Arial','',11);
$pdf->write(5,utf8_decode($odon[0]['facultad']));
$pdf->Ln(15);

$pdf->SetFillColor(23,45,67);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,10,utf8_decode('Datos Bucales'),1,0,'L',0);
$pdf->SetFont('Arial','B',11);
$pdf->Ln(10);
$pdf->Cell(36,10,utf8_decode('Labios'),1,0,'L',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,10,utf8_decode($odon[0]['labios']),1,0,'L',0);
$pdf->Ln(10);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(36,10,utf8_decode('Carrillos'),1,0,'L',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,10,utf8_decode($odon[0]['carrillos']),1,0,'L',0);
$pdf->Ln(10);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(36,10,utf8_decode('Encias'),1,0,'L',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,10,utf8_decode($odon[0]['encias']),1,0,'L',0);
$pdf->Ln(10);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(36,10,utf8_decode('Paladar'),1,0,'L',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,10,utf8_decode($odon[0]['paladar']),1,0,'L',0);
$pdf->Ln(10);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(36,10,utf8_decode('Piso Boca'),1,0,'L',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,10,utf8_decode($odon[0]['piso_boca']),1,0,'L',0);
$pdf->Ln(10);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(36,10,utf8_decode('Zona Retromoral'),1,0,'L',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,10,utf8_decode($odon[0]['zona_retromoral']),1,0,'L',0);
$pdf->Ln(10);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(36,10,utf8_decode('Orofaringe'),1,0,'L',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,10,utf8_decode($odon[0]['oro_faringe']),1,0,'L',0);
$pdf->Ln(10);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(36,10,utf8_decode('ATM'),1,0,'L',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,10,utf8_decode($odon[0]['atm']),1,0,'L',0);
$pdf->Ln(10);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(36,10,utf8_decode('Otros'),1,0,'L',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,10,utf8_decode($odon[0]['otros']),1,0,'L',0);
$pdf->Ln(10);

$pdf->AddPage();

$pdf->SetFont('Arial','B',11);
$pdf->Cell(0,10,utf8_decode('Análisis Odontológico'),1,0,'L',0);
$pdf->SetFont('Arial','B',11);
$pdf->Ln(10);


$pdf->SetFont('Arial','B',11);
$pdf->Cell(40,20,utf8_decode('Diagnóstico'),1,0,'L',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,20,utf8_decode($odon[0]['diagnostico']),1,0,'L',0);
$pdf->Ln(20);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(40,20,utf8_decode('Tratamiento'),1,0,'L',0);
$pdf->SetFont('Arial','',11);
$pdf->Cell(0,20,utf8_decode($odon[0]['tratamiento']),1,0,'L',0);
$pdf->Ln(40);


$pdf->SetFont('Arial','I',8);
    $pdf->Cell(120);
    $pdf->write(5,utf8_decode('---------------------------------------------------'));
    $pdf->Ln(5);
    $pdf->Cell(128);
    $pdf->write(5,utf8_decode('Odon. '));
    $pdf->write(5,utf8_decode($_SESSION['nombre']));
    $pdf->Ln(5);




//$pdf->Cell(40,10,utf8_decode($dni));
$pdf->Output('I', 'Reporte Odontologico_'.$odon[0]['dni_per'].'.pdf');
?>