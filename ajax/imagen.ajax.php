<?php
include '../core/ConfigGeneral.php';
$peticionAjax = true;

require_once '../controlador/index.controlador.php';
if (!empty($_FILES['imgUP']['name'])) {

    $urlimgUP = $_FILES['imgUP']['tmp_name'];
    $pathimgUP = $_FILES['imgUP']['name'];
    $Actualizar = new Index();
    echo $Actualizar->CtrImgaleria($urlimgUP, $pathimgUP);
}
if (!empty($_FILES['docUP']['name'])) {
    $urlimgUP = $_FILES['docUP']['tmp_name'];
    $pathimgUP = $_FILES['docUP']['name'];
    $Actualizar = new Index();
    echo $Actualizar->CtrImgMedico($urlimgUP, $pathimgUP);
}
    
