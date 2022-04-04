<?php
require_once "./controlador/login.controlador.php";
require_once "./controlador/paciente.controlador.php";
require_once "./controlador/historia.controlador.php";
require_once "./controlador/medico.controlador.php";
$cerrar = new LoginControlador();
$info = new PacienteControlador();
$res = $info->CtrDecryp();
$historia = new HistoriaControlador();
$infoH = $historia->CtrDatosP($res);
$med= new MedicoControlador();
$list= $med->CtrListar();
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
                                    <button type="button" class="btn btn-success text-right" id="NuevaH"><i class="fa fa-plus-circle"></i><span> Nueva Historia</span></button>

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
                                            <th>Historia</th>
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
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Datos del Paciente</h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Apellido</span>
                                <input id="Apellido" name="Apellido" type="text" value="<?php echo $infoH['pac_apellido'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Nombre</span>
                                <input id="Nombre" name="Nombre" type="text" value="<?php echo $infoH['pac_nombre'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Sexo</label>
                                    <select class="form-control" name="Sexo" id="Sexo">
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Fecha de nacimiento</label>
                                    <input id="FechaNa" name="FechaNa" type="date" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">C.I</span>
                                <input id="CI" name="CI" type="text" value="<?php echo $infoH['pac_dni'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Tipo de sangre</label>
                                    <select class="form-control" name="Sangre" id="Sangre">
                                        <option>O Negativo</option>
                                        <option>O Positivo</option>
                                        <option>A Negativo</option>
                                        <option>A Positivo</option>
                                        <option>B Negativo</option>
                                        <option>B Positivo</option>
                                        <option>AB Negativo</option>
                                        <option>AB Negativo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Estado civil</label>
                                    <select class="form-control" name="Estado" id="Estado">
                                        <option>Soltero</option>
                                        <option>Casado</option>
                                        <option>Viudo</option>
                                        <option>Divorciado</option>
                                        <option>Union Libre</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Direccion</span>
                                <input id="Dirr" name="Dirr" type="text" value="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Correo</span>
                                <input id="Corre" name="Corre" type="text" value="<?php echo $infoH['pac_correo'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Telefono</span>
                                <input id="Tele" name="Tele" type="text" value="<?php echo $infoH['pac_telefono'] ?>" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="BtnGuardar" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="elecDoc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Datos del Paciente</h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                        <div class="col-md-6 form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Medico</span>
                                <select class="form-control" name="med" id="med">
                                    <?php 
                                    foreach ($list as $key => $value) {
                                        ?>
                                        <option value="<?php echo $value['id_medico'] ?>"><?php echo $value['med_nombre'].' '.$value['med_apellido'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="Btncrear" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo SERVERURL ?>/vista/js/hpaciente.js"></script>