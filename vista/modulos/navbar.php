<?php 
require_once "./controlador/login.controlador.php";

$cerrar = new LoginControlador();

if (!isset($_SESSION['usuario']) || !isset($_SESSION['password'])) {
    session_destroy();
} 
else{    
    $sesion = $_SESSION['usuario'];
?>

<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="dashboardad"><?php echo COMPANY ?></a>
        </div>
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['usuario'] ?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <input class="hidden" value="<?php echo $_SESSION['id'] ?>" type="text" name="id" id="id">
                    <li><a id="pefil"><i class="fa fa-user fa-fw"></i> Perfi</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?php echo SERVERURL?>/salir"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesion</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- /.navbar-top-links -->
    </nav>
    <?php };?>