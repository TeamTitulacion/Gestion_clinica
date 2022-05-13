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
    public function CtrCrearPaciente()
    {
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
        $consulta = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_pacientep WHERE pac_dni = '$dni'");
        if ($consulta->rowCount() >= 1) {
            return 'existe';
        }else{
        $datos = ['nombre' => $nombre, 'apellido' => $apellido, 'sexo' => $sexo, 'dni' => $dni, 'fechaNa' => $fechaNa, 'sangre' => $sangre, 'estado' => $estado, 'dirr' => $dirr, 'corre' => $corre, 'tele' => $tele];
        $respuesta = HistoriaModelo::MdlCrearPaciente($datos);
        if ($respuesta->rowCount() >= 1) {
            echo 1;
        } else {
            echo 2;
        }}
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
        $t1 = mainModel::limpiar_cadena($_POST['TiposAnte1']);
        $t2 = mainModel::limpiar_cadena($_POST['TiposAnte2']);
        $t3 = mainModel::limpiar_cadena($_POST['TiposAnte3']);
        $t4 = mainModel::limpiar_cadena($_POST['TiposAnte4']);
        $t5 = mainModel::limpiar_cadena($_POST['TiposAnte5']);
        $t6 = mainModel::limpiar_cadena($_POST['TiposAnte6']);
        $t7 = mainModel::limpiar_cadena($_POST['TiposAnte7']);
        $t8 = mainModel::limpiar_cadena($_POST['TiposAnte8']);
        $t9 = mainModel::limpiar_cadena($_POST['TiposAnte9']);
        $t10 = mainModel::limpiar_cadena($_POST['TiposAnte10']);
        $t11 = mainModel::limpiar_cadena($_POST['TiposAnte11']);
        $t12 = mainModel::limpiar_cadena($_POST['TiposAnte12']);
        $t13 = mainModel::limpiar_cadena($_POST['TiposAnte13']);
        $t14 = mainModel::limpiar_cadena($_POST['TiposAnte14']);
        $t15 = mainModel::limpiar_cadena($_POST['TiposAnte15']);
        $t16 = mainModel::limpiar_cadena($_POST['TiposAnte16']);
        $t17 = mainModel::limpiar_cadena($_POST['TiposAnte17']);
        $t18 = mainModel::limpiar_cadena($_POST['TiposAnte18']);
        $t19 = mainModel::limpiar_cadena($_POST['TiposAnte19']);
        $t20 = mainModel::limpiar_cadena($_POST['TiposAnte20']);
        $t21 = mainModel::limpiar_cadena($_POST['TiposAnte21']);
        $obse1= mainModel::limpiar_cadena($_POST['ObservaAntece']);

        $datos = [
            'id' => $id, 'Estatura' => $Estatura, 'Temp' => $Temp, 'Peso' => $Peso,
            'Pulso' => $Pulso, 'TenArte' => $TenArte, 'FrecuRespi' => $FrecuRespi, 'motivo' => $motivo,
            'fechaMo' => $fechaMo, 'acompa' => $acompa, 'telacompa' => $telacompa, 'vih' => $vih,
            'vihdiag' => $vihdiag, 'vihfecha' => $vihfecha, 'moconsulta' => $moconsulta, 'efeActuales' => $efeActuales,
            't1'=>$t1, 't2'=>$t2, 't3'=>$t3, 't4'=> $t4,'t5'=>$t5,'t6'=>$t6,'t7'=>$t7,'t8'=>$t8,'t9'=>$t9,
            't10'=>$t10,'t11'=>$t11,'t12'=>$t12,'t13'=>$t13,'t14'=>$t14,'t15'=>$t15,'t16'=>$t16,'t17'=>$t17,
            't18'=>$t18,'t19'=>$t18, 't19'=>$t19,'t20'=>$t20,'t21'=>$t21,'ObservaAntece'=>$obse1
        ];
        $respuesta = HistoriaModelo::MdlActualizar($datos);
        if ($respuesta > 0) {
            echo 1;
        } else {
            echo 2;
        };
    }
}
