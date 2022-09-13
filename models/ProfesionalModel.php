<?php

class Profesional_model{

    private $db;
    private $citas_progr;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->citas_progr= array();

    }

    public function get_citas_programadas(){

        $sql="SELECT * FROM citas_programadas_prof WHERE id_profesional='1'";
        $resultado = $this->db->query($sql);
		while($row = $resultado->fetch_assoc())
		{
			$this->citas_progr[] = $row;
		}

		return $this->citas_progr;
        
    }

    public function asistencia_cita_1($id_cita){

		$resultado = $this->db->query("UPDATE cita SET asistencia_cita=0 WHERE id_cita = '$id_cita'");
			

    }
    public function asistencia_cita_2($id_cita){

        $resultado = $this->db->query("UPDATE cita SET asistencia_cita=1 WHERE id_cita = '$id_cita'");
        
    }

    public function get_prof(){
        $sql = "SELECT * FROM profesional WHERE id_profesional=1 LIMIT 1 ";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        return $row;
    }

    public function modificar_profesional($tel_prof, $correo_prof){
        $resultado = $this->db->query("UPDATE profesional SET tel_prof='$tel_prof', correo_prof='$correo_prof' WHERE id_profesional=1 ");
    }

    public function update_password($newpass){
        $resultado = $this->db->query("UPDATE profesional SET pass_prof='$newpass' WHERE id_profesional=1 ");
    }
}


?>