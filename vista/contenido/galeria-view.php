<?php
require_once './controlador/index.controlador.php';
if ($_SESSION['rol'] != 1) {
    $url = SERVERURL . "/permiso";
    echo $urllocation = '<script> window.location = "' . $url . '"</script>';
}
$galeria = new Index();
$img = $galeria->CtrGaleria();
$med = $galeria->CtrMedicos();
?>
<div id="wrapper">
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Galeria</h1>
                </div>
                <div class="col-lg-12 form-group btn1">
                    <button class="btn btn-info sv1"><span class="fa fa-cloud-upload"></span> Subir Imagen</button>
                    <button class="btn btn-warning" id="eliminar"><span class="fa fa-close"></span> Eliminar</button>
                </div>

            </div>
            <div class="col-lg-12 deleteList">
                <?php foreach ($img as $key) { ?>
                    <span class="galeria"><img id="<?php echo $key ?>" style="width:15%;" src="<?php echo SERVERURL ?>/assets/app/galeria/<?php echo $key ?>" alt="">
                        <button class="delete hidden">
                        </button>
                    </span>
                <?php }  ?>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nuestros Doctores</h1>
                </div>
                <div class="col-lg-12 form-group btn2">
                    <button class="btn btn-info sv2"><span class="fa fa-cloud-upload"></span> Subir Imagen</button>
                    <button class="btn btn-warning" id="sv3"><span class="fa fa-close"></span> Eliminar</button>
                </div>
            </div>
            <div class="col-lg-12 deleteList1">
                <?php foreach ($med as $key) { ?>
                    <span class="eli"><img id="<?php echo $key ?>" style="width:15%;" src="<?php echo SERVERURL ?>/assets/app/medico/<?php echo $key ?>" alt="<?php echo $key ?>">
                        <button class="del hidden">
                        </button>
                </span>
                <?php }  ?>
            </div>




        </div>
    </div>
</div>
<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="titulos"></h4>
            </div>
            <form id="formulario" data-form="save" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="hidden" id="id" name="id">
                        <label for="title" class="form-label">Seleccione una imagen</label>
                        <input type="file" accept="image/png, .jpg, .jpeg" class="form-control" name="img">
                    </div>

                </div>
                <div class="modal-footer">


                    <button class="btn btn-success" id="btnAccion" type="submit">Subir</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>



                </div>

            </form>

        </div>
    </div>

</div>
<script src="<?php echo SERVERURL ?>/vista/js/index.js"></script>