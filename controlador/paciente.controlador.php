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
        $id= $_POST['Pac'];
        $id = mainModel::limpiar_cadena($id);
        $resajax= PacienteModelo::MdlPacienteHis($id);
        return $resajax;
   }
}
