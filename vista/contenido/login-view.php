<!-- Start: Login Form Dark -->
<section class="login-dark">
    <form method="post" autocomplete="off">
    <div class="atras">
        <a href="index"  class="fa fa-arrow-circle-left fa-fw"></a>
    </div>
        <div class="illustration"><img  src="<?php echo SERVERURL ?>/vista/img/logo.png" alt="CruzMediDental"></div>
        <div class="form-group"><input class="form-control" type="text" name="user" placeholder="Usuario"></div>
        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Contraseña"></div>
        <input type="submit" value="Iniciar sesión" class="btn btn-lg btn-success btn-block">
    </form>
</section><!-- End: Login Form Dark -->

<?php
if (isset($_POST['user']) && isset($_POST['password'])) {
    require_once "./controlador/login.controlador.php";

    $login = new LoginControlador();

    $login = $login->CtrIniciarSession();
    echo $login;
}
?>