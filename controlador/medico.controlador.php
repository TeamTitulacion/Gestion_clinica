<?php
if ($peticionAjax) {
    require_once "../modelo/medico.modelo.php";
} else {
    require_once "./modelo/medico.modelo.php";
}
class MedicoControlador extends MedicoModelo
{
    public function CtrListar()
    {
        $lista = MedicoModelo::MdlListar();
        return $lista;
    }
    public function CtrDoctor()
    {
        $lista = MedicoModelo::MdlListar();
        return $lista;
    }
    public function CtrIngresar($urlimg, $pathimg)
    {
        $nombre = mainModel::limpiar_cadena($_POST['nombre']);
        $apellido = mainModel::limpiar_cadena($_POST['apellido']);
        $sexo = mainModel::limpiar_cadena($_POST['sexo']);
        $fecha = mainModel::limpiar_cadena($_POST['fecha']);
        $dir = mainModel::limpiar_cadena($_POST['dir']);
        $tele = mainModel::limpiar_cadena($_POST['tele']);
        $cat = mainModel::limpiar_cadena($_POST['cat']);
        $rol = mainModel::limpiar_cadena($_POST['rol']);
        $user = mainModel::limpiar_cadena($_POST['user']);
        $pass = mainModel::limpiar_cadena($_POST['pass']);
        $subirurl = direccion . '\vista\img\perfil\\' . basename($pathimg);

        if (move_uploaded_file($urlimg, $subirurl)) {
            $dato = ["nombre" => $nombre, "apellido" => $apellido, "sexo" => $sexo, "fecha" => $fecha, "dir" => $dir, "tele" => $tele, "img" => $pathimg, "cat" => $cat, "rol" => $rol, "user" => $user, "pass" => $pass];

            $registrar = MedicoModelo::MdlIngresar($dato);

            if ($registrar->rowCount() >= 1) {
                echo "1";
            } else {
                echo "2";
            }
        }
    }
    public function CtrCategoria()
    {
        $consulta = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_categoria");
        $catres = $consulta->fetchAll();

        return $catres;
    }
    public function CtrPerfil()
    {
        $sql = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_perfil");
        $peres = $sql->fetchAll();
        return $peres;
    }
    public function CtrEncryp()
    {
        $enc = $_POST['enc'];
        $resajax = mainModel::encryption($enc);
        return $resajax;
    }
    public function CtrObtenerdatos()
    {
        $desencryp = explode("/", $_GET['views']);
        $idpass = mainModel::decryption($desencryp[1]);
        $idpass = mainModel::limpiar_cadena($idpass);
        $query = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_medico AS m, tbl_categoria AS c, tbl_perfil AS p WHERE id_medico='$idpass' AND m.id_categoria=c.id_categoria AND p.id_perfil=m.id_perfil");
        $respuesta = $query->fetch();
        return $respuesta;
    }
    public function CtrPerfilista($dato)
    {
        $query = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_perfil WHERE id_perfil!='$dato'");
        $respuesta = $query->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta;
    }
    public function CtrCategorialista($dato)
    {
        $query = mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_categoria  WHERE id_categoria!='$dato'");
        $respuesta = $query->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta;
    }
    public function CtrActualizar($urlimg, $pathimg)
    {
        $id = mainModel::limpiar_cadena($_POST['id']);
        $nombre = mainModel::limpiar_cadena($_POST['nombreUP']);
        $apellido = mainModel::limpiar_cadena($_POST['apellidoUP']);
        $sexo = mainModel::limpiar_cadena($_POST['sexoUP']);
        $fecha = mainModel::limpiar_cadena($_POST['fechaUP']);
        $dir = mainModel::limpiar_cadena($_POST['dirUP']);
        $tele = mainModel::limpiar_cadena($_POST['teleUP']);
        $cat = mainModel::limpiar_cadena($_POST['catUP']);
        $rol = mainModel::limpiar_cadena($_POST['rolUP']);
        $user = mainModel::limpiar_cadena($_POST['userUP']);
        $pass = mainModel::limpiar_cadena($_POST['passUP']);
        $subirurl = direccion . '\vista\img\perfil\\' . basename($pathimg);

        $dato = ["id" => $id, "nombre" => $nombre, "apellido" => $apellido, "sexo" => $sexo, "fecha" => $fecha, "dir" => $dir, "tele" => $tele, "img" => $pathimg, "cat" => $cat, "rol" => $rol, "user" => $user, "pass" => $pass];


        if (move_uploaded_file($urlimg, $subirurl)) {
            $registrar = MedicoModelo::MdlActualizar($dato);
            if ($registrar->rowCount() >= 1) {
                echo "1";
            } else {
                echo "2";
            }
        }
    }
    public function CtrNoimg()
    {
        $id = mainModel::limpiar_cadena($_POST['id']);
        $nombre = mainModel::limpiar_cadena($_POST['nombreUP']);
        $apellido = mainModel::limpiar_cadena($_POST['apellidoUP']);
        $sexo = mainModel::limpiar_cadena($_POST['sexoUP']);
        $fecha = mainModel::limpiar_cadena($_POST['fechaUP']);
        $dir = mainModel::limpiar_cadena($_POST['dirUP']);
        $tele = mainModel::limpiar_cadena($_POST['teleUP']);
        $cat = mainModel::limpiar_cadena($_POST['catUP']);
        $rol = mainModel::limpiar_cadena($_POST['rolUP']);
        $user = mainModel::limpiar_cadena($_POST['userUP']);
        $pass = mainModel::limpiar_cadena($_POST['passUP']);


        $dato = ["id" => $id, "nombre" => $nombre, "apellido" => $apellido, "sexo" => $sexo, "fecha" => $fecha, "dir" => $dir, "tele" => $tele, "cat" => $cat, "rol" => $rol, "user" => $user, "pass" => $pass];


        $registrar = MedicoModelo::MdlNoimg($dato);
        if ($registrar->rowCount() >= 1) {
            echo "1";
        } else {
            echo "2";
        }
    }
    public function CtrEstado()
    {
        $id = mainModel::limpiar_cadena($_POST['id']);
        $estado = mainModel::limpiar_cadena($_POST['estado']);

        $dato = ["id" => $id, "estado" => $estado];
        $resEstado = MedicoModelo::MdlEstado($dato);
        if ($resEstado->rowCount() >= 1) {
            echo "1";
        } else {
            echo "2";
        }
    }
}
