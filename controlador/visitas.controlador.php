<?php
if ($peticionAjax) {
    require_once "../modelo/visitas.modelo.php";
} else {
    require_once "./modelo/visitas.modelo.php";
}
class VisitasControlador extends VisitasModelo{
    public function CtrVisitas(){
        $ip = getRealIP();
        function getRealIP() {

            if (!empty($_SERVER['HTTP_CLIENT_IP']))
                return $_SERVER['HTTP_CLIENT_IP'];
               
            if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
           
            return $_SERVER['REMOTE_ADDR'];
        }
        $visita = VisitasModelo::MdlVistas($ip);
         
        if ($visita->rowCount() == 0) {
            $fecha= date("y-m-d H:i:s");
            $dato=['ip'=>$ip,'fecha'=>$fecha];
            $insertarip = VisitasModelo::MdlInsertar($dato);
        }else{
            $dato= $visita->fetchAll(PDO::FETCH_ASSOC);
            foreach ($dato as $key => $value) {
               
                    $array= $value['vis_fecha'];
                
            }
            $fechaRegistro = $array;
            $fechaActual= date('Y-m-d H:i:s');
            $nuevaFecha= strtotime($fechaRegistro.'+ 5 hours');
            $nuevaFecha= date('Y-m-d H:i:s',$nuevaFecha);
            $dato=['ip'=>$ip,'fecha'=>$nuevaFecha];
            if ($fechaActual >= $nuevaFecha) {
                $insertarip = VisitasModelo::MdlInsertar($dato);
            } 
        }
        }
}