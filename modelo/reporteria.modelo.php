<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}
class ReporteriaModelo extends mainModel
{
    public static function MdlReporteriaGeneral()
    {
        $sql = mainModel::conectar()->prepare("SELECT id_Visitas, vis_ip, vis_fecha FROM tbl_visitas");
        $sql->execute();
        $respuesta = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta;
    }
    public static function MdlReporteriaMedico()
    {
        $sql = mainModel::conectar()->prepare("SELECT m.id_medico, m.med_nombre, m.med_apellido, m.med_telefono, m.med_direccion, m.med_estado, m.med_imagen, c.cat_detalle, p.per_detalle FROM tbl_medico AS m INNER JOIN tbl_categoria AS c ON m.id_categoria = c.id_categoria INNER JOIN tbl_perfil AS p ON m.id_perfil = p.id_perfil");
        $sql->execute();
        $respuesta = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta;
    }
    public static function MdlReporteriaPaciente()
    {
        $sql = mainModel::conectar()->prepare("SELECT id_paciente, pac_nombre, pac_apellido, pac_sexo, pac_nacimiento, pac_dni, pac_direccion, pac_correo, pac_telefono, pac_sangre FROM tbl_pacientep");
        $sql->execute();
        $respuesta = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta;
    }
}
