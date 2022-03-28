<?php
$peticionAjax = true;
if ($peticionAjax) {
    require_once "../modelo/reporteria.modelo.php";
} else {
    require_once "./modelo/reporteria.modelo.php";
}
require_once "../vista/lib/fpdf/fpdf.php";
class ReporteriaControlador extends ReporteriaModelo
{
    public static function CtrReporteriaPaciente()
    {
        $respuesta = ReporteriaModelo::MdlReporteriaPaciente();
        return $respuesta;
    }
}



class PDF extends FPDF
{
    //Cabecera de página
    function Header()
    {
        $imgurl = "http://localhost/Gestion_clinica/vista/img/logo.png";
        //Logo
        $this->Image($imgurl, 20, 8, 30, 20, "PNG");
        //Arial bold 15
        $this->SetFont('helvetica', 'B', 15);
        //Movernos a la derecha
        $this->Cell(80);
        //Título
        $this->Cell(60, 10, 'Reporteria de Pacientes', 0, 0, 'C');
        //Salto de línea
        $this->Ln(20);
    }

    //Pie de página
    function Footer()
    {
        //Posición: a 1,5 cm del final
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial', 'I', 5);
        //Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
$pac = ReporteriaControlador::CtrReporteriaPaciente();
$tamano = 185;
$pdf = new PDF();
//Títulos de las columnas

$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
foreach ($pac as $key => $value) {
    $pdf->SetY(30);
    $pdf->SetFillColor(96, 235, 113);
    $pdf->SetFont('helvetica', 'B', 24);
    $pdf->Cell(185, 15, "Paciente", 1, 0, 'C', true);
    $pdf->Line(0, 35, 0, 35);
    $pdf->Rect(30, 30, 0, 0);
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->Ln();
    $pdf->Cell($tamano, 10, "Nombres: " . $value['pac_nombre'], 'LR', 0, 'L', false);
    $pdf->Ln();
    $pdf->Cell($tamano, 10, "Apellidos: " . $value['pac_apellido'], 'LR', 0, 'L', false);
    $pdf->Ln();
    $pdf->Cell($tamano, 10, "Identificacion: " . $value['pac_num_documento'], 'LR', 0, 'L', false);
    $pdf->Ln();
    if ($value['pac_sexo'] == 1) {
        $pdf->Cell($tamano, 10, "Sexo: " . "Masculino", 'LR', 0, 'L', false);
    } else {
        $pdf->Cell($tamano, 10, "Sexo: " . "Femenino", 'LR', 0, 'L', false);
    }
    $pdf->Ln();
    $pdf->Cell($tamano, 10, "Fecha de nacimiento: " . $value['pac_fecha_nacimiento'], 'LR', 0, 'L', false);
    $pdf->Ln();
    $pdf->Cell($tamano, 10, "Telefono: " . $value['pac_telefono'], 'LR', 0, 'L', false);
    $pdf->Ln();
    $pdf->Cell($tamano, 10, "Correo: " . $value['pac_email'], 'LR', 0, 'L', false);
    $pdf->Ln();
    $pdf->Cell($tamano, 10, "Direccion: " . $value['pac_direccion'], 'LR', 0, 'L', false);
    $pdf->Ln();
    $pdf->Cell($tamano, 10, "Tipo de sangre: " . $value['pac_sangre'], 'BLR');
    $pdf->Ln();
    if ($key != count($pac) - 1) {
        $pdf->AddPage();
    }
}


$pdf->Output();
