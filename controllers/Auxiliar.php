<?php

		require 'Sesiones.php';
		$inc = new SesionesController();
		if(empty($_SESSION["auxiliar"])){
			$inc->redireccionar();
		}

		class AuxiliarController {

		public function __construct(){
			require_once "models/AuxiliarModel.php";
			require_once "models/AdministradorModel.php";
			require_once "models/PacienteModel.php";
		}


		public function index(){
			
			require_once "views/auxiliar_admin/menu_aux.php";
			
		}

		public function acciones(){

			$id_auxiliar = $_SESSION["auxiliar"];

			if (isset($_SESSION["auxiliar"])){

                $auxiliar = new Auxiliar_model();
                $data["auxiliar"] = $auxiliar -> get_aux($id_auxiliar);

                foreach ($data["auxiliar"] as $dato){

                    require_once "views/auxiliar_admin/index_aux.php";

                }
            
            }

		}
		
		public function buscar_pacientei(){
			$tipo_doc=  new Administrador_model();
			$data["tipo_doc"] = $tipo_doc->get_tipo_doc();
			require_once "views/auxiliar_admin/agenda_cita/buscar_pac.php";
		}

		public function cerrarsesion(){
			session_destroy();
			header ("Location: index.php?c=login&a=index");
		}

		public function buscar_pacientef(){	

			$id_tipo_doc = $_POST['id_tipo_doc'];
			$num_doc_pac = $_POST['num_doc_pac'];

			$paciente = new Auxiliar_model();
			$data["paciente"] = $paciente->get_paciente($num_doc_pac, $id_tipo_doc);
			$data["especialidades"] = $paciente->get_especialidad();
			if(isset($data["paciente"])){
				require_once "views/auxiliar_admin/agenda_cita/cita_aux.php";
				$_SESSION['id_paciente']= $data["paciente"]['id_paciente'];
			}else{
				$_SESSION["descti_pac_age"] = "0";
				$this->buscar_pacientei();
			}
			
			
		}

		public function cambi_esp_ci_aux(){	

			$id_pac = $_POST["id_paciente"];
			
			$paciente = new Auxiliar_model();
			$data["especialidades"] = $paciente->get_especialidad();
			
				
			if(isset($id_pac)){
				require_once "views/auxiliar_admin/agenda_cita/cita_aux.php";
				$_SESSION['id_paciente']= $id_pac;
		
			}else{
					$_SESSION["descti_pac_age"] = "0";
					$this->buscar_pacientei();
			}
			
			
			
		}

		public function citas_pac(){
			
			$citas_pac = new Auxiliar_model();
			$data["citas_pac"] = $citas_pac->get_citas_pac();
			$_SESSION["cont"]=1;			
			require_once "views/auxiliar_admin/view_citas/citaspac.php";
				
		}

		public function pdte_pago($id_cita){
			
			$cit = new Auxiliar_model();
			$resultado = $cit-> pdte_pago1($id_cita);
			
			if($resultado > 0){
				$_SESSION["pediente_pago"] = "1";
				
			}else{
				$_SESSION["pediente_pago"] = "0";
				
			}
			$this->citas_pac();

		}

		public function pago_ok($id_cita){
			
			$cit = new Auxiliar_model();
			$resultado = $cit-> pago_ok1($id_cita);

			if($resultado !== 0 ){
				$_SESSION["pago_ok"] = "1";
			}else{
				$_SESSION["pago_ok"] = "0";
			}
			$this->citas_pac();
		}

		public function citas_prof(){
			
			$citas_prof = new Auxiliar_model();
			$data["citas_profe"] = $citas_prof->get_citas_prof();
			$_SESSION["cont"]=2;			
			require_once "views/auxiliar_admin/view_citas/citasprof.php";
				
		}

		public function agendar_cita_i(){
            $paquete=  new Auxiliar_model();
            $data["especialidades"] = $paquete->get_especialidad();
			require_once "views/auxiliar_admin/agenda_cita/cita_aux.php";
				
		}



		public function cancelar_cita_prof($id){

			session_start();					
			if(isset($_POST['id_paciente'])){
				$id_paciente = $_POST['id_paciente'];
				$_SESSION["id_paciente"]=$id_paciente;
				$_SESSION["cont_pac"] = "1";
			}
			
			$id_c=$id;
			$can_ci= new Auxiliar_model;
			$resultado = $can_ci->cancelar_cita_prof($id_c);

			if($resultado !== 0 ){
				if(isset($_POST['id_paciente'])){
					header('location:index.php?c=Auxiliar&a=agendar_cita_i');
				} else{
					$_SESSION["cancel_cita_prof"] = "1";
					header('location:index.php?c=Auxiliar&a=citas_prof');
				}
			}else{
				$_SESSION["cancel_cita_prof"] = "0";
				header('location:index.php?c=Auxiliar&a=citas_prof');
			}

		}
		

		public function actualizar_aux(){

			$id_aux = $_SESSION['auxiliar'];
		    if(isset($_SESSION['auxiliar'])){
			$auxiliar = new Auxiliar_model();
			$data["auxiliar"] = $auxiliar->get_aux($id_aux);
			
				foreach ($data["auxiliar"] as $dato){

					require_once "views/auxiliar_admin/update_info_aux/update_aux.php";

				}

		    }
		}

		public function actualizar_pass(){

			$id_aux = $_SESSION['auxiliar'];
			$auxiliar = new Auxiliar_model();
			$data["auxiliar"] = $auxiliar->get_aux($id_aux);
			require_once "views/auxiliar_admin/update_info_aux/update_pass.php";
		}

		public function modificar_aux(){

			$tel_aux = $_POST["tel_aux"];
			$correo_aux = $_POST["correo_aux"];
            $id_aux = $_SESSION['auxiliar'];
			$auxiliar = new Auxiliar_model();
			$resultado = $auxiliar->modificar_auxiliar($tel_aux, $correo_aux, $id_aux);

			if($resultado > 0){
				$_SESSION["update_info"]  = "1";
				header('location:index.php?c=Auxiliar&a=actualizar_aux');
			}else{
			 	$_SESSION["update_info"]  = "0";
			 	header('location:index.php?c=Auxiliar&a=actualizar_aux');
			}
			
		}

		public function modificar_pass(){
			$id_aux = $_SESSION['auxiliar'];
			$newpass = $_POST['newpass'];
			$repass  = $_POST['repass'];
			if($newpass == $repass){
 
				$new_pass = password_hash($newpass, PASSWORD_BCRYPT);
				
				$password = new Auxiliar_model();
				$resultado = $password -> update_password($new_pass, $id_aux);

				if($resultado > 0){
					$_SESSION["update_pass"]  = "1";
					header('location:index.php?c=Auxiliar&a=actualizar_aux');
				 } //else{
				// // 	$_SESSION["update_pass"]  = "0";
				// // 	header('location:index.php?c=Auxiliar&a=actualizar_pass');
				// // }
				
			}else{
				$_SESSION["update_pass"] = "0";
				header('location:index.php?c=Auxiliar&a=actualizar_pass');
			}
		}


		public function cancelar_cita_pac($id){

			
			$can_ci= new Auxiliar_model;
			$resultado = $can_ci->cancelar_cita_pac($id);

			if($resultado > 0){
				$_SESSION["cancel_cita_pac"] = "1";
				
			}else{
				$_SESSION["cancel_cita_pac"] = "0";
				
			}
			$this->citas_pac();
			
		}

		

		public function buscar_cita(){

			$id_especialidad = $_POST['id_especialidad'];
			$id_pac = $_SESSION["id_paciente"];
			$fecha = $_POST['fecha'];
			$fecha_entrada = strtotime($fecha);
            $fecha_actual = strtotime(date("d-m-Y H:i:00", time()));

			$paquete=  new Paciente_model();
			$data["cita"] = $paquete->get_citas($fecha, $id_especialidad);
			$resultado2 = $paquete->validar_no_repet_cita($id_especialidad , $id_pac);

			if($fecha_entrada >= $fecha_actual){
                
				if ($data["cita"] == TRUE) {

					if(isset($resultado2)){
						if($resultado2 == 0){
							 require_once "views/auxiliar_admin/agenda_cita/citas_dis_aux.php";
						}else {
							
							$_SESSION["cita_esp_age"] = "3";
							$this->agendar_cita_i();
						}
					}else{
						 $_SESSION["error_cita"] = "1";
						 $this->agendar_cita_i();
					}

                } else {

                    $_SESSION['error_cita'] = "1";
                    $this->agendar_cita_i();

                }
				
			}else{
				$_SESSION["error_cita"] = "1";
				$this->agendar_cita_i();
			}
			
		}

		public function agendar_cita_f(){

			// session_start();
			$id_cita = $_POST['id_cita'];
			$id_paciente=$_SESSION['id_paciente'];
			$paquete = new Paciente_model();
			$resultado = $paquete->agendar_cita($id_cita, $id_paciente);

			if(isset($_SESSION["cont_pac"]) == "1"){
				if($resultado > 0){
					$_SESSION["confi_cit_aux"] = "1";
					unset($_SESSION["cont_pac"]);
					$this->citas_prof();
					
				}else{
					$_SESSION["confi_cit_aux"] = "0";
					$this->buscar_cita();
				}
			}else{
				if($resultado > 0){
					$_SESSION["confi_cit_aux"] = "1";
					unset($_SESSION["cont_pac"]);
					header('location:index.php?c=Auxiliar&a=citas_pac');
					
				}else{
					$_SESSION["confi_cit_aux"] = "0";
					$this->buscar_cita();
				}
				
			}
		}

		public function ayuda() {

            require_once "views/administrador/manual_usuario/manual_de_usuario.html";

        }

		public function  volver_a_citas_aux(){
  

			$paciente = new Auxiliar_model();
			$data["especialidades"] = $paciente->get_especialidad();
			if(isset($_SESSION['id_paciente'])){
				require_once "views/auxiliar_admin/agenda_cita/cita_aux.php";
			}else{
				$this->buscar_pacientei();
			}
		}
	}
?>