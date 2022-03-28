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

                    <!-- <li>
                        <a href="<?php echo SERVERURL ?>/citas" class="active"><i class="fa fa-calendar fa-fw"></i> Citas</a>
                    </li>
                    <li>
                        <a href="<?php echo SERVERURL ?>/dashboard" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo SERVERURL ?>/form2" class="active"><i class="fa fa-users"></i>Pacientes</a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo SERVERURL ?>/flot" class="hidenn">Flot Charts</a>
                            </li>
                            <li>
                                <a href="<?php echo SERVERURL ?>/form2" class="hidenn">form2</a>
                            </li>
                        </ul>

                    </li>
                    <li>
                        <a href="<?php echo SERVERURL ?>/pacientesearch"><i class="fa fa-table fa-fw"></i> Pacientes</a>
                    </li>
                    <li>
                        <a href="<?php echo SERVERURL ?>/medico" class="active"><i class="fa fa-heart fa-fw"></i>Medicos</a>
                    </li>
                    <li>
                        <a href="<?php echo SERVERURL ?>/pacientesearch"><i class="fa fa-users fa-fw"></i> Pacientes</a>
                    </li>
                    <li>
                        <a href="<?php echo SERVERURL ?>/forms"><i class="fa fa-edit fa-fw"></i> Forms</a>
                    </li>
                    <li>
                        <a href="<?php echo SERVERURL ?>/formularios"><i class="fa fa-edit fa-fw"></i> Formulario</a>
                    </li>
                    <li>
                        <a><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo SERVERURL ?>/panelswells">Panels and Wells</a>
                            </li>
                            <li>
                                <a href="<?php echo SERVERURL ?>/buttons">Buttons</a>
                            </li>
                            <li>
                                <a href="<?php echo SERVERURL ?>/notifications">Notifications</a>
                            </li>
                            <li>
                                <a href="<?php echo SERVERURL ?>/typography">Typography</a>
                            </li>
                            <li>
                                <a href="<?php echo SERVERURL ?>/icons"> Icons</a>
                            </li>
                            <li>
                                <a href="<?php echo SERVERURL ?>/grid">Grid</a>
                            </li>
                        </ul>

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

                            </li>
                        </ul>

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

                    </li>
                    <li>
                        <a href="<?php echo SERVERURL ?>/reporteria" class="active"><i class="fa fa-file-pdf-o"></i>Reporteria</a>
                    </li>-->
                </ul>


            </div>
        </div>
    </div>
<?php }; ?>