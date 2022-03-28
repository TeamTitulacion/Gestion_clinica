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
    public static function CtrReporteriaMedico()
    {
        $respuesta = ReporteriaModelo::MdlReporteriaMedico();
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
        $this->Cell(60, 10, 'Reporteria de Medicos', 0, 0, 'C');
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
    //Tabla simple
    function TablaSimple()
    {
        
        $this->SetFont('Helvetica', '', 10);
        $respuesta = ReporteriaControlador::CtrReporteriaMedico();
        $header = array('Nomina', 'Area', 'Telefono', 'Direccion','Estado');
        //Cabecera
        $size = 36;
        foreach ($header as $col)
        $this->Cell($size, 7, $col, 1);
        $this->Ln();
        //body
        foreach ($respuesta as $key => $value) {
            $this->Cell($size, 7, utf8_decode($value['med_nombre'] . " " . $value['med_apellido']), 1);
            $this->Cell($size, 7, utf8_decode($value['cat_detalle']), 1);
            $this->Cell($size, 7, $value['med_telefono'], 1);
            $this->Cell($size, 7, $value['med_direccion'], 1);
            if ($value['med_estado']==0) {
                $this->Cell($size, 7, "Activo", 1);
            } else {
                $this->Cell($size, 7,"Desactivado", 1);
            }
            $this->Ln();
        }
       
    }
}

$pdf = new PDF();
//Títulos de las columnas

$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(30);
$pdf->Text(30, 40, "Fecha de elaboracion del reporte: " . date('Y-m-d'));
$pdf->SetY(65);
$pdf->TablaSimple();
$pdf->Output();
