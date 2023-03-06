<?php
	require_once 'Sesiones.php';
	$inc = new SesionesController();
	if(empty($_SESSION["pac"])){
		$inc->redireccionar();
	}

    class PacienteController {

        public function __construct(){
			require_once "models/AdministradorModel.php";
            require_once "models/PacienteModel.php";
		}

        public function index(){

            require_once "views/pacientes/menu_pac.php";

        }

        public function acciones(){

            $id_paciente = $_SESSION['pac'];

            if (isset($_SESSION['pac'])){

                $paciente = new Paciente_model();
                $data["paciente"] = $paciente ->get_paciente($id_paciente);

                foreach ($data["paciente"] as $dato){

                    require_once "views/pacientes/index_pac.php";

                }
            
            }

        }

        public function cerrar_sesion(){

            session_destroy();
            header ("Location: index.php?c=Login&a=index");

        }

        public function agendar_cita_i(){
            
            $paquete=  new Paciente_model();
            $data["especialidad"] = $paquete->get_especialidad();
			require_once "views/pacientes/agenda_cita/agendarcita.php";
				
		}

        public function agendar_cita_f(){
                
                $id_cita = $_POST['id_cita'];
                $id_paciente = $_POST['id_paciente'];
                $paquete = new Paciente_model();
                $resultado = $paquete->agendar_cita($id_cita, $id_paciente);

                if ($resultado == TRUE){
                    
                    $_SESSION['cita_success'] = "1";
                    header('location:index.php?c=Paciente&a=agendar_cita_i');

                } else {

                    $_SESSION['cita_success'] = "2";
                    $this->buscar_cita();
                    
                }

        }

        public function buscar_cita(){

            $id_paciente = $_SESSION['pac'];
			$id_especialidad = $_POST['id_especialidad'];
			$fecha = $_POST['fecha'];
            $fecha_entrada = strtotime($fecha);
            $fecha_actual = strtotime(date("d-m-Y H:i:00", time()));

            $paquete = new Paciente_model();
            $data["cita"] = $paquete->get_citas($fecha, $id_especialidad);
            $resultado1 = $paquete->validar_no_repet_cita($id_especialidad, $id_paciente);

            if ($fecha_entrada >= $fecha_actual) {
            
                if ($data["cita"] == TRUE) {

                    if ($resultado1 == 0) {
    
                        require_once "views/pacientes/agenda_cita/citasdisponibles.php";
    
                    } else {
    
                        $_SESSION['cita_success'] = "3";
                        $this->agendar_cita_i();
    
                    }
                    
                } else {

                    $_SESSION['error_cita'] = "1";
                    $this->agendar_cita_i();

                }

            } else {

                $_SESSION['error_cita'] = "2";
                $this->agendar_cita_i();

            }

        }

        // public function get_paciente(){

        //     $id_paciente = $_SESSION['pac'];

        //     $paquete = new Paciente_model();
        //     $data["paciente"] = $paquete -> paciente($id_paciente);

        //     foreach($data["paciente"] as $dato){   

        //         require_once "views/pacientes/update_info_pac/update_pacientes.php";

        //     } 
        // }

        public function actualizar_pac(){
            $id_paciente = $_SESSION['pac'];
			
			$paciente = new Paciente_model();
			$data["paciente"] = $paciente->get_paciente($id_paciente);
			
            foreach ($data["paciente"] as $dato) {
                
                require_once "views/pacientes/update_info_pac/update_pacientes.php";

            }

        }

        public function update_pac(){

            $id_paciente = $_SESSION['pac'];
            $correo_pac = $_POST['correo_pac'];
            $tel_pac = $_POST['tel_pac'];

            $paquete = new Paciente_model;
            $resultado = $paquete -> update_info_pac($id_paciente, $correo_pac, $tel_pac);

            if($resultado == TRUE){
                
                $_SESSION['datos'] = "1";
                header ('location:index.php?c=Paciente&a=actualizar_pac');

            } else {

                $_SESSION['datos'] = "0";
                $this->actualizar_pac();

            }

        }

        public function actualizar_pass(){

            $id_paciente = $_SESSION['pac'];

			$paciente = new Paciente_model();
			$data["paciente"] = $paciente->get_paciente($id_paciente);

            foreach($data["paciente"] as $dato){

                $_SESSION["pass_pac"] = $dato["pass_pac"];
                
                require_once "views/pacientes/update_info_pac/update_contraseña.php";

            };

        }

        public function modificar_pass(){

            $id_paciente = $_SESSION['pac'];
			$pass = $_POST['pass'];
            $newpass = $_POST['newpass'];
            $repass = $_POST['repass'];
			
			if (password_verify($pass, $_SESSION["pass_pac"])) {
				if ($newpass == $repass) {
					$new_pass = password_hash($newpass, PASSWORD_BCRYPT);
	
					$password = new Paciente_model();
					$resultado = $password->update_password($new_pass, $id_paciente);
	
					if ($resultado > 0) {

                        unset($_SESSION["pass_pac"]);
                        
						$_SESSION["update_pass"] = "1";
						header('location:index.php?c=Paciente&a=actualizar_pac');
					}            	
				}else {
					$_SESSION["update_pass"] = "0";
					header('location:index.php?c=Paciente&a=actualizar_pass');
				}
			}else {
				$_SESSION["update_pass"] = "0";
				header('location:index.php?c=Paciente&a=actualizar_pass');
			}
        }

        public function citas_agendadas(){

            $id_paciente = $_SESSION['pac'];

            $paquete = new Paciente_model;
            $data["agendadas"] = $paquete -> citas_agendadas($id_paciente);

            require_once "views/pacientes/view_citas/view_citas.php";

        }

        public function cancel_agendada($id){

            $paquete = new Paciente_model;
            $resultado = $paquete -> cancelar_agendada($id);

            if ($resultado == TRUE) {

                $_SESSION['cancel_cita'] = "1";
                header("Location:index.php?c=Paciente&a=citas_agendadas");

            } else {

                $_SESSION['cancel_cita'] = "0";
                header("Location:index.php?c=Paciente&a=citas_agendadas");

            }

        }

        public function ayuda() {
            
            require_once "views/preguntas_frecuentes/ayuda.php";

        }

        public function ayuda1(){

            require_once "views/preguntas_frecuentes/ayuda1.php";

        }

    }
?>