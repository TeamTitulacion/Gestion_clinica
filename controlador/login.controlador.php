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

		$respuesta = LoginModelo::MdlIniciarSession($datosLogin);
		if ($respuesta->rowCount() == 1) {
			$row = $respuesta->fetch();
			session_start(["name" => "UIC"]);
			$_SESSION['usuario'] = $row['med_usuario'];
			$_SESSION['password'] = $row['med_password'];
			$_SESSION['id'] = $row['id_medico'];
			$_SESSION['rol'] = $row['id_perfil'];
			if (isset($_SESSION['rol'])) {
				switch ($_SESSION['rol']) {
					case 1:
						$url = SERVERURL . "/dashboard";
						return $urllocation = '<script> window.location = "' . $url . '"</script>';
						break;
					case 2:
						$url = SERVERURL . "/citas";
						return $urllocation = '<script> window.location = "' . $url . '"</script>';
						break;
					case 3:
						$url = SERVERURL . "/citas";
						return $urllocation = '<script> window.location = "' . $url . '"</script>';
						break;

					default:

						break;
				}
			}
		} else {
			echo '<script> Swal.fire("Error", "Credenciales Incorrectas!", "warning");</script>';
		}
	}

	public function CtrCerrarSession()
	{
		session_destroy();
		return  '<script> window.location="index" </script>';
	}
}
