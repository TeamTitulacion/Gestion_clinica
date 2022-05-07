<?php
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}
class CalendarModelo extends mainModel
{
    protected function MdlListar()
    {
        $sql=mainModel::conectar()->prepare("SELECT id_cita AS id, cit_title AS title, cit_start AS start FROM tbl_citas");
        $sql->execute();
        
        return $sql;
        $sql->close();
        $sql = null;
    }
    //Insertar
    protected function MdlRegistrar($dato)
    {
        $fecha = $dato['fecha'];
        $evento = $dato['evento'];
        
        $sql = mainModel::conectar()->prepare("INSERT INTO tbl_citas (cit_title, cit_start) VALUES(:evento, :fecha)");
        $sql->bindParam(":evento", $evento, PDO::PARAM_STR);
        $sql->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }
    
    
    // Actualizar
    protected function MdlActualzar($dato)
    {
        $sql = mainModel::conectar()->prepare("UPDATE tbl_citas SET cit_title = :evento , cit_start = :fecha   WHERE id_cita= :id");

        $sql->execute(array(':evento' => $dato['evento'], ':fecha' => $dato['fecha'], ':id' => $dato['id']));

        return $sql;

        $sql->close();
        $sql = null;
    }
    //eliminar
    protected function MdlEliminar($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM tbl_citas WHERE id_cita =:id ");
        $sql->execute(array(":id" =>$id));
        return $sql;
        $sql->close();
        $sql = null;
    }
}
