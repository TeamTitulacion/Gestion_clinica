<?php
require_once "../vista/lib/fpdf/fpdf.php";
require_once "./controlador/paciente.controlador.php";
$repomedico = new ReporteriaControlador();
$arraymed = $repomedico->CtrReporteriaMedico();

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
      $this->SetFont('Arial', 'I', 8);
      //Número de página
      $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
   }
   //Tabla simple
   function TablaSimple($header)
   {
      //Cabecera
      foreach ($header as $col)
         $this->Cell(45, 7, $col, 1);
      $this->Ln();

      $this->Cell(45, 7, utf8_decode("Patín Jhonny"), "LR");
      $this->Cell(45, 7, "Odontologo G.", "LR");
      $this->Cell(45, 7, "0987654321", 1);
      $this->Cell(45, 7, "S-50", 1);
      $this->Ln();
      $this->Cell(45, 7, "Pineida Ismael", 1);
      $this->Cell(45, 7, "Odontologo G.", 1);
      $this->Cell(45, 7, "0987456123", 1);
      $this->Cell(45, 7, "AV.calle", 1);
   }
}

$pdf = new PDF();
//Títulos de las columnas
$header = array('Nomina', 'Area', 'Telefono', 'Direccion');
$pdf->AliasNbPages();
//Primera página
$pdf->AddPage();
$pdf->SetY(30);
$pdf->Text(30, 40, "Fecha de elaboracion del reporte: " . date('Y-m-d'));
$pdf->SetY(65);
//$pdf->AddPage();
$pdf->TablaSimple($header);
$pdf->Output();
