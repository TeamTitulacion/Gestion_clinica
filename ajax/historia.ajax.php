<?php
include '../core/ConfigGeneral.php';
$peticionAjax = true;
if ( isset($_POST['his'])||(isset($_POST['pac']) && isset($_POST['fecha']) && isset($_POST['med']) && isset($_POST['nhistoria'])) || isset($_POST['Enca'])
    || isset($_POST['DNIH']) || isset($_POST['ajaxpac']) || (isset($_POST['id']) || isset($_POST['Apellido'])
        && isset($_POST['Nombre']) && isset($_POST['Sexo']) && isset($_POST['FechaNa']) && isset($_POST['CI'])
        && isset($_POST['Sangre']) && isset($_POST['Estado']) && isset($_POST['Dirr']) && isset($_POST['Tele'])
        && isset($_POST['Corre']))|| (isset($_POST['Estatura'])&&isset($_POST['Temp'])&&isset($_POST['Pulso'])&&isset($_POST['Peso'])&&isset($_POST['TenArte'])&&isset($_POST['FrecuRespi'])&&isset($_POST['NumHist']) )
) {
    require_once '../controlador/historia.controlador.php';
    if (isset($_POST['id']) && isset($_POST['Apellido']) && isset($_POST['Nombre']) && isset($_POST['Corre']) && isset($_POST['Sexo']) && isset($_POST['FechaNa']) && isset($_POST['CI']) && isset($_POST['Sangre']) && isset($_POST['Estado']) && isset($_POST['Dirr']) && isset($_POST['Tele'])) {
        $resh = new HistoriaControlador();
        echo $resh->CtrUpdateP();
    }
    if (isset($_POST['ajaxpac'])) {
        $resh = new HistoriaControlador();
        echo ($resh->CtrHistoria());
    }
    if (isset($_POST['DNIH'])) {
        $idH = $_POST['DNIH'];
        $resh = new HistoriaControlador();
        echo json_encode($resh->CtrDatosP($idH));
    }
    if (isset($_POST['Enca'])) {
        $resh = new HistoriaControlador();
        echo json_encode($resh->CtrEncabezado());
    }
    if (isset($_POST['pac']) && isset($_POST['fecha']) && isset($_POST['med']) &&
        isset($_POST['nhistoria'])) {
        $historia = new HistoriaControlador();
        echo $historia->CtrCrearHistoria();
    }
    if (isset($_POST['his'])) {
        $listar = new HistoriaControlador();
        echo json_encode($listar->CtrlistarHistoria(),JSON_UNESCAPED_UNICODE);
    }
    if (isset($_POST['Estatura'])&&isset($_POST['Temp'])&&isset($_POST['Pulso'])&&isset($_POST['Peso'])&&isset($_POST['TenArte'])&&isset($_POST['FrecuRespi']) && isset($_POST['NumHist'])) {
        $actualizar = new HistoriaControlador();
        print_r($actualizar->CtrActualizar());
    }
}
