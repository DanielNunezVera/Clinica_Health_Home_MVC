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
			$data["citas_pac"] = $citas_pac->get_citas_pac();
						
			require_once "views/auxiliar_admin/view_citas/citaspac.php";
				
		}

		public function citas_prof(){
			
			$citas_prof = new Auxiliar_model();
			$data["citas"] = $citas_prof->get_citas_prof();
						
			require_once "views/auxiliar_admin/view_citas/citasprof.php";
				
		}

		public function confirmapago_1_aux($id){
			
			$cit = new Auxiliar_model();
			$cit->confirmapago_aux1($id);
			$this->gestion_u();
		}

		public function confirmapago_2_aux($id){
			
			$cit = new Auxiliar_model();
			$cit->confirmapago_aux2($id);
			$this->gestion_u();
		}	

	}
?>