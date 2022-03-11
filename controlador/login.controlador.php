<?php
if ($peticionAjax) {
	require_once "../modelo/login.modelo.php";
} else {
	require_once "./modelo/login.modelo.php";
}
class LoginControlador extends LoginModelo
{
	public function CtrIniciarSession()
	{
		$usuario = mainModel::limpiar_cadena($_POST['user']);
		$password = mainModel::limpiar_cadena($_POST['password']);
		$datosLogin = ["user" => $usuario, "password" => $password];

		$respuesta = LoginModelo:: MdlIniciarSession($datosLogin);
		if ($respuesta->rowCount() == 1) {
			$row = $respuesta->fetch();
			session_start(["name" => "UIC"]);
			$_SESSION['usuario'] = $row['med_usuario'];
			$_SESSION['password'] = $row['med_password'];
			$_SESSION['id']=$row['id_medico'];


			$url = SERVERURL . "/citas";
			return $urllocation = '<script> window.location = "' . $url . '"</script>';
		} else {
			$alerta = [

				"Alerta" => "simple",
				"Titulo" => "error del sistema",
				"Texto" => "usuario y o  contraseña incorrectos",
				"Tipo" => "error",

			];
		}
		return mainModel::sweet_alert($alerta);
	}

	public function CtrCerrarSession()
	{
		session_destroy();
		return  '<script> window.location="index" </script>';
	}
}
