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

    }





?>