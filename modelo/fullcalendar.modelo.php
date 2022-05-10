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
        $sql=mainModel::conectar()->prepare("SELECT c.id_cita AS id, c.cit_title AS title, c.cit_start AS start,c.id_medico as custom_param1, CONCAT(m.med_nombre,' ',m.med_apellido) as custom_param2,c.id_paciente as custom_param3, CONCAT(p.pac_nombre,' ',p.pac_apellido) as custom_param4 FROM tbl_citas as c,tbl_medico as m,tbl_pacientep as p WHERE c.id_medico= m.id_medico AND c.id_paciente=p.id_paciente");
        $sql->execute();
        
        return $sql;
        $sql->close();
        $sql = null;
    }
    protected function MdlListarMed($id)
    {
        $sql=mainModel::conectar()->prepare("SELECT c.id_cita AS id, c.cit_title AS title, c.cit_start AS start,c.id_medico as custom_param1, CONCAT(m.med_nombre,' ',m.med_apellido) as custom_param2,c.id_paciente as custom_param3, CONCAT(p.pac_nombre,' ',p.pac_apellido) as custom_param4 FROM tbl_citas as c,tbl_medico as m,tbl_pacientep as p WHERE c.id_medico= m.id_medico AND c.id_paciente=p.id_paciente AND m.id_medico='$id' ");
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
        $odonto = $dato['odonto'];
        $pac=$dato['pac'];
        $sql = mainModel::conectar()->prepare("INSERT INTO tbl_citas (cit_title, cit_start,id_medico,id_paciente) VALUES(:evento, :fecha, :medi, :pac)");
        $sql->bindParam(":evento", $evento, PDO::PARAM_STR);
        $sql->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $sql->bindParam(":medi", $odonto, PDO::PARAM_STR);
        $sql->bindParam(":pac", $pac, PDO::PARAM_STR);
        $sql->execute();
        return $sql;
        $sql->close();
        $sql = null;
    }
    
    
    // Actualizar
    protected function MdlActualzar($dato)
    {
        $sql = mainModel::conectar()->prepare("UPDATE tbl_citas SET cit_title = :evento , cit_start = :fecha, id_medico= :medi, id_paciente=:pac   WHERE id_cita= :id");

        $sql->execute(array(':evento' => $dato['evento'], ':fecha' => $dato['fecha'], ':id' => $dato['id'],':medi'=>$dato['odonto'],'pac'=>$dato['pac']));

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
