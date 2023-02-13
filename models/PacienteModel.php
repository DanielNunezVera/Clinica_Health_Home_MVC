<?php
    class Paciente_model{

			private $db;
			private $citas;
			private $agendadas;

			public function __construct(){
					$this->db = Conectar::conexion();
					$this->citas = array();
					$this->agendadas = array();
					$this->especialidad = array();
					$this->paciente = array();
			}

			public function validar_no_repet_cita($id_especialidad,$id_pac){
                $coun_cita = $this->db->query("SELECT id_cita FROM cita INNER JOIN profesional ON cita.id_profesional = profesional.id_profesional
                INNER JOIN especialidad ON profesional.id_especialidad = especialidad.id_especialidad WHERE cita.id_paciente = '$id_pac'
                AND cita.fechacita_horainicio >= CURRENT_TIMESTAMP AND especialidad.id_especialidad = '$id_especialidad'");
                $filas = mysqli_num_rows($coun_cita);
                return $filas;
            }

			public function paciente($id_paciente) {

				$sql = "SELECT num_doc_pac, nombres_pac, apellidos_pac, tel_pac, correo_pac, sexo_pac FROM paciente WHERE id_paciente = $id_paciente";
				$resultado = $this->db->query($sql);
				while($row = $resultado -> fetch_assoc()){

					$this -> paciente[] = $row;

				}

				return $this -> paciente;

			}

			public function get_paciente($id_paciente){
				$sql = "SELECT * FROM paciente WHERE id_paciente=$id_paciente LIMIT 1";
				$resultado = $this->db->query($sql);
        		$row = $resultado->fetch_assoc();
        		$this->db->close();
        		return $row;
			}

			public function get_especialidad(){

				$sql = "SELECT DISTINCT especialidad.id_especialidad, especialidad.descrip_espec, especialidad.costo_espec, especialidad.estado_espec FROM profesional INNER JOIN especialidad ON profesional.id_especialidad = especialidad.id_especialidad WHERE estado_espec = '1'";
				$resultado = $this->db->query($sql);
				while($row = $resultado -> fetch_assoc())
				{

					$this -> especialidad[] = $row;

				}

				return $this -> especialidad;

			}

			public function get_citas($fecha, $id_especialidad){

					$sql = "SELECT descrip_espec, costo_espec, fechacita_horainicio, nombres_prof, apellidos_prof, id_consultorios, id_cita FROM especialidad INNER JOIN profesional ON especialidad.id_especialidad=profesional.id_especialidad INNER JOIN cita on cita.id_profesional=profesional.id_profesional WHERE especialidad.id_especialidad=$id_especialidad AND cita.fechacita_horainicio LIKE ('%$fecha%') AND cita.fechacita_horafin LIKE ('%$fecha%') AND cita.estado_cita=0;";
					$resultado = $this->db->query($sql);
					while($row = $resultado->fetch_assoc())
					{
						$this->citas [] = $row;
					}
					return $this->citas;
				
			}

			public function agendar_cita($id_cita, $id_paciente){
				
				$sql = "UPDATE cita SET id_paciente = $id_paciente, estado_cita = 1 WHERE id_cita = '$id_cita'";
				$resultado = $this->db->query($sql);
                $resultado2 = $this->db->affected_rows;
				$this->db->close();
				return $resultado2;
			}

			public function update_info_pac($id_paciente, $correo_pac, $tel_pac){

				$resultado = $this->db->query("UPDATE paciente SET correo_pac = '$correo_pac', tel_pac = '$tel_pac' WHERE id_paciente = '$id_paciente'");
				$resultado1 = $this->db->affected_rows;

				$this->db->close();

				return $resultado1;

			}

			public function update_password($newpass, $id_paciente){

				$resultado = $this->db->query("UPDATE paciente SET pass_pac = '$newpass' WHERE id_paciente=$id_paciente");
				$resultado1 = $this->db->affected_rows;
				$this->db->close();
				return $resultado1;

			}

			public function citas_agendadas($id_paciente){

				$sql = "SELECT cita.id_cita,
				cita.fechacita_horainicio,
				especialidad.descrip_espec,
				profesional.nombres_prof,
				profesional.apellidos_prof,
				profesional.id_consultorios,
				especialidad.costo_espec
				FROM ((cita INNER JOIN profesional ON cita.id_profesional = profesional.id_profesional) INNER JOIN especialidad ON profesional.id_especialidad = especialidad.id_especialidad) WHERE cita.fechacita_horainicio >= CURRENT_TIMESTAMP AND cita.estado_cita = 1 AND cita.id_paciente = '$id_paciente'";
				$resultado = $this->db->query($sql);
				while($row = $resultado -> fetch_assoc()){

					$this -> agendadas[] = $row;

				}

				return $this-> agendadas;

			}

			public function cancelar_agendada($id){

				$sql = "UPDATE cita SET cita.id_paciente = null, cita.estado_cita = 0 WHERE cita.id_cita = '$id'";
				$resultado = $this->db->query($sql);
				$resultado1 = $this->db->affected_rows;
				
				$this->db->close();

				return $resultado1;

			}

    }
?>