<?php
    include "../conexion-db/db_connect.php";
    session_start();

    if(isset($_POST['consultar_agenda'])){
        $fecha = $_REQUEST['fecha'];
        $espec = $_REQUEST['espec'];

        $fecha =       mysqli_real_escape_string($conectar, $_POST['fecha']);
        $espec  =       mysqli_real_escape_string($conectar, $_POST['espec']);

        $_SESSION['fecha'] = $fecha;
        $_SESSION['espec'] = $espec;
        header('Location: ../../view/pacientes/agenda_cita/citasdisponibles.php');
    };
?>