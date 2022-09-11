<?php

    class ProfesionalController {

        public function __construct(){
			require_once "models/ProfesionalModel.php";
		}

		public function index(){
			
			require_once "views/administrador/index_admin.php";
		}
		
        public function set_citas_prom_prof(){
           
			$ci_pr= new Profesional_model;
            $data["citas_prof"] =$ci_pr->get_citas_programadas();
			

            require "views/profesional/citas_programadas/citas_programadas.php";
          
        }

        public function asistencia_cita_1($id){
           
			$pac = new Profesional_model();
			$pac->asistencia_cita_2($id);
			$this->set_citas_prom_prof();
		}	

        public function asistencia_cita_2($id){
			
			$pac = new Profesional_model();
			$pac->asistencia_cita_1($id);
			$this->set_citas_prom_prof();
		}	
        




    }



?>