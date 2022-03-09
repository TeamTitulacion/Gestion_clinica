<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}
class DashboardModelo extends mainModel
{
    protected function MdlVisitasgrafica($dato)
    {
        $sql    = mainModel::conectar()->prepare("SELECT Count(*) as contador,vis_fecha as fecha FROM tbl_visitas where vis_fecha between :inicio and :final group by vis_fecha order by vis_fecha ASC");
        $sql->execute(array('inicio' => $dato['inicio'], 'final' => $dato['final']));
        return $sql;
        $sql->close();
        $sql = null;
    }
}
