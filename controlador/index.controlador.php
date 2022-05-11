<?php
class Index
{
    public function CtrGaleria()
    {
        $path = "C:\\xampp\\htdocs\\Gestion_clinica\\assets\\app\\galeria\\";
        $gale = preg_grep('~\.(jpg|png|jpeg)$~', scandir($path));
        return $gale;
    }
    public function CtrEliminarGal()
    {
        $delgale = $_POST['img'];
        $path = "C:\\xampp\\htdocs\\Gestion_clinica\\assets\\app\\galeria\\";
       
        if (unlink($path.$delgale)) {
            echo "1";
        }
        else {
            echo "2";
        }
    }
    public function CtrEliminarMed()
    {
        $delgale = $_POST['med'];
        $path = "C:\\xampp\\htdocs\\Gestion_clinica\\assets\\app\\medico\\";
       
        if (unlink($path.$delgale)) {
            echo "1";
        }
        else {
            echo "2";
        }
    }
    public function CtrMedicos()
    {
        $path = "C:\\xampp\\htdocs\\Gestion_clinica\\assets\\app\\medico\\";
        $med = preg_grep('~\.(jpg|png|jpeg)$~', scandir($path));
        return $med;
    }
    public function CtrImgaleria($path, $name)
    {
        $subirurl = direccion . '\assets\\app\\galeria\\' . basename($name);
        if (move_uploaded_file($path, $subirurl)) {
            echo "1";
        } else {
            echo "2";
        }
    }
    public function CtrImgMedico($path, $name)
    {
        $subirurl = direccion . '\assets\\app\\medico\\' . basename($name);
        if (move_uploaded_file($path, $subirurl)) {
            echo "1";
        } else {
            echo "2";
        }
    }
}
