<?php
include '../core/ConfigGeneral.php';
$peticionAjax = true;

if (isset($_POST['id'])|| isset($_POST['pac']) || (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['odonto'])) || isset($_POST['titulo']) || isset($_POST['fecha']) || isset($_POST['Eid']) || isset($_POST['odonto'])||isset($_POST['rol'])||isset($_POST['end'])) {
    require_once "../controlador/fullcalendar.controlador.php";
    //insertar
    //Para ver que las variables no esten vacias XD

    if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['odonto'])&&isset($_POST['pac'])&& isset($_POST['end'])) {
        $insCalendar = new CalendarControlador();
        echo $insCalendar->CtrRegistrar();
    }
    if (isset($_POST['id']) && empty($_POST['id'])) {
        $insCalendar = new CalendarControlador();
        print_r($insCalendar->CtrListar());
    }
    if (isset($_POST['id']) && isset($_POST['titulo']) && isset($_POST['fecha']) && isset($_POST['odonto'])&&isset($_POST['pac']) && isset($_POST['end']) ){
        $insCalendar = new CalendarControlador();
        echo $insCalendar->CtrActualizar();
    }
    if (isset($_POST['Eid']) && !empty($_POST['Eid'])) {
        $insCalendar = new CalendarControlador();
        echo $insCalendar->CtrEliminar();
    }
    if (isset($_POST['rol'])) {
        $insCalendar = new CalendarControlador();
        print_r($insCalendar->CtrListarMed());
    }
} else {
    session_start();
    session_destroy();
    echo '<script> window.location.href="' . SERVERURL . '/login/"</script>';
}
