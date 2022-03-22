<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}
class  PacienteModelo extends mainModel
{
    protected function MdlListar()
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_paciente");
        $sql->execute();
        $respuesta = $sql->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($respuesta, JSON_UNESCAPED_UNICODE);
        $sql->close();
        $sql = null;
    }
    protected function MdlPacienteHis($id)
    {
        
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_paciente WHERE id_paciente=:id");
        $sql->execute(array(":id" => $id));
        $respuestaid = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $respuestaid;
        $sql->close();
        $sql = null;
    }
    
}
