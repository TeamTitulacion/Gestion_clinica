<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}
class ReporteriaModelo extends mainModel
{
    protected function MdlReporteriaGeneral()
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_visitas");
        $sql->execute();
        $respuesta = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta;
        $sql->close();
        $sql = null;
    }
    protected function MdlReporteriaMedico()
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_medico AS m, tbl_categoria AS c, tbl_perfil AS p WHERE m.id_categoria=c.id_categoria AND m.id_perfil=p.id_perfil");
        $sql->execute();
        $respuesta = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta;
        $sql->close();
        $sql = null;
    }
    protected function MdlReporteriaPaciente()
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_paciente");
        $sql->execute();
        $respuesta = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta;
        $sql->close();
        $sql = null;
    }
}
