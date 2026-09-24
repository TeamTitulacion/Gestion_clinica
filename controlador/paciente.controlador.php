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
        $views = $_GET['views'] ?? 'CMD1727185298-1';
        $desencryp = explode("/", $views);
        $idpass = mainModel::decryption($desencryp[1]);
        $idpass = mainModel::limpiar_cadena($idpass);
        
        $sql = mainModel::ejecutar_consulta_simple(
            "SELECT * FROM tbl_pacienteP AS p INNER JOIN tbl_encabezadop AS e ON p.id_paciente = e.id_paciente INNER JOIN tbl_cuerpop AS c ON e.id_encabezado = c.id_encabezado INNER JOIN tbl_medico AS m ON e.id_medico = m.id_medico LEFT JOIN tbl_antecente_medico AS an ON p.id_paciente = an.id_paciente LEFT JOIN tbl_dientesp AS d ON c.id_cuerpo = d.id_cuerpo LEFT JOIN tbl_haccionprevP AS h ON c.id_cuerpo = h.id_cuerpo LEFT JOIN tbl_antecedente_familiar AS f ON p.id_paciente = f.id_paciente LEFT JOIN tbl_ptratamientoP AS t ON c.id_cuerpo = t.id_cuerpo LEFT JOIN tbl_examenesP AS ex ON c.id_cuerpo = ex.id_cuerpo LEFT JOIN tbl_signosvitalesP AS s ON c.id_cuerpo = s.id_cuerpo LEFT JOIN tbl_antecedentesP AS a ON p.id_paciente = a.id_paciente WHERE e.enc_nhistoria = ?",
            [$idpass]
        );
        $respuesta = $sql->fetch();
        return $respuesta;

    }
}
