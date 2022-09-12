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


		/*public function modificar_auxiliar($id_auxiliar, $id_tipo_doc, $tel_aux, $correo_aux){
			
			$resultado = $this->db->query("UPDATE auxiliar SET id_tipo_doc='$id_tipo_doc', tel_aux='$tel_aux', correo_aux='$correo_aux' WHERE id_auxiliar= '$id_auxiliar'");			
		}*/
		
		public function confirmapago_aux1($id_cita){
			
			$resultado = $this->db->query("UPDATE cita SET   WHERE id_ = '$id_cita'");
			
		}

		public function confirmapago_aux2($id_cita){
			
			$resultado = $this->db->query("UPDATE cita SET   WHERE id_ = '$id_cita'");
			
		}
		
		
		public function cancelar_cita_pac($id_paciente){
			
			$resultado = $this->db->query("UPDATE paciente SET estado_pac=0 WHERE id_paciente = '$id_paciente'");
			
		}

		public function cancelar_cita_prof($id_consultorios){

			$resultado = $this->db->query("DELETE FROM consultorios WHERE id_consultorios='$id_consultorios'");

		}
	
	} 	
?>