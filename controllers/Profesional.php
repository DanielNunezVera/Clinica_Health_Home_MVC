<?php
	
	require_once 'Sesiones.php';
	$inc = new SesionesController();
	if(empty($_SESSION["prof"])){
		$inc->redireccionar();
	}

    class ProfesionalController {

        public function __construct(){
			require_once "models/ProfesionalModel.php";
		}

		public function index(){
			
			require_once "views/profesional/menu_prof.php";
		}

		public function acciones(){
			require_once "views/profesional/index_prof.php";
		}

		public function cerrarsesion(){
			session_destroy();
			header ("Location: index.php?c=login&a=index");
		}
		
        public function set_citas_prom_prof(){
			$id_prof = $_SESSION['prof'];
           
			$ci_pr= new Profesional_model;
            $data["citas_prof"] =$ci_pr->get_citas_programadas($id_prof);
			

            require "views/profesional/citas_programadas/citas_programadas.php";
          
        }

        public function asistencia_cita_1($id){
           
			$asist = 1;
			$pac = new Profesional_model();
			$pac->asistencia_cita($asist, $id);

			$_SESSION["asistencia"] = "1";

			$this->set_citas_prom_prof();
		}	

        public function asistencia_cita_2($id){
			
			$asist = 0;
			$pac = new Profesional_model();
			$pac->asistencia_cita($asist, $id);

			$_SESSION["asistencia"] = "0";
			
			$this->set_citas_prom_prof();
		}	
        
		public function actualizar_prof(){
			$id_prof = $_SESSION['prof'];
			
			$profesional = new Profesional_model();
			$data["profesional"] = $profesional->get_prof($id_prof);
			require_once "views/profesional/update_prof/update_prof.php";			
		}

        public function modificar_prof(){
			$id_prof = $_SESSION['prof'];
            $tel_prof = $_POST['tel_prof'];
            $correo_prof = $_POST['correo_prof'];

            $profesional = new Profesional_model();
            $resultado = $profesional->modificar_profesional($tel_prof, $correo_prof, $id_prof);
			if ($resultado > 0) {
				$_SESSION["update_prof"] = "1";
				header('location:index.php?c=Profesional&a=actualizar_prof');
			}else {
				$_SESSION["update_prof"] = "0";
				header('location:index.php?c=Profesional&a=actualizar_prof');
			}    
        }

        public function actualizar_pass(){
			$id_prof = $_SESSION['prof'];

			$profesional = new Profesional_model();
			$data["profesional"] = $profesional->get_prof($id_prof);
			$_SESSION["pass_prof"] = $data["profesional"]["pass_prof"];
			require_once "views/profesional/update_prof/update_pass.php";
		}

        public function modificar_pass(){
			$id_prof = $_SESSION['prof'];
			$pass = $_POST['pass'];
            $newpass = $_POST['newpass'];
            $repass = $_POST['repass'];
			
			if (password_verify($pass, $_SESSION["pass_prof"])) {
				if ($newpass == $repass) {
					$new_pass = password_hash($newpass, PASSWORD_BCRYPT);
	
					$password = new Profesional_model();
					$resultado = $password->update_password($new_pass, $id_prof);
	
					if ($resultado > 0) {
						$_SESSION["update_pass"] = "1";
						header('location:index.php?c=Profesional&a=actualizar_prof');
					}            	
				}else {
					$_SESSION["update_pass"] = "0";
					header('location:index.php?c=Profesional&a=actualizar_pass');
				}
			}else {
				$_SESSION["update_pass"] = "0";
				header('location:index.php?c=Profesional&a=actualizar_pass');
			}
        }

		public function ayuda(){

            require_once "views/preguntas_frecuentes/ayuda.php";

        }

		public function ayuda1(){

			require_once "views/preguntas_frecuentes/ayuda1.php";

		}

    }

?>