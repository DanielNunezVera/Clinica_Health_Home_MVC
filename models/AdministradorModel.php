<?php
	
	class Administrador_model {
		
		private $db;
		private $paciente;
		private $profesional;
		private $auxiliar;
		private $consultorios;
		private $especialidad;
		private $tipo_doc;
		private $sched_res;
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->paciente = array();
			$this->profesional = array();
			$this->auxiliar = array();
			$this->consultorios = array();
			$this->especialidad = array();
			$this->tipo_doc = array();
			$this->sched_res = array();
		}
		//consultas para listar pacientes, profesionales, auxiliares, consultorios, especialidades, tipo doc, agenda
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
			// $this->db->close();
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

		// Se busca traer la agenda de los profesionales 

		public function get_agenda_prof($id){
			$sql = "SELECT * FROM cita WHERE id_profesional='$id'";
			$resultado = $this->db->query($sql);


			foreach($resultado->fetch_all(MYSQLI_ASSOC) as $row){
				$row['sdate'] = date("F d, Y h:i A",strtotime($row['fechacita_horainicio']));
				$row['edate'] = date("F d, Y h:i A",strtotime($row['fechacita_horafin']));
				$this->sched_res[$row['id_cita']] = $row;
			}

			return $this->sched_res;
		}

		////Métodos para crear usuarios

		public function insertar_pac($id_tipo_doc, $num_doc_pac, $nombres_pac, $apellidos_pac, $tel_pac, $correo_pac, $sexo_pac){
			
			$resultado = $this->db->query("INSERT INTO paciente (id_tipo_doc, num_doc_pac, nombres_pac, apellidos_pac, tel_pac, correo_pac, sexo_pac, estado_pac, pass_pac, create_pac) VALUES ('$id_tipo_doc', '$num_doc_pac', '$nombres_pac', '$apellidos_pac', '$tel_pac', '$correo_pac', '$sexo_pac', 1, '$num_doc_pac', CURRENT_TIMESTAMP)");
		}

		public function insertar_prof($num_doc_prof, $id_tipo_doc, $id_consultorios, $id_especialidad, $nombres_prof, $apellidos_prof, $tel_prof, $correo_prof, $dias_laborales, $franja_horaria){
			
			$resultado = $this->db->query("INSERT INTO profesional (num_doc_prof, id_tipo_doc, id_consultorios, id_especialidad, nombres_prof, apellidos_prof, tel_prof, correo_prof, dias_laborales, franja_horaria, estado_prof, pass_prof, create_prof) VALUES ('$num_doc_prof', '$id_tipo_doc', '$id_consultorios', '$id_especialidad', '$nombres_prof', '$apellidos_prof', '$tel_prof', '$correo_prof', '$dias_laborales', '$franja_horaria', 1, '$num_doc_prof', CURRENT_TIMESTAMP)");
			
		}

		public function insertar_aux($id_tipo_doc, $num_doc_aux, $nombres_aux, $apellidos_aux, $tel_aux, $correo_aux){
			
			$resultado = $this->db->query("INSERT INTO auxiliar (id_tipo_doc, num_doc_aux, nombres_aux, apellidos_aux, tel_aux, correo_aux, estado_aux, pass_aux, create_aux) VALUES ('$id_tipo_doc', '$num_doc_aux', '$nombres_aux', '$apellidos_aux', '$tel_aux', '$correo_aux', 1, '$num_doc_aux', CURRENT_TIMESTAMP)");
		}

		public function insertar_espec($descrip_espec, $costo_espec){
			
			$resultado = $this->db->query("INSERT INTO especialidad (descrip_espec, costo_espec, estado_espec, create_espec) VALUES ('$descrip_espec', '$costo_espec', 1, CURRENT_TIMESTAMP)");
		}

		public function insertar_consult($id_consultorios){
			
			$resultado = $this->db->query("INSERT INTO consultorios (id_consultorios, estado_consult, create_consult) VALUES ('$id_consultorios', 1, CURRENT_TIMESTAMP)");
		}






		public function insertar_agenda($id_profesional, $tipo_franja_la, $tipo_franja){

			if($tipo_franja == "a"){
				$fecha_i = '2022/'.$tipo_franja_la.'/01 8:00';
				$fecha_f = '2022/'.$tipo_franja_la.'/01 16:00';
			}elseif ($tipo_franja == "b") {
				$fecha_i = '2022/'.$tipo_franja_la.'/01 6:00';
				$fecha_f = '2022/'.$tipo_franja_la.'/01 14:00';
			}elseif ($tipo_franja == "b") {
				$fecha_i = '2022/'.$tipo_franja_la.'/01 14:00';
				$fecha_f = '2022/'.$tipo_franja_la.'/01 22:00';
			}
			$fecha_i_P = $fecha_i;
			$fecha_i_P_2 = date("Y-m",strtotime($fecha_i_P));
			$sql = "SELECT fechacita_horainicio FROM cita WHERE fechacita_horainicio LIKE ('%$fecha_i_P_2%') AND id_profesional = $id_profesional";
			$resultado = $this->db->query($sql);
			$filas = mysqli_num_rows($resultado);

			if($filas<1){
				for($i = 0; $i < 30; $i++){
					$count = 0;
					$begin = new DateTime($fecha_i);
					$end = new DateTime($fecha_f);
					$end = $end->modify( '30 minute' );
					$interval = new DateInterval('PT30M');
					$daterange = new DatePeriod($begin, $interval ,$end);
				
					foreach($daterange as $date){
					if(date('l', strtotime($date->format("Y-m-d H:i"))) == 'Sunday'){
						////////  no se que poner aqui :v///////////////////////////
					} else {
						$count = $count + 1;
						if($count == 1){
							$fecha_i_1 = $date->format("Y-m-d H:i");
						}elseif ($count == 2) {
							$fecha_f_1 = $date->format("Y-m-d H:i");
						}
						if($count > 2){
							$resultado = $this->db->query("INSERT INTO `cita` (`id_profesional`,`fechacita_horainicio`,`fechacita_horafin`,`estado_cita`,`estado_pago_cita`,`asistencia_cita`,`create_cita`) VALUES ('$id_profesional','$fecha_i_1','$fecha_f_1',0,0,0, CURRENT_TIMESTAMP)"); 
							$count = 1;
							$fecha_i_2 = $date->format("Y-m-d H:i");
							$resultado = $this->db->query("INSERT INTO `cita` (`id_profesional`,`fechacita_horainicio`,`fechacita_horafin`,`estado_cita`,`estado_pago_cita`,`asistencia_cita`,`create_cita`) VALUES ('$id_profesional','$fecha_f_1','$fecha_i_2',0,0,0, CURRENT_TIMESTAMP)"); 
							$fecha_i_1 = $date->format("Y-m-d H:i");
						}
					}
					}
					$fecha_i = date("Y-m-d H:i",strtotime($fecha_i." 1 day"));
					$fecha_f = date("Y-m-d H:i",strtotime($fecha_f." 1 day"));
				}
				return "1";
			}else{
				return "0";
			}
		}

		public function modificar_paciente($id_paciente, $id_tipo_doc ,$tel_pac, $correo_pac){
			
			$resultado = $this->db->query("UPDATE paciente SET id_tipo_doc='$id_tipo_doc', tel_pac='$tel_pac', correo_pac='$correo_pac' WHERE id_paciente= '$id_paciente'");

		}

		public function modificar_profesional($id_profesional, $id_tipo_doc, $id_consultorios, $id_especialidad, $tel_prof, $correo_prof,$dias_laborales, $franja_horaria){
			
			$resultado = $this->db->query("UPDATE profesional SET id_tipo_doc='$id_tipo_doc', tel_prof='$tel_prof', correo_prof='$correo_prof', id_consultorios='$id_consultorios', id_especialidad='$id_especialidad',dias_laborales='$dias_laborales', franja_horaria='$franja_horaria' WHERE id_profesional = '$id_profesional'");			
		}

		public function modificar_auxiliar($id_auxiliar, $id_tipo_doc, $tel_aux, $correo_aux){
			
			$resultado = $this->db->query("UPDATE auxiliar SET id_tipo_doc='$id_tipo_doc', tel_aux='$tel_aux', correo_aux='$correo_aux' WHERE id_auxiliar= '$id_auxiliar'");			
		}

		public function modificar_especialidad($id_especialidad, $costo_espec){
			
			$resultado = $this->db->query("UPDATE especialidad SET costo_espec='$costo_espec' WHERE id_especialidad= '$id_especialidad'");			
		}

		/*public function modificar_consultorio($id_consultorios, $id_consultorios_a){
			
			$resultado = $this->db->query("UPDATE consultorios SET id_consultorios='$id_consultorios' WHERE id_consultorios= '$id_consultorios_a'");			
		}*/
		
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

		
		public function get_paciente($id){
			$sql = "SELECT * FROM paciente WHERE id_paciente='$id' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}

		public function get_prof($id){
			$sql = "SELECT * FROM profesional WHERE id_profesional='$id' LIMIT 1";
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
			
			$sql_1= "UPDATE profesional SET id_consultorios = null WHERE id_consultorios = '$id'";
			$resultado = $this->db->query($sql_1);
			$sql_2= "DELETE FROM consultorios WHERE id_consultorios = '$id'";
			$resultado = $this ->db->query($sql_2);
		}

		public function eliminar_agend($id){

			$sql= "DELETE FROM cita WHERE id_cita = '$id'";
			$resultado = $this ->db->query($sql);
		}

		public function excepciones_agenda($dia_eliminar, $id_profesional){

			$sql= "DELETE FROM cita WHERE id_profesional = '$id_profesional' AND fechacita_horainicio LIKE ('%$dia_eliminar%') AND fechacita_horafin LIKE ('%$dia_eliminar%')";
			$resultado = $this ->db->query($sql);
			$resultado1 = $this ->db->affected_rows;
			if($resultado1 > 1){
				$palabra="1";
			}elseif($resultado1 < 1 ){
				$palabra="0";
			}
			return $palabra;
		}
	} 	
?>