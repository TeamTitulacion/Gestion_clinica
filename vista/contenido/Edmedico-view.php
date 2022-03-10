<?php
require_once './controlador/medico.controlador.php';
$obj = new MedicoControlador();
$medit = $obj->CtrObtenerdatos();
$perid = $obj->CtrPerfilista($medit['id_perfil']);
$catid = $obj->CtrCategorialista($medit['id_categoria']);
?>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Actualizar informacion Medicos</h1>
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
                                <form role="form" autocomplete="off" id="frmActualizar">
                                    <input class="hidden" id="id" type="text" value="<?php echo $medit['id_medico']?>">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input class="form-control" type="text" value="<?php echo $medit['med_nombre'] ?>" id="nombre">
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido</label>
                                            <input class="form-control" type="text" value="<?php echo $medit['med_apellido'] ?>" id="apellido">
                                        </div>
                                        <div class="form-group">
                                            <label>Sexo</label>
                                            <select class="form-control" id="sexo">
                                                <?php if ($medit['med_sexo'] == "1") {
                                                ?><option value="1">Masculino</option>
                                                    <option value="2">Femenino</option>
                                                <?php
                                                } else {
                                                ?><option value="2">Femenino</option>
                                                    <option value="1">Masculino</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha de nacimiento</label>
                                            <input type="date" class="form-control" value="<?php echo $medit['med_cumpleanos'] ?>" id="fecha">
                                        </div>
                                        <div class="form-group">
                                            <label>Direccion</label>
                                            <input class="form-control" type="text" value="<?php echo $medit['med_direccion'] ?>" id="dir">
                                        </div>
                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input class="form-control" type="text" value="<?php echo $medit['med_telefono'] ?>" id="tele">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="text-center" id="preview">
                                                <img src="<?php echo SERVERURL?>/vista/img/perfil/<?php echo $medit['med_imagen']?>" alt="" id="img-foto" style="width: 50%; height:50% ;">
                                            </div>
                                            <p class="form-control-static">Ingrese una imagen de perfil (Formatos: png o jpg)</p>
                                            <input type="file" accept="image/png, .jpg, .jpeg" onchange="vista(event)"id="img" name="img">
                                        </div>
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <select class="form-control"id="cat">

                                                <option value="<?php echo $medit['id_categoria'] ?>"><?php echo $medit['cat_detalle'] ?></option>
                                                <?php foreach ($catid as $key => $value) {
                                                ?><option value="<?php echo $value['id_categoria']  ?>"><?php echo $value['cat_detalle']  ?></option><?php
                                                                                                                                                        }  ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Rol</label>

                                            <select class="form-control"id="rol">
                                                <option value="<?php echo $medit['id_perfil'] ?>"><?php echo $medit['per_detalle'] ?></option>
                                                <?php foreach ($perid as $key => $value) {
                                                ?><option value="<?php echo $value['id_perfil']  ?>"><?php echo $value['per_detalle']  ?></option><?php
                                                                                                                                                    }  ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input class="form-control" type="text" value="<?php echo $medit['med_usuario'] ?>"id="user">
                                        </div>
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input class="form-control" type="password" value="<?php echo $medit['med_password'] ?>"id="pass">
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button class="btn btn-success  btn-lg btn-block" id="btnAccion" type="submit">Registrar</button>
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
<script src="<?php echo SERVERURL ?>/vista/js/previewImagen.js"></script>
<script src="<?php echo SERVERURL ?>/vista/js/medicocrud.js"></script>