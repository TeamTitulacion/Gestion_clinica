<?php
if ($peticionAjax) {
    require_once "../modelo/visitas.modelo.php";
} else {
    require_once "./modelo/visitas.modelo.php";
}
class VisitasControlador extends VisitasModelo{
    public function CtrVisitas(){
        $ip = $_SERVER['REMOTE_ADDR'];
        $visita = VisitasModelo::MdlVistas($ip);
        $contar= $visita->num_rows;
        if ($contar == 0) {
            $insertarip = VisitasModelo::MdlInsertar($ip);
        }else{
            $dato= $visita->fetchAll(PDO::FETCH_ASSOC);
            $fechaRegistro = $dato['vis_fecha'];
            $fechaActual= date('Y-m-d H:i:s');
            $nuevaFecha= strtotime($fechaRegistro.'+ 5 hours');
            $nuevaFecha= date('Y-m-d H:i:s',$nuevaFecha);
            if ($fechaActual >= $nuevaFecha) {
                $insertarip = VisitasModelo::MdlInsertar($ip);
            }
        }
        $ContarVisitas = VisitasModelo::MdlContarVistas();
        $TotalVisitas= $ContarVisitas->num_rows;
        echo $TotalVisitas;
        }
}