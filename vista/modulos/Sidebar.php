<?php 
require_once "./controlador/login.controlador.php";

$cerrar = new LoginControlador();

if (!isset($_SESSION['usuario']) || !isset($_SESSION['password'])) {
  
} 
else{
?>
<div id="wrapper">
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="citas" class="active"><i class="fa fa-calendar fa-fw"></i> Citas</a>
                </li>
                <li>
                    <a href="dashboard" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="flot">Flot Charts</a>
                        </li>
                        <li>
                            <a href="form2">form2</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="tables"><i class="fa fa-table fa-fw"></i> Tables</a>
                </li>
                <li>
                    <a href="medico" class="active"><i class="fa fa-heart fa-fw"></i>Medicos</a>
                </li>
                <li>
                    <a href="pacientesearch"><i class="fa fa-users fa-fw"></i> Pacientes</a>
                </li>
                <li>
                    <a href="forms"><i class="fa fa-edit fa-fw"></i> Forms</a>
                </li>
                <li>
                    <a href="formularios"><i class="fa fa-edit fa-fw"></i> Formulario</a>
                </li>
                <li>
                    <a><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="panelswells">Panels and Wells</a>
                        </li>
                        <li>
                            <a href="buttons">Buttons</a>
                        </li>
                        <li>
                            <a href="notifications">Notifications</a>
                        </li>
                        <li>
                            <a href="typography">Typography</a>
                        </li>
                        <li>
                            <a href="icons"> Icons</a>
                        </li>
                        <li>
                            <a href="grid">Grid</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Third Level <span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                            </ul>
                            <!-- /.nav-third-level -->
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="blank">Blank Page</a>
                        </li>
                        <li>
                            <a href="login">Login Page</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
    </div>
</div>
<?php }; ?>