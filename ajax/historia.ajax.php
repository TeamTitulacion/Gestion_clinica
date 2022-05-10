<?php
include '../core/ConfigGeneral.php';
$peticionAjax = true;

if (isset($_POST['his']) || (isset($_POST['pac']) && isset($_POST['fecha']) && isset($_POST['med']) && isset($_POST['nhistoria'])) || isset($_POST['Enca']) || isset($_POST['DNIH']) || isset($_POST['ajaxpac']) || (isset($_POST['id']) || isset($_POST['Apellido'])&& isset($_POST['Nombre']) && isset($_POST['Sexo']) && isset($_POST['FechaNa']) && isset($_POST['CI'])
    && isset($_POST['Sangre']) && isset($_POST['Estado']) && isset($_POST['Dirr']) && isset($_POST['Tele']) && isset($_POST['Corre'])) || (isset($_POST['Estatura']) && isset($_POST['Temp']) && isset($_POST['Pulso']) && isset($_POST['Peso']) && isset($_POST['TenArte']) && isset($_POST['FrecuRespi']) && isset($_POST['NumHist']) && isset($_POST['Motivo']) && isset($_POST['FechaMo']) && isset($_POST['NomAcompa']) && isset($_POST['TeleAcompa']) && isset($_POST['Vih']) && isset($_POST['DiagVIH']) &&
     isset($_POST['FechaVIH']) && isset($_POST['MoConsulta']) && isset($_POST['EnfeActuales']) && isset($_POST['TiposAnte1']) && isset($_POST['TiposAnte2'])
     && isset($_POST['TiposAnte3'])&& isset($_POST['TiposAnte4'])&& isset($_POST['TiposAnte5'])&& isset($_POST['TiposAnte6'])&& isset($_POST['TiposAnte7'])
     && isset($_POST['TiposAnte8'])&& isset($_POST['TiposAnte9'])&& isset($_POST['TiposAnte10'])&& isset($_POST['TiposAnte11']) && isset($_POST['TiposAnte12'])
     && isset($_POST['TiposAnte13'])&& isset($_POST['TiposAnte14'])&& isset($_POST['TiposAnte15'])&& isset($_POST['TiposAnte16'])&& isset($_POST['TiposAnte17'])
     && isset($_POST['TiposAnte18'])&& isset($_POST['TiposAnte19'])&& isset($_POST['TiposAnte20'])&& isset($_POST['TiposAnte21'])
     && isset($_POST['d1']) && isset($_POST['d2'])&& isset($_POST['d3']) && isset($_POST['d4']) && isset($_POST['d5']) && isset($_POST['d6']) && isset($_POST['d7']) && isset($_POST['d8']) && isset($_POST['d9']) && isset($_POST['d10'])
     && isset($_POST['d11']) && isset($_POST['d12']) && isset($_POST['d13']) && isset($_POST['d14']) && isset($_POST['d15'])&& isset($_POST['d16']) && isset($_POST['d17']) && isset($_POST['d18']) && isset($_POST['d19']) && isset($_POST['d20'])
     && isset($_POST['d21']) && isset($_POST['d22']) && isset($_POST['d23']) && isset($_POST['d24']) && isset($_POST['d25']) && isset($_POST['d26']) && isset($_POST['d27']) && isset($_POST['d28']) && isset($_POST['d29']) && isset($_POST['d30'])
     && isset($_POST['d31']) && isset($_POST['d32']) && isset($_POST['d33']) && isset($_POST['d34']) && isset($_POST['d35']) && isset($_POST['d36']) && isset($_POST['d37']) && isset($_POST['d38']) && isset($_POST['d39']) && isset($_POST['d40']) 
     && isset($_POST['d41']) && isset($_POST['d42']) && isset($_POST['d43']) && isset($_POST['d44']) && isset($_POST['d45']) && isset($_POST['d46']) && isset($_POST['d47']) && isset($_POST['d48']) && isset($_POST['d49']) && isset($_POST['d50']) 
     && isset($_POST['d51']) && isset($_POST['d52']) )
)
    {
    require_once '../controlador/historia.controlador.php';
    if (isset($_POST['id']) && isset($_POST['Apellido']) && isset($_POST['Nombre']) && isset($_POST['Corre']) && isset($_POST['Sexo']) && isset($_POST['FechaNa']) && isset($_POST['CI']) && isset($_POST['Sangre']) && isset($_POST['Estado']) && isset($_POST['Dirr']) && isset($_POST['Tele'])) {
        $resh = new HistoriaControlador();
        echo $resh->CtrUpdateP();
    }
    if (isset($_POST['Apellido']) && isset($_POST['Nombre']) && isset($_POST['Corre']) && isset($_POST['Sexo']) && isset($_POST['FechaNa']) && isset($_POST['CI']) && isset($_POST['Sangre']) && isset($_POST['Estado']) && isset($_POST['Dirr']) && isset($_POST['Tele'])) {
        $resh = new HistoriaControlador();
        echo $resh->CtrCrearPaciente();
    }
    if (isset($_POST['ajaxpac'])) {
        $resh = new HistoriaControlador();
        echo ($resh->CtrHistoria());
    }
    if (isset($_POST['DNIH'])) {
        $idH = $_POST['DNIH'];
        $resh = new HistoriaControlador();
        echo json_encode($resh->CtrDatosP($idH));
    }
    if (isset($_POST['Enca'])) {
        $resh = new HistoriaControlador();
        echo json_encode($resh->CtrEncabezado());
    }
    if (
        isset($_POST['pac']) && isset($_POST['fecha']) && isset($_POST['med']) &&
        isset($_POST['nhistoria'])
    ) {
        $historia = new HistoriaControlador();
        echo $historia->CtrCrearHistoria();
    }
    if (isset($_POST['his'])) {
        $listar = new HistoriaControlador();
        echo json_encode($listar->CtrlistarHistoria(), JSON_UNESCAPED_UNICODE);
    }
    
    if (isset($_POST['Estatura']) && isset($_POST['Temp']) && isset($_POST['Pulso']) && isset($_POST['Peso']) && isset($_POST['TenArte']) && isset($_POST['FrecuRespi']) && isset($_POST['NumHist']) && isset($_POST['Motivo']) && isset($_POST['FechaMo']) && isset($_POST['NomAcompa']) && isset($_POST['TeleAcompa']) && isset($_POST['Vih']) && isset($_POST['DiagVIH']) &&
     isset($_POST['FechaVIH']) && isset($_POST['MoConsulta']) && isset($_POST['EnfeActuales'])&& isset($_POST['TiposAnte1']) && isset($_POST['TiposAnte2'])
     && isset($_POST['TiposAnte3'])&& isset($_POST['TiposAnte4'])&& isset($_POST['TiposAnte5'])&& isset($_POST['TiposAnte6'])&& isset($_POST['TiposAnte7'])
     && isset($_POST['TiposAnte8'])&& isset($_POST['TiposAnte9'])&& isset($_POST['TiposAnte10'])&& isset($_POST['TiposAnte11']) && isset($_POST['TiposAnte12'])
     && isset($_POST['TiposAnte13'])&& isset($_POST['TiposAnte14'])&& isset($_POST['TiposAnte15'])&& isset($_POST['TiposAnte16'])&& isset($_POST['TiposAnte17'])
     && isset($_POST['TiposAnte18'])&& isset($_POST['TiposAnte19'])&& isset($_POST['TiposAnte20'])&& isset($_POST['TiposAnte21']) && isset($_POST['ObservaAntece']) ) {
        $actualizar = new HistoriaControlador();
        print_r($actualizar->CtrActualizar());
    }
}
