<?php
	
	class Auxiliar_model {
		
		private $db;
		private $citas_pac;
    	private $citas_prof;
		
		
		public function __construct(){
			$this->db = Conectar::conexion();
			$this->citas_pac = array();
      		$this->citas_prof = array();
		}
		
		public function get_citas_pac()
		{
			$sql = "SELECT * FROM cita_paciente";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->citas_pac[] = $row;
			}
			return $this->citas_pac;
		}

		public function get_citas_prof()
		{
			$sql = "SELECT * FROM cita_profesional";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->citas_prof[] = $row;
			}
			return $this->citas_prof;
		}


				
		public function pdte_pago1($id_cita){
			
			$resultado = $this->db->query("UPDATE cita SET estado_pago_cita = 0  WHERE id_cita = $id_cita ");
			$resultado2 = $this->db->affected_rows;
			$this->db->close();
			return $resultado2;
		}

		public function pago_ok1($id_cita){
			
			$resultado = $this->db->query("UPDATE cita SET estado_pago_cita = 1  WHERE id_cita = $id_cita ");
			$resultado2 = $this->db->affected_rows;
			$this->db->close();
			return $resultado2;
		}
		
		
		public function cancelar_cita_pac($id_cita){
			
			$resultado = $this->db->query("UPDATE cita SET id_paciente = null, estado_cita = 0 WHERE id_cita = '$id_cita'");
			$resultado2 = $this->db->affected_rows;
			$this->db->close();
			return $resultado2;
		}

		public function cancelar_cita_prof($id){

			$resultado = $this->db->query("DELETE FROM cita WHERE id_cita='$id'");
			$resultado2 = $this->db->affected_rows;
			$this->db->close();
			return $resultado2;
		}

		

		public function get_paciente($num_doc_pac, $id_tipo_doc){
			$sql = ("SELECT id_paciente FROM paciente WHERE num_doc_pac='$num_doc_pac' AND id_tipo_doc='$id_tipo_doc' AND estado_pac=1 LIMIT 1");
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();
			// $this->db->close();
			return $row;
		}

		public function get_especialidad()
		{
			$sql = "SELECT especialidad.id_especialidad, especialidad.descrip_espec, especialidad.costo_espec, especialidad.estado_espec FROM profesional INNER JOIN especialidad ON profesional.id_especialidad = especialidad.id_especialidad WHERE estado_espec = '1'";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->especialidad[] = $row;
			}
			$this->db->close();
			return $this->especialidad;
		}

		public function get_aux($id_aux){
			$sql = "SELECT * FROM auxiliar WHERE id_auxiliar=$id_aux LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();
			$this->db->close();
			return $row;
		}

		public function modificar_auxiliar($tel_aux, $correo_aux, $id_aux){
			$resultado = $this->db->query("UPDATE auxiliar SET tel_aux='$tel_aux', correo_aux='$correo_aux' WHERE id_auxiliar='$id_aux' ");
			$resultado2 = $this->db->affected_rows;
			$this->db->close();
			return $resultado2;
		}
		
		public function update_password($new_pass, $id_aux){
			$resultado = $this->db->query("UPDATE auxiliar SET pass_aux='$new_pass' WHERE id_auxiliar=$id_aux ");
			$resultado2 = $this->db->affected_rows;
			$this->db->close();
			return $resultado2;
		}
	} 	
?>