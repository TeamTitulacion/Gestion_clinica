<?php
include '../core/ConfigGeneral.php';
$peticionAjax = true;
if ( isset($_POST['Enca']) || isset($_POST['DNIH'])|| isset($_POST['ajaxpac'])||(isset($_POST['id'])||isset($_POST['Apellido']) && isset($_POST['Nombre'])&& isset($_POST['Sexo'])&& isset($_POST['FechaNa'])&& isset($_POST['CI'])&& isset($_POST['Sangre'])&&isset($_POST['Estado'])&& isset($_POST['Dirr'])&& isset($_POST['Tele'])&& isset($_POST['Corre']))) {
    require_once '../controlador/historia.controlador.php';
    if (isset($_POST['id']) && isset($_POST['Apellido']) && isset($_POST['Nombre'])&& isset($_POST['Corre'])&& isset($_POST['Sexo'])&& isset($_POST['FechaNa'])&& isset($_POST['CI'])&& isset($_POST['Sangre'])&&isset($_POST['Estado'])&& isset($_POST['Dirr'])&& isset($_POST['Tele'])) {
        $resh=new HistoriaControlador();
        echo $resh->CtrUpdateP();
    }
    if (isset($_POST['ajaxpac'])) {
        $resh = new HistoriaControlador();
        echo ($resh->CtrHistoria());
    }
    if ( isset($_POST['DNIH'])) {
        $idH=$_POST['DNIH'];
       $resh=new HistoriaControlador();
       echo json_encode($resh->CtrDatosP($idH)); 
    }
    if (isset($_POST['Enca'])) {
       $resh=new HistoriaControlador();
       echo $resh->CtrEncabezado();
    }

}
