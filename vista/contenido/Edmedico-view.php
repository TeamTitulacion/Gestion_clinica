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
                                <form role="form" autocomplete="off">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input class="form-control" type="text" placeholder="Ingrese nombre">
                                        </div>
                                        <div class="form-group">
                                            <label>Apellido</label>
                                            <input class="form-control" type="text" placeholder="Ingrese apellido">
                                        </div>
                                        <div class="form-group">
                                            <label>Sexo</label>
                                            <select class="form-control">
                                                <option>Masculino</option>
                                                <option>Femenino</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha de nacimiento</label>
                                            <input type="date" class="form-control" placeholder="Enter text">
                                        </div>
                                        <div class="form-group">
                                            <label>Direccion</label>
                                            <input class="form-control" type="text" placeholder="Ingrese Direccion">
                                        </div>
                                        <div class="form-group">
                                            <label>Telefono</label>
                                            <input class="form-control" type="text" placeholder="Ingrese Telefono">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="text-center hide " id="preview">
                                                <img src="" alt="" id="img-foto" style="width: 50%; height:50% ;">
                                            </div>
                                            <p class="form-control-static">Ingrese una imagen de perfil (Formatos: png o jpg)</p>
                                            <input type="file" accept="image/png, .jpg, .jpeg" onchange="vista(event)">
                                        </div>
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Rol</label>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input class="form-control" type="text" placeholder="Ingrese Usuario">
                                        </div>
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input class="form-control" type="password" placeholder="Ingrese contraseña">
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