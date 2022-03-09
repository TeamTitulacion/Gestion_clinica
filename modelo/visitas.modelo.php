<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}
class VisitasModelo extends mainModel
{
    protected function MdlVistas($dato)
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_visitas WHERE vis_ip = :ip  
        ORDER BY id_Visitas ASC");
        $sql->execute(array(':ip' => $dato));
        return $sql;
        $sql->close();
        $sql= null;
    }
    protected function MdlInsertar($dato)
    {
        $ip = $dato['ip'];
        $fecha = $dato['fecha'];
        $sql = mainModel::conectar()->prepare("INSERT INTO tbl_visitas(vis_ip,vis_fecha) values (:ip, :fecha)");
        $sql->bindParam(":ip", $ip, PDO::PARAM_STR);
        $sql->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $sql->execute();
        $sql->close();
        $sql= null;
    }
    
}
