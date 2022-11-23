<?php

	class Recuperar_model {

		private $db;
        private $sched_res;

        public function __construct(){
			$this->db = Conectar::conexion();
            $this->sched_res = array();
		}

		public function vali_rec_pass($id_tipo_doc, $num_doc, $tipo_rol, $new_pass){
            $sql = "CALL vali_rec_password ('$id_tipo_doc', '$num_doc', '$tipo_rol', '$new_pass');";
            $resultado = $this->db->query($sql);
            $resultado1 = $this ->db->affected_rows;
            return $resultado1;
		}

        public function get_email($id_tipo_doc, $num_doc, $tipo_rol){
            $sql = "CALL email('$id_tipo_doc', '$num_doc', '$tipo_rol');";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->sched_res[] = $row;
			}
            return $this->sched_res;
		}
    }

?>

