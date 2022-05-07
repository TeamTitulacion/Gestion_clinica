<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}
class MedicoModelo extends mainModel
{
    protected function MdlListar()
    {
        $sql = mainModel::conectar()->prepare("SELECT * FROM tbl_medico AS m, tbl_categoria AS c, tbl_perfil AS p WHERE m.id_perfil=p.id_perfil and m.id_categoria = c.id_categoria AND 
        m.med_estado !=1 AND m.id_perfil!=1" );
        $sql->execute();
        $respuesta = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $respuesta;
        $sql->close();
        $sql = null;
    }
    protected function MdlIngresar($dato)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO tbl_medico (med_nombre,med_apellido,med_sexo,med_cumpleanos,med_direccion,med_telefono,med_imagen,id_categoria,id_perfil,med_usuario,med_password,med_estado) VAlUES(:nombre,:apellido,:sexo,:fecha,:dir,:tele,:img,:cat,:rol,:user,:pass,0)");


        $sql->execute(array(':nombre' => $dato['nombre'], ':apellido' => $dato['apellido'], ':sexo' => $dato['sexo'], ':fecha' => $dato['fecha'], ':dir' => $dato['dir'], ':tele' => $dato['tele'], ':img' => $dato['img'], ':cat' => $dato['cat'], ':rol' => $dato['rol'], ':user' => $dato['user'], ':pass' => $dato['pass']));

        return $sql;
        $sql->close();
        $sql = null;
    }
    protected function MdlActualizar($dato)
    {

        $sql = mainModel::conectar()->prepare("UPDATE tbl_medico SET med_nombre=:nombre,med_apellido=:apellido,med_sexo=:sexo,med_cumpleanos=:fecha,med_direccion=:dir,med_telefono=:tele,med_imagen=:img,id_categoria=:cat,id_perfil=:rol,med_usuario=:user,med_password=:pass WHERE id_medico=:id");

        $sql->execute(array(':id'=>$dato['id'],':nombre' => $dato['nombre'], ':apellido' => $dato['apellido'], ':sexo' => $dato['sexo'], ':fecha' => $dato['fecha'], ':dir' => $dato['dir'], ':tele' => $dato['tele'], ':img' => $dato['img'], ':cat' => $dato['cat'], ':rol' => $dato['rol'], ':user' => $dato['user'], ':pass' => $dato['pass']));




        return $sql;
        $sql->close();
        $sql = null;
    }
    protected function MdlNoimg($dato)
    {
        $sql = mainModel::conectar()->prepare("UPDATE tbl_medico SET med_nombre=:nombre,med_apellido=:apellido,med_sexo=:sexo,med_cumpleanos=:fecha,med_direccion=:dir,med_telefono=:tele,id_categoria=:cat,id_perfil=:rol,med_usuario=:user,med_password=:pass WHERE id_medico=:id");

        $sql->execute(array(':id'=>$dato['id'],':nombre' => $dato['nombre'], ':apellido' => $dato['apellido'], ':sexo' => $dato['sexo'], ':fecha' => $dato['fecha'], ':dir' => $dato['dir'], ':tele' => $dato['tele'], ':cat' => $dato['cat'], ':rol' => $dato['rol'], ':user' => $dato['user'], ':pass' => $dato['pass']));

        return $sql;
        $sql->close();
        $sql = null;
    }
    protected function MdlEstado($dato)
    {
        $sql = mainModel::conectar()->prepare("UPDATE tbl_medico SET med_estado=:estado WHERE id_medico=:id");
        $sql->execute(array(':id'=>$dato['id'],':estado'=>$dato['estado']));
        return $sql;
        $sql->close();
        $sql = null;
    }
}
