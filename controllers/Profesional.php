<?php

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
        
		public function actualizar_prof(){
			
			$profesional = new Profesional_model();
			$data["profesional"] = $profesional->get_prof();
			require_once "views/profesional/update_prof/update_prof.php";			
		}

        public function modificar_prof(){
            $tel_prof = $_POST['tel_prof'];
            $correo_prof = $_POST['correo_prof'];

            $profesional = new Profesional_model();
            $profesional->modificar_profesional($tel_prof, $correo_prof);
            header('location:index.php?c=Administrador&a=index');
        }

        public function actualizar_pass(){

			$profesional = new Profesional_model();
			$data["profesional"] = $profesional->get_prof();
			require_once "views/profesional/update_prof/update_pass.php";
		}

        public function modificar_pass(){
            $newpass = $_POST['newpass'];
            $repass = $_POST['repass'];
        	
			$password = new Profesional_model();
            $password->update_password($newpass);
            header('location:index.php?c=Administrador&a=index');
        }
    }



?>