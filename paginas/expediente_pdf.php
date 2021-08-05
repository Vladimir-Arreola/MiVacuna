<?php

$idSolicitud = $_GET["id"];

require_once "conexion.php";
require('../fpdf/fpdf.php');

$sql = "SELECT S.id_solicitud, P.curp, E.nombre_estado, M.nombre_municipio, S.cp, S.telefono, S.telefono_dos, S.email, S.email_dos FROM solicitud S INNER JOIN estados E on S.id_estado = E.id_estado INNER JOIN personas P on S.id_persona = P.id_persona INNER JOIN municipios M on S.id_municipio = M.id_municipio WHERE S.id_solicitud=" .$idSolicitud;

$resultado = $conn->query($sql);
$rows = $resultado->fetchAll();

class PDF extends FPDF
{
// Cabecera de página
function Header()
{

    // Arial bold 15
    $this->SetFont('Arial','B',18);
    // Movernos a la derecha
    $this->Cell(55);
    // Título
    $this->Cell(80,10,utf8_decode('Solicitud de vacunación'),0,0,'C');
    // Salto de línea
    $this->Ln(30);
    $this->Image('../img/gmx.png',80,22,50);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Gobierno de México').$this->PageNo().'/{nb}',0,0,'C');
}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',14);

foreach($rows as $row){
    $pdf->Cell(90, 10, "Num. de Folio: " . $row['id_solicitud'], 0, 1, 'L', 0);
    $pdf->Cell(90, 10, "CURP: " . $row['curp'], 0, 1, 'L', 0);
    $pdf->Cell(90, 10, "Estado: " . $row['nombre_estado'], 0, 1, 'L', 0);
    $pdf->Cell(90, 10, "Municipio: " . $row['nombre_municipio'], 0, 1, 'L', 0);
    $pdf->Cell(90, 10, "CP: " . $row['cp'], 0, 1, 'L', 0);
    $pdf->Cell(90, 10, "Telefono: " . $row['telefono'], 0, 1, 'L', 0);
    $pdf->Cell(90, 10, "Telefono de apoyo: " . $row['telefono_dos'], 0, 1, 'L', 0);
    $pdf->Cell(90, 10, "Email: " . $row['email'], 0, 1, 'L', 0);
    $pdf->Cell(90, 10, "Email de apoyo: " . $row['email_dos'], 0, 1, 'L', 0);
}

$pdf->Output();

?>