<?php
	
	class AuxiliarController {

		public function __construct(){
			require_once "models/AuxiliarModel.php";
		}

		public function index(){
			
			require_once "views/administrador/index_admin.php";
		}
		
		public function citas_pac(){
			
			$citas_pac = new Auxiliar_model();
			$data["citas"] = $citas_pac->get_citas_pac();
						
			require_once "views/auxiliar_admin/view_citas/citaspac.php";
				
		}

		public function citas_prof(){
			
			$usuarios = new Administrador_model();
			$data["pacientes"] = $usuarios->get_pacientes();
			$data["profesionales"] = $usuarios->get_profesional();
			$data["auxiliares"] = $usuarios->get_auxiliar();
			
			require_once "views/auxiliar_admin/view_citas/citasprof.php";
				
		}

		public function actualizar_aux($id){
			
			$auxiliar = new Administrador_model();
			$data["tipo_doc"] = $auxiliar->get_tipo_doc();
			$data["auxiliar"] = $auxiliar->get_aux($id);
			require_once "views/administrador/gestion_usuarios/update_aux.php";
		}
	}
?>