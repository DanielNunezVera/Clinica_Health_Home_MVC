<?php

class RecuperarpController {

        public function __construct(){
            require_once "models/RecuperarModel.php";
            require_once "models/LoginModel.php";
        }

        public function Restablecer_pass(){
            $rest_pass= new Recuperar_model();
            $rest_pass_1= new Login_model();
            $id_tipo_doc = $_POST['id_tipo_doc'];
            $num_doc = $_POST['num_doc'];
            $tipo_usuario = $_POST['tipo_usuario'];
            if ($tipo_usuario == 1) {
                $correo = "correo_prof";
            }elseif ($tipo_usuario == 2) {
                $correo = "correo_aux";
            }elseif ($tipo_usuario == 3) {
                $correo = "correo_pac";
            }
            $key = "";
            $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
            $max = strlen($pattern)-1;
            for($i = 0; $i <6; $i++){
                $key .= substr($pattern, mt_rand(0,$max), 1);
            }
            $new_pass = password_hash($key, PASSWORD_BCRYPT);
            $data["email"] = $rest_pass->get_email($id_tipo_doc, $num_doc, $tipo_usuario);
            foreach ($data["email"] as $dato) {
                $email = $dato["$correo"];
            }
            $resultado_2 = $rest_pass ->send_email($key, $email);
            if($resultado_2==1){
                $resultado_1 = $rest_pass_1->vali_rec_pass($id_tipo_doc, $num_doc, $tipo_usuario, $new_pass);
                if ($resultado_1>0) {
                    header ("Location: index.php?c=Login&a=restablecer_contraseña&id=pass_send");
                }else{
                    header ("Location: index.php?c=Login&a=restablecer_contraseña&id=error_especial");
                }
            }else {
                header ("Location: index.php?c=Login&a=restablecer_contraseña&id=error_email");
            }
        }
    }

?>