<?php include 'core/ConfigGeneral.php';
$peticionAjax = false;
session_start(["name" => "UIC"]);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title> <?php echo COMPANY ?> </title>
    <link rel="shortcut icon" href="<?php echo SERVERURL ?>/vista/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo SERVERURL ?>/vista/img/apple-touch-icon.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo SERVERURL ?>/vista/css/sweetalert2.min.css">
    <script type="text/javascript" src="<?php echo SERVERURL ?>/vista/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo SERVERURL ?>/vista/js/fullcalendar/es.js"></script>
    <script src="<?php echo SERVERURL ?>/vista/js/fullcalendar/main.js"></script>
    <script src="<?php echo SERVERURL ?>/vista/js/jquery.min.js"></script>
    <script src="<?php echo SERVERURL ?>/vista/js/jqueryui.custom.min.js"></script>
    <script src="<?php echo SERVERURL ?>/vista/js/bootstrap.min.js"></script>
    <script src="<?php echo SERVERURL ?>/vista/js/select2.min.js"></script>
    <link href="<?php echo SERVERURL ?>/vista/css/select2.min.css" rel="stylesheet">
    <link href="<?php echo SERVERURL ?>/vista/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo SERVERURL ?>/vista/css/jqueryui.custom.css" rel="stylesheet">
    <link href="<?php echo SERVERURL ?>/vista/css/metisMenu.min.css" rel="stylesheet">
    <link href="<?php echo SERVERURL ?>/vista/css/morris.css" rel="stylesheet" />
    <link href="<?php echo SERVERURL ?>/vista/css/startmin.css" rel="stylesheet">
    <link href="<?php echo SERVERURL ?>/vista/css/morris.css" rel="stylesheet">
    <link href="<?php echo SERVERURL ?>/vista/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo SERVERURL ?>/vista/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo SERVERURL ?>/vista/css/dataTables/dataTables.responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>/vista/css/pogo-slider.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>/vista/css/style.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>/vista/css/styles.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>/vista/css/responsive.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>/vista/css/custom.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>/vista/css/main.min.css">


</head>

<body>

    <?php
    require_once 'controlador/vista.controlador.php';
    //creamos un objeto para llamar a las paginas
    $vt = new vistaControlador();
    $vistas = $vt->ctrMostrarVistas();
    if ($vistas == "login" || $vistas == "404" || $vistas == "index") :
        if ($vistas == "login") {
            require_once "./vista/contenido/login-view.php";
        } elseif ($vistas == "404") {
            require_once "./vista/contenido/404-view.php";
        } else {
            $vistas == "index";
            require_once "./vista/contenido/index-view.php";
        }
    else :



        include 'modulos/Sidebar.php'; ?>
        <!-- Content page-->
        <section class="full-box dashboard-contentPage">
            <!-- NavBar -->
            <?php include 'modulos/navbar.php';

            ?>
            <!-- Content page -->

            <?php
            require_once $vistas;
            ?>


        </section>
    <?php endif;
    ?>
    <!--====== Scripts -->
   
    <?php

    include 'modulos/scriptsgene.php';
    if (
        $vistas == "./vista/contenido/login-view.php" || $vistas == "./vista/contenido/404-view.php"
        || $vistas == "./vista/contenido/index-view.php"|| $vistas == ""
    ) {
        include 'modulos/scriptsindex.php';
    } else {
        include 'modulos/scriptsapp.php';
    }




    ?>

</body>

</html>