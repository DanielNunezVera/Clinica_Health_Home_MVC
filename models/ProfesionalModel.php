<?php

class Profesional_model{

    private $db;
    private $citas_progr;

    public function __construct(){
        $this->db = Conectar::conexion();
        $this->citas_progr= array();

    }

    public function get_citas_programadas($id_prof){

        $sql="CALL citas_programadas_prof('$id_prof')";
        $resultado = $this->db->query($sql);
		while($row = $resultado->fetch_assoc())
		{
			$this->citas_progr[] = $row;
		}

		return $this->citas_progr;
    }

    public function asistencia_cita($asist, $id_cita){

        $resultado = $this->db->query("CALL asistencia_cita('$asist', '$id_cita')");
        $this->db->close();   
    }

    public function get_prof($id_prof){
        $sql = "SELECT * FROM profesional WHERE id_profesional=$id_prof LIMIT 1 ";
        $resultado = $this->db->query($sql);
        $row = $resultado->fetch_assoc();
        $this->db->close();
        return $row;
    }

    public function modificar_profesional($tel_prof, $correo_prof, $id_prof){
        $resultado = $this->db->query("UPDATE profesional SET tel_prof='$tel_prof', correo_prof='$correo_prof' WHERE id_profesional=$id_prof ");
        $resultado2 = $this->db->affected_rows;
        $this->db->close();
        return $resultado2;
    }

    public function update_password($newpass, $id_prof){
        $resultado = $this->db->query("UPDATE profesional SET pass_prof='$newpass' WHERE id_profesional=$id_prof ");
        $resultado2 = $this->db->affected_rows;
        $this->db->close();
        return $resultado2;
    }
}


?>