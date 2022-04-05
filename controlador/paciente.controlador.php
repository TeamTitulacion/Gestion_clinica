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
        $sql=mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_pacienteP AS p, tbl_cuerpop AS c, tbl_encabezadop AS e, tbl_placa AS pl, tbl_dientes AS d, tbl_haccionprevP AS hacc, tbl_ptratamientoP AS tra, tbl_examenesP AS exa, tbl_diagnosticoP AS diag, tbl_observacionesP AS ob, tbl_signosvitalesP AS sig, tbl_antecedentesP AS ante  WHERE id_paciente='$idpass'");
        $respuesta=$sql->fetch();
        return $respuesta;

    }
}
