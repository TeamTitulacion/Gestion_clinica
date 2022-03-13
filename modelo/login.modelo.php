<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}
class LoginModelo extends mainModel
{
    protected function MdlIniciarSession($datos)
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_medico 
        WHERE med_usuario = :usuario  AND med_password = :password AND med_estado!=1");
        $sql->bindParam(":usuario", $datos['user']);
        $sql->bindParam(":password", $datos['password']);
        $sql->execute();
        return $sql;

        $sql->close();
        $sql = null;
    }

}
