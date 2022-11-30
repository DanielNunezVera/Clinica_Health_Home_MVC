<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions

class RecuperarpController {

        public function __construct(){
            require_once "models/RecuperarModel.php";
        }

        public function Restablecer_pass(){
            $id_tipo_doc = $_POST['id_tipo_doc'];
            $num_doc = $_POST['num_doc'];
            $tipo_usuario = $_POST['tipo_usuario'];
            $key = "";
            $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
            $max = strlen($pattern)-1;
            for($i = 0; $i <6; $i++){
                $key .= substr($pattern, mt_rand(0,$max), 1);
            }
            $new_pass = password_hash($key, PASSWORD_BCRYPT);
            $rest_pass= new Recuperar_model();
            $resultado2 = $rest_pass->vali_rec_pass($id_tipo_doc, $num_doc, $tipo_usuario, $new_pass);
            $data["email"] = $rest_pass->get_email($id_tipo_doc, $num_doc, $tipo_usuario);
            if ($tipo_usuario == 1) {
                $correo = "correo_prof";
            }elseif ($tipo_usuario == 2) {
                $correo = "correo_aux";
            }elseif ($tipo_usuario == 3) {
                $correo = "correo_pac";
            }
            foreach ($data["email"] as $dato) {
                $email = $dato["$correo"];
            }

            if ($resultado2>0) {
                $mail = new PHPMailer(true);
                try {
                    //Server settings
                    $mail->SMTPDebug = 2;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp-mail.outlook.com';                    //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 't.h.n.e.d.i@outlook.com';                     //SMTP username
                    $mail->Password   = 'Septiembre202001';                               //SMTP password
                    $mail->SMTPSecure = SSL;            //Enable implicit TLS encryption
                    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                
                    //Recipients
                    $mail->setFrom('t.h.n.e.d.i@outlook.com', 'Sistema administrativo');
                    $mail->addAddress($email, 'Usuario');     //Add a recipient
                    // $mail->addAddress('ellen@example.com');               //Name is optional
                    // $mail->addReplyTo('info@example.com', 'Information');
                    // $mail->addCC('cc@example.com');
                    // $mail->addBCC('bcc@example.com');
                
                    //Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
                
                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Codigo de acceso a la plataforma';
                    $mail->Body    = 'La nueva contraseña para poder inresar a los servicios es:<b>'.$key.'</b>';
                    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    $_SESSION["rec_contra"]="1";
                    $mail->send();
                    header ("Location: index.php?c=Login&a=index");
                } catch (Exception $e) {
                    $_SESSION["rec_contra"]="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    header ("Location: index.php?c=Login&a=index");
                }
            }else {
                $_SESSION["rec_contra"]="0";
                header ("Location: index.php?c=Login&a=index");

            }
    }

        }

    ?>