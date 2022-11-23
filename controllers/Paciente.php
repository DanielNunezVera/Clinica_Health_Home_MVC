<?php
	require 'Sesiones.php';
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

            require_once "views/pacientes/index_pac.php";
            
        }

        public function cerrar_sesion(){

            session_destroy();
            header ("Location: index.php?c=Login&a=index");

        }

        public function agendar_cita_i(){
            
            $paquete=  new Administrador_model();
            $data["especialidad"] = $paquete->get_especialidad();
			require_once "views/pacientes/agenda_cita/agendarcita.php";
				
		}

        public function agendar_cita_f(){

            $id_cita = $_POST['id_cita'];
			$id_paciente = $_POST['id_paciente'];
            $paquete = new Paciente_model();
            $paquete->agendar_cita($id_cita, $id_paciente);
            header('location:index.php?c=Paciente&a=agendar_cita_i');
		
        }

        public function buscar_cita(){

			$id_especialidad = $_POST['id_especialidad'];
			$fecha = $_POST['fecha'];
            $fecha_entrada = strtotime($fecha);
            $fecha_actual = strtotime(date("d-m-Y H:i:00", time()));

            if ($fecha_entrada >= $fecha_actual) {
             
                $paquete=  new Paciente_model();
                $data["cita"] = $paquete->get_citas($fecha, $id_especialidad);
                require_once "views/pacientes/agenda_cita/citasdisponibles.php";   

            } else {

                $_SESSION['error_cita'] = "1";
                $this->aagendar_cita_f();

            }
				
		}

        public function get_paciente(){

            require_once "views/pacientes/update_info_pac/update_pacientes.php";
            
        }

        public function update_pac(){

            $id_paciente = $_POST['id_paciente'];
            $correo_pac = $_POST['correo_pac'];
            $tel_pac = $_POST['tel_pac'];

            $paquete = new Paciente_model;
            $paquete -> update_info_pac($id_paciente, $correo_pac, $tel_pac);

            $_SESSION['correo_pac'] = $correo_pac;
            $_SESSION['tel_pac'] = $tel_pac;

            header ('location:index.php?c=Paciente&a=get_paciente');

            if($_SESSION['correo_pac'] == $correo_pac AND $_SESSION['tel_pac'] == $tel_pac){

                $alert_datos_actualizados = "1";

            } else {

                $alert_error = "1";

            }

        }

        public function password(){

            require_once "views/pacientes/update_info_pac/update_contraseña.php";

        }

        public function update_password(){

            if ($_POST["pass_pac"] == $_POST["repeat_pass_pac"]) {
                
                $id_paciente = $_POST['id_paciente'];
                $pass_pac = password_hash($_POST['pass_pac'], PASSWORD_BCRYPT);

                $paquete = new Paciente_model;
                $paquete -> update_pass_pac($id_paciente, $pass_pac);
                                    
                header ('Location:index.php?c=Paciente&a=get_paciente');

            } else{

                header('Location:index.php?c=Paciente&a=password');

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
            $paquete -> cancelar_agendada($id);

            header("Location:index.php?c=Paciente&a=citas_agendadas");

        }

    }
?>