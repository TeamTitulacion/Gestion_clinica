<?php
if ($peticionAjax) {
    require_once "../modelo/paciente.modelo.php";
} else {
    require_once "./modelo/paciente.modelo.php";
}
class PacienteControlador extends PacienteModelo
{
    public function CtrListar()
    {
        $lista = PacienteModelo::MdlListar();
        return $lista;
    }
    public function CtrEncryp()
    {
        $enc = $_POST['enc'];
        $resajax = mainModel::encryption($enc);
        return $resajax;
    }
    public function CtrDecryp()
    {
        $desencryp = explode("/", $_GET['views']);
        $idpass = mainModel::decryption($desencryp[1]);
        $idpass = mainModel::limpiar_cadena($idpass);
        return $idpass;
    }
    public function CtrHistoriaPac()
    {
        $id = $_POST['Pac'];
        $id = mainModel::limpiar_cadena($id);
        $resajax = PacienteModelo::MdlPacienteHis($id);
        return json_encode($resajax, JSON_UNESCAPED_UNICODE);
    }
    public function CtrHistoria()
    {
        $desencryp = explode("/", $_GET['views']);
        $idpass = mainModel::decryption($desencryp[1]);
        $idpass = mainModel::limpiar_cadena($idpass);       
        $sql=mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_pacienteP AS p, tbl_encabezadop AS e, tbl_cuerpop as c, tbl_antecente_medico AS an, tbl_dientesp AS d, tbl_haccionprevP AS h, tbl_antecedente_familiar as f,tbl_ptratamientoP AS t, tbl_examenesP AS ex, tbl_signosvitalesP AS s, tbl_antecedentesP AS a,tbl_medico as m,tbl_examen_estomatologico as exa  WHERE f.id_paciente=p.id_paciente AND e.enc_nhistoria='$idpass' and p.id_paciente=e.id_paciente and e.` id_encabezado`=c.id_encabezado AND c.id_cuerpo=d.id_cuerpo AND h.id_cuerpo=c.id_cuerpo AND p.id_paciente=an.id_paciente AND t.id_cuerpo=c.id_cuerpo AND ex.id_cuerpo=c.id_cuerpo AND s.id_cuerpo=c.id_cuerpo AND a.id_paciente=p.id_paciente AND e.id_medico=m.id_medico AND exa.id_cuerpo=c.id_cuerpo");
        $respuesta=$sql->fetch();
        return $respuesta;

    }
}
