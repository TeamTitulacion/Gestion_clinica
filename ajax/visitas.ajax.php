<?php 
$peticionAjax = true;
require_once '../core/ConfigGeneral.php';
if(isset($_POST['visita'])){
    require_once '../controlador/visitas.controlador.php';
    if (isset($_POST['visita'])) {

        $insDocente = new VisitasControlador();
        echo $insDocente->CtrVisitas();
    }
}