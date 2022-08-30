<?php
    include "../conexion-db/db_connect.php";
    session_start();

    if(isset($_POST['agendar_cita'])){
        $id_cita = $_REQUEST['id_cita'];
        $id_pers_fun = $_REQUEST['id_pers_fun'];
        $fecha_cita = $_REQUEST['fecha_cita'];
        $id_pers_pac = $_SESSION['id_pers_pac'];

        $id_cita =       mysqli_real_escape_string($conectar, $_POST['id_cita']);
        $id_pers_fun  =       mysqli_real_escape_string($conectar, $_POST['id_pers_fun']);
        $fecha_cita  =       mysqli_real_escape_string($conectar, $_POST['fecha_cita']);

        //CREAR UNA CONSULTA PARA SABER SI LOS DATOS SON CORRECTOS:

        $actualizar1 = "UPDATE agenda SET estado='$id_pers_pac' WHERE id='$id_cita'";

        $resultado1 = mysqli_query($conectar, $actualizar1);
        
        $insertar2="INSERT INTO citas (fecha_cita, estado_pago_cita, asistencia_cita, id_prof, id_pac, creacion) VALUES ('$fecha_cita', 0, 0, $id_pers_fun, $id_pers_pac, CURRENT_TIMESTAMP);";

        $resultado2 = mysqli_query($conectar, $insertar2);

        if($resultado2==1){
            header('Location: ../../view/pacientes/index_pac.php');
        }
    };
?>