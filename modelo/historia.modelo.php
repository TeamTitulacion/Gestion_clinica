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
        $sql1="INSERT INTO tbl_pacienteP(pac_nombre,pac_apellido,pac_sexo,pac_dni,pac_nacimiento,pac_sangre,pac_estado_civil,pac_direccion,pac_correo,pac_telefono) VALUES (:nombre,:apellido,:sexo,:dni,:fechaNa,:sangre,:estado,:dirr,:corre,:tele)";
        $sql2="SELECT MAX(id_paciente) as pac FROM tbl_pacientep";
        $sql3="INSERT INTO tbl_antecente_medico(id_paciente) VALUES (:id)";
        $sql4="INSERT INTO tbl_antecedente_familiar(id_paciente) VALUES (:id)";

        $sqlmatriz=[$sql1,$sql2,$sql3];
        $a1=array(':nombre' => $datos['nombre'], ':apellido' => $datos['apellido'], ':sexo' => $datos['sexo'], ':dni' => $datos['dni'], ':fechaNa' => $datos['fechaNa'], ':sangre' => $datos['sangre'], ':estado' => $datos['estado'], ':dirr' => $datos['dirr'], ':corre' => $datos['corre'], ':tele' => $datos['tele']);
        $sql = mainModel::conectar()->prepare($sql1);
        $sql->execute($a1);
        $sql = mainModel::conectar()->prepare($sql2);
        $sql->execute();
        $cuerpo = $sql->fetch(PDO::FETCH_ASSOC);
        $id = $cuerpo['pac'];
        $sql = mainModel::conectar()->prepare($sql3);
        $sql->execute(array(':id'=>$id));
        $sql = mainModel::conectar()->prepare($sql4);
        $sql->execute(array(':id'=>$id));
        
        
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
        $sql12=mainModel::conectar()->prepare('INSERT INTO tbl_examen_estomatologico(id_cuerpo) values(:icue8)');
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
        $sql12->execute(array(':icue8' => $idcuerpo));
        $sql11->execute(array(':ante' => $datos['id']));
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
    protected function MdlActualizar($datos, $datos2)
    {
        //actualizacion por lotes de la historia
        $sql1 = "UPDATE tbl_encabezadop AS e, tbl_cuerpop AS c SET c.cue_fecha=:fechaMo,c.cue_motivo=:motivo,c.cue_nacompanante=:acompa, c.cue_telefonoacomp=:telacompa,c.cue_vih=:vih,c.cue_vihdiagnostico=:vihdiag,c.cue_vihfecha=:vihfecha,c.cue_motivo_act=:moconsulta,c.cue_enfermedad=:efeActuales Where e.` id_encabezado`=c.id_encabezado AND e.enc_nhistoria=:id";

        $sql2 = "UPDATE tbl_encabezadop AS e, tbl_cuerpop AS c,tbl_signosvitalesp AS s SET s.sig_estatura=:Estatura, s.sig_temperatura=:Temp, s.sig_peso=:Peso,s.sig_pulso=:Pulso, s.sig_tensionarterial=:TenArte,s.sig_frecuenciarespiratoria=:FrecuRespi WHERE e.` id_encabezado`=c.id_encabezado AND c.id_cuerpo=s.id_cuerpo AND e.enc_nhistoria=:id";

        $sql3 = "UPDATE tbl_encabezadop AS e, tbl_cuerpop AS c,tbl_antecente_medico as a,tbl_pacientep as p SET a.ant_tmactual=:t1,a.ant_tmedicamentos=:t2,a.ant_alergias=:t3,a.ant_cardiopatia=:t4,a.ant_aparterial=:t5,a.ant_embarazo=:t6,a.ant_diabetes=:t7,a.ant_hepatitis=:t8,a.ant_irradiaciones=:t9,a.ant_dsanguineas=:t10,a.ant_freumatica=:t11,a.ant_erenales=:t12,a.ant_inmunosupresion=:t13,a.ant_tranemocional=:t14,a.ant_tgastricos=:t15,a.ant_epilepsia=:t16,a.ant_trespiratorio=:t17,a.ant_cirugia=:t18,a.ant_eoral=:t19,a.ant_otras=:t20,a.ant_vicios=:t21,a.ant_observaciones=:ObservaAntece WHERE e.` id_encabezado`=c.id_encabezado AND e.enc_nhistoria=:id AND a.id_paciente=p.id_paciente AND p.id_paciente= e.id_paciente";

        $sql4 = "UPDATE tbl_encabezadop as e,tbl_pacientep as p, tbl_antecedente_familiar as an
        SET an.anf_ementales=:en1, an.anf_acongenitas=:en2, an.anf_diabetes=:en3, an.anf_cancer=:en4, an.anf_tuberculosis=:en4, an.anf_hemo_cuagu=:en6, an.anf_policitemia=:en7, an.anf_leucemia=:en8, an.anf_ecardio=:en9, an.anf_alcohol=:en10, an.anf_ets=:en11, an.anf_consan=:en12, an.anf_observaciones=:en_obs WHERE e.enc_nhistoria=:id AND e.id_paciente=p.id_paciente AND an.id_paciente= p.id_paciente";

        $sql5 = "UPDATE tbl_encabezadop AS e, tbl_cuerpop AS c,tbl_examen_estomatologico as exa SET
        exa.exa_t1n=:tn1 ,exa.exa_t2n=:tn2 ,exa.exa_t3n=:tn3 ,exa.exa_t4n=:tn4 ,exa.exa_t5n=:tn5 ,exa.exa_t6n=:tn6 ,exa.exa_t7n=:tn7 ,exa.exa_t8n=:tn8 ,exa.exa_t9n=:tn9 ,exa.exa_t10n=:tn10 ,exa.exa_t11n=:tn11 ,exa.exa_t12n=:tn12 ,exa.exa_t13n=:tn13 ,exa.exa_t1a=:t1a ,exa.exa_t2a=:t2a ,exa.exa_t3a=:t3a ,exa.exa_t4a=:t4a ,exa.exa_t5a=:t5a ,exa.exa_t6a=:t6a ,exa.exa_t7a=:t7a ,exa.exa_t8a=:t8a ,exa.exa_t9a=:t9a ,exa.exa_t10a=:t10a ,exa.exa_t11a=:t11a ,exa.exa_t12a=:t12a ,exa.exa_t13a=:t13a ,exa.exa_atm1=:at1 ,exa.exa_atm2=:at2 ,exa.exa_atm3=:at3 ,exa.exa_atm4=:at4 ,exa.exa_atm5=:at5 ,exa.exa_atm6=:at6 ,exa.exa_atm7=:at7 ,exa.exa_atm1a=:at1a ,exa.exa_atm2a=:at2a ,exa.exa_atm3a=:at3a ,exa.exa_atm4a=:at4a ,exa.exa_atm5a=:at5a ,exa.exa_atm6a=:at6a ,exa.exa_atm7a=:at7a ,exa.exa_observaciones=:exa_obs WHERE e.` id_encabezado`=c.id_encabezado AND e.enc_nhistoria=:id AND c.id_cuerpo=exa.id_cuerpo";

        $sql6 = "UPDATE tbl_encabezadop AS e, tbl_cuerpop AS c,tbl_dientesp as d SET d.die_1= :d1,d.die_2= :d2,d.die_3= :d3,d.die_4= :d4,d.die_5= :d5,d.die_6= :d6,d.die_7= :d7,d.die_8= :d8,d.die_9= :d9,d.die_10= :d10,d.die_11= :d11,d.die_12= :d12,d.die_13= :d13,d.die_14= :d14,d.die_15= :d15,d.die_16= :d16,d.die_17= :d17,d.die_18= :d18,d.die_19= :d19,d.die_20= :d20,d.die_21= :d21,d.die_22= :d22,d.die_23= :d23,d.die_24= :d24,d.die_25= :d25,d.die_26= :d26,d.die_27= :d27,d.die_28= :d28,d.die_29= :d29,d.die_30= :d30,d.die_31= :d31,d.die_32= :d32,d.die_33= :d33,d.die_34= :d34,d.die_35= :d35,d.die_36= :d36,d.die_37= :d37,d.die_38= :d38,d.die_39= :d39,d.die_40= :d40,d.die_41= :d41,d.die_42= :d42,d.die_43= :d43,d.die_44= :d44,d.die_45= :d45,d.die_46= :d46,d.die_47= :d47,d.die_48= :d48,d.die_49= :d49,d.die_50= :d50,d.die_51= :d51,d.die_52= :d52 WHERE e.` id_encabezado`=c.id_encabezado AND e.enc_nhistoria=:id AND c.id_cuerpo=d.id_cuerpo";

        $sql7 = "UPDATE tbl_encabezadop AS e, tbl_cuerpop AS c,tbl_dientesp as d SET d.ddie_1= :dd1,d.ddie_2= :dd2,d.ddie_3= :dd3,d.ddie_4= :dd4,d.ddie_5= :dd5,d.ddie_6= :dd6,d.ddie_7= :dd7,d.ddie_8= :dd8,d.ddie_9= :dd9,d.ddie_10= :dd10,d.ddie_11= :dd11,d.ddie_12= :dd12,d.ddie_13= :dd13,d.ddie_14= :dd14,d.ddie_15= :dd15,d.ddie_16= :dd16,d.ddie_17= :dd17,d.ddie_18= :dd18,d.ddie_19= :dd19,d.ddie_20= :dd20,d.ddie_21= :dd21,d.ddie_22= :dd22,d.ddie_23= :dd23,d.ddie_24= :dd24,d.ddie_25= :dd25,d.ddie_26= :dd26,d.ddie_27= :dd27,d.ddie_28= :dd28,d.ddie_29= :dd29,d.ddie_30= :dd30,d.ddie_31= :dd31,d.ddie_32= :dd32,d.ddie_33= :dd33,d.ddie_34= :dd34,d.ddie_35= :dd35,d.ddie_36= :dd36,d.ddie_37= :dd37,d.ddie_38= :dd38,d.ddie_39= :dd39,d.ddie_40= :dd40,d.ddie_41= :dd41,d.ddie_42= :dd42,d.ddie_43= :dd43,d.ddie_44= :dd44,d.ddie_45= :dd45,d.ddie_46= :dd46,d.ddie_47= :dd47,d.ddie_48= :dd48,d.ddie_49= :dd49,d.ddie_50= :dd50,d.ddie_51= :dd51,d.ddie_52= :dd52 WHERE e.` id_encabezado`=c.id_encabezado AND e.enc_nhistoria=:id AND c.id_cuerpo=d.id_cuerpo";

        $sql8 = "UPDATE tbl_encabezadop AS e, tbl_cuerpop AS c,tbl_haccionprevp as ha SET ha.hac_hi_oral=:ha1,ha.ha_diario=:ha2,ha.ha_dental=:ha3 ,ha.ha_bucal=:ha4, ha.ha_fluor=:ha5 ,ha.ha_sellantes=:ha6,ha.ha_hi1=:ha7,ha.ha_hi2=:ha8, ha.ha_hi3=:ha9,ha.ha_hi4=:ha10,ha.ha_hi5=:ha11,ha.ha_hi6=:ha12 WHERE e.` id_encabezado`=c.id_encabezado AND e.enc_nhistoria=:id AND c.id_cuerpo=ha.id_cuerpo";

        $sql9 = "UPDATE tbl_encabezadop AS e, tbl_cuerpop AS c,tbl_examenesp as ep SET ep.exa_detalle=:exa2,ep.exa_panoramica=:exa3,ep.exa_lateral=:exa4,ep.exa_carpograma=:exa5,ep.exa_antero=:exa6,ep.exa_postero=:exa7,ep.exa_atm=:exa8,ep.exa_axial=:exa9,ep.exa_tras=:exa10  ep.exa_com=:exa11 WHERE e.` id_encabezado`=c.id_encabezado AND e.enc_nhistoria=:id AND c.id_cuerpo=ep.id_cuerpo";
       
        $sql10 = "UPDATE tbl_encabezadop AS e, tbl_cuerpop AS c,tbl_diagnosticop as d SET d.dia_general=:da1,d.dia_bucal=:da2,d.dia_perio=:da3,d.dia_pulpa=:da4,d.dia_dental=:da5,d.dia_craneo=:da6,d.dia_otros=:da7,d.dia_p1=:da8,d.dia_p2=:da9,d.dia_p3=:da10,d.dia_p4=:da11,d.dia_p5=:da12,d.dia_p6=:da13,d.dia_p7=:da14,d.dia_obs=:da15 WHERE e.` id_encabezado`=c.id_encabezado AND e.enc_nhistoria=:id AND c.id_cuerpo=d.id_cuerpo";

        $sql11="UPDATE tbl_encabezadop AS e, tbl_cuerpop AS c,tbl_ptratamientop as p SET ptr_coral=:ptr1,ptr_endo=:ptr2,prt_perio=:ptr3,ptr_opera=:ptr4,ptr_prost=:ptr5,ptr_oclusion=:ptr6, ptr_otros=:ptr7 WHERE e.` id_encabezado`=c.id_encabezado AND e.enc_nhistoria=:id AND c.id_cuerpo=ptr.id_cuerpo ";
       
        $sqlmatriz = [$sql1, $sql2, $sql3, $sql4, $sql5, $sql6, $sql7, $sql8, $sql9,$sql10,$sql11];

        // Datos para los update
        $d1 = array(':id' => $datos['id'], ':fechaMo' => $datos['fechaMo'], ':motivo' => $datos['motivo'], ':acompa' => $datos['acompa'], ':telacompa' => $datos['telacompa'], ':vih' => $datos['vih'], ':vihdiag' => $datos['vihdiag'], ':vihfecha' => $datos['vihfecha'], ':efeActuales' => $datos['efeActuales'], ':moconsulta' => $datos['moconsulta']);

        $d2 = array(':id' => $datos['id'], ':Estatura' => $datos['Estatura'], ':Temp' => $datos['Temp'], ':Peso' => $datos['Peso'], ':Pulso' => $datos['Pulso'], ':TenArte' => $datos['TenArte'], ':FrecuRespi' => $datos['FrecuRespi']);

        $d3 = array(':id' => $datos['id'], ':t1' => $datos['t1'], ':t2' => $datos['t2'], ':t3' => $datos['t3'], ':t4' => $datos['t4'], ':t5' => $datos['t5'], ':t6' => $datos['t6'], ':t7' => $datos['t7'], ':t8' => $datos['t8'], ':t9' => $datos['t9'], ':t10' => $datos['t10'], ':t11' => $datos['t11'], ':t12' => $datos['t12'], ':t13' => $datos['t13'], ':t14' => $datos['t14'], ':t15' => $datos['t15'], ':t16' => $datos['t16'], ':t17' => $datos['t17'], ':t18' => $datos['t18'], ':t19' => $datos['t19'], ':t20' => $datos['t20'], ':t21' => $datos['t21'], ':ObservaAntece' => $datos['ObservaAntece']);

        $d4 = array(':en1' => $datos['en1'], ':en2' => $datos['en2'], ':en3' => $datos['en3'], ':en4' => $datos['en4'], ':en5' => $datos['en5'], ':en6' => $datos['en6'], ':en7' => $datos['en7'], ':en8' => $datos['en8'], ':en9' => $datos['en9'], ':en10' => $datos['en10'], ':en11' => $datos['en11'], ':en12' => $datos['en12'], ':en_obs' => $datos['en_obs'], ':id' => $datos['id']);

        $d5 = array(':id' => $datos['id'], ':tn1' => $datos['tn1'], ':tn2' => $datos['tn2'], ':tn3' => $datos['tn3'], ':tn4' => $datos['tn4'], ':tn5' => $datos['tn5'], ':tn6' => $datos['tn6'], ':tn7' => $datos['tn7'], ':tn8' => $datos['tn8'], ':tn9' => $datos['tn9'], ':tn10' => $datos['tn10'], ':tn11' => $datos['tn11'], ':tn12' => $datos['tn12'], ':tn13' => $datos['tn13'], ':t1a' => $datos['t1a'], ':t2a' => $datos['t2a'], ':t3a' => $datos['t3a'], ':t4a' => $datos['t4a'], ':t5a' => $datos['t5a'], ':t6a' => $datos['t6a'], ':t7a' => $datos['t7a'], ':t8a' => $datos['t8a'], ':t9a' => $datos['t9a'], ':t10a' => $datos['t10a'], ':t11a' => $datos['t11a'], ':t12a' => $datos['t12a'], ':t13a' => $datos['t13a'], ':at1' => $datos['at1'], ':at2' => $datos['at2'], ':at3' => $datos['at3'], ':at4' => $datos['at4'], ':at5' => $datos['at5'], ':at6' => $datos['at6'], ':at7' => $datos['at7'], ':at1a' => $datos['at1a'], ':at2a' => $datos['at2a'], ':at3a' => $datos['at3a'], ':at4a' => $datos['at4a'], ':at5a' => $datos['at5a'], ':at6a' => $datos['at6a'], ':at7a' => $datos['at7a'], ':exa_obs' => $datos['exa_obs']);

        $d6 = array(':d1' => $datos2['d1'], ':d2' => $datos2['d2'], ':d3' => $datos2['d3'], ':d4' => $datos2['d4'], ':d5' => $datos2['d5'], ':d6' => $datos2['d6'], ':d7' => $datos2['d7'], ':d8' => $datos2['d8'], ':d9' => $datos2['d9'], ':d10' => $datos2['d10'], ':d11' => $datos2['d11'], ':d12' => $datos2['d12'], ':d13' => $datos2['d13'], ':d14' => $datos2['d14'], ':d15' => $datos2['d15'], ':d16' => $datos2['d16'], ':d17' => $datos2['d17'], ':d18' => $datos2['d18'], ':d19' => $datos2['d19'], ':d20' => $datos2['d20'], ':d21' => $datos2['d21'], ':d22' => $datos2['d22'], ':d23' => $datos2['d23'], ':d24' => $datos2['d24'], ':d25' => $datos2['d25'], ':d26' => $datos2['d26'], ':d27' => $datos2['d27'], ':d28' => $datos2['d28'], ':d29' => $datos2['d29'], ':d30' => $datos2['d30'], ':d31' => $datos2['d31'], ':d32' => $datos2['d32'], ':d33' => $datos2['d33'], ':d34' => $datos2['d34'], ':d35' => $datos2['d35'], ':d36' => $datos2['d36'], ':d37' => $datos2['d37'], ':d38' => $datos2['d38'], ':d39' => $datos2['d39'], ':d40' => $datos2['d40'], ':d41' => $datos2['d41'], ':d42' => $datos2['d42'], ':d43' => $datos2['d43'], ':d44' => $datos2['d44'], ':d45' => $datos2['d45'], ':d46' => $datos2['d46'], ':d47' => $datos2['d47'], ':d48' => $datos2['d48'], ':d49' => $datos2['d49'], ':d50' => $datos2['d50'], ':d51' => $datos2['d51'], ':d52' => $datos2['d52'], ':id' => $datos['id']);

        $d7 = array(':id' => $datos2['id'], ':dd1' => $datos2['dd1'], ':dd2' => $datos2['dd2'], ':dd3' => $datos2['dd3'], ':dd4' => $datos2['dd4'], ':dd5' => $datos2['dd5'], ':dd6' => $datos2['dd6'], ':dd7' => $datos2['dd7'], ':dd8' => $datos2['dd8'], ':dd9' => $datos2['dd9'], ':dd10' => $datos2['dd10'], ':dd11' => $datos2['dd11'], ':dd12' => $datos2['dd12'], ':dd13' => $datos2['dd13'], ':dd14' => $datos2['dd14'], ':dd15' => $datos2['dd15'], ':dd16' => $datos2['dd16'], ':dd17' => $datos2['dd17'], ':dd18' => $datos2['dd18'], ':dd19' => $datos2['dd19'], ':dd20' => $datos2['dd20'], ':dd21' => $datos2['dd21'], ':dd22' => $datos2['dd22'], ':dd23' => $datos2['dd23'], ':dd24' => $datos2['dd24'], ':dd25' => $datos2['dd25'], ':dd26' => $datos2['dd26'], ':dd27' => $datos2['dd27'], ':dd28' => $datos2['dd28'], ':dd29' => $datos2['dd29'], ':dd30' => $datos2['dd30'], ':dd31' => $datos2['dd31'], ':dd32' => $datos2['dd32'], ':dd33' => $datos2['dd33'], ':dd34' => $datos2['dd34'], ':dd35' => $datos2['dd35'], ':dd36' => $datos2['dd36'], ':dd37' => $datos2['dd37'], ':dd38' => $datos2['dd38'], ':dd39' => $datos2['dd39'], ':dd40' => $datos2['dd40'], ':dd41' => $datos2['dd41'], ':dd42' => $datos2['dd42'], ':dd43' => $datos2['dd43'], ':dd44' => $datos2['dd44'], ':dd45' => $datos2['dd45'], ':dd46' => $datos2['dd46'], ':dd47' => $datos2['dd47'], ':dd48' => $datos2['dd48'], ':dd49' => $datos2['dd49'], ':dd50' => $datos2['dd50'], ':dd51' => $datos2['dd51'], ':dd52' => $datos2['dd52']);

        $d8 = array(':id' => $datos2['id'], ':ha1' => $datos['ha1'], ':ha2' => $datos['ha2'], ':ha3' => $datos['ha3'], ':ha4' => $datos['ha4'], ':ha5' => $datos['ha5'], ':ha6' => $datos['ha6'], ':ha7' => $datos['ha7'], ':ha8' => $datos['ha8'], ':ha9' => $datos['ha9'], ':ha10' => $datos['ha10'], ':ha11' => $datos['ha11'], ':ha12' => $datos['ha12']);

        $d9 = array(':id' => $datos2['id'], ':exa2' => $datos2['exa2'], ':exa3' => $datos2['exa3'], ':exa4' => $datos2['exa4'], ':exa5' => $datos2['exa5'], ':exa6' => $datos2['exa6'], ':exa7' => $datos2['exa7'], ':exa8' => $datos2['exa8'], ':exa9' => $datos2['exa9'], ':exa10' => $datos2['exa10'], ':exa11' => $datos2['exa11']);

        $d10=array(':id' => $datos2['id'],':da1' => $datos2['da1'], ':da2' => $datos2['da2'], ':da3' => $datos2['da3'], ':da4' => $datos2['da4'], ':da5' => $datos2['da5'], ':da6' => $datos2['da6'], ':da7' => $datos2['da7'], ':da8' => $datos2['da8'], ':da9' => $datos2['da9'], ':da10' => $datos2['da10'], ':da11' => $datos2['da11'], ':da12' => $datos2['da12'], ':da13' => $datos2['da13'], ':da14' => $datos2['da14'], ':da15' => $datos2['da15']);

        $d11= array(':id' => $datos['id'],':ptr1' => $datos['ptr1'], ':ptr2' => $datos['ptr2'], ':ptr3' => $datos['ptr3'], ':ptr4' => $datos['ptr4'], ':ptr5' => $datos['ptr5'], ':ptr6' => $datos['ptr6'], ':ptr7' => $datos['ptr7']);

        $dmatriz = [$d1, $d2, $d3, $d4, $d5, $d6, $d7, $d8, $d9,$d10,$d11];
        $cont = 0;
        for ($i = 0; $i <= 8; $i++) {
            $sql = mainModel::conectar()->prepare($sqlmatriz[$i]);
            $sql->execute($dmatriz[$i]);
            if ($sql->rowCount() >= 1) {
                $cont++;
            }
        }

        return $cont;
        $sql->close();
        $sql = null;
    }
}
