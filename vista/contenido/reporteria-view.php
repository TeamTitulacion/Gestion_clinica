<?php
if ($_SESSION['rol'] != 1) {
    $url = SERVERURL . "/permiso";
    echo $urllocation = '<script> window.location = "' . $url . '"</script>';
}
?>
<div id="wrapper">
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Reporteria</h1>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-heart fa-fw fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div style="font-size: large;">Reporteria de Medicos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo SERVERURL ?>/controlador/reporteria.controlador.php" TARGET="_blanc">
                                <div class="panel-footer">
                                    <span class="pull-left">PDF</span>
                                    <span class="pull-right"><i class="fa fa-file-pdf-o"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa  fa-area-chart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div style="font-size: large;">Reporteria General</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">PDF</span>
                                    <span class="pull-right"><i class="fa fa-file-pdf-o"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div style="font-size: large;">Reporteria de Pacientes</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?php echo SERVERURL ?>/controlador/repopaciente.controlador.php" TARGET="_blanc">
                                <div class="panel-footer">
                                    <span class="pull-left">PDF</span>
                                    <span class="pull-right"><i class="fa fa-file-pdf-o"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>