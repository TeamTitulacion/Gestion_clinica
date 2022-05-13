<?php
$peticionAjax = true;
if ($peticionAjax) {
    require_once "../modelo/reporteria.modelo.php";
} else {
    require_once "./modelo/reporteria.modelo.php";
}

class ReporteriaControlador extends ReporteriaModelo
{
}
require_once "../vista/lib/fpdf/fpdf.php";
$fpdf = new FPDF();
$fpdf->AddPage();
class PDFhistoria extends FPDF
{
    public function Header()
    {
        $imgurl = "http://localhost/Gestion_clinica/vista/img/logo.png";
        //Logo
        $this->Image($imgurl,12,4,30,20,"PNG");
        //helvetica bold 15
        $this->SetFont('helvetica', 'B', 20);
        //Título
        $this->Cell(0,0, 'Cruz Medi Dental', 0, 0, 'C');
        //Salto de línea
        $this->Ln(6);
        //eslogan
        $this->SetFont('helvetica', '', 11);
        $this->Cell(0,0, utf8_decode('Cuidando la sonrisa de los más pequeños'), 0, 0, 'C');
        //Salto de línea
        $this->Ln(5);
        $this->SetFont('helvetica', '', 9);
        $this->Cell(0,0, utf8_decode('Panamericana sur km 0 y Av. Atacazo frente a la entrada del INIAP - Barrio Central de Cutuglagua.'), 0, 0, 'C');
        //Salto de línea
        $this->Ln(5);
    }
    function Footer()
    {
        //Posición: a 1,5 cm del final
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial', 'I', 10);
        //Número de página
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
$fpdf = new PDFhistoria();
$fpdf->AddPage('portraid','a4');
$fpdf->SetFont('helvetica', '', 12);
$fpdf->Cell(0, 10, 'Reporteria', 0, 0, 'C');
//$fpdf->SetFont('helvetica', '', 12);
$fpdf->Ln(15);
$fpdf->Cell(40,5, 'Numero de historia', 1,0,'l',0,0);
$fpdf->Cell(25,5, '', 1,0,'l',0,0);
$fpdf->Cell(20);
$fpdf->Cell(45,5, 'Fecha de elaboracion', 1,0,'l',0,0);
$fpdf->Cell(25,5, '', 1,0,'l',0,0);
$fpdf->Ln(10);
$fpdf->Cell(40,5, 'Nombre Odontologo', 1,0,'l',0,0);
$fpdf->Cell(25,5, '', 1,0,'l',0,0);

$fpdf->Ln(15);
$fpdf->Write(0,'Informacion general del paciente');
$fpdf->Ln(10);
$fpdf->Cell(40,5, 'Apellido:', 0,0,'l',0,0);
$fpdf->Cell(25,5, '', 0,0,'l',0,0);
$fpdf->Ln(10);
$fpdf->Cell(40,5, 'Nombre:', 0,0,'l',0,0);
$fpdf->Cell(25,5, '', 0,0,'l',0,0);
$fpdf->Ln(10);
$fpdf->Cell(40,5, 'Sexo:', 0,0,'l',0,0);
$fpdf->Cell(25,5, '', 0,0,'l',0,0);
$fpdf->Ln(10);
$fpdf->Cell(40,5, 'Edad:', 0,0,'l',0,0);
$fpdf->Cell(25,5, '', 0,0,'l',0,0);
$fpdf->Ln(10);
$fpdf->Cell(45,5, 'Fecha de nacimiento:', 0,0,'l',0,0);
$fpdf->Cell(25,5, '', 0,0,'l',0,0);
$fpdf->Ln(10);
$fpdf->Cell(40,5, 'Sangre:', 0,0,'l',0,0);
$fpdf->Cell(25,5, '', 0,0,'l',0,0);
$fpdf->Ln(10);
$fpdf->Cell(40,5, 'Estado Civil:', 0,0,'l',0,0);
$fpdf->Cell(25,5, '', 0,0,'l',0,0);
$fpdf->Ln(10);
$fpdf->Cell(40,5, 'Telefono:', 0,0,'l',0,0);
$fpdf->Cell(25,5, '', 0,0,'l',0,0);
$fpdf->Ln(10);
$fpdf->Cell(40,5, 'Direccion:', 0,0,'l',0,0);
$fpdf->Cell(25,5, '', 0,0,'l',0,0);
$fpdf->Output('I', 'Nombredelpaciente.pdf');//cambiar por una variable de consulta para el nombre XD