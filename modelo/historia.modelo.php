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
        //actualizacion por lotes de la historia
        $sql1="UPDATE tbl_encabezadop AS e, tbl_cuerpop AS c SET c.cue_fecha=:fechaMo,c.cue_motivo=:motivo,c.cue_nacompanante=:acompa, c.cue_telefonoacomp=:telacompa,c.cue_vih=:vih,c.cue_vihdiagnostico=:vihdiag,c.cue_vihfecha=:vihfecha,c.cue_motivo_act=:moconsulta,c.cue_enfermedad=:efeActuales Where e.` id_encabezado`=c.id_encabezado AND e.enc_nhistoria=:id";

        $sql2="UPDATE tbl_encabezadop AS e, tbl_cuerpop AS c,tbl_signosvitalesp AS s SET s.sig_estatura=:Estatura, s.sig_temperatura=:Temp, s.sig_peso=:Peso,s.sig_pulso=:Pulso, s.sig_tensionarterial=:TenArte,s.sig_frecuenciarespiratoria=:FrecuRespi WHERE e.` id_encabezado`=c.id_encabezado AND c.id_cuerpo=s.id_cuerpo AND e.enc_nhistoria=:id";

        $sql3="UPDATE tbl_encabezadop AS e, tbl_cuerpop AS c,tbl_antecedente_medico as a,tbl_pacientep as p SET a.ant_tmactual=:t1,a.ant_tmedicamentos=:t2,a.ant_alergias=:t3,a.ant_cardiopatia=:t4,a.ant_aparterial=:t5,a.ant_embarazo=:t6,a.ant_diabetes=:t7,a.ant_hepatitis=:t8,a.ant_irradiaciones=:t9,a.ant_dsanguineas=:t10,a.ant_freumatica=:t11,a.ant_erenales=:t12,a.ant_inmunosupresion=:t13,a.ant_tranemocional=:t14,a.ant_tgastricos=:t15,a.ant_epilepsia=:t16,a.ant_trespiratorio=:t17,a.ant_cirugia=:t18,a.ant_eoral=:t19,a.ant_otras=:t20,a.ant_vicios=:t21,a.ant_observaciones=:ObservaAntece WHERE e.` id_encabezado`=c.id_encabezado AND e.enc_nhistoria=:id AND a.id_paciente=p.id_paciente AND p.id_paciente= e.id_paciente";



        $sqlmatriz=[$sql1,$sql2,$sql3];

        // Datos para los update
        $d1=array(':id' => $datos['id'],':fechaMo' => $datos['fechaMo'],':motivo' => $datos['motivo'],':acompa' => $datos['acompa'],':telacompa' => $datos['telacompa'],':vih' => $datos['vih'], ':vihdiag' => $datos['vihdiag'], ':vihfecha' => $datos['vihfecha'],':efeActuales'=>$datos['efeActuales'],':moconsulta'=>$datos['moconsulta']);

        $d2=array(':id' => $datos['id'], ':Estatura' => $datos['Estatura'],':Temp' => $datos['Temp'], ':Peso' => $datos['Peso'], ':Pulso' => $datos['Pulso'],':TenArte' => $datos['TenArte'], ':FrecuRespi' => $datos['FrecuRespi']);

        $d3=array(':id' => $datos['id'],':t1'=>$datos['t1'],':t2'=>$datos['t2'],':t3'=>$datos['t3'],':t4'=>$datos['t4'],':t5'=>$datos['t5'],':t6'=>$datos['t6'],':t7'=>$datos['t7'],':t8'=>$datos['t8'],':t9'=>$datos['t9'],':t10'=>$datos['t10'],':t11'=>$datos['t11'],':t12'=>$datos['t12'],':t13'=>$datos['t13'],':t14'=>$datos['t14'],':t15'=>$datos['t15'],':t16'=>$datos['t16'],':t17'=>$datos['t17'],':t18'=>$datos['t18'],':t19'=>$datos['t19'],':t20'=>$datos['t20'],':t21'=>$datos['t21'],':ObservaAntece'=>$datos['ObservaAntece']);
        $dmatriz=[$d1,$d2,$d3];
        $cont=0;
        for ($i=0; $i <=2 ; $i++) { 
            $sql = mainModel::conectar()->prepare($sqlmatriz[$i]);
            $sql->execute($dmatriz[$i]);
            if ($sql->rowCount() >=1) {
                $cont++;
            }
        }
       
        return $cont;
        $sql->close();
        $sql = null;
    }
}
