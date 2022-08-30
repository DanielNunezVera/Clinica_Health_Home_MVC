<?php
	
	class Conectar {
		
		public static function conexion(){
			
			$conexion = new mysqli("localhost", "root", "", "clinica_health_home");
			return $conexion;
			
		}
	}
?>