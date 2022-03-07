<?php
include '../core/ConfigGeneral.php';
$peticionAjax = true;

if (isset($_POST['id']) || (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['color'])) || isset($_POST['titulo']) || isset($_POST['fecha'])|| isset($_POST['Eid'])) {
    require_once "../controlador/fullcalendar.controlador.php";
    //insertar
    //Para ver que las variables no esten vacias XD

    if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['color'])) {
        $insCalendar = new CalendarControlador();
        echo $insCalendar->CtrRegistrar();
    }
    if (isset($_POST['id']) && empty($_POST['id'])) {
        $insCalendar = new CalendarControlador();
        print_r($insCalendar->CtrListar());
    }
    if (isset($_POST['id']) && isset($_POST['titulo']) && isset($_POST['fecha']) && isset($_POST['color'])) {
        $insCalendar = new CalendarControlador();
        echo $insCalendar->CtrActualizar();
    }
    if (isset($_POST['Eid']) && !empty($_POST['Eid'])) {
        $insCalendar = new CalendarControlador();
        echo $insCalendar->CtrEliminar();
    }
} else {
    session_start();
    session_destroy();
    echo '<script> window.location.href="' . SERVERURL . '/login/"</script>';
}
