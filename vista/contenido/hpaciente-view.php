<?php
require_once "./controlador/login.controlador.php";
require_once "./controlador/paciente.controlador.php";
$cerrar = new LoginControlador();
$info =new PacienteControlador();
$res=$info->CtrHistoriaPac();
if (!isset($_SESSION['usuario']) || !isset($_SESSION['password'])) {
    $cerrar->CtrCerrarSession();
}

?>
<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Historias del Paciente</h1>
                </div>
                <input id="jso" class="hidden" value="<?php echo $res ?>"></input>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-6">
                                    Info Historias del Paciente
                                </div>
                                <div class="col-md-6 text-right">
                                    <a href=""><button type="button" class="btn btn-success text-right"><i class="fa fa-plus-circle"></i><span> Registrar</span></button></a>

                                </div>
                            </div>
                        </div>

                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTablePacienteH">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>DNI</th>
                                            <th>Telefono</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <script src="<?php echo SERVERURL ?>/vista/js/hpaciente.js"></script>
