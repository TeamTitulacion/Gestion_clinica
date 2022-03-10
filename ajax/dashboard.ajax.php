<?php 
$peticionAjax = true;
require_once '../core/ConfigGeneral.php';
if (isset($_POST['vt']) || isset($_POST['ps'])) {
    require_once '../controlador/dashboard.controlador.php';
    if (isset($_POST['vt']) ) {
        $vt = new DashboardControlador();
        print_r( $vt->Ctrvisitasgrafica());
    }
    if (isset($_POST['ps'])) {
        $ps= new DashboardControlador();
        
    }
}