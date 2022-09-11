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
			$this->cita_pro_prof[] = $row;
		}
		return $this->cita_pro_prof;
        
    }

    public function asistencia_cita_1($id_cita){

		$resultado = $this->db->query("UPDATE cita SET asistencia_cita=0 WHERE id_cita = '$id_cita'");
			

    }
    public function asistencia_cita_2($id_cita){

        $resultado = $this->db->query("UPDATE cita SET asistencia_cita=1 WHERE id_cita = '$id_cita'");
        
    }


}


?>