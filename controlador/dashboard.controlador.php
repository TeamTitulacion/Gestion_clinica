<?php
if ($peticionAjax) {
    require_once "../modelo/dashboard.modelo.php";
} else {
    require_once "./modelo/dashboard.modelo.php";
}
class DashboardControlador extends DashboardModelo
{
    public function CtrEspecialidades()
    {
        $especialidades = mainModel::ejecutar_consulta_simple("SELECT Count(*) as contador FROM tbl_categoria ");
        $respuesta = $especialidades->fetchAll();
        return $respuesta;
    }
    public function CtrMedicos()
    {
        $Nmedicos = mainModel::ejecutar_consulta_simple("SELECT Count(*) as contador FROM tbl_medico ");
        $respuesta = $Nmedicos->fetchAll();
        return $respuesta;
    }
    public function CtrPacientes()
    {
        $Npacientes = mainModel::ejecutar_consulta_simple("SELECT Count(*) as contador FROM tbl_paciente");
        $respuesta = $Npacientes->fetchAll();
        return $respuesta;
    }
    public function Ctrvisitas()
    {
        $fecha= date("y-m-d");
        $Nvisitas = mainModel::ejecutar_consulta_simple("SELECT Count(*) as contador FROM tbl_visitas where
        vis_fecha= '$fecha' ");
        $respuesta = $Nvisitas->fetchAll();
        return $respuesta;
    }
    public function Ctrvisitasgrafica()
    {
        $fecha= date("y-m-d");
        $interv= date("Y-m-d",strtotime($fecha."- 10 days"));
        $datos=["inicio"=>$interv,"final"=>$fecha];
        $Nvisitas = DashboardModelo::MdlVisitasgrafica($datos);
        $respuesta = $Nvisitas->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($respuesta);
    }
}
