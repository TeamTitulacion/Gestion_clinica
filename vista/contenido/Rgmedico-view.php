<?php
require_once "./controlador/medico.controlador.php";
$meids = new MedicoControlador();
$cat = $meids->CtrCategoria();
$per = $meids->CtrPerfil();



?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Registro de Medicos</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Informacion Personal
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form role="form" autocomplete="off" id="frmRegistrar">
                                    <div class="col-lg-6">
                                        <div class="form-group" id="claseError">
                                            <label>Nombre</label>
                                            <input class="form-control" type="text" placeholder="Ingrese nombre" id="nombre">
                                        </div>
                                        <div class="form-group" id="claseError">
                                            <label>Apellido</label>
                                            <input class="form-control" type="text" placeholder="Ingrese apellido" id="apellido">
                                        </div>
                                        <div class="form-group" id="claseError">
                                            <label>Sexo</label>
                                            <select class="form-control" id="sexo">
                                                <option>Masculino</option>
                                                <option>Femenino</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="claseError">
                                            <label>Fecha de nacimiento</label>
                                            <input type="date" class="form-control" placeholder="Enter text" id="fecha">
                                        </div>
                                        <div class="form-group" id="claseError">
                                            <label>Direccion</label>
                                            <input class="form-control" type="text" placeholder="Ingrese Direccion" id="dir">
                                        </div>
                                        <div class="form-group" id="claseError">
                                            <label>Telefono</label>
                                            <input class="form-control" type="text" placeholder="Ingrese Telefono" id="tele">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="text-center hide " id="preview">
                                                <img src="" alt="" id="img-foto" style="width: 50%; height:50% ;">
                                            </div>
                                            <p class="form-control-static">Ingrese una imagen de perfil (Formatos: png o jpg)</p>
                                            <input type="file" accept="image/png, .jpg, .jpeg" onchange="vista(event)" id="img">
                                        </div>
                                        <div class="form-group" id="claseError">
                                            <label>Categoria</label>
                                            <select class="form-control" id="cat">
                                                <?php foreach ($cat as $key => $value) {
                                                ?><option value="<?php echo $value["id_categoria"]; ?>"><?php echo $value["cat_detalle"]; ?></option>
                                                <?php }; ?>
                                            </select>
                                        </div>
                                        <div class="form-group" id="claseError">
                                            <label>Rol</label>
                                            <select class="form-control" id="rol">
                                                <?php foreach ($per as $key => $value) {
                                                ?><option value="<?php echo $value["id_perfil"]; ?>"><?php echo $value["per_detalle"]; ?></option>
                                                <?php }; ?>
                                            </select>
                                        </div>
                                        <div class="form-group" id="claseError">
                                            <label>Usuario</label>
                                            <input class="form-control" type="text" placeholder="Ingrese Usuario" id="user">
                                        </div>
                                        <div class="form-group" id="claseError">
                                            <label>Contraseña</label>
                                            <input class="form-control" type="password" placeholder="Ingrese contraseña" id="pass">
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">

                                        <button class="btn btn-success  btn-lg btn-block" id="btnRegistro" type="submit">Registrar</button>
                                    </div>

                                </form>
                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<script type="text/javascript" src="<?php echo SERVERURL ?>/vista/js/previewImagen.js"></script>
<script type="text/javascript" src="<?php echo SERVERURL ?>/vista/js/medicocrud.js"></script>