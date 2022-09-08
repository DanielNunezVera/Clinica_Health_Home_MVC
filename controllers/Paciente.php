<?php


    class PacienteController {

        public function __construct(){
			require_once "models/AdministradorModel.php";
		}

        public function agendar_cita_i(){
            $paquete=  new Administrador_model();
            $data["especialidad"] = $paquete->get_especialidad();
			require_once "views/pacientes/agenda_cita/agendarcita.php";
				
		}

    }





?>