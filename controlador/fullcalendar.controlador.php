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
        $odonto = mainModel::limpiar_cadena($_POST['odonto']);
        $pac = mainModel::limpiar_cadena($_POST['pac']);

        $dato = ["fecha" => $fecha, "evento" => $evento, "odonto" => $odonto,"pac"=>$pac];

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
    public function CtrListarMed()
    {
        $medid= mainModel::limpiar_cadena($_POST['rol']);
        $listar = CalendarModelo::MdlListarMed($medid);
        $arreglo = $listar->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($arreglo);
    }

    // Actualizar
    public function CtrActualizar()
    {
        $fecha = mainModel::limpiar_cadena($_POST['fecha']);
        $evento = mainModel::limpiar_cadena($_POST['titulo']);
        $odonto = mainModel::limpiar_cadena($_POST['odonto']);
        $id = mainModel::limpiar_cadena($_POST['id']);
        $pac = mainModel::limpiar_cadena($_POST['pac']);

        $dato = ["fecha" => $fecha, "evento" => $evento, "id" => $id, "odonto" => $odonto,"pac"=>$pac];

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
