<?php
if ($peticionAjax) {
    require_once "../modelo/historia.modelo.php";
} else {
    require_once "./modelo/historia.modelo.php";
}
class HistoriaControlador extends HistoriaModelo
{
    public function CtrHistoria()
    {
        $id = mainModel::limpiar_cadena($_POST['ajaxpac']);
        $respuesta =HistoriaModelo::MdlHistoria($id);
        return  json_encode($respuesta,JSON_UNESCAPED_UNICODE);
    }
    public function CtrDatosP($id)
    {
        $respuesta=HistoriaModelo::MdlDatosP($id);
        return $respuesta;
    }
    public function CtrUpdateP()
    {
        $id = mainModel::limpiar_cadena($_POST['id']);
        $nombre =mainModel::limpiar_cadena($_POST['Nombre']);
        $apellido =mainModel::limpiar_cadena($_POST['Apellido']);
        $sexo =mainModel::limpiar_cadena($_POST['Sexo']);
        $dni =mainModel::limpiar_cadena($_POST['CI']);
        $fechaNa =mainModel::limpiar_cadena($_POST['FechaNa']);
        $sangre =mainModel::limpiar_cadena($_POST['Sangre']);
        $estado =mainModel::limpiar_cadena($_POST['Estado']);
        $dirr =mainModel::limpiar_cadena($_POST['Dirr']);
        $corre =mainModel::limpiar_cadena($_POST['Corre']);
        $tele =mainModel::limpiar_cadena($_POST['Tele']);
        $datos=['id'=>$id,'nombre'=>$nombre,'apellido'=>$apellido,'sexo'=>$sexo,'dni'=>$dni,'fechaNa'=>$fechaNa,'sangre'=>$sangre,'estado'=>$estado,'dirr'=>$dirr,'corre'=>$corre,'tele'=>$tele];
        $respuesta=HistoriaModelo::MdlUpdateP($datos);
        if ($respuesta->rowCount()>=1) {
            echo 1;
        } else {
            echo 2;
        }
        
    }
    public function CtrEncabezado()
    {
        $Enca=mainModel::limpiar_cadena($_POST['Enca']);

        $respuesta=HistoriaModelo::MdlEncabezado($Enca);
    }
}
