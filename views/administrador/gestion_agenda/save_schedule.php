<?php 
require_once('db-connect.php');
session_start();
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No hay datos para guardar.'); location.replace('./') </script>";
    $conn->close();
    exit;
}

extract($_POST);
$allday = isset($allday);
$id_prof=$_SESSION['id_pers'];
$title=$_SESSION['p_nombre_pers']." ".$_SESSION['p_apellido_pers'];
$descripcion=$_SESSION['descrip_espec']." $ ".$_SESSION['costo_espec']." consultorio ".$_SESSION['id_consult'];

if(empty($id)){
    
    $mifecha= date("Y-$tipo_franja_la-01 H:i");
    $fechaini = $mifecha; 
    $fechafin = $mifecha; 
    if($tipo_franja=="a"){
        for($i = 0; $i < 1; $i++){
            $mod_dateini = $fechaini;
            $mod_datefin = $fechafin;
            $mod_dateini = date("Y-m-d 8:00 ",strtotime($fechaini));
            $mod_datefin = date("Y-m-d 8:30 ",strtotime($fechafin));
            $sql = "INSERT INTO `agenda` (`id_prof`,`start_datetime`,`end_datetime`,`title`,`description`,`estado`) VALUES ('$id_prof','$mod_dateini','$mod_datefin','$title','$descripcion',0)"; 
            $save = $conn->query($sql);
            $dato1=$mod_dateini;
            $dato2=$mod_datefin;
            for ($e=0; $e<15; $e++){
                $mod_horaini1 = date("Y-m-d H:i",strtotime($dato1."+30 minute"));
                $mod_horafin1 = date("Y-m-d H:i",strtotime($dato2."+30 minute"));
                $sql = "INSERT INTO `agenda` (`id_prof`,`start_datetime`,`end_datetime`,`title`,`description`,`estado`) VALUES ('$id_prof','$mod_horaini1','$mod_horafin1','$title','$descripcion',0)";
                $save = $conn->query($sql);
                $dato1 = $mod_horaini1;
                $dato2 = $mod_horafin1;
            }
            $mod_dateini = date("Y-m-d H:i",strtotime($fechaini." 1 day"));
            $mod_datefin = date("Y-m-d H:i",strtotime($fechafin." 1 day"));
            $fechaini = $mod_dateini;
            $fechafin = $mod_datefin;
        }
    }
    if($tipo_franja=="b"){
        for($i = 0; $i < 1; $i++){
            $mod_dateini = $fechaini;
            $mod_datefin = $fechafin;
            $mod_dateini = date("Y-m-d 6:00 ",strtotime($fechaini));
            $mod_datefin = date("Y-m-d 6:30 ",strtotime($fechafin));
            $sql = "INSERT INTO `agenda` (`id_prof`,`start_datetime`,`end_datetime`,`title`,`description`,`estado`) VALUES ('$id_prof','$mod_dateini','$mod_datefin','$title','$descripcion',0)"; 
            $save = $conn->query($sql);
            $dato1=$mod_dateini;
            $dato2=$mod_datefin;
            for ($e=0; $e<15; $e++){
                $mod_horaini1 = date("Y-m-d H:i",strtotime($dato1."+30 minute"));
                $mod_horafin1 = date("Y-m-d H:i",strtotime($dato2."+30 minute"));
                $sql = "INSERT INTO `agenda` (`id_prof`,`start_datetime`,`end_datetime`,`title`,`description`,`estado`) VALUES ('$id_prof','$mod_horaini1','$mod_horafin1','$title','$descripcion',0)";
                $save = $conn->query($sql);
                $dato1 = $mod_horaini1;
                $dato2 = $mod_horafin1;
            }
            $mod_dateini = date("Y-m-d H:i",strtotime($fechaini." 1 day"));
            $mod_datefin = date("Y-m-d H:i",strtotime($fechafin." 1 day"));
            $fechaini = $mod_dateini;
            $fechafin = $mod_datefin;
        }
    } 
    if($tipo_franja=="c"){
        for($i = 0; $i < 1; $i++){
            $mod_dateini = $fechaini;
            $mod_datefin = $fechafin;
            $mod_dateini = date("Y-m-d 14:00 ",strtotime($fechaini));
            $mod_datefin = date("Y-m-d 14:30 ",strtotime($fechafin));
            $sql = "INSERT INTO `agenda` (`id_prof`,`start_datetime`,`end_datetime`,`title`,`description`,`estado`) VALUES ('$id_prof','$mod_dateini','$mod_datefin','$title','$descripcion',0)"; 
            $save = $conn->query($sql);
            $dato1=$mod_dateini;
            $dato2=$mod_datefin;
            for ($e=0; $e<15; $e++){
                $mod_horaini1 = date("Y-m-d H:i",strtotime($dato1."+30 minute"));
                $mod_horafin1 = date("Y-m-d H:i",strtotime($dato2."+30 minute"));
                $sql = "INSERT INTO `agenda` (`id_prof`,`start_datetime`,`end_datetime`,`title`,`description`,`estado`) VALUES ('$id_prof','$mod_horaini1','$mod_horafin1','$title','$descripcion',0)";
                $save = $conn->query($sql);
                $dato1 = $mod_horaini1;
                $dato2 = $mod_horafin1;
            }
            $mod_dateini = date("Y-m-d H:i",strtotime($fechaini." 1 day"));
            $mod_datefin = date("Y-m-d H:i",strtotime($fechafin." 1 day"));
            $fechaini = $mod_dateini;
            $fechafin = $mod_datefin;
        }
    } 
}else{
    $sql = "UPDATE `agenda` set `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}' where `id` = '{$id}'";
    $save = $conn->query($sql);
}
if($save){
    echo "<script> alert('Evento Guardado Correctamente.'); location.replace('new_agenda.php') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}
$conn->close();
?>