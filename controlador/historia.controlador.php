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
        $respuesta = HistoriaModelo::MdlHistoria($id);
        return  json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }
    public function CtrDatosP($id)
    {
        $respuesta = HistoriaModelo::MdlDatosP($id);
        return $respuesta;
    }
    public function CtrUpdateP()
    {
        $id = mainModel::limpiar_cadena($_POST['id']);
        $nombre = mainModel::limpiar_cadena($_POST['Nombre']);
        $apellido = mainModel::limpiar_cadena($_POST['Apellido']);
        $sexo = mainModel::limpiar_cadena($_POST['Sexo']);
        $dni = mainModel::limpiar_cadena($_POST['CI']);
        $fechaNa = mainModel::limpiar_cadena($_POST['FechaNa']);
        $sangre = mainModel::limpiar_cadena($_POST['Sangre']);
        $estado = mainModel::limpiar_cadena($_POST['Estado']);
        $dirr = mainModel::limpiar_cadena($_POST['Dirr']);
        $corre = mainModel::limpiar_cadena($_POST['Corre']);
        $tele = mainModel::limpiar_cadena($_POST['Tele']);
        $datos = ['id' => $id, 'nombre' => $nombre, 'apellido' => $apellido, 'sexo' => $sexo, 'dni' => $dni, 'fechaNa' => $fechaNa, 'sangre' => $sangre, 'estado' => $estado, 'dirr' => $dirr, 'corre' => $corre, 'tele' => $tele];
        $respuesta = HistoriaModelo::MdlUpdateP($datos);
        if ($respuesta->rowCount() >= 1) {
            echo 1;
        } else {
            echo 2;
        }
    }
    public function CtrEncabezado()
    {
        $Enca = mainModel::limpiar_cadena($_POST['Enca']);
        $respuesta = HistoriaModelo::MdlEncabezado($Enca);
        return $respuesta;
    }
    public function CtrCrearHistoria()
    {
        $id = mainModel::limpiar_cadena($_POST['pac']);
        $med = mainModel::limpiar_cadena($_POST['med']);
        $nhis = mainModel::limpiar_cadena($_POST['nhistoria']);
        $fecha = mainModel::limpiar_cadena($_POST['fecha']);
        $datos = ['id' => $id, 'med' => $med, 'nhis' => $nhis, 'fecha' => $fecha];
        $respuesta = HistoriaModelo::MdlCrearHistoria($datos);

        if ($respuesta->rowCount() >= 1) {
            echo 1;
        } else {
            echo 2;
        };
    }
    public function CtrlistarHistoria()
    {
        $id = mainModel::limpiar_cadena($_POST['his']);
        $respuesta = HistoriaModelo::MdlistarHistoria($id);
        return $respuesta;
    }
    public function CtrActualizar()
    {
        $id = mainModel::limpiar_cadena($_POST['NumHist']);
        $Estatura = mainModel::limpiar_cadena($_POST['Estatura']);
        $Temp = mainModel::limpiar_cadena($_POST['Temp']);
        $Peso = mainModel::limpiar_cadena($_POST['Peso']);
        $Pulso = mainModel::limpiar_cadena($_POST['Pulso']);
        $TenArte = mainModel::limpiar_cadena($_POST['TenArte']);
        $FrecuRespi = mainModel::limpiar_cadena($_POST['FrecuRespi']);
        $motivo = mainModel::limpiar_cadena($_POST['Motivo']);
        $fechaMo = mainModel::limpiar_cadena($_POST['FechaMo']);
        $acompa = mainModel::limpiar_cadena($_POST['NomAcompa']);
        $telacompa = mainModel::limpiar_cadena($_POST['TeleAcompa']);
        $vih = mainModel::limpiar_cadena($_POST['Vih']);
        $vihdiag = mainModel::limpiar_cadena($_POST['DiagVIH']);
        $vihfecha = mainModel::limpiar_cadena($_POST['FechaVIH']);
        $moconsulta = mainModel::limpiar_cadena($_POST['MoConsulta']);
        $efeActuales = mainModel::limpiar_cadena($_POST['EnfeActuales']);

        $datos = [
            'id' => $id, 'Estatura' => $Estatura, 'Temp' => $Temp, 'Peso' => $Peso,
            'Pulso' => $Pulso, 'TenArte' => $TenArte, 'FrecuRespi' => $FrecuRespi, 'motivo' => $motivo,
            'fechaMo' => $fechaMo, 'acompa' => $acompa, 'telacompa' => $telacompa, 'vih' => $vih, 
            'vihdiag' => $vihdiag, 'vihfecha' => $vihfecha , 'moconsulta'=>$moconsulta , 'efeActuales'=>$efeActuales
        ];
       $respuesta = HistoriaModelo::MdlActualizar($datos);
        if ($respuesta->rowCount() > 0) {
            echo 1;
        } else {
            echo 2;
        }; 
    }
}
