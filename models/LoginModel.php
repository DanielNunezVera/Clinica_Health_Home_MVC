<?php
	
	class Login_model {
		
		private $db;
        private $tipo_doc;
        private $usuario;

        public function __construct(){
			$this->db = Conectar::conexion();
            $this->tipo_doc = array();
            $this->usuario = array();
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

        public function vali_rec_pass($id_tipo_doc, $num_doc, $tipo_rol, $new_pass){
            $sql = "CALL vali_rec_password ('$id_tipo_doc', '$num_doc', '$tipo_rol', '$new_pass');";
            $resultado = $this->db->query($sql);
            $resultado1 = $this ->db->affected_rows;
    
            return $resultado1;
        }


        public function validar_funcionario($tipo_rol, $id_tipo_doc, $num_doc){
            if ($tipo_rol=="4") {
                $sql = "SELECT * FROM administrador WHERE usuario_administrador = '$num_doc' ";
                $resultado = $this->db->query($sql);
                while($row = $resultado->fetch_assoc())
                {
                    $this->usuario[] = $row;
                }
                return $this->usuario;
            }
			elseif ($tipo_rol=="2") {
				$sql = "SELECT * FROM auxiliar WHERE id_tipo_doc = '$id_tipo_doc' AND num_doc_aux = '$num_doc' AND estado_aux=1";
                $resultado = $this->db->query($sql);
                while($row = $resultado->fetch_assoc())
                {
                    $this->usuario[] = $row;
                }
                return $this->usuario;
			}elseif ($tipo_rol=="1") {
                $sql = "SELECT * FROM profesional WHERE id_tipo_doc = '$id_tipo_doc' AND num_doc_prof = '$num_doc' AND estado_prof=1";
                $resultado = $this->db->query($sql);
                while ($row = $resultado->fetch_assoc()) {
                    $this->usuario[] = $row;
                }
                return $this->usuario;
            }
			// while($row = $resultado->fetch_assoc())
			// {
			// 	$this->tipo_doc[] = $row;
			// }
			// return $this->tipo_doc;
		}

        public function validar_paciente($id_tipo_doc, $num_doc){

            $sql = "SELECT * FROM paciente WHERE id_tipo_doc = '$id_tipo_doc' AND num_doc_pac = '$num_doc' AND estado_pac=1";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc()){

                $this->usuario[] = $row;

            }

            return $this->usuario;

        }

    }

?>

