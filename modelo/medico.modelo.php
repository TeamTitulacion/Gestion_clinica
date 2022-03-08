<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}
class MedicoModelo extends mainModel{
protected function MdlListar()
{
    $sql=mainModel::conectar()->prepare("SELECT * FROM tbl_medico AS m, tbl_categoria AS c, tbl_perfil AS p WHERE m.id_perfil=p.id_perfil and m.id_categoria = c.id_categoria");
    $sql->execute();
    $respuesta=$sql->fetchAll(PDO::FETCH_ASSOC);
    return json_encode($respuesta,JSON_UNESCAPED_UNICODE);
    $sql->close();
    $sql=null;
}
protected function MdlIngresar($dato)
{
    $sql=mainModel::conectar()->prepare("INSERT INTO tbl_medico (med_nombre,med_apellido,med_sexo,med_cumpleanos,med_direccion,med_telefono,med_imagen,id_categoria,id_perfil,med_usuario,med_password) VAlUES(:nombre,:apellido,:sexo,:fecha,:dir,:tele,:img,:cat,:rol,:user,:pass)");


    $sql->execute(array(':nombre'=>$dato['nombre'],':apellido'=>$dato['apellido'],':sexo'=>$dato['sexo'],':fecha'=>$dato['fecha'],':dir'=>$dato['dir'],':tele'=>$dato['tele'],':img'=>$dato['img'],':cat'=>$dato['cat'],':rol'=>$dato['rol'],':user'=>$dato['user'],':pass'=>$dato['pass']));

    return $sql;
    $sql->close();
    $sql=null;
}


}