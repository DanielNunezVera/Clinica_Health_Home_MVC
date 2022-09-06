<?php
	
	class Administrador_model {
		
		private $db;
		private $paciente;
    	private $profesional;
   		private $auxiliar;
		private $consultorios;
		private $especialidad;
		private $tipo_doc;
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->paciente = array();
      		$this->profesional = array();
      		$this->auxiliar = array();
			$this->consultorios = array();
			$this->especialidad = array();
			$this->tipo_doc = array();
		}
		
		public function get_pacientes()
		{
			$sql = "SELECT * FROM paciente";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->paciente[] = $row;
			}
			return $this->paciente;
		}

        public function get_profesional()
		{
			$sql = "SELECT * FROM profesional";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->profesional[] = $row;
			}
			return $this->profesional;
		}

        public function get_auxiliar()
		{
			$sql = "SELECT * FROM auxiliar";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->auxiliar[] = $row;
			}
			return $this->auxiliar;
		}

		public function get_consultorios()
		{
			$sql = "SELECT * FROM consultorios";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->consultorios[] = $row;
			}
			return $this->consultorios;
		}

		public function get_tipo_doc()
		{
			$sql = "SELECT * FROM tipo_doc";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->tipo_doc[] = $row;
			}
			return $this->tipo_doc;
		}

		public function get_especialidad()
		{
			$sql = "SELECT * FROM especialidad";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->especialidad[] = $row;
			}
			return $this->especialidad;
		}


		public function insertar_pac($id_paciente, $id_tipo_doc, $nombres_pac, $apellidos_pac, $tel_pac, $correo_pac, $sexo_pac){
			
			$resultado = $this->db->query("INSERT INTO paciente (id_paciente, id_tipo_doc, nombres_pac, apellidos_pac, tel_pac, correo_pac, sexo_pac, estado_pac, pass_pac, create_pac) VALUES ('$id_paciente', '$id_tipo_doc', '$nombres_pac', '$apellidos_pac', '$tel_pac', '$correo_pac', '$sexo_pac', 1, '$id_paciente', CURRENT_TIMESTAMP)");
		}

		public function insertar_prof($id_profesional, $id_tipo_doc, $id_consultorios, $id_especialidad, $nombres_prof, $apellidos_prof, $tel_prof, $correo_prof, $dias_laborales, $franja_horaria){
			
			$resultado = $this->db->query("INSERT INTO profesional (id_profesional, id_tipo_doc, id_consultorios, id_especialidad, nombres_prof, apellidos_prof, tel_prof, correo_prof, dias_laborales, franja_horaria, estado_prof, pass_prof, create_prof) VALUES ('$id_profesional', '$id_tipo_doc', '$id_consultorios', '$id_especialidad', '$nombres_prof', '$apellidos_prof', '$tel_prof', '$correo_prof', '$dias_laborales', '$franja_horaria', 1, '$id_profesional', CURRENT_TIMESTAMP)");
			
		}

		public function insertar_aux($id_auxiliar, $id_tipo_doc, $nombres_aux, $apellidos_aux, $tel_aux, $correo_aux){
			
			$resultado = $this->db->query("INSERT INTO auxiliar (id_auxiliar, id_tipo_doc, nombres_aux, apellidos_aux, tel_aux, correo_aux, estado_aux, pass_aux, create_aux) VALUES ('$id_auxiliar', '$id_tipo_doc', '$nombres_aux', '$apellidos_aux', '$tel_aux', '$correo_aux', 1, '$id_auxiliar', CURRENT_TIMESTAMP)");
		}

		public function insertar_espec($descrip_espec, $costo_espec){
			
			$resultado = $this->db->query("INSERT INTO especialidad (descrip_espec, costo_espec, estado_espec, create_espec) VALUES ('$descrip_espec', '$costo_espec', 1, CURRENT_TIMESTAMP)");
		}

		public function insertar_consult($id_consultorios){
			
			$resultado = $this->db->query("INSERT INTO consultorios (id_consultorios, estado_consult, create_consult) VALUES ('$id_consultorios', 1, CURRENT_TIMESTAMP)");
		}
		
		public function modificar_paciente($id_paciente, $id_tipo_doc, $id_tipo_doc_1 ,$tel_pac, $correo_pac){
			$resultado = $this->db->query("UPDATE paciente SET id_tipo_doc='$id_tipo_doc', tel_pac='$tel_pac', correo_pac='$correo_pac' WHERE id_paciente= '$id_paciente' AND id_tipo_doc='$id_tipo_doc_1'");
		}

		public function modificar_profesional($id_profesional, $id_consultorios, $id_especialidad, $tel_prof, $correo_prof,$dias_laborales, $franja_horaria, $id_tipo_doc){
			
			$resultado = $this->db->query("UPDATE profesional SET  tel_prof='$tel_prof', correo_prof='$correo_prof', id_consultorios='$id_consultorios', id_especialidad='$id_especialidad',dias_laborales='$dias_laborales', franja_horaria='$franja_horaria' WHERE id_profesional = '$id_profesional' AND id_tipo_doc = '$id_tipo_doc'");			
		}

		public function modificar_auxiliar($id_auxiliar, $id_tipo_doc, $tel_aux, $correo_aux){
			
			$resultado = $this->db->query("UPDATE auxiliar SET id_tipo_doc='$id_tipo_doc', tel_aux='$tel_aux', correo_aux='$correo_aux' WHERE id_auxiliar= '$id_auxiliar'");			
		}

		public function modificar_especialidad($id_especialidad, $costo_espec){
			
			$resultado = $this->db->query("UPDATE especialidad SET costo_espec='$costo_espec' WHERE id_especialidad= '$id_especialidad'");			
		}

		public function modificar_consultorio($id_consultorios, $id_consultorios_a){
			
			$resultado = $this->db->query("UPDATE consultorios SET id_consultorios='$id_consultorios' WHERE id_consultorios= '$id_consultorios_a'");			
		}
		
		public function eliminar_pac_1($id_paciente){
			
			$resultado = $this->db->query("UPDATE paciente SET estado_pac=0 WHERE id_paciente = '$id_paciente'");
			
		}

		public function eliminar_pac_2($id_paciente){
			
			$resultado = $this->db->query("UPDATE paciente SET estado_pac=1 WHERE id_paciente = '$id_paciente'");
			
		}

		public function eliminar_prof_1($id_profesional){
			
			$resultado = $this->db->query("UPDATE profesional SET estado_prof=0 WHERE id_profesional = '$id_profesional'");
			
		}

		public function eliminar_prof_2($id_profesional){
			
			$resultado = $this->db->query("UPDATE profesional SET estado_prof=1 WHERE id_profesional = '$id_profesional'");
			
		}

		public function eliminar_aux_1($id_auxiliar){
			
			$resultado = $this->db->query("UPDATE auxiliar SET estado_aux=0 WHERE id_auxiliar = '$id_auxiliar'");
			
		}

		public function eliminar_aux_2($id_auxiliar){
			
			$resultado = $this->db->query("UPDATE auxiliar SET estado_aux=1 WHERE id_auxiliar = '$id_auxiliar'");
			
		}

		public function eliminar_espec_1($id_especialidad){
			
			$resultado = $this->db->query("UPDATE especialidad SET estado_espec=0 WHERE id_especialidad = '$id_especialidad'");
			
		}


		public function eliminar_espec_2($id_especialidad){
			
			$resultado = $this->db->query("UPDATE especialidad SET estado_espec=1 WHERE id_especialidad = '$id_especialidad'");
			
		}

		public function eliminar_espec_3($id_especialidad){

			$resultado = $this->db->query("DELETE FROM especialidad WHERE id_especialidad='$id_especialidad'");

		}

		public function eliminar_consult_2($id_consultorios){
			
			$resultado = $this->db->query("UPDATE consultorios SET estado_consult=1 WHERE id_consultorios = '$id_consultorios'");
			
		}

		public function eliminar_consult_1($id_consultorios){
			
			$resultado = $this->db->query("UPDATE consultorios SET estado_consult=0 WHERE id_consultorios = '$id_consultorios'");
			
		}

		public function eliminar_consult_3($id_consultorios){

			$resultado = $this->db->query("DELETE FROM consultorios WHERE id_consultorios='$id_consultorios'");

		}

		
		public function get_paciente($id, $t_doc){
			$sql = "SELECT * FROM paciente WHERE id_paciente='$id' AND id_tipo_doc = '$t_doc' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}

		public function get_prof($id, $t_doc){
			$sql = "SELECT * FROM profesional WHERE id_profesional='$id' AND id_tipo_doc='$t_doc' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}

		public function get_aux($id){
			$sql = "SELECT * FROM auxiliar WHERE id_auxiliar='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}

		public function get_espec($id){
			$sql = "SELECT * FROM especialidad WHERE id_especialidad='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}

		public function get_consult($id){
			$sql = "SELECT * FROM consultorios WHERE id_consultorios='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}
		
		public function eliminar_pac($id){

			$sql_1 = "UPDATE cita SET id_paciente = null WHERE id_paciente = '$id'";
			$resultado = $this->db->query($sql_1);
			$sql_2 = "DELETE FROM paciente WHERE id_paciente = '$id'";
			$resultado = $this->db->query($sql_2);

		}

		public function eliminar_prof($id){

			$sql_1 = "DELETE FROM cita WHERE id_profesional = '$id'";
			$resultado = $this->db->query($sql_1);
			$sql_2 = "DELETE FROM profesional WHERE id_profesional = '$id'";
			$resultado = $this->db->query($sql_2);

		}

		public function eliminar_aux($id){

			$sql = "DELETE FROM auxiliar WHERE id_auxiliar = '$id'";
			$resultado = $this->db->query($sql);

		}

		public function eliminar_consul($id){

			$sql= "DELETE FROM consultorios WHERE id_consultorios = '$id'";
			$resultado = $this ->db->query($sql);
		}
	} 	
?>