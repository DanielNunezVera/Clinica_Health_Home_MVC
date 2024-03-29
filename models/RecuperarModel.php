<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once 'vendor/autoload.php';

	class Recuperar_model {

		private $db;
        private $sched_res;

        public function __construct(){
			$this->db = Conectar::conexion();
            $this->sched_res = array();
		}


        public function get_email($id_tipo_doc, $num_doc, $tipo_rol){
            $sql = "CALL email('$id_tipo_doc', '$num_doc', '$tipo_rol');";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->sched_res[] = $row;
			}
            return $this->sched_res;
		}

        public function send_email($key, $email){
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = 2;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp-mail.outlook.com';                    //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'clinica_health_home@outlook.com';                     //SMTP username
                $mail->Password   = 'Grupo72023';                               //SMTP password
                $mail->SMTPSecure = 'SSL';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            
                //Recipients
                $mail->setFrom('clinica_health_home@outlook.com', 'Sistema administrativo');
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
                $mail->Body    = 'El nuevo codigo para poder ingresar a los servicios es: <b>'.$key.'</b>';
                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();
                return 1;
            } catch (Exception $e) {
                return 0;
                // return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
		}

    }

?>

