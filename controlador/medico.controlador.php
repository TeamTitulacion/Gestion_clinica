<?php
if ($peticionAjax) {
    require_once "../modelo/medico.modelo.php";
} else {
    require_once "./modelo/medico.modelo.php";
}
class MedicoControlador extends MedicoModelo{
    public function CtrListar()
    {
        $lista=MedicoModelo::MdlListar();
        return $lista;
    }
    public function CtrIngresar()
    {
        $nombre=mainModel::limpiar_cadena($_POST['nombre']);
        $apellido=mainModel::limpiar_cadena($_POST['apellido']);
        $sexo=mainModel::limpiar_cadena($_POST['sexo']);
        $fecha=mainModel::limpiar_cadena($_POST['fecha']);
        $dir=mainModel::limpiar_cadena($_POST['dir']);
        $tele=mainModel::limpiar_cadena($_POST['tele']);
        $img=mainModel::limpiar_cadena($_POST['img']);
        $cat=mainModel::limpiar_cadena($_POST['cat']);
        $rol=mainModel::limpiar_cadena($_POST['rol']);
        $user=mainModel::limpiar_cadena($_POST['user']);
        $pass=mainModel::limpiar_cadena($_POST['pass']);
        
        $dato=["nombre"=>$nombre,"apellido"=>$apellido,"sexo"=>$sexo,"fecha"=>$fecha,"dir"=>$dir,"tele"=>$tele,"img"=>$img,"cat"=>$cat,"rol"=>$rol,"user"=>$user,"pass"=>$pass];

        $registrar = MedicoModelo::MdlIngresar($dato);

        if ($registrar->rowCount() >= 1) {
            echo "1";
        } else {
            echo "2";
        }
        
    }
    public function CtrCategoria()
    {
       $consulta=mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_categoria");
       $catres=$consulta->fetchAll();
       
       return $catres;
    }
    public function CtrPerfil()
    {
       $sql=mainModel::ejecutar_consulta_simple("SELECT * FROM tbl_perfil");
       $peres=$sql->fetchAll();
       return $peres;
    }
}