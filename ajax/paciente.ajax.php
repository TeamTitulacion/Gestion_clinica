<?php
include '../core/ConfigGeneral.php';
$peticionAjax = true;

if (isset($_POST['ver']) || isset($_POST['enc']) || isset($_POST['Pac'])) {
    require_once "../controlador/paciente.controlador.php";
    if (isset($_POST['ver'])) {
        $listarPacientes = new PacienteControlador;
        echo $listarPacientes->CtrListar();
    }
    if (isset($_POST['enc'])) {
        $upid = new PacienteControlador();
        echo $upid->CtrEncryp();
    }
    if (isset($_POST['Pac'])) {
        $tabla = new PacienteControlador();
        echo $tabla->CtrHistoriaPac();
    }
}
