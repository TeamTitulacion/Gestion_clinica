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
        } else {
            $datos = ['nombre' => $nombre, 'apellido' => $apellido, 'sexo' => $sexo, 'dni' => $dni, 'fechaNa' => $fechaNa, 'sangre' => $sangre, 'estado' => $estado, 'dirr' => $dirr, 'corre' => $corre, 'tele' => $tele];
            $respuesta = HistoriaModelo::MdlCrearPaciente($datos);
            if ($respuesta->rowCount() >= 1) {
                echo 1;
            } else {
                echo 2;
            }
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
        $obse1 = mainModel::limpiar_cadena($_POST['ObservaAntece']);
        $en1 = mainModel::limpiar_cadena($_POST['en1']);
        $en2 = mainModel::limpiar_cadena($_POST['en2']);
        $en3 = mainModel::limpiar_cadena($_POST['en3']);
        $en4 = mainModel::limpiar_cadena($_POST['en4']);
        $en5 = mainModel::limpiar_cadena($_POST['en5']);
        $en6 = mainModel::limpiar_cadena($_POST['en6']);
        $en7 = mainModel::limpiar_cadena($_POST['en7']);
        $en8 = mainModel::limpiar_cadena($_POST['en8']);
        $en9 = mainModel::limpiar_cadena($_POST['en9']);
        $en10 = mainModel::limpiar_cadena($_POST['en10']);
        $en11 = mainModel::limpiar_cadena($_POST['en11']);
        $en12 = mainModel::limpiar_cadena($_POST['en12']);
        $en_obs = mainModel::limpiar_cadena($_POST['en_obs']);
        $tn1 = mainModel::limpiar_cadena($_POST['tn1']);
        $tn2 = mainModel::limpiar_cadena($_POST['tn2']);
        $tn3 = mainModel::limpiar_cadena($_POST['tn3']);
        $tn4 = mainModel::limpiar_cadena($_POST['tn4']);
        $tn5 = mainModel::limpiar_cadena($_POST['tn5']);
        $tn6 = mainModel::limpiar_cadena($_POST['tn6']);
        $tn7 = mainModel::limpiar_cadena($_POST['tn7']);
        $tn8 = mainModel::limpiar_cadena($_POST['tn8']);
        $tn9 = mainModel::limpiar_cadena($_POST['tn9']);
        $tn10 = mainModel::limpiar_cadena($_POST['tn10']);
        $tn11 = mainModel::limpiar_cadena($_POST['tn11']);
        $tn12 = mainModel::limpiar_cadena($_POST['tn12']);
        $tn13 = mainModel::limpiar_cadena($_POST['tn13']);
        $t1a = mainModel::limpiar_cadena($_POST['t1a']);
        $t2a = mainModel::limpiar_cadena($_POST['t2a']);
        $t3a = mainModel::limpiar_cadena($_POST['t3a']);
        $t4a = mainModel::limpiar_cadena($_POST['t4a']);
        $t5a = mainModel::limpiar_cadena($_POST['t5a']);
        $t6a = mainModel::limpiar_cadena($_POST['t6a']);
        $t7a = mainModel::limpiar_cadena($_POST['t7a']);
        $t8a = mainModel::limpiar_cadena($_POST['t8a']);
        $t9a = mainModel::limpiar_cadena($_POST['t9a']);
        $t10a = mainModel::limpiar_cadena($_POST['t10a']);
        $t11a = mainModel::limpiar_cadena($_POST['t11a']);
        $t12a = mainModel::limpiar_cadena($_POST['t12a']);
        $t13a = mainModel::limpiar_cadena($_POST['t13a']);
        $at1 = mainModel::limpiar_cadena($_POST['at1']);
        $at2 = mainModel::limpiar_cadena($_POST['at2']);
        $at3 = mainModel::limpiar_cadena($_POST['at3']);
        $at4 = mainModel::limpiar_cadena($_POST['at4']);
        $at5 = mainModel::limpiar_cadena($_POST['at5']);
        $at6 = mainModel::limpiar_cadena($_POST['at6']);
        $at7 = mainModel::limpiar_cadena($_POST['at7']);
        $at1a = mainModel::limpiar_cadena($_POST['at1a']);
        $at2a = mainModel::limpiar_cadena($_POST['at2a']);
        $at3a = mainModel::limpiar_cadena($_POST['at3a']);
        $at4a = mainModel::limpiar_cadena($_POST['at4a']);
        $at5a = mainModel::limpiar_cadena($_POST['at5a']);
        $at6a = mainModel::limpiar_cadena($_POST['at6a']);
        $at7a = mainModel::limpiar_cadena($_POST['at7a']);
        $exa_obs = mainModel::limpiar_cadena($_POST['exa_obs']);
        $d1 = mainModel::limpiar_cadena($_POST['d1']);
        $d2 = mainModel::limpiar_cadena($_POST['d2']);
        $d3 = mainModel::limpiar_cadena($_POST['d3']);
        $d4 = mainModel::limpiar_cadena($_POST['d4']);
        $d5 = mainModel::limpiar_cadena($_POST['d5']);
        $d6 = mainModel::limpiar_cadena($_POST['d6']);
        $d7 = mainModel::limpiar_cadena($_POST['d7']);
        $d8 = mainModel::limpiar_cadena($_POST['d8']);
        $d9 = mainModel::limpiar_cadena($_POST['d9']);
        $d10 = mainModel::limpiar_cadena($_POST['d10']);
        $d11 = mainModel::limpiar_cadena($_POST['d11']);
        $d12 = mainModel::limpiar_cadena($_POST['d12']);
        $d13 = mainModel::limpiar_cadena($_POST['d13']);
        $d14 = mainModel::limpiar_cadena($_POST['d14']);
        $d15 = mainModel::limpiar_cadena($_POST['d15']);
        $d16 = mainModel::limpiar_cadena($_POST['d16']);
        $d17 = mainModel::limpiar_cadena($_POST['d17']);
        $d18 = mainModel::limpiar_cadena($_POST['d18']);
        $d19 = mainModel::limpiar_cadena($_POST['d19']);
        $d20 = mainModel::limpiar_cadena($_POST['d20']);
        $d21 = mainModel::limpiar_cadena($_POST['d21']);
        $d22 = mainModel::limpiar_cadena($_POST['d22']);
        $d23 = mainModel::limpiar_cadena($_POST['d23']);
        $d24 = mainModel::limpiar_cadena($_POST['d24']);
        $d25 = mainModel::limpiar_cadena($_POST['d25']);
        $d26 = mainModel::limpiar_cadena($_POST['d26']);
        $d27 = mainModel::limpiar_cadena($_POST['d27']);
        $d28 = mainModel::limpiar_cadena($_POST['d28']);
        $d29 = mainModel::limpiar_cadena($_POST['d29']);
        $d30 = mainModel::limpiar_cadena($_POST['d30']);
        $d31 = mainModel::limpiar_cadena($_POST['d31']);
        $d32 = mainModel::limpiar_cadena($_POST['d32']);
        $d33 = mainModel::limpiar_cadena($_POST['d33']);
        $d34 = mainModel::limpiar_cadena($_POST['d34']);
        $d35 = mainModel::limpiar_cadena($_POST['d35']);
        $d36 = mainModel::limpiar_cadena($_POST['d36']);
        $d37 = mainModel::limpiar_cadena($_POST['d37']);
        $d38 = mainModel::limpiar_cadena($_POST['d38']);
        $d39 = mainModel::limpiar_cadena($_POST['d39']);
        $d40 = mainModel::limpiar_cadena($_POST['d40']);
        $d41 = mainModel::limpiar_cadena($_POST['d41']);
        $d42 = mainModel::limpiar_cadena($_POST['d42']);
        $d43 = mainModel::limpiar_cadena($_POST['d43']);
        $d44 = mainModel::limpiar_cadena($_POST['d44']);
        $d45 = mainModel::limpiar_cadena($_POST['d45']);
        $d46 = mainModel::limpiar_cadena($_POST['d46']);
        $d47 = mainModel::limpiar_cadena($_POST['d47']);
        $d48 = mainModel::limpiar_cadena($_POST['d48']);
        $d49 = mainModel::limpiar_cadena($_POST['d49']);
        $d50 = mainModel::limpiar_cadena($_POST['d50']);
        $d51 = mainModel::limpiar_cadena($_POST['d51']);
        $d52 = mainModel::limpiar_cadena($_POST['d52']);
        $dd1 = mainModel::limpiar_cadena($_POST['dd1']);
        $dd2 = mainModel::limpiar_cadena($_POST['dd2']);
        $dd3 = mainModel::limpiar_cadena($_POST['dd3']);
        $dd4 = mainModel::limpiar_cadena($_POST['dd4']);
        $dd5 = mainModel::limpiar_cadena($_POST['dd5']);
        $dd6 = mainModel::limpiar_cadena($_POST['dd6']);
        $dd7 = mainModel::limpiar_cadena($_POST['dd7']);
        $dd8 = mainModel::limpiar_cadena($_POST['dd8']);
        $dd9 = mainModel::limpiar_cadena($_POST['dd9']);
        $dd10 = mainModel::limpiar_cadena($_POST['dd10']);
        $dd11 = mainModel::limpiar_cadena($_POST['dd11']);
        $dd12 = mainModel::limpiar_cadena($_POST['dd12']);
        $dd13 = mainModel::limpiar_cadena($_POST['dd13']);
        $dd14 = mainModel::limpiar_cadena($_POST['dd14']);
        $dd15 = mainModel::limpiar_cadena($_POST['dd15']);
        $dd16 = mainModel::limpiar_cadena($_POST['dd16']);
        $dd17 = mainModel::limpiar_cadena($_POST['dd17']);
        $dd18 = mainModel::limpiar_cadena($_POST['dd18']);
        $dd19 = mainModel::limpiar_cadena($_POST['dd19']);
        $dd20 = mainModel::limpiar_cadena($_POST['dd20']);
        $dd21 = mainModel::limpiar_cadena($_POST['dd21']);
        $dd22 = mainModel::limpiar_cadena($_POST['dd22']);
        $dd23 = mainModel::limpiar_cadena($_POST['dd23']);
        $dd24 = mainModel::limpiar_cadena($_POST['dd24']);
        $dd25 = mainModel::limpiar_cadena($_POST['dd25']);
        $dd26 = mainModel::limpiar_cadena($_POST['dd26']);
        $dd27 = mainModel::limpiar_cadena($_POST['dd27']);
        $dd28 = mainModel::limpiar_cadena($_POST['dd28']);
        $dd29 = mainModel::limpiar_cadena($_POST['dd29']);
        $dd30 = mainModel::limpiar_cadena($_POST['dd30']);
        $dd31 = mainModel::limpiar_cadena($_POST['dd31']);
        $dd32 = mainModel::limpiar_cadena($_POST['dd32']);
        $dd33 = mainModel::limpiar_cadena($_POST['dd33']);
        $dd34 = mainModel::limpiar_cadena($_POST['dd34']);
        $dd35 = mainModel::limpiar_cadena($_POST['dd35']);
        $dd36 = mainModel::limpiar_cadena($_POST['dd36']);
        $dd37 = mainModel::limpiar_cadena($_POST['dd37']);
        $dd38 = mainModel::limpiar_cadena($_POST['dd38']);
        $dd39 = mainModel::limpiar_cadena($_POST['dd39']);
        $dd40 = mainModel::limpiar_cadena($_POST['dd40']);
        $dd41 = mainModel::limpiar_cadena($_POST['dd41']);
        $dd42 = mainModel::limpiar_cadena($_POST['dd42']);
        $dd43 = mainModel::limpiar_cadena($_POST['dd43']);
        $dd44 = mainModel::limpiar_cadena($_POST['dd44']);
        $dd45 = mainModel::limpiar_cadena($_POST['dd45']);
        $dd46 = mainModel::limpiar_cadena($_POST['dd46']);
        $dd47 = mainModel::limpiar_cadena($_POST['dd47']);
        $dd48 = mainModel::limpiar_cadena($_POST['dd48']);
        $dd49 = mainModel::limpiar_cadena($_POST['dd49']);
        $dd50 = mainModel::limpiar_cadena($_POST['dd50']);
        $dd51 = mainModel::limpiar_cadena($_POST['dd51']);
        $dd52 = mainModel::limpiar_cadena($_POST['dd52']);
        $ha1 = mainModel::limpiar_cadena($_POST['ha1']);
        $ha2 = mainModel::limpiar_cadena($_POST['ha2']);
        $ha3 = mainModel::limpiar_cadena($_POST['ha3']);
        $ha4 = mainModel::limpiar_cadena($_POST['ha4']);
        $ha5 = mainModel::limpiar_cadena($_POST['ha5']);
        $ha6 = mainModel::limpiar_cadena($_POST['ha6']);
        $ha7 = mainModel::limpiar_cadena($_POST['ha7']);
        $ha8 = mainModel::limpiar_cadena($_POST['ha8']);
        $ha9 = mainModel::limpiar_cadena($_POST['ha9']);
        $ha10 = mainModel::limpiar_cadena($_POST['ha10']);
        $ha11 = mainModel::limpiar_cadena($_POST['ha11']);
        $ha12 = mainModel::limpiar_cadena($_POST['ha12']);
        $exa2 = mainModel::limpiar_cadena($_POST['exa2']);
        $exa3 = mainModel::limpiar_cadena($_POST['exa3']);
        $exa4 = mainModel::limpiar_cadena($_POST['exa4']);
        $exa5 = mainModel::limpiar_cadena($_POST['exa5']);
        $exa6 = mainModel::limpiar_cadena($_POST['exa6']);
        $exa7 = mainModel::limpiar_cadena($_POST['exa7']);
        $exa8 = mainModel::limpiar_cadena($_POST['exa8']);
        $exa9 = mainModel::limpiar_cadena($_POST['exa9']);
        $exa10 = mainModel::limpiar_cadena($_POST['exa10']);
        $exa11 = mainModel::limpiar_cadena($_POST['exa11']);
        $da1 = mainModel::limpiar_cadena($_POST['da1']);
        $da2 = mainModel::limpiar_cadena($_POST['da2']);
        $da3 = mainModel::limpiar_cadena($_POST['da3']);
        $da4 = mainModel::limpiar_cadena($_POST['da4']);
        $da5 = mainModel::limpiar_cadena($_POST['da5']);
        $da6 = mainModel::limpiar_cadena($_POST['da6']);
        $da7 = mainModel::limpiar_cadena($_POST['da7']);
        $da8 = mainModel::limpiar_cadena($_POST['da8']);
        $da9 = mainModel::limpiar_cadena($_POST['da9']);
        $da10 = mainModel::limpiar_cadena($_POST['da10']);
        $da11 = mainModel::limpiar_cadena($_POST['da11']);
        $da12 = mainModel::limpiar_cadena($_POST['da12']);
        $da13 = mainModel::limpiar_cadena($_POST['da13']);
        $da14 = mainModel::limpiar_cadena($_POST['da14']);
        $da15 = mainModel::limpiar_cadena($_POST['da15']);
        $ptr1 = mainModel::limpiar_cadena($_POST['ptr1']);
        $ptr2 = mainModel::limpiar_cadena($_POST['ptr2']);
        $ptr3 = mainModel::limpiar_cadena($_POST['ptr3']);
        $ptr4 = mainModel::limpiar_cadena($_POST['ptr4']);
        $ptr5 = mainModel::limpiar_cadena($_POST['ptr5']);
        $ptr6 = mainModel::limpiar_cadena($_POST['ptr6']);
        $ptr7 = mainModel::limpiar_cadena($_POST['ptr7']);
        
        

       
        $datos = ['id' => $id, 'Estatura' => $Estatura, 'Temp' => $Temp, 'Peso' => $Peso, 'Pulso' => $Pulso, 'TenArte' => $TenArte, 'FrecuRespi' => $FrecuRespi, 'motivo' => $motivo, 'fechaMo' => $fechaMo, 'acompa' => $acompa, 'telacompa' => $telacompa, 'vih' => $vih, 'vihdiag' => $vihdiag, 'vihfecha' => $vihfecha, 'moconsulta' => $moconsulta, 'efeActuales' => $efeActuales, 'en1' => $en1, 'en2' => $en2, 'en3' => $en3, 'en4' => $en4, 'en5' => $en5, 'en6' => $en6, 'en7' => $en7, 'en8' => $en8, 'en9' => $en9, 'en10' => $en10, 'en11' => $en11, 'en12' => $en12, 'en_obs' => $en_obs, 'tn1' => $tn1, 'tn2' => $tn2, 'tn3' => $tn3, 'tn4' => $tn4, 'tn5' => $tn5, 'tn6' => $tn6, 'tn7' => $tn7, 'tn8' => $tn8, 'tn9' => $tn9, 'tn10' => $tn10, 'tn11' => $tn11, 'tn12' => $tn12, 'tn13' => $tn13, 't1a' => $t1a, 't2a' => $t2a, 't3a' => $t3a, 't4a' => $t4a, 't5a' => $t5a, 't6a' => $t6a, 't7a' => $t7a, 't8a' => $t8a, 't9a' => $t9a, 't10a' => $t10a, 't11a' => $t11a, 't12a' => $t12a, 't13a' => $t13a, 'at1' => $at1, 'at2' => $at2, 'at3' => $at3, 'at4' => $at4, 'at5' => $at5, 'at6' => $at6, 'at7' => $at7, 'at1a' => $at1a, 'at2a' => $at2a, 'at3a' => $at3a, 'at4a' => $at4a, 'at5a' => $at5a, 'at6a' => $at6a, 'at7a' => $at7a, 'exa_obs' => $exa_obs, 't1' => $t1, 't2' => $t2, 't3' => $t3, 't4' => $t4, 't5' => $t5, 't6' => $t6, 't7' => $t7, 't8' => $t8, 't9' => $t9, 't10' => $t10, 't11' => $t11, 't12' => $t12, 't13' => $t13, 't14' => $t14, 't15' => $t15, 't16' => $t16, 't17' => $t17, 't18' => $t18, 't19' => $t18, 't19' => $t19, 't20' => $t20, 't21' => $t21, 'ObservaAntece' => $obse1, 'ha1' => $ha1, 'ha2' => $ha2, 'ha3' => $ha3, 'ha4' => $ha4, 'ha5' => $ha5, 'ha6' => $ha6, 'ha7' => $ha7, 'ha8' => $ha8, 'ha9' => $ha9, 'ha10' => $ha10, 'ha11' => $ha11, 'ha12' => $ha12,'ptr1' => $ptr1,'ptr2' => $ptr2,'ptr3' => $ptr3,'ptr4' => $ptr4,'ptr5' => $ptr5,'ptr6' => $ptr6,'ptr7' => $ptr7];

        $datos2 = ['id' => $id, 'd1' => $d1, 'd2' => $d2, 'd3' => $d3, 'd4' => $d4, 'd5' => $d5, 'd6' => $d6, 'd7' => $d7, 'd8' => $d8, 'd9' => $d9, 'd10' => $d10, 'd11' => $d11, 'd12' => $d12, 'd13' => $d13, 'd14' => $d14, 'd15' => $d15, 'd16' => $d16, 'd17' => $d17, 'd18' => $d18, 'd19' => $d19, 'd20' => $d20, 'd21' => $d21, 'd22' => $d22, 'd23' => $d23, 'd24' => $d24, 'd25' => $d25, 'd26' => $d26, 'd27' => $d27, 'd28' => $d28, 'd29' => $d29, 'd30' => $d30, 'd31' => $d31, 'd32' => $d32, 'd33' => $d33, 'd34' => $d34, 'd35' => $d35, 'd36' => $d36, 'd37' => $d37, 'd38' => $d38, 'd39' => $d39, 'd40' => $d40, 'd41' => $d41, 'd42' => $d42, 'd43' => $d43, 'd44' => $d44, 'd45' => $d45, 'd46' => $d46, 'd47' => $d47, 'd48' => $d48, 'd49' => $d49, 'd50' => $d50, 'd51' => $d51, 'd52' => $d52, 'dd1' => $dd1, 'dd2' => $dd2, 'dd3' => $dd3, 'dd4' => $dd4, 'dd5' => $dd5, 'dd6' => $dd6, 'dd7' => $dd7, 'dd8' => $dd8, 'dd9' => $dd9, 'dd10' => $dd10, 'dd11' => $dd11, 'dd12' => $dd12, 'dd13' => $dd13, 'dd14' => $dd14, 'dd15' => $dd15, 'dd16' => $dd16, 'dd17' => $dd17, 'dd18' => $dd18, 'dd19' => $dd19, 'dd20' => $dd20, 'dd21' => $dd21, 'dd22' => $dd22, 'dd23' => $dd23, 'dd24' => $dd24, 'dd25' => $dd25, 'dd26' => $dd26, 'dd27' => $dd27, 'dd28' => $dd28, 'dd29' => $dd29, 'dd30' => $dd30, 'dd31' => $dd31, 'dd32' => $dd32, 'dd33' => $dd33, 'dd34' => $dd34, 'dd35' => $dd35, 'dd36' => $dd36, 'dd37' => $dd37, 'dd38' => $dd38, 'dd39' => $dd39, 'dd40' => $dd40, 'dd41' => $dd41, 'dd42' => $dd42, 'dd43' => $dd43, 'dd44' => $dd44, 'dd45' => $dd45, 'dd46' => $dd46, 'dd47' => $dd47, 'dd48' => $dd48, 'dd49' => $dd49, 'dd50' => $dd50, 'dd51' => $dd51, 'dd52' => $dd52, 'exa2' => $exa2, 'exa3' => $exa3, 'exa4' => $exa4, 'exa5' => $exa5, 'exa6' => $exa6, 'exa7' => $exa7, 'exa8' => $exa8, 'exa9' => $exa9, 'exa10' => $exa10, 'exa11' => $exa11, 'da1' => $da1, 'da2' => $da2, 'da3' => $da3, 'da4' => $da4, 'da5' => $da5, 'da6' => $da6, 'da7' => $da7, 'da8' => $da8, 'da9' => $da9, 'da10' => $da10, 'da11' => $da11, 'da12' => $da12, 'da13' => $da13, 'da14' => $da14, 'da15' => $da15];

        $respuesta = HistoriaModelo::MdlActualizar($datos, $datos2);
        
        if ($respuesta > 0) {
            echo 1;
        } else {
            echo 2;
        };
    }
}
