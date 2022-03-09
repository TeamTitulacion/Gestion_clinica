<?php
class VistasModelo
{
    protected function MdlMostrarVistas($vistas)
    {

        $listaBlanca = ["blank","dashboard","dashboardad","buttons","flot","forms","form2","grid","icons","index","login","morris","notifications"
        ,"panelswells","tables","typography","404","salir","egg","pacientesearch","citas","medico","Rgmedico","formularios","Edmedico"];
        if (in_array($vistas, $listaBlanca)) {
            if (is_file("./vista/contenido/" . $vistas . "-view.php")) {
                $contenido = "./vista/contenido/" . $vistas . "-view.php";
            } else {
                $contenido = "login";
            }
        } elseif ($vistas == "login") {
            $contenido = "login";
        } elseif ($vistas == "index") {
            $contenido = "index";
        } else {
            $contenido = "404";
        }
        return $contenido;
    }
}
?>