<?php
	
	class AdministradorController {

		public function __construct(){
			require_once "models/AdministradorModel.php";
		}

		public function index(){
			
			require_once "views/administrador/index_admin.php";
		}
		
		public function gestion_u(){
			
			$usuarios = new Administrador_model();
			$data["pacientes"] = $usuarios->get_pacientes();
			$data["profesionales"] = $usuarios->get_profesional();
			$data["auxiliares"] = $usuarios->get_auxiliar();
			
			require_once "views/administrador/gestion_usuarios/gestion_usuarios.php";
				
		}

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
			
			$usuarios = new Administrador_model();
			$usuarios->insertar_pac($id_paciente, $id_tipo_doc, $nombres_pac, $apellidos_pac, $tel_pac, $correo_pac, $sexo_pac);
			$this->gestion_u();

		}

		public function guarda_profesional(){
			
			$id_profesional = $_POST['id_profesional'];
			$id_tipo_doc = $_POST['id_tipo_doc'];
			$id_consultorios = $_POST['id_consultorios'];
			$id_especialidad = $_POST['id_especialidad'];
			$nombres_prof = $_POST['nombres_prof'];
			$apellidos_prof = $_POST['apellidos_prof'];
			$tel_prof = $_POST['tel_prof'];
			$correo_prof = $_POST['correo_prof'];
			$dias_laborales = $_POST['dias_laborales'];
			$franja_horaria = $_POST['franja_horaria'];
			
			$usuarios = new Administrador_model();
			$usuarios->insertar_prof($id_profesional, $id_tipo_doc, $id_consultorios, $id_especialidad, $nombres_prof, $apellidos_prof, $tel_prof, $correo_prof, $dias_laborales, $franja_horaria);
			$this->gestion_u();
			
		}

		public function guarda_auxiliar(){
			
			$id_auxiliar = $_POST['id_auxiliar'];
			$id_tipo_doc = $_POST['id_tipo_doc'];
			$nombres_aux = $_POST['nombres_aux'];
			$apellidos_aux = $_POST['apellidos_aux'];
			$tel_aux = $_POST['tel_aux'];
			$correo_aux = $_POST['correo_aux'];
			
			$usuarios = new Administrador_model();
			$usuarios->insertar_aux($id_auxiliar, $id_tipo_doc, $nombres_aux, $apellidos_aux, $tel_aux, $correo_aux);
			$this->gestion_u();

		}

		public function guarda_espec(){
			
			$descrip_espec = $_POST['descrip_espec'];
			$costo_espec = $_POST['costo_espec'];
			
			$espec = new Administrador_model();
			$espec->insertar_espec($descrip_espec, $costo_espec);
			$this->gestion_espec();

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

		public function actualizar_aux($id){
			
			$auxiliar = new Administrador_model();
			$data["tipo_doc"] = $auxiliar->get_tipo_doc();
			$data["auxiliar"] = $auxiliar->get_aux($id);
			require_once "views/administrador/gestion_usuarios/update_aux.php";
		}

		public function actualizar_espec($id){
			
			$especialidad = new Administrador_model();
			$data["especialidad"] = $especialidad->get_espec($id);
			require_once "views/administrador/gestion_espec/update_espec.php";
		}

		public function actualizar_consult($id){
			
			$consultorios = new Administrador_model();
			$data["consultorios"] = $consultorios->get_consult($id);
			require_once "views/administrador/gestion_consult/update_consult.php";
		}
		
		public function modificar_pac(){

			$id_tipo_doc_1 = $_POST['id_tipo_doc_1'];
			$id_paciente = $_POST['id_paciente'];
			$id_tipo_doc = $_POST['id_tipo_doc'];
			$tel_pac = $_POST['tel_pac'];
			$correo_pac = $_POST['correo_pac'];

			$paciente = new Administrador_model();
			$paciente->modificar_paciente($id_paciente, $id_tipo_doc,$id_tipo_doc_1, $tel_pac, $correo_pac);
			$this->gestion_u();
		}

		public function modificar_prof(){

			$id_tipo_doc = $_POST['id_tipo_doc'];
			$id_profesional = $_POST['id_profesional'];
			$id_consultorios = $_POST['id_consultorios'];
			$id_especialidad = $_POST['id_especialidad'];
			$tel_prof = $_POST['tel_prof'];
			$correo_prof = $_POST['correo_prof'];
			$dias_laborales = $_POST['dias_laborales'];
			$franja_horaria = $_POST['franja_horaria'];


			$paciente = new Administrador_model();
			$paciente->modificar_profesional($id_profesional, $id_consultorios, $id_especialidad, $tel_prof, $correo_prof, $dias_laborales, $franja_horaria, $id_tipo_doc);
			$this->gestion_u();
		}

		public function modificar_aux(){

			$id_auxiliar = $_POST['id_auxiliar'];
			$id_tipo_doc = $_POST['id_tipo_doc'];
			$tel_aux = $_POST['tel_aux'];
			$correo_aux = $_POST['correo_aux'];

			$auxiliar = new Administrador_model();
			$auxiliar->modificar_auxiliar($id_auxiliar, $id_tipo_doc, $tel_aux, $correo_aux);
			$this->gestion_u();
		}

		public function modificar_espec(){

			$id_especialidad = $_POST['id_especialidad'];
			$costo_espec = $_POST['costo_espec'];


			$espec = new Administrador_model();
			$espec->modificar_especialidad($id_especialidad, $costo_espec);
			$this->gestion_espec();
		}

		public function modificar_consult(){

			$id_consultorios = $_POST['id_consultorios'];
			$id_consultorios_a = $_POST['id_consultorios_a'];


			$espec = new Administrador_model();
			$espec->modificar_consultorio($id_consultorios, $id_consultorios_a);
			$this->gestion_consult();
		}
		
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
	}
?>