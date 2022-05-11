<?php
require_once './controlador/dashboard.controlador.php';
$contador = new DashboardControlador();
$Nmedico = $contador->CtrMedicos();
$Npaciente = $contador->CtrPacientes();
$Nespecialiades = $contador->CtrEspecialidades();
$Nvisitas = $contador->Ctrvisitas();


   if ($_SESSION['rol']!=1) {
    $url = SERVERURL . "/permiso";
    echo $urllocation = '<script> window.location = "' . $url . '"</script>';
   }
   ?>
    
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- head -->
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-eye fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php
                                                        foreach ($Nvisitas as $key => $value) {
                                                            echo $value['contador'];
                                                        } ?>
                                    </div>
                                    <div>Total Visitantes</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-male fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php
                                                        foreach ($Npaciente as $key => $value) {
                                                            echo $value['contador'];
                                                        }
                                                        ?></div>
                                    <div>Total de Pacientes</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php
                                                        foreach ($Nmedico as $key => $value) {
                                                            echo $value['contador'];
                                                        } ?>
                                    </div>
                                    <div>Medicos</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php
                                                        foreach ($Nespecialiades as $key => $value) {
                                                            echo $value['contador'];
                                                        } ?>
                                    </div>
                                    <div>Especialidades</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Visitas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-line-chart-moving"></div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
               
            </div>
        </div>

    </div>
</div>
</div>
</div>
<script src="./vista/js/dashboard.js"></script>

