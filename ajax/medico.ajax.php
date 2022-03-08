<?php
include '../core/ConfigGeneral.php';
$peticionAjax = true;
if (isset($_POST['ver']) ||(isset($_POST['nombre'])&& isset($_POST['apellido'])&& isset($_POST['sexo'])&& isset($_POST['fecha'])&& isset($_POST['dir'])&& isset($_POST['tele'])&& isset($_POST['img'])&& isset($_POST['cat'])&& isset($_POST['rol'])&& isset($_POST['user'])&& isset($_POST['pass'])) ) {
    require_once "../controlador/medico.controlador.php";
if (isset($_POST['ver'])) {
  $listarTabla=new MedicoControlador();
  echo $listarTabla ->CtrListar();
}
if (isset($_POST['nombre'])&& isset($_POST['apellido'])&& isset($_POST['sexo'])&& isset($_POST['fecha'])&& isset($_POST['dir'])&& isset($_POST['tele'])&& isset($_POST['img'])&& isset($_POST['cat'])&& isset($_POST['rol'])&& isset($_POST['user'])&& isset($_POST['pass'])) {
    $Ingresar=new MedicoControlador();
    echo $Ingresar->CtrIngresar();
}
}