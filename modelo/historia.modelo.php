<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}
class HistoriaModelo extends mainModel
{
    protected function MdlHistoria($id)
    {
        $sql = mainModel::conectar()->prepare("SELECT CASE WHEN pac_sangre IS NULL THEN 0 ELSE 1 END AS sangre FROM tbl_pacienteP WHERE id_paciente=:id");
        $sql->execute(array(":id" => $id));
        $respuesta = $sql->fetch(PDO::FETCH_ASSOC);
        return $respuesta;
        $sql->close();
        $sql = null;
    }
    protected function MdlDatosP($id)
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_pacienteP WHERE id_paciente=:id");
        $sql->execute(array(":id" => $id));
        $respuesta = $sql->fetch(PDO::FETCH_ASSOC);
        return $respuesta;
        $sql->close();
        $sql = null;
    }
    protected function MdlUpdateP($datos)
    {
        $sql = mainModel::conectar()->prepare("UPDATE tbl_pacienteP SET pac_nombre=:nombre,pac_apellido=:apellido,pac_sexo=:sexo,pac_dni=:dni,pac_nacimiento=:fechaNa,pac_sangre=:sangre,pac_estado_civil=:estado,pac_direccion=:dirr,pac_correo=:corre,pac_telefono=:tele WHERE id_paciente=:id");
        $sql->execute(array(':id' => $datos['id'], ':nombre' => $datos['nombre'], ':apellido' => $datos['apellido'], ':sexo' => $datos['sexo'], ':dni' => $datos['dni'], ':fechaNa' => $datos['fechaNa'], ':sangre' => $datos['sangre'], ':estado' => $datos['estado'], ':dirr' => $datos['dirr'], ':corre' => $datos['corre'], ':tele' => $datos['tele']));
        return $sql;
        $sql->close();
        $sql = null;
    }
    protected function MdlEncabezado($datos)
    {
        $sql=mainModel::conectar()->prepare("SELECT *,MAX(id_encabezado)AS num FROM tbl_encabezadoP WHERE id_paciente=:id ");
        $sql->execute(array(':id'=>$datos));
        return $sql;
        $sql->close();
        $sql = null;
    }
}
