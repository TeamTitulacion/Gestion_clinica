<?php 
require_once "./controlador/login.controlador.php";
require_once "./controlador/medico.controlador.php";
$cerrar = new LoginControlador();
if (!isset($_SESSION['usuario']) || !isset($_SESSION['password'])) {
    echo $cerrar->CtrCerrarSession();
} 
$med= new MedicoControlador();
$list= $med->CtrListar();
?>
<div id="wrapper">
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Citas</h1>
                </div>
            </div>
            <div class="panel-default">
                <div class="panel-body">
                    <div id="calendar"></div>
                </div>
            </div>

        </div>
        <!-- Modal -->
        <div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="titulos"></h4>
                    </div>
                    <form id="formulario" data-form="save"  enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="hidden" id="id" name="id">
                                <label for="title" class="form-label">Evento</label>
                                <input type="text" class="form-control" id="title" name="title">

                            </div>
                            <div class="form-floating mb-3">
                                <label for="start" class="form-label">Fecha</label>
                                <input type="date" class="form-control" id="start" name="start">

                            </div>
                            <div class="form-floating mb-3">
                                <label for="hora" class="form-label">Hora</label>
                                <input type="time" class="form-control" id="hora" name="hora" min="09:00" max="17:00" required pattern="[0-9]{2}:[0-9]{2}">

                            </div>
                            <div class="form-floating mb-3">
                                <label for="doc" class="form-label">Odontologo</label>
                                <select name="Odonto" id="Odonto" class="form-control">
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
                        <div class="modal-footer">
                            
                                
                                <button class="btn btn-success" id="btnAccion" type="submit">Registrar</button> 
                                <button class="btn btn-success" id="btnActualizar" type="button">Modificar</button>                             
                                <button type="button" class="btn btn-warning" id="btnEliminar">Eliminar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            

                            
                        </div>
                        
                    </form>

                </div>
            </div>
            
        </div>
    </div>


</div>
<script src="<?php echo SERVERURL ?>/vista/js/fullcalendar/app.js"></script>

<script src="<?php echo SERVERURL ?>/vista/js/fullcalendar/main.min.js"></script>