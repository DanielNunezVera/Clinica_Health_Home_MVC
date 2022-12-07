<?php 
require 'Sesiones.php';
$inc = new SesionesController();
    if(!empty($_SESSION["Admin"])){

        unset($_SESSION["Admin"]);
        $_SESSION["Login_error"]="1";
        $inc->redireccionar();
        
    } elseif (!empty($_SESSION['pac'])){

        unset($_SESSION['pac']);
        $_SESSION["Login_error"] = "1";
        $inc->redireccionar();

    } elseif(!empty($_SESSION["auxiliar"])){
        unset($_SESSION["auxiliar"]);
        $_SESSION["Login_error_1"]="1";
        $inc->redireccionar();

    } elseif(!empty($_SESSION["prof"])){
        unset($_SESSION["prof"]);
        $_SESSION["Login_error_1"]="1";
        $inc->redireccionar();
    }

class LoginController{

    public function __construct(){
        require_once "models/LoginModel.php";
    }

    public function index(){

        $tipo_doc = new Login_Model();
        $data["tipo_doc"] = $tipo_doc->get_tipo_doc();
        require_once "views/Login/Login.php";
    }

    public function buscar_funcionario(){

        $validar = new Login_Model();
        $tipo_rol = $_POST['tipo_rol'];
        if(isset($_POST['id_tipo_doc'])){
            $id_tipo_doc = $_POST['id_tipo_doc'];
        }else{
            $id_tipo_doc = null;
        }
        $num_doc = $_POST['num_doc'];
        $pass = $_POST['pass'];
        $resultado["usuario"] = $validar->validar_funcionario($tipo_rol, $id_tipo_doc, $num_doc);
        
        if($tipo_rol == "4"){
            foreach ($resultado["usuario"] as $dato){}
            if(isset($dato)){
                if(password_verify($pass, $dato["pass_admin"])){
                    $_SESSION["Admin"] = $dato["usuario_administrador"];
                    header ("Location: index.php?c=Administrador&a=index");
                }else{
                    $_SESSION["Login_error"] = "2";
                    header ("Location: index.php?c=Login&a=index");
                }
            }else{
                $_SESSION["Login_error"] = "2";
                header ("Location: index.php?c=Login&a=index");
            }
        } elseif($tipo_rol == "2"){
            foreach ($resultado["usuario"] as $dato){}
            if(isset($dato)){
                if(password_verify($pass, $dato["pass_aux"])){
                    $_SESSION["auxiliar"] = $dato["id_auxiliar"];
                    header ("Location: index.php?c=Auxiliar&a=index");

                }else{
                    $_SESSION["Login_error"] = "2";
                    header ("Location: index.php?c=Login&a=index");
                }
            }else{
                $_SESSION["aux_desct_login"] = "1";
                $this->index();

            }

        }elseif($tipo_rol == "1"){
            foreach ($resultado["usuario"] as $dato){}
            if (isset($dato)) {
                if(password_verify($pass, $dato["pass_prof"])){
                    $_SESSION["prof"] = $dato["id_profesional"];
                    header ("Location: index.php?c=Profesional&a=index");
                }else{
                    $_SESSION["Login_error_2"] = "2";
                    header ("Location: index.php?c=Login&a=index");
                }
            }else {
                $_SESSION["prof_des"] = "1";
                $this->index();
            }
            
        }

    }

    public function buscar_paciente(){

        $id_tipo_doc = $_POST['id_tipo_doc'];
        $num_doc = $_POST['num_doc'];
        $pass = $_POST['pass'];
        
        $validar = new Login_model();
        $resultado["usuario"] = $validar->validar_paciente($id_tipo_doc, $num_doc);

        foreach($resultado["usuario"] as $dato){}

        if (isset ($dato)){

            if(password_verify($pass, $dato["pass_pac"])){

                $_SESSION['pac'] = $dato["id_paciente"];
    
                header ("Location: index.php?c=Paciente&a=index");
    
            } else {
    
                $_SESSION['Login_error'] = '2';
    
                header ("Location: index.php?c=Login&a=index");
    
            }

        } else {

            $_SESSION['Login_error'] = '2';

            header ("Location: index.php?c=Login&a=index");

        }

    }

    public function restablecer_contraseña(){
        $tipo_doc = new Login_Model();
        $data["tipo_doc"] = $tipo_doc->get_tipo_doc();
        require_once "views/restablecer_contra/restablecer_pass.php";
    }
}
?>