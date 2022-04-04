<?php
include '../core/ConfigGeneral.php';
$peticionAjax = true;


if (isset($_POST['estado']) || isset($_POST['ver']) || (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['sexo']) && isset($_POST['fecha']) && isset($_POST['dir']) && isset($_POST['tele']) && isset($_POST['cat']) && isset($_POST['rol']) && isset($_POST['user']) && isset($_POST['pass'])) || isset($_POST['enc']) || isset($_POST['id']) || (isset($_POST['nombreUP']) && isset($_POST['apellidoUP']) && isset($_POST['sexoUP']) && isset($_POST['fechaUP']) && isset($_POST['dirUP']) && isset($_POST['teleUP']) && isset($_POST['catUP']) && isset($_POST['rolUP']) && isset($_POST['userUP']) && isset($_POST['passUP']))) {
  require_once "../controlador/medico.controlador.php";
  if (isset($_POST['ver'])) {
    $listarTabla = new MedicoControlador();
    echo json_encode($listarTabla->CtrListar(),JSON_UNESCAPED_UNICODE);
  }
  if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['sexo']) && isset($_POST['fecha']) && isset($_POST['dir']) && isset($_POST['tele']) && isset($_POST['cat']) && isset($_POST['rol']) && isset($_POST['user']) && isset($_POST['pass'])) {

    $urlimg = $_FILES['img']['tmp_name'];
    $pathimg = $_FILES['img']['name'];
    $Ingresar = new MedicoControlador();
    echo $Ingresar->CtrIngresar($urlimg, $pathimg);
  }
  if (isset($_POST['enc'])) {
    $upid = new MedicoControlador();
    echo $upid->CtrEncryp();
  }
  if (isset($_POST['nombreUP']) && isset($_POST['apellidoUP']) && isset($_POST['sexoUP']) && isset($_POST['fechaUP']) && isset($_POST['dirUP']) && isset($_POST['teleUP']) && isset($_POST['catUP']) && isset($_POST['rolUP']) && isset($_POST['userUP']) && isset($_POST['passUP']) && isset($_POST['id'])) {
    if (!empty($_FILES['imgUP']['name'])) {
      $urlimgUP = $_FILES['imgUP']['tmp_name'];
      $pathimgUP = $_FILES['imgUP']['name'];
      $Actualizar = new MedicoControlador();
      echo $Actualizar->CtrActualizar($urlimgUP, $pathimgUP);
    } else {
      $Actualizar = new MedicoControlador();
      echo $Actualizar->CtrNoimg();
    }
  }
  if (isset($_POST['estado'])&& isset($_POST['id'])) {
    $cabiar_estado = new MedicoControlador();
    echo $cabiar_estado->CtrEstado();
  }
}
