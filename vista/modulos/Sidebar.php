<?php
require_once "./controlador/login.controlador.php";

$cerrar = new LoginControlador();


if (!isset($_SESSION['usuario']) || !isset($_SESSION['password'])) {
} else {
?><div id="wrapper">
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <?php

                    if ($_SESSION['rol'] == 1) {
                    ?><li>
                            <a href="<?php echo SERVERURL ?>/dashboard" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo SERVERURL ?>/citas" class="active"><i class="fa fa-calendar fa-fw"></i> Citas</a>
                        </li>
                        <li>
                            <a href="<?php echo SERVERURL ?>/medico" class="active"><i class="fa fa-heart fa-fw"></i>Medicos</a>
                        </li>
                        <li>
                            <a href="<?php echo SERVERURL ?>/pacientesearch" class="active"><i class="fa fa-users"></i> Pacientes</a>
                        </li>
                        <li>
                            <a href="<?php echo SERVERURL ?>/reporteria" class="active"><i class="fa fa-file-pdf-o"></i> Reporteria</a>
                        </li>
                        <li>
                            <a href="<?php echo SERVERURL ?>/galeria" class="active"><i class="fa fa-file-image-o"></i> Galeria</a>
                        </li>
                    <?php
                    } elseif ($_SESSION['rol'] == 2) {
                    ?>
                        <li>
                            <a href="<?php echo SERVERURL ?>/citas" class="active"><i class="fa fa-calendar fa-fw"></i> Citas</a>
                        </li>

                        <li>
                            <a href="<?php echo SERVERURL ?>/pacientesearch" class="active"><i class="fa fa-users"></i> Pacientes</a>
                        </li><?php
                            } elseif ($_SESSION['rol'] == 3) {
                                ?>
                        <li>
                            <a href="<?php echo SERVERURL ?>/citas" class="active"><i class="fa fa-calendar fa-fw"></i> Citas</a>
                        </li>
                    <?php
                            }
                    ?>

                    
                </ul>


            </div>
        </div>
    </div>
<?php }; ?>