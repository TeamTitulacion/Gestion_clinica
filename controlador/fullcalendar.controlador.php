<?php
if ($peticionAjax) {
    require_once "../modelo/fullcalendar.modelo.php";
} else {
    require_once "./modelo/fullcalendar.modelo.php";
}
class CalendarControlador extends CalendarModelo
{
    public function CtrRegistrar()
    {

        $fecha = mainModel::limpiar_cadena($_POST['start']);
        $evento = mainModel::limpiar_cadena($_POST['title']);
       


        $dato = ["fecha" => $fecha, "evento" => $evento];

        $insertar = CalendarModelo::MdlRegistrar($dato);

        if ($insertar->rowCount() >= 1) {
            echo "1";
        } else {
            echo "2";
        }
    }
    public function CtrListar()
    {
        $listar = CalendarModelo::MdlListar();
        $arreglo = $listar->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($arreglo);
    }

    // Actualizar
    public function CtrActualizar()
    {
        $fecha = mainModel::limpiar_cadena($_POST['fecha']);
        $evento = mainModel::limpiar_cadena($_POST['titulo']);
        
        $id = mainModel::limpiar_cadena($_POST['id']);

        $dato = ["fecha" => $fecha, "evento" => $evento,"id" => $id];

        $actualizar = CalendarModelo::MdlActualzar($dato);
        if ($actualizar->rowCount() >= 1) {
            echo  "1";
        } else {
            echo "2";
        }
    }

    // Eliminar
    public function CtrEliminar()
    {

        $id = mainModel::limpiar_cadena($_POST['Eid']);
        $eliminar = CalendarModelo::MdlEliminar($id);

        if ($eliminar->rowCount() >= 1) {
            echo "1";
        } else {

            echo "2";
        }
    }
}
