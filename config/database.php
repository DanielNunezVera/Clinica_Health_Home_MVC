<?php
	
	class Conectar {
		
		public static function conexion(){
			
			$conexion = mysqli_connect("localhost", "root", "", "clinica_health_home");
			return $conexion;
			
		}
	}
?>