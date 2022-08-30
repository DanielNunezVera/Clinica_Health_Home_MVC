<?php 
require_once('db-connect.php');
session_start();
if(isset($_POST['eliminar2'])){
    $dia = $_REQUEST['eliminar_day'];
    $id_prof = $_SESSION['id_pers'];

    $dia =  mysqli_real_escape_string($conectar, $_POST['eliminar_day']);
    $delete = "DELETE FROM `agenda` where start_datetime Like ('%$dia%') and id_prof=$id_prof";
    if($delete){
        echo "<script> alert('El evento se ha eliminado con éxito ".$dia." .'); location.replace('new_agenda.php') </script>";
    }else{
        echo "<pre>";
        echo "An Error occured.<br>";
        echo "Error: ".$conn->error."<br>";
        echo "SQL: ".$sql."<br>";
        echo "</pre>";
    }
};


?>