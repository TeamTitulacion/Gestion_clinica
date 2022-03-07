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
        ORDER BY vip_id DESC");
        $sql->execute(array(':ip' => $dato));
        return $sql;
        $sql->close();
        $sql= null;
    }
    protected function MdlInsertar($dato)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO tbl_visitas(vis_ip,vis_fecha) values (:ip, now())");
        $sql->execute(array(':ip' => $dato));
        $sql->close();
        $sql= null;
    }
    protected function MdlContarVistas(){
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_visitas");
        $sql->execute();
        return $sql;
        $sql->close();
        $sql= null;
    }
}
