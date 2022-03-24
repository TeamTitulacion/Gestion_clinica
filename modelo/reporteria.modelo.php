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
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_vitas");
        $sql->execute();
        $respuesta = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta;
        $sql->close();
        $sql = null;
    }
    protected function MdlReporteriaMedico()
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_medico");
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
