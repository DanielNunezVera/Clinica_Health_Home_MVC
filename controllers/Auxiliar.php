<?php
		class AuxiliarController {

		public function __construct(){
			require_once "models/AuxiliarModel.php";
			require_once "models/AdministradorModel.php";
			require_once "models/PacienteModel.php";
		}


		public function index(){
			
			require_once "views/administrador/index_admin.php";
		}
		
		public function buscar_pacientei(){
			$tipo_doc=  new Administrador_model();
			$data["tipo_doc"] = $tipo_doc->get_tipo_doc();
			require_once "views/auxiliar_admin/agenda_cita/buscar_pac.php";
		}

		public function buscar_pacientef(){	

			session_start();
			$id_tipo_doc = $_POST['id_tipo_doc'];
			$num_doc_pac = $_POST['num_doc_pac'];

			$paciente = new Auxiliar_model();
			$data["paciente"] = $paciente->get_paciente($num_doc_pac, $id_tipo_doc);
			$data["especialidades"] = $paciente->get_especialidad();
			$_SESSION['id_pac']= $data["paciente"]['id_paciente'];
			require_once "views/auxiliar_admin/agenda_cita/cita_aux.php";
			
		}

		public function citas_pac(){
			
			$citas_pac = new Auxiliar_model();
			$data["citas_pac"] = $citas_pac->get_citas_pac();
						
			require_once "views/auxiliar_admin/view_citas/citaspac.php";
				
		}

		public function pdte_pago($id_cita){
			
			$cit = new Auxiliar_model();
			$cit-> pdte_pago1($id_cita);
			header('location:index.php?c=Auxiliar&a=citas_pac');

		}

		public function pago_ok($id_cita){
			
			$cit = new Auxiliar_model();
			$cit-> pago_ok1($id_cita);
			header('location:index.php?c=Auxiliar&a=citas_pac');
		}

		public function citas_prof(){
			
			$citas_prof = new Auxiliar_model();
			$data["citas_profe"] = $citas_prof->get_citas_prof();
						
			require_once "views/auxiliar_admin/view_citas/citasprof.php";
				
		}

		public function agendar_cita_i(){
            $paquete=  new Administrador_model();
            $data["especialidad"] = $paquete->get_especialidad();
			require_once "views/auxiliar_admin/agenda_cita/cita_aux.php";
				
		}

		public function cancelar_cita_prof($id){

			session_start();					
			if(isset($_POST['id_paciente'])){
				$id_paciente = $_POST['id_paciente'];
				$_SESSION["id_paciente"]=$id_paciente;
			}
			
			$id_c=$id;
			$can_ci= new Auxiliar_model;
			$can_ci->cancelar_cita_prof($id_c);

			if(isset($_POST['id_paciente'])){
				header('location:index.php?c=Auxiliar&a=agendar_cita_i');
			} else{
				header('location:index.php?c=Auxiliar&a=citas_prof');
			}
		}


		public function cancelar_cita_pac($id){

			$can_ci= new Auxiliar_model;
			$can_ci->cancelar_cita_pac($id);

			header('location:index.php?c=Auxiliar&a=citas_pac');
		}


		public function buscar_cita(){

			$id_especialidad = $_POST['id_especialidad'];
			$fecha = $_POST['fecha'];
            $paquete=  new Paciente_model();
            $data["cita"] = $paquete->get_citas($fecha, $id_especialidad);
			require_once "views/auxiliar_admin/agenda_cita/citas_dis_aux.php";
				
		}

		public function agendar_cita_f(){

			session_start();
			$id_cita = $_POST['id_cita'];
			$id_paciente=$_SESSION['id_pac'];
			$paquete = new Paciente_model();
			$paquete->agendar_cita($id_cita, $id_paciente);
			header('location:index.php?c=Auxiliar&a=citas_pac');
		}
	}
?>