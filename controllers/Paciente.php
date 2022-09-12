<?php


    class PacienteController {

        public function __construct(){
			require_once "models/AdministradorModel.php";
            require_once "models/PacienteModel.php";
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
            $data["especialidad"] = $paquete->agendar_cita($id_cita, $id_paciente);
            header('location:index.php?c=Paciente&a=agendar_cita_i');
		}

        public function buscar_cita(){

			$id_especialidad = $_POST['id_especialidad'];
			$fecha = $_POST['fecha'];
            $paquete=  new Paciente_model();
            $data["cita"] = $paquete->get_citas($fecha, $id_especialidad);
			require_once "views/pacientes/agenda_cita/citasdisponibles.php";
				
		}

        public function get_paciente(){

            $paquete = new Paciente_model;
            $data["paciente"] = $paquete -> get_paciente();

            require_once "views/pacientes/update_info_pac/update_pacientes.php";

        }

        public function update_pac(){

            $correo_pac = $_POST['correo_pac'];
            $tel_pac = $_POST['tel_pac'];

            $paquete = new Paciente_model;
            $paquete -> update_info_pac($correo_pac, $tel_pac);

            header ('location:index.php?c=Paciente&a=get_paciente');

        }

        public function update_password(){

            $id_paciente = $_POST['id_paciente'];
            $pass_pac = $_POST['pass_pac'];

            $password = new Paciente_model;
            $password -> update_pass_pac($id_paciente, $pass_pac);

            require_once "views/pacientes/update_info_pac/update_contraseña.php";

        }

    }
?>