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
        $this->Image($imgurl, 12, 4, 30, 20, "PNG");
        //helvetica bold 15
        $this->SetFont('helvetica', 'B', 20);
        //Título
        $this->Cell(0, 0, 'Cruz Medi Dental', 0, 0, 'C');
        //Salto de línea
        $this->Ln(6);
        //eslogan
        $this->SetFont('helvetica', '', 11);
        $this->Cell(0, 0, utf8_decode('Cuidando la sonrisa de los más pequeños'), 0, 0, 'C');
        //Salto de línea
        $this->Ln(5);
        $this->SetFont('helvetica', '', 9);
        $this->Cell(0, 0, utf8_decode('Panamericana sur km 0 y Av. Atacazo frente a la entrada del INIAP - Barrio Central de Cutuglagua.'), 0, 0, 'C');
        //Salto de línea
        $this->Ln(5);
    }
    function TablaSimple()
    {
        $tabla1 = 55;
        $this->Cell($tabla1, 5, 'Tipos de antecedentes:', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, '	SI', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Tratamiento medico actual', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Toma de medicamentos', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Alergias', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Cardiopatias', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Alteracion presion arterial', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Embarazo', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Diabetes', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Hepatitis', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Irradiaciones', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Discrasias sanguinias', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Fiebre reumatica', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Enfermedades renales', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Inmunosupresion', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Trastornos emocionales', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Trastornos gastricos', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Epilepsia', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Trastornos Respiratorios', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, utf8_decode('Cirugias (incluye orales)'), 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Enfermedades orales', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Otras Enfermedades', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Fuma o consume licor', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
    }
    function TablaSimple1()
    {
        $tabla1 = 90;
        $this->Cell($tabla1, 5, 'Tipos de antecedentes:', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, '	SI', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Enfermedades Mentales', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Anomalias Congenitas', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Diabetes', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Cancer', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Tuberculosis', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Hemopatas - Cuagulopaas', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Policitemia', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Leucemia', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Enfermedades Cardiovasculares', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Alcoholismo', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Enfermedades de Transimision Sexual (ETS)', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Consanguinidad con los padres', 1, 0, 'l', 0, 0);
        $this->Cell(10, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln(15);
        $this->Cell(30, 5, 'Observaciones', 0, 0, 'l', 0, 0);
        $this->Cell(0, 5, 'null', 0, 0, 'l', 0, 0);
    }
    function TablaSimple3()
    {
        $tabla1 = 90;
        $celdas=20;
        $this->Cell($tabla1, 5, 'Tejidos Blandos', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, 'Normal', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, 'Anormal', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Labio Superior', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Labio Inferior', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Comisuras', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Mucosa Oral', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Surcos Yugales', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Frenillos', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Paladar', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Orofaringe', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Lengua', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Piso de boca', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Rebordes Residuales', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'G.salivares', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Otros Hallazgos', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell(30, 5, 'Observaciones', 0, 0, 'l', 0, 0);
        $this->Cell(0, 5, 'null', 0, 0, 'l', 0, 0);
    }
    function TablaSimple4()
    {
        $tabla1 = 90;
        $celdas=20;
        $this->Cell($tabla1, 5, 'ATM-Oclusion', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, 'Normal', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, 'Anormal', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Dolor Muscular', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Labio Inferior', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Ruido Artcular', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Alteracion del Movimiento', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Maloclusiones', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Alteraciones Crecimiento', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Otros Hallazgos', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell(30, 5, 'Observaciones', 0, 0, 'l', 0, 0);
        $this->Cell(0, 5, 'null', 0, 0, 'l', 0, 0);
    }
    function TablaSimple5()
    {
        $tabla1 = 90;
        $celdas=30;
        $this->Cell($tabla1, 5, 'Accion Preventiva', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, 'SI', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, 'Frecuencia', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Ha recibido charlas de higiene oral', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Practica el cepillado diario', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Usa seda dental', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Usa enjuague bucal', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Le han aplicado fluor', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Le han colocado sellantes', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
       
    }
    function TablaSimple6()
    {
        $tabla1 = 50;
        $tabla2 = 25;
        $celdas=50;
        $this->Cell($tabla1, 5, 'Diagnostico General', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($tabla2, 5, 'Pronostico', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Diagnostico Bucal', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($tabla2, 5, 'Pronostico', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Diagnostico periodontal', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($tabla2, 5, 'Pronostico', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Diagnostico pulpar', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($tabla2, 5, 'Pronostico', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Diagnostico dental', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($tabla2, 5, 'Pronostico', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Diagnostico craneo facial', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($tabla2, 5, 'Pronostico', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Otros', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Cell($tabla2, 5, 'Pronostico', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell(30, 5, 'Observaciones', 0, 0, 'l', 0, 0);
        $this->Cell(0, 5, 'null', 0, 0, 'l', 0, 0);
       
    }
    function TablaSimple7()
    {
        $tabla1 = 30;
        $celdas=50;
        $this->Cell(0, 5, 'Plan de tratamiento', 0, 0, 'C', 0, 0);
        
        $this->Ln(15);
        $this->Cell($tabla1, 5, 'Cirugia Oral', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Endodoncia', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Periodoncia', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Operatoria', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Prostodoncia', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Oclucion', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        $this->Cell($tabla1, 5, 'Otros', 1, 0, 'l', 0, 0);
        $this->Cell($celdas, 5, ' ', 1, 0, 'l', 0, 0);
        $this->Ln();
        
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
$fpdf->AddPage('portraid', 'a4');
$fpdf->SetFont('helvetica', '', 12);
$fpdf->Cell(0, 10, 'Reporteria', 0, 0, 'C');
//$fpdf->SetFont('helvetica', '', 12);
$fpdf->Ln(15);
$fpdf->Cell(40, 5, 'Numero de historia', 1, 0, 'l', 0, 0);
$fpdf->Cell(40, 5, 'CMD-1723549828', 1, 0, 'l', 0, 0);
$fpdf->Cell(20);
$fpdf->Cell(45, 5, 'Fecha de elaboracion', 1, 0, 'l', 0, 0);
$fpdf->Cell(25, 5, '11/05/2022', 1, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(40, 5, 'Nombre Odontologo', 1, 0, 'l', 0, 0);
$fpdf->Cell(30, 5, 'Ismael Pineida', 1, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(0, 5, 'Informacion general del Paciente', 0, 0, 'C', 0, 0);
$fpdf->Ln(15);
$fpdf->Cell(17, 0, 'Apellido:', 0, 0, 'l', 0, 0);
$fpdf->Cell(20, 0, 'Pineida', 0, 0, 'l', 0, 0);
$fpdf->Cell(45);
$fpdf->Write(0, 'Motivo y fecha de ultima visita al odontologo');
$fpdf->Ln(10);
$fpdf->Cell(17, 5, 'Nombre:', 0, 0, 'l', 0, 0);
$fpdf->Cell(25, 5, 'Ismael', 0, 0, 'l', 0, 0);
$fpdf->Cell(43);
$fpdf->Cell(45, 5, 'Fecha: 13/05/2022', 0, 0, 'l', 0, 0);
$fpdf->Cell(25, 5, 'Motivo: Revision anual', 0, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(40, 5, 'Sexo: Masculino', 0, 0, 'l', 0, 0);
$fpdf->Cell(44);
$fpdf->Cell(51, 5, utf8_decode('Nombre del acompañante:'), 0, 0, 'l', 0, 0);
$fpdf->Cell(0, 5, 'Kelly', 0, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(40, 5,  utf8_decode('Edad: 21 años'), 0, 0, 'l', 0, 0);
$fpdf->Cell(45);
$fpdf->Cell(53, 5, utf8_decode('Telefono del acompañante:'), 0, 0, 'l', 0, 0);
$fpdf->Cell(0, 5, '0987654321', 0, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(45, 5, 'Fecha de nacimiento: 2/06/2000', 0, 0, 'l', 0, 0);
$fpdf->Cell(25, 5, '', 0, 0, 'l', 0, 0);
$fpdf->Cell(15);
$fpdf->Cell(9, 5, utf8_decode('VIH:'), 0, 0, 'l', 0, 0);
$fpdf->Cell(0, 5, 'Negativo', 0, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(16, 5, 'Sangre:', 0, 0, 'l', 0, 0);
$fpdf->Cell(25, 5, 'A Positivo', 0, 0, 'l', 0, 0);
$fpdf->Cell(45);
$fpdf->Cell(40, 5, 'Diacnosticado: null', 0, 0, 'l', 0, 0);
$fpdf->Cell(25, 5, 'yyyy/mm/dd', 0, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(25, 5, 'Estado Civil:', 0, 0, 'l', 0, 0);
$fpdf->Cell(0, 5, 'Soltero', 0, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(20, 5, 'Telefono:', 0, 0, 'l', 0, 0);
$fpdf->Cell(0, 5, '0987654321', 0, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(20, 5, 'Direccion:', 0, 0, 'l', 0, 0);
$fpdf->Cell(0, 5, 'Calle C', 0, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(0, 5, 'Signos vitales', 0, 0, 'C', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(18, 5, 'Estatura:', 0, 0, 'l', 0, 0);
$fpdf->Cell(0, 5, '160cm', 0, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(26, 5, 'Temperatura:', 0, 0, 'l', 0, 0);
$fpdf->Cell(0, 5, utf8_decode('36°'), 0, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(14, 5, 'Pulso:', 0, 0, 'l', 0, 0);
$fpdf->Cell(0, 5, '75', 0, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(13, 5, 'Peso:', 0, 0, 'l', 0, 0);
$fpdf->Cell(0, 5, '75kg', 0, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(34, 5, 'Tension Arterial:', 0, 0, 'l', 0, 0);
$fpdf->Cell(0, 5, '90/120', 0, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(49, 5, 'Frecuencia Respiratoria:', 0, 0, 'l', 0, 0);
$fpdf->Cell(0, 5, '75', 0, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->AddPage('portraid', 'a4');
$fpdf->SetFont('helvetica', '', 12);
$fpdf->Cell(0, 5, 'Anamnesis', 0, 0, 'C', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(38, 5, 'Motivo de consulta:', 0, 0, 'l', 0, 0);
$fpdf->Cell(20, 5, 'string', 0, 0, 'l', 0, 0);
$fpdf->Cell(20);
$fpdf->Cell(46, 5, 'Enfermedades Actuales:', 0, 0, 'l', 0, 0);
$fpdf->Cell(0, 5, 'null', 0, 0, 'l', 0, 0);
$fpdf->Ln(10);
$fpdf->Cell(0, 5, 'Antecedentes medicos y odontologicos', 0, 0, 'C', 0, 0);
$fpdf->Ln(10);
$fpdf->TablaSimple();
$fpdf->Cell(50);
$fpdf->Ln(10);
$fpdf->Cell(30, 5, 'Observaciones', 0, 0, 'l', 0, 0);
$fpdf->Cell(0, 5, 'null', 0, 0, 'l', 0, 0);
$fpdf->AddPage();
$fpdf->TablaSimple1();
$fpdf->Ln(10);
$fpdf->Cell(0, 5, 'Examen Estomatologico', 0, 0, 'C', 0, 0);
$fpdf->Ln(10);
$fpdf->TablaSimple3();
$fpdf->Ln(10);
$fpdf->TablaSimple4();
$fpdf->AddPage();
$fpdf->Write(0,'Odontograma no sabia como hacerle XD');
$fpdf->AddPage();
$fpdf->TablaSimple5();
$fpdf->Ln(10);
$fpdf->Cell(0, 5, 'Diagnosticos', 0, 0, 'C', 0, 0);
$fpdf->Ln(10);
$fpdf->TablaSimple6();
$fpdf->Ln(10);
$fpdf->TablaSimple7();
$fpdf->Output('I', 'Nombredelpaciente.pdf');//cambiar por una variable de consulta para el nombre XD