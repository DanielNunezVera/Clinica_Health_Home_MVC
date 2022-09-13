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
			
		}

		public function pago_ok1($id_cita){
			
			$resultado = $this->db->query("UPDATE cita SET estado_pago_cita = 1  WHERE id_cita = $id_cita ");
			
		}
		
		
		public function cancelar_cita_pac($id_cita){
			
			$resultado = $this->db->query("DELETE FROM cita WHERE id_cita = '$id_cita'");
			
		}

		public function cancelar_cita_prof($id){

			$resultado = $this->db->query("DELETE FROM cita WHERE id_cita='$id'");

		}

		public function get_paciente($num_doc_pac, $tipo_doc){
			$sql = "SELECT id_paciente FROM paciente WHERE num_doc_pac='$num_doc_pac' AND id_tipo_doc='$tipo_doc' LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
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

		public function get_aux(){
			$sql = "SELECT * FROM auxiliar WHERE id_auxiliar=2 LIMIT 1";
			$resultado = $this->db->query($sql);
			$row = $resultado->fetch_assoc();

			return $row;
		}

		public function modificar_auxiliar($tel_aux, $correo_aux){
			$resultado = $this->db->query("UPDATE auxiliar SET tel_aux='$tel_aux', correo_aux='$correo_aux' WHERE id_auxiliar=2 ");
		}
		
		public function update_password($newpass){
			$resultado = $this->db->query("UPDATE auxiliar SET pass_aux='$newpass' WHERE id_auxiliar=2 ");
		}
	} 	
?>