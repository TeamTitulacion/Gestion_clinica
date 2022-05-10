<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}
class HistoriaModelo extends mainModel
{
    protected function MdlHistoria($id)
    {
        $sql = mainModel::conectar()->prepare("SELECT CASE WHEN pac_sangre IS NULL THEN 0 ELSE 1 END AS sangre FROM tbl_pacienteP WHERE id_paciente=:id");
        $sql->execute(array(":id" => $id));
        $respuesta = $sql->fetch(PDO::FETCH_ASSOC);
        return $respuesta;
        $sql->close();
        $sql = null;
    }
    protected function MdlDatosP($id)
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_pacienteP WHERE id_paciente=:id");
        $sql->execute(array(":id" => $id));
        $respuesta = $sql->fetch(PDO::FETCH_ASSOC);
        return $respuesta;
        $sql->close();
        $sql = null;
    }
    protected function MdlUpdateP($datos)
    {
        $sql = mainModel::conectar()->prepare("UPDATE tbl_pacienteP SET pac_nombre=:nombre,pac_apellido=:apellido,pac_sexo=:sexo,pac_dni=:dni,pac_nacimiento=:fechaNa,pac_sangre=:sangre,pac_estado_civil=:estado,pac_direccion=:dirr,pac_correo=:corre,pac_telefono=:tele WHERE id_paciente=:id");
        $sql->execute(array(':id' => $datos['id'], ':nombre' => $datos['nombre'], ':apellido' => $datos['apellido'], ':sexo' => $datos['sexo'], ':dni' => $datos['dni'], ':fechaNa' => $datos['fechaNa'], ':sangre' => $datos['sangre'], ':estado' => $datos['estado'], ':dirr' => $datos['dirr'], ':corre' => $datos['corre'], ':tele' => $datos['tele']));
        return $sql;
        $sql->close();
        $sql = null;
    }
    protected function MdlCrearPaciente($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO tbl_pacienteP(pac_nombre,pac_apellido,pac_sexo,pac_dni,pac_nacimiento,pac_sangre,pac_estado_civil,pac_direccion,pac_correo,pac_telefono) VALUES (:nombre,:apellido,:sexo,:dni,:fechaNa,:sangre,:estado,:dirr,:corre,:tele)");
        $sql->execute(array(':nombre' => $datos['nombre'], ':apellido' => $datos['apellido'], ':sexo' => $datos['sexo'], ':dni' => $datos['dni'], ':fechaNa' => $datos['fechaNa'], ':sangre' => $datos['sangre'], ':estado' => $datos['estado'], ':dirr' => $datos['dirr'], ':corre' => $datos['corre'], ':tele' => $datos['tele']));
        return $sql;
        $sql->close();
        $sql = null;
    }
    protected function MdlEncabezado($datos)
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_encabezadoP as e, tbl_pacienteP as p 
        WHERE e.id_paciente=:id and p.id_paciente=e.id_paciente and e.` id_encabezado`=(SELECT MAX(` id_encabezado`) FROM tbl_encabezadoP)  ");
        $sql->execute(array(':id' => $datos));
        $respuesta = $sql->fetch(PDO::FETCH_ASSOC);
        return $respuesta;
        $sql->close();
        $sql = null;
    }
    protected function MdlCrearHistoria($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO tbl_encabezadoP(enc_nhistoria,enc_fechaelab,
        id_paciente,id_medico) VALUES (:nhis,:fecha,:id,:med)");
        $sql1 = mainModel::conectar()->prepare("SELECT MAX(` id_encabezado`) as encabezado FROM tbl_encabezadoP Where id_paciente=:ipac");
        $sql2 = mainModel::conectar()->prepare("INSERT INTO tbl_cuerpoP(id_encabezado) VALUES (:enca)");
        $sql3 = mainModel::conectar()->prepare("SELECT MAX(id_cuerpo) as id_cuerpo FROM tbl_cuerpoP Where 
        id_encabezado=:ienc");
        $sql4 = mainModel::conectar()->prepare('INSERT INTO tbl_examenesP(id_cuerpo) values(:icue1)');
        $sql5 = mainModel::conectar()->prepare('INSERT INTO tbl_haccionprevP(id_cuerpo) values(:icue2)');
        $sql6 = mainModel::conectar()->prepare('INSERT INTO tbl_ptratamientoP(id_cuerpo) values(:icue3)');
        $sql7 = mainModel::conectar()->prepare('INSERT INTO tbl_placabacP(id_cuerpo) values(:icue4)');
        $sql8 = mainModel::conectar()->prepare('INSERT INTO tbl_diagnosticop(id_cuerpo) values(:icue5)');
        $sql9 = mainModel::conectar()->prepare('INSERT INTO tbl_dientesP(id_cuerpo) values(:icue6)');
        $sql10 = mainModel::conectar()->prepare('INSERT INTO tbl_signosvitalesP(id_cuerpo) values(:icue7)');
        mainModel::conectar()->beginTransaction();
        $sql->execute(array(
            ':nhis' => $datos['nhis'], ':fecha' => $datos['fecha'], ':id' => $datos['id'],
            ':med' => $datos['med']
        ));
        $sql11 = mainModel::conectar()->prepare('INSERT INTO tbl_antecedentesp(id_paciente) values(:ante)');
        $sql1->execute(array(':ipac' => $datos['id']));
        $encabezado = $sql1->fetch(PDO::FETCH_ASSOC);
        $idencabezado = $encabezado['encabezado'];
        $sql2->execute(array(':enca' => $idencabezado));
        $sql3->execute(array(':ienc' => $idencabezado));
        $cuerpo = $sql3->fetch(PDO::FETCH_ASSOC);
        $idcuerpo = $cuerpo['id_cuerpo'];
        $sql4->execute(array(':icue1' => $idcuerpo));
        $sql5->execute(array(':icue2' => $idcuerpo));
        $sql6->execute(array(':icue3' => $idcuerpo));
        $sql7->execute(array(':icue4' => $idcuerpo));
        $sql8->execute(array(':icue5' => $idcuerpo));
        $sql9->execute(array(':icue6' => $idcuerpo));
        $sql10->execute(array(':icue7' => $idcuerpo));
        $sql11->execute(array(':ante'=>$datos['id']));
        return $sql10;
        $sql->close();
        $sql = null;


        mainModel::conectar()->commit();
    }
    protected function MdlistarHistoria($dato)
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_pacienteP as p, tbl_encabezadop as e 
        WHERE p.id_paciente=:id and p.id_paciente=e.id_paciente");
        $sql->execute(array(":id" => $dato));
        $respuesta = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta;
        $sql->close();
        $sql = null;
    }
    protected function MdlActualizar($datos)
    {

        $sql = mainModel::conectar()->prepare("UPDATE tbl_encabezadop AS e, tbl_cuerpop AS c, 
        tbl_signosvitalesp AS s SET ant_tmactual=:t1,ant_tmedicamentos=:t2,ant_alergias=:t3,ant_cardiopatia=:t4,ant_aparterial=:t5,ant_embarazo=:t6,ant_diabetes=:t7,ant_hepatitis=:t8,ant_irradiaciones=:t9,ant_dsanguineas=:t10,ant_freumatica=:t11,ant_erenales=:t12,ant_inmunosupresion=:t13,ant_tranemocional=:t14,ant_tgastricos=:t15,ant_epilepsia=:t16,ant_trespiratorio=:t17,ant_cirugia=:t18,ant_eoral=:t19,ant_otras=:t20,ant_vicios=:t21,ant_observaciones=:ObservaAntece,cue_motivo_actual=:motactual,cue_enfermedades=:enfeactual,c.cue_fecha=:fechaMo,c.cue_motivo=:motivo,c.cue_nacompanante=:acompa, c.cue_telefonoacomp=:telacompa,c.cue_vih=:vih,c.cue_vihdiagnostico=:vihdiag,c.cue_vihfecha=:vihfecha,s.sig_estatura=:Estatura, s.sig_temperatura=:Temp, s.sig_peso=:Peso,s.sig_pulso=:Pulso, s.sig_tensionarterial=:TenArte, 
        s.sig_frecuenciarespiratoria=:FrecuRespi
          WHERE e.` id_encabezado`=c.id_encabezado AND c.id_cuerpo=s.id_cuerpo AND e.enc_nhistoria=:id");
        $sql->execute(array(':id' => $datos['id'], ':Estatura' => $datos['Estatura'],':Temp' => $datos['Temp'], ':Peso' => $datos['Peso'], ':Pulso' => $datos['Pulso'],':TenArte' => $datos['TenArte'], ':FrecuRespi' => $datos['FrecuRespi'], ':motivo' => $datos['motivo'], ':fechaMo' => $datos['fechaMo'], ':acompa' => $datos['acompa'], ':telacompa' => $datos['telacompa'], ':vih' => $datos['vih'], ':vihdiag' => $datos['vihdiag'], ':vihfecha' => $datos['vihfecha'], ':motactual'=>$datos['moconsulta'],'enfeactual'=>$datos['efeActuales'],':t1'=>$datos['t1'],':t2'=>$datos['t2'],':t3'=>$datos['t3'],':t4'=>$datos['t4'],':t5'=>$datos['t5'],':t6'=>$datos['t6'],':t7'=>$datos['t7'],':t8'=>$datos['t8'],':t9'=>$datos['t9'],':t10'=>$datos['t10'],':t11'=>$datos['t11'],':t12'=>$datos['t12'],':t13'=>$datos['t13'],':t14'=>$datos['t14'],':t15'=>$datos['t15'],':t16'=>$datos['t16'],':t17'=>$datos['t17'],':t18'=>$datos['t18'],':t19'=>$datos['t19'],':t20'=>$datos['t20'],':t21'=>$datos['t21'],':ObservaAntece'=>$datos['ObservaAntece']
        ));
        return $sql;
        $sql->close();
        $sql = null;
    }
}
