<?php
	require 'Sesiones.php';
	$inc = new SesionesController();
	if(empty($_SESSION["pac"])){
		$inc->redireccionar();
	}

    class PacienteController {

        public function __construct(){
			require_once "models/AdministradorModel.php";
            require_once "models/PacienteModel.php";
		}

        public function index(){

            require_once "views/pacientes/menu_pac.php";

        }

        public function acciones(){

            $id_paciente = $_SESSION['pac'];

            if (isset($_SESSION['pac'])){

                $paciente = new Paciente_model();
                $data["paciente"] = $paciente -> paciente($id_paciente);

                foreach ($data["paciente"] as $dato){

                    require_once "views/pacientes/index_pac.php";

                }
            
            }

        }

        public function cerrar_sesion(){

            session_destroy();
            header ("Location: index.php?c=Login&a=index");

        }

        public function agendar_cita_i(){
            
            $paquete=  new Paciente_model();
            $data["especialidad"] = $paquete->get_especialidad();
			require_once "views/pacientes/agenda_cita/agendarcita.php";
				
		}

        public function agendar_cita_f(){
                
                $id_cita = $_POST['id_cita'];
                $id_paciente = $_POST['id_paciente'];
                $paquete = new Paciente_model();
                $resultado = $paquete->agendar_cita($id_cita, $id_paciente);

                if ($resultado == TRUE){
                    
                    $_SESSION['cita_success'] = "1";
                    header('location:index.php?c=Paciente&a=agendar_cita_i');

                } else {

                    $_SESSION['cita_success'] = "2";
                    $this->buscar_cita();
                    
                }

        }

        public function buscar_cita(){

            $id_paciente = $_SESSION['pac'];
			$id_especialidad = $_POST['id_especialidad'];
			$fecha = $_POST['fecha'];
            $fecha_entrada = strtotime($fecha);
            $fecha_actual = strtotime(date("d-m-Y H:i:00", time()));

            $paquete = new Paciente_model();
            $data["cita"] = $paquete->get_citas($fecha, $id_especialidad);
            $resultado1 = $paquete->validar_no_repet_cita($id_especialidad, $id_paciente);

            if ($fecha_entrada >= $fecha_actual) {
            
                if ($data["cita"] == TRUE) {

                    if ($resultado1 == 0) {
    
                        require_once "views/pacientes/agenda_cita/citasdisponibles.php";
    
                    } else {
    
                        $_SESSION['cita_success'] = "3";
                        $this->agendar_cita_i();
    
                    }
                    
                } else {

                    $_SESSION['error_cita'] = "1";
                    $this->agendar_cita_i();

                }

            } else {

                $_SESSION['error_cita'] = "2";
                $this->agendar_cita_i();

            }

        }

        public function get_paciente(){

            $id_paciente = $_SESSION['pac'];

            $paquete = new Paciente_model();
            $data["paciente"] = $paquete -> paciente($id_paciente);

            foreach($data["paciente"] as $dato){   

                require_once "views/pacientes/update_info_pac/update_pacientes.php";

            }
            
        }

        public function update_pac(){

            $id_paciente = $_POST['id_paciente'];
            $correo_pac = $_POST['correo_pac'];
            $tel_pac = $_POST['tel_pac'];

            $paquete = new Paciente_model;
            $resultado = $paquete -> update_info_pac($id_paciente, $correo_pac, $tel_pac);

            if($resultado == TRUE){
                
                $_SESSION['datos'] = "1";
                header ('location:index.php?c=Paciente&a=get_paciente');

            } else {

                $_SESSION['datos'] = "0";
                $this->get_paciente();

            }

        }

        public function password(){

            require_once "views/pacientes/update_info_pac/update_contraseña.php";

        }

        public function update_password(){

            if ($_POST["pass_pac"] == $_POST["repeat_pass_pac"]) {
                
                $id_paciente = $_POST['id_paciente'];
                $pass_pac = password_hash($_POST['pass_pac'], PASSWORD_BCRYPT);

                $paquete = new Paciente_model;
                $prueba = $paquete -> update_pass_pac($id_paciente, $pass_pac);

                if ($prueba == TRUE) {

                    $_SESSION['password'] = "1";
                    header ('Location:index.php?c=Paciente&a=get_paciente');

                } else {

                    $_SESSION['password'] = "2";
                    $this->password();

                }

            } else{

                $_SESSION['password'] = "0";
                header('Location:index.php?c=Paciente&a=password');

            }

        }

        public function citas_agendadas(){

            $id_paciente = $_SESSION['pac'];

            $paquete = new Paciente_model;
            $data["agendadas"] = $paquete -> citas_agendadas($id_paciente);

            require_once "views/pacientes/view_citas/view_citas.php";

        }

        public function cancel_agendada($id){

            $paquete = new Paciente_model;
            $resultado = $paquete -> cancelar_agendada($id);

            if ($resultado == TRUE) {

                $_SESSION['cancel_cita'] = "1";
                header("Location:index.php?c=Paciente&a=citas_agendadas");

            } else {

                $_SESSION['cancel_cita'] = "0";
                header("Location:index.php?c=Paciente&a=citas_agendadas");

            }

        }

        public function ayuda() {

            require_once "views/preguntas_frecuentes/menu_ayuda.php";
            require_once "views/preguntas_frecuentes/ayuda.php";

        }

    }
?>