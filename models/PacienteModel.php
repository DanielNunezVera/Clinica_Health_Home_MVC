<?php
    class Paciente_model{

			private $db;
			private $citas;

			public function __construct(){
					$this->db = Conectar::conexion();
					$this->citas = array();
			}

      public function get_citas($fecha, $id_especialidad)
			{
				$sql = "SELECT descrip_espec, costo_espec, fechacita_horainicio, nombres_prof, apellidos_prof, id_cita FROM especialidad INNER JOIN profesional ON especialidad.id_especialidad=profesional.id_especialidad INNER JOIN cita on cita.id_profesional=profesional.id_profesional WHERE especialidad.id_especialidad=$id_especialidad AND cita.fechacita_horainicio LIKE ('%$fecha%') AND cita.fechacita_horafin LIKE ('%$fecha%') AND cita.estado_cita=1;";
				$resultado = $this->db->query($sql);
				while($row = $resultado->fetch_assoc())
				{
					$this->citas [] = $row;
				}
				return $this->citas;
			}

			public function agendar_cita($id_cita, $id_paciente)
			{
				$sql = "UPDATE cita SET id_paciente = $id_paciente, estado_cita = 0 WHERE id_cita = '$id_cita'";
				$resultado = $this->db->query($sql);

			}

			public function get_paciente(){

				$sql = "SELECT paciente.id_paciente, paciente.num_doc_pac, paciente.nombres_pac, paciente.apellidos_pac, paciente.correo_pac, paciente.tel_pac, paciente.sexo_pac FROM paciente WHERE paciente.id_paciente = 1 LIMIT 1";
				$resultado = $this->db->query($sql);
				$row = $resultado -> fetch_assoc();

				return $row;
				
			}

			public function update_info_pac($correo_pac, $tel_pac){

				$resultado = $this->db->query("UPDATE paciente SET correo_pac = '$correo_pac', tel_pac = '$tel_pac'");

				return $resultado;

			}

			public function update_pass_pac($id_paciente, $pass_pac){

				$resultado = $this->db->query("UPDATE paciente SET pass_pac = '$pass_pac' WHERE id_paciente = '$id_paciente'");

				return $resultado;

			}

    }
?>