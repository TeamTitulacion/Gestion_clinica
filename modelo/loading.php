<?php  
$peticionAjax=true;
if ($peticionAjax) {
    require_once "../core/mainModel.php";
} else {
    require_once "./core/mainModel.php";
}
//Listar eventos en el calendar XD
class Loading extends mainModel{
    public function MdlListar()
    {
        $sql = mainModel::conectar()->prepare("SELECT id_cita, cit_title AS title, cit_start AS start, cit_color AS color FROM tbl_citas");
        $sql ->execute();        
       $datos=$sql->fetchAll(PDO::FETCH_ASSOC);
        return $datos;
       var_dump($datos);
    
    }


}



?> 