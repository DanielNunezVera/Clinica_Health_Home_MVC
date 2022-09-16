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
			$_SESSION['id_paciente']= $data["paciente"]['id_paciente'];
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
            $data["especialidades"] = $paquete->get_especialidad();
			require_once "views/auxiliar_admin/agenda_cita/cita_aux.php";
				
		}

		// public function cancelar_cita_prof($id){

		// 	session_start();					
		// 	if(isset($_POST['id_paciente'])){
		// 		$id_paciente = $_POST['id_paciente'];
		// 		$_SESSION["id_paciente"]=$id_paciente;
		// 	}
			
		// 	$id_c=$id;
		// 	$can_ci= new Auxiliar_model;
		// 	$can_ci->cancelar_cita_prof($id_c);

		// 	if(isset($_POST['id_paciente'])){
		// 		header('location:index.php?c=Auxiliar&a=agendar_cita_i');
		// 	} else{
		// 		header('location:index.php?c=Auxiliar&a=citas_prof');
		// 	}

			

		// }

		// public function buscar_cita(){

		// 	$id_especialidad = $_POST['id_especialidad'];
		// 	$fecha = $_POST['fecha'];
    //         $paquete=  new Paciente_model();
    //         $data["cita"] = $paquete->get_citas($fecha, $id_especialidad);
		// 	require_once "views/auxiliar_admin/agenda_cita/citas_dis_aux.php";
				
		// }
		// public function agendar_cita_f(){

		// 	session_start();
		// 	$id_cita = $_POST['id_cita'];
		// 	$id_paciente=$_SESSION['id_paciente'];
		// 	$paquete = new Paciente_model();
		// 	$paquete->agendar_cita($id_cita, $id_paciente);
		// 	header('location:index.php?c=Auxiliar&a=citas_prof');
		// }


		// public function citas_prof(){
			
		// 	$usuarios = new Administrador_model();
		// 	$data["pacientes"] = $usuarios->get_pacientes();
		// 	$data["profesionales"] = $usuarios->get_profesional();
		// 	$data["auxiliares"] = $usuarios->get_auxiliar();
			
		// 	require_once "views/auxiliar_admin/view_citas/citasprof.php";
				
		// }

		public function gestion_agenda(){

			$agenda =  new Administrador_model();
			$data["profesionales"] = $agenda->get_profesional();
			$data["tipo_doc"] = $agenda->get_tipo_doc();
			require_once "views/administrador/gestion_agenda/gestion_agenda.php";

		}

		public function gestion_agenda_2(){

			require_once "views/administrador/gestion_agenda/new_agenda.php";

		}

		public function gestion_espec(){
			
			$especialidad = new Administrador_model();
			$data["especialidad"] = $especialidad->get_especialidad();
			
			require_once "views/administrador/gestion_espec/gestion_espec.php";
		}

		public function gestion_consult(){
			
			$consult = new Administrador_model();
			$data["consultorios"] = $consult->get_consultorios();
			
			require_once "views/administrador/gestion_consult/gestion_consult.php";
		}
		
		public function nuevo_paciente(){
			$tipo_doc=  new Administrador_model();
			$data["tipo_doc"] = $tipo_doc->get_tipo_doc();
			require_once "views/administrador/gestion_usuarios/new_pac.php";
		}

		public function nuevo_profesional(){
			$paquete=  new Administrador_model();
			$data["tipo_doc"] = $paquete->get_tipo_doc();
			$data["consultorios"] = $paquete->get_consultorios();
			$data["especialidad"] = $paquete->get_especialidad();
			require_once "views/administrador/gestion_usuarios/new_prof.php";
		}

		public function nuevo_auxiliar(){
			$tipo_doc=  new Administrador_model();
			$data["tipo_doc"] = $tipo_doc->get_tipo_doc();
			require_once "views/administrador/gestion_usuarios/new_aux.php";
		}

		public function nuevo_espec(){
			$tipo_doc=  new Administrador_model();
			require_once "views/administrador/gestion_espec/new_espec.php";
		}

		public function nuevo_consult(){
			require_once "views/administrador/gestion_consult/new_consult.php";
		}
		
		public function guarda_paciente(){
			
			$id_paciente = $_POST['id_paciente'];
			$id_tipo_doc = $_POST['id_tipo_doc'];
			$nombres_pac = $_POST['nombres_pac'];
			$apellidos_pac = $_POST['apellidos_pac'];
			$tel_pac = $_POST['tel_pac'];
			$correo_pac = $_POST['correo_pac'];
			$sexo_pac = $_POST['sexo_pac'];

		}

		public function confirmapago_1_aux($id){
			
			$cit = new Auxiliar_model();
			$cit->confirmapago_aux1($id);
			$this->gestion_u();

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

		public function guarda_consult(){
			
			$id_consultorios = $_POST['id_consultorios'];
			
			$consult = new Administrador_model();
			$consult->insertar_consult($id_consultorios);
			$this->gestion_consult();

		}
		
		public function actualizar_pac($id, $t_doc){
			
			$paciente = new Administrador_model();
			$data["tipo_doc"] = $paciente->get_tipo_doc();
			$data["paciente"] = $paciente->get_paciente($id, $t_doc);
			require_once "views/administrador/gestion_usuarios/update_pac.php";
		}

		public function actualizar_prof($id, $t_doc){
			
			$profesional = new Administrador_model();
			$data["consultorios"] = $profesional->get_consultorios();
			$data["especialidad"] = $profesional->get_especialidad();
			$data["tipo_doc"] = $profesional->get_tipo_doc();
			$data["profesional"] = $profesional->get_prof($id, $t_doc);
			require_once "views/administrador/gestion_usuarios/update_prof.php";
		}

		public function actualizar_aux(){
			
			$auxiliar = new Auxiliar_model();
			$data["auxiliar"] = $auxiliar->get_aux();
			require_once "views/auxiliar_admin/update_info_aux/update_aux.php";
			
		}

		public function actualizar_pass(){

			$auxiliar = new Auxiliar_model();
			$data["auxiliar"] = $auxiliar->get_aux();
			require_once "views/auxiliar_admin/update_info_aux/update_pass.php";
		}

		public function modificar_aux(){

			$tel_aux = $_POST['tel_aux'];
			$correo_aux = $_POST['correo_aux'];

			$auxiliar = new Auxiliar_model();
			$auxiliar->modificar_auxiliar($tel_aux, $correo_aux);
			header('location:index.php?c=Administrador&a=index');
		}

		public function modificar_pass(){
			$newpass = $_POST['newpass'];

			$password = new Auxiliar_model();
			$password -> update_password($newpass);
			header('location:index.php?c=Administrador&a=index');

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
			$id_paciente=$_SESSION['id_paciente'];
			$paquete = new Paciente_model();
			$paquete->agendar_cita($id_cita, $id_paciente);
			header('location:index.php?c=Auxiliar&a=citas_pac');

		}
	}
?>		