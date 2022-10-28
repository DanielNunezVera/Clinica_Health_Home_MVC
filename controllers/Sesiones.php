<?php 

class SesionesController{

    public function __construct(){
        session_start();
    }

    public function redireccionar(){
        header ("Location: index.php?c=Login&a=index");
    }


}


?>