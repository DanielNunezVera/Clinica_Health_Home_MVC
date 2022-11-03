<?php
	require 'Sesiones.php';
	$inc = new SesionesController();
	if(empty($_SESSION["Admin"])){
		$inc->redireccionar();
	}
	class AdministradorController {

		public function __construct(){
			require_once "models/AdministradorModel.php";
		}

		public function index(){
			
			require_once "views/administrador/menu_admin.php";
		}

		public function acciones(){
			
			require_once "views/administrador/index_admin.php";
		}

		public function cerrarsesion(){
			session_destroy();
			header ("Location: index.php?c=Login&a=index");
		}

////listar todos los usuarios

		public function gestion_u(){

			session_start();
			$usuarios = new Administrador_model();
			$data["pacientes"] = $usuarios->get_pacientes();
			$data["profesionales"] = $usuarios->get_profesional();
			$data["auxiliares"] = $usuarios->get_auxiliar();
			if (isset($_SESSION['user_reg'])) {
				$user_reg = $_SESSION['user_reg'];
			}

			if (isset($_SESSION['act_datos'])) {
				$act_datos = $_SESSION['act_datos'];
			}
			
			require_once "views/administrador/gestion_usuarios/gestion_usuarios.php";
				
		}

		public function gestion_agenda(){

			$agenda =  new Administrador_model();
			$data["profesionales"] = $agenda->get_profesional();
			$data["tipo_doc"] = $agenda->get_tipo_doc();
			require_once "views/administrador/gestion_agenda/gestion_agenda.php";

		}

		public function gestion_agenda_2($id){

			$_SESSION['id_profesional'] = $id;
			$agenda =  new Administrador_model();
			$data["profesional"] = $agenda->get_prof($id);
			$data["sched_res"] = $agenda->get_agenda_prof($id);

			if(sizeof($data["sched_res"])==0){
				$alert_agenda_no_exitente="1";
			}else{
				$alert_agenda_no_exitente="0";
			}

			if(isset($_SESSION['alerta_agenda_repetida']) AND $_SESSION['contador']==1){
				if($_SESSION['alerta_agenda_repetida']=="0"){
					$alerta_agenda_repetida = "1";
					$_SESSION['contador']= 2;
					$_SESSION['alerta_agenda_repetida']=null;
				}else{
					$alerta_agenda_repetida = "0";
					$_SESSION['contador']= 2;
				}
			}

			if(isset($_SESSION["alert_dia_eliminado"]) AND $_SESSION['contador']==1){
				if($_SESSION['alert_dia_eliminado']=="0"){
					$alert_dia_eliminado = "0";
					$_SESSION['contador']= 2;
				}else{
					$alert_dia_eliminado = "1";
					$_SESSION['contador']= 2;
				}
			}

			require_once "views/administrador/gestion_agenda/new_agenda.php";

		}

		public function gestion_espec(){
			
			session_start();
			
			$especialidad = new Administrador_model();
			$data["especialidad"] = $especialidad->get_especialidad();

			if (isset($_SESSION['act_esp'])) {
				$act_esp = $_SESSION['act_esp'];
			}

			if (isset($_SESSION['esp_reg'])) {
				$esp_reg = $_SESSION['esp_reg'];
			}
			
			require_once "views/administrador/gestion_espec/gestion_espec.php";
		}

		public function gestion_consult(){
			
			$consult = new Administrador_model();
			$data["consultorios"] = $consult->get_consultorios();
			
			require_once "views/administrador/gestion_consult/gestion_consult.php";
		}
		
////listar tipo doc para pacientes, profesionales y auxiliares, y listar consultorios y especialidades para profesionales  
		public function nuevo_paciente(){
			
			session_start();
			
			$tipo_doc=  new Administrador_model();
			$data["tipo_doc"] = $tipo_doc->get_tipo_doc();
			if (isset($_SESSION['user_reg'])) {
				$user_reg = $_SESSION['user_reg'];
			}
			require_once "views/administrador/gestion_usuarios/new_pac.php";
		}

		public function nuevo_profesional(){
			
			session_start();
			
			$paquete=  new Administrador_model();
			$data["tipo_doc"] = $paquete->get_tipo_doc();
			$data["consultorios"] = $paquete->get_consultorios();
			$data["especialidad"] = $paquete->get_especialidad();
			if (isset($_SESSION['user_reg'])) {
				$user_reg = $_SESSION['user_reg'];
			}
			require_once "views/administrador/gestion_usuarios/new_prof.php";
		}

		public function nuevo_auxiliar(){
			
			session_start();
			
			$tipo_doc=  new Administrador_model();
			$data["tipo_doc"] = $tipo_doc->get_tipo_doc();
			if (isset($_SESSION['user_reg'])) {
				$user_reg = $_SESSION['user_reg'];
			}
			require_once "views/administrador/gestion_usuarios/new_aux.php";
		}

		public function nuevo_espec(){
			
			session_start();

			$tipo_doc=  new Administrador_model();
			if (isset($_SESSION['esp_reg'])) {
				$esp_reg = $_SESSION['esp_reg'];
			}
			require_once "views/administrador/gestion_espec/new_espec.php";
		}

		public function nuevo_consult(){
			require_once "views/administrador/gestion_consult/new_consult.php";
		}

		////registrar nuevos usuarios

		public function nueva_agenda(){

			
			$id_profesional = $_POST['id_profesional'];
			$tipo_franja_la = $_POST['tipo_franja_la'];
			$tipo_franja = $_POST['tipo_franja'];
			$agenda = new Administrador_model();
			$resultado = $agenda->insertar_agenda($id_profesional, $tipo_franja_la, $tipo_franja);
			$_SESSION["alerta_agenda_repetida"] = $resultado;
			$_SESSION["contador"] = 1;
			header('location:index.php?c=Administrador&a=gestion_agenda_2&id='.$id_profesional);

		}
		
		public function guarda_paciente(){
			
			session_start();

			$id_tipo_doc = $_POST['id_tipo_doc'];
			$num_doc_pac = $_POST['num_doc_pac'];
			$nombres_pac = $_POST['nombres_pac'];
			$apellidos_pac = $_POST['apellidos_pac'];
			$tel_pac = $_POST['tel_pac'];
			$correo_pac = $_POST['correo_pac'];
			$sexo_pac = $_POST['sexo_pac'];
			$pass_pac = password_hash($num_doc_pac, PASSWORD_BCRYPT);
			
			$usuarios = new Administrador_model();
			$resultado = $usuarios->insertar_pac($id_tipo_doc, $num_doc_pac, $nombres_pac, $apellidos_pac, $tel_pac, $correo_pac, $sexo_pac, $pass_pac);

			$_SESSION['user_reg'] = $resultado;
			header('location:index.php?c=Administrador&a=gestion_u');
			

		}

		public function guarda_profesional(){

			session_start();
			
			$num_doc_prof = $_POST['num_doc_prof'];
			$id_tipo_doc = $_POST['id_tipo_doc'];
			$id_consultorios = $_POST['id_consultorios'];
			$id_especialidad = $_POST['id_especialidad'];
			$nombres_prof = $_POST['nombres_prof'];
			$apellidos_prof = $_POST['apellidos_prof'];
			$tel_prof = $_POST['tel_prof'];
			$correo_prof = $_POST['correo_prof'];
			$dias_laborales = $_POST['dias_laborales'];
			$franja_horaria = $_POST['franja_horaria'];
			$pass_prof = password_hash($num_doc_prof, PASSWORD_BCRYPT);
			
			$usuarios = new Administrador_model();
			$resultado = $usuarios->insertar_prof($num_doc_prof, $id_tipo_doc, $id_consultorios, $id_especialidad, $nombres_prof, $apellidos_prof, $tel_prof, $correo_prof, $dias_laborales, $franja_horaria, $pass_prof);

			$_SESSION['user_reg'] = $resultado;
			header('location:index.php?c=Administrador&a=gestion_u');
			
		}

		public function guarda_auxiliar(){
			
			session_start();
			
			$id_tipo_doc = $_POST['id_tipo_doc'];
			$num_doc_aux = $_POST['num_doc_aux'];
			$nombres_aux = $_POST['nombres_aux'];
			$apellidos_aux = $_POST['apellidos_aux'];
			$tel_aux = $_POST['tel_aux'];
			$correo_aux = $_POST['correo_aux'];
			$pass_aux = password_hash($num_doc_aux, PASSWORD_BCRYPT);
			
			$usuarios = new Administrador_model();
			$resultado = $usuarios->insertar_aux($id_tipo_doc, $num_doc_aux, $nombres_aux, $apellidos_aux, $tel_aux, $correo_aux, $pass_aux);
			
			$_SESSION['user_reg'] = $resultado;
			header('location:index.php?c=Administrador&a=gestion_u');

		}

		public function guarda_espec(){
			
			session_start();
			
			$descrip_espec = $_POST['descrip_espec'];
			$costo_espec = $_POST['costo_espec'];
			
			$espec = new Administrador_model();
			$resultado = $espec->insertar_espec($descrip_espec, $costo_espec);

			$_SESSION['esp_reg'] = $resultado;
			header('location:index.php?c=Administrador&a=gestion_espec');

		}

		public function guarda_consult(){
			
			$id_consultorios = $_POST['id_consultorios'];
			
			$consult = new Administrador_model();
			$consult->insertar_consult($id_consultorios);
			header('location:index.php?c=Administrador&a=gestion_consult');

		}
////actualizar usuarios		
		public function actualizar_pac($id){
			
			session_start();
			
			$paciente = new Administrador_model();
			$data["tipo_doc"] = $paciente->get_tipo_doc();
			$data["paciente"] = $paciente->get_paciente($id);
			if (isset($_SESSION['act_datos'])) {
				$act_datos = $_SESSION['act_datos'];
			}

			require_once "views/administrador/gestion_usuarios/update_pac.php";
		}

		public function actualizar_prof($id){
			
			session_start();
			
			$profesional = new Administrador_model();
			$data["consultorios"] = $profesional->get_consultorios();
			$data["especialidad"] = $profesional->get_especialidad();
			$data["tipo_doc"] = $profesional->get_tipo_doc();
			$data["profesional"] = $profesional->get_prof($id);
			if (isset($_SESSION['act_datos'])) {
				$act_datos = $_SESSION['act_datos'];
			}

			require_once "views/administrador/gestion_usuarios/update_prof.php";
		}

		public function actualizar_aux($id){
			
			session_start();
			
			$auxiliar = new Administrador_model();
			$data["tipo_doc"] = $auxiliar->get_tipo_doc();
			$data["auxiliar"] = $auxiliar->get_aux($id);
			if (isset($_SESSION['act_datos'])) {
				$act_datos = $_SESSION['act_datos'];
			}

			require_once "views/administrador/gestion_usuarios/update_aux.php";
		}

		public function actualizar_espec($id){
			
			session_start();
			
			$especialidad = new Administrador_model();
			$data["especialidad"] = $especialidad->get_espec($id);
			if (isset($_SESSION['act_esp'])) {
				$act_esp = $_SESSION['act_esp'];
			}

			require_once "views/administrador/gestion_espec/update_espec.php";
		}

		public function actualizar_consult($id){
			
			$consultorios = new Administrador_model();
			$data["consultorios"] = $consultorios->get_consult($id);
			require_once "views/administrador/gestion_consult/update_consult.php";
		}
		
		public function modificar_pac(){

			session_start();
			
			$id_paciente = $_POST['id_paciente'];
			$id_tipo_doc = $_POST['id_tipo_doc'];
			$tel_pac = $_POST['tel_pac'];
			$correo_pac = $_POST['correo_pac'];

			$paciente = new Administrador_model();
			$resultado = $paciente->modificar_paciente($id_paciente, $id_tipo_doc, $tel_pac, $correo_pac);
			
			$_SESSION['act_datos'] = $resultado;
			header('location:index.php?c=Administrador&a=gestion_u');
		}

		public function modificar_prof(){
			
			session_start();
			
			$id_profesional = $_POST['id_profesional'];
			$id_tipo_doc = $_POST['id_tipo_doc'];
			$id_consultorios = $_POST['id_consultorios'];
			$id_especialidad = $_POST['id_especialidad'];
			$tel_prof = $_POST['tel_prof'];
			$correo_prof = $_POST['correo_prof'];
			$dias_laborales = $_POST['dias_laborales'];
			$franja_horaria = $_POST['franja_horaria'];


			$paciente = new Administrador_model();
			$resultado = $paciente->modificar_profesional($id_profesional, $id_tipo_doc, $id_consultorios, $id_especialidad, $tel_prof, $correo_prof, $dias_laborales, $franja_horaria);
			
			$_SESSION['act_datos'] = $resultado;
			header('location:index.php?c=Administrador&a=gestion_u');
		}

		public function modificar_aux(){

			session_start();
			
			$id_auxiliar = $_POST['id_auxiliar'];
			$id_tipo_doc = $_POST['id_tipo_doc'];
			$tel_aux = $_POST['tel_aux'];
			$correo_aux = $_POST['correo_aux'];

			$auxiliar = new Administrador_model();
			$resultado = $auxiliar->modificar_auxiliar($id_auxiliar, $id_tipo_doc, $tel_aux, $correo_aux);

			$_SESSION['act_datos'] = $resultado;
			header('location:index.php?c=Administrador&a=gestion_u');
		}

		public function modificar_espec(){

			session_start();
			
			$id_especialidad = $_POST['id_especialidad'];
			$costo_espec = $_POST['costo_espec'];


			$espec = new Administrador_model();
			$resultado = $espec->modificar_especialidad($id_especialidad, $costo_espec);

			$_SESSION['act_esp'] = $resultado;
			header('location:index.php?c=Administrador&a=gestion_espec');
		}

		/*public function modificar_consult(){

			$id_consultorios = $_POST['id_consultorios'];
			$id_consultorios_a = $_POST['id_consultorios_a'];


			$espec = new Administrador_model();
			$espec->modificar_consultorio($id_consultorios, $id_consultorios_a);
			header('location:index.php?c=Administrador&a=gestion_consult');
		}*/
		
		public function eliminar_pac($id){

			$usu = new Administrador_model();
			$usu->eliminar_pac($id);
			$this->gestion_u();
		}

		public function eliminar_aux($id){

			$usu = new Administrador_model();
			$usu->eliminar_aux($id);
			$this->gestion_u();
		}

		public function eliminar_prof($id){

			$usu = new Administrador_model();
			$usu->eliminar_prof($id);
			$this->gestion_u();
		}

		public function eliminar_espec($id){

			$consult = new Administrador_model();
			$consult->eliminar_espec_3($id);
			$this->gestion_espec();

		}

		public function eliminar_consul($id){

			$consul = new Administrador_model();
			$consul -> eliminar_consul($id);
			$this->gestion_consult();

		}

		public function eliminar_agenda($id){
			
			$agenda = new Administrador_model();
			$agenda -> eliminar_agend($id);
			header('location:index.php?c=Administrador&a=gestion_agenda_2&id='.$_SESSION['id_profesional']);

		}

		public function cambio_estado_1_pac($id){
			
			$pac = new Administrador_model();
			$pac->eliminar_pac_1($id);
			$this->gestion_u();
		}

		public function cambio_estado_2_pac($id){
			
			$pac = new Administrador_model();
			$pac->eliminar_pac_2($id);
			$this->gestion_u();
		}	

		public function cambio_estado_1_prof($id){
			
			$prof = new Administrador_model();
			$prof->eliminar_prof_1($id);
			$this->gestion_u();
		}

		public function cambio_estado_2_prof($id){
			
			$prof = new Administrador_model();
			$prof->eliminar_prof_2($id);
			$this->gestion_u();
		}	

		public function cambio_estado_1_aux($id){
			
			$aux = new Administrador_model();
			$aux->eliminar_aux_1($id);
			$this->gestion_u();
		}

		public function cambio_estado_2_aux($id){
			
			$aux = new Administrador_model();
			$aux->eliminar_aux_2($id);
			$this->gestion_u();
		}	

		public function cambio_estado_1_espec($id){
			
			$espec = new Administrador_model();
			$espec->eliminar_espec_1($id);
			$this->gestion_espec();
		}

		public function cambio_estado_2_espec($id){
			
			$espec = new Administrador_model();
			$espec->eliminar_espec_2($id);
			$this->gestion_espec();
		}	

		public function cambio_estado_1_consult($id){
			
			$consult = new Administrador_model();
			$consult->eliminar_consult_1($id);
			$this->gestion_consult();
		}

		public function cambio_estado_2_consult($id){
			
			$consult = new Administrador_model();
			$consult->eliminar_consult_2($id);
			$this->gestion_consult();
		}

		public function eliminar_consult($id){

			$consult = new Administrador_model();
			$consult->eliminar_consult_3($id);
			$this->gestion_consult();
		}

		public function excepciones(){
			
			
			$dia_eliminar = $_POST['dia_eliminar'];
			$id_profesional = $_POST['id_profesional'];

			$agenda = new Administrador_model();
			$resultado = $agenda->excepciones_agenda($dia_eliminar, $id_profesional);
			$_SESSION["alert_dia_eliminado"] = $resultado;
			$_SESSION["contador"] = 1;
			
			header('location:index.php?c=Administrador&a=gestion_agenda_2&id='.$_SESSION['id_profesional']);
		}
		public function ayuda(){
			require_once "views/administrador/manual_usuario/manual_de_usuario.html";
		}
	}
?>