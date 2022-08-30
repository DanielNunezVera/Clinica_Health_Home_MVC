<?php
    include "../conexion-db/db_connect.php";
    session_start();

    if(isset($_POST['agenda'])){
        $t_doc_pers = $_REQUEST['tipo_doc'];
        $num_doc_pers = $_REQUEST['num_doc_pers'];

        $t_doc_pers =       mysqli_real_escape_string($conectar, $_POST['tipo_doc']);
        $num_doc_pers  =       mysqli_real_escape_string($conectar, $_POST['num_doc_pers']);

        //CREAR UNA CONSULTA PARA SABER SI LOS DATOS SON CORRECTOS:

        $consulta1 = "SELECT * FROM personas WHERE t_doc_pers='$t_doc_pers' AND num_doc_pers='$num_doc_pers'";

        $resultado1 = mysqli_query($conectar, $consulta1) or die(mysqli_error);

        $fila = mysqli_fetch_assoc($resultado1);

        $filas = mysqli_num_rows($resultado1);
        
       
        if($filas==1){
            $_SESSION['id_pers'] = $fila['id_pers'];
            $_SESSION['p_nombre_pers'] = $fila['p_nombre_pers'];
            $_SESSION['s_nombre_pers'] = $fila['s_nombre_pers'];
            $_SESSION['p_apellido_pers'] = $fila['p_apellido_pers'];
            $_SESSION['s_apellido_pers'] = $fila['s_apellido_pers'];

            $id_prof = $_SESSION['id_pers'];
            
            $consulta2 = "SELECT * FROM profesionales WHERE id_prof='$id_prof'";

            $resultado2 = mysqli_query($conectar, $consulta2) or die(mysqli_error);

            $fila = mysqli_fetch_assoc($resultado2);

            $filas = mysqli_num_rows($resultado2);
            if($filas==1){
                $_SESSION['id_espec'] = $fila['id_espec'];
                $_SESSION['id_consult'] = $fila['id_consult'];
    
                $id_espec = $_SESSION['id_espec'];
                
                $consulta2 = "SELECT * FROM especialidades WHERE id_espec='$id_espec'";
    
                $resultado2 = mysqli_query($conectar, $consulta2) or die(mysqli_error);
    
                $fila = mysqli_fetch_assoc($resultado2);
    
                $filas = mysqli_num_rows($resultado2);
                if($filas==1){
                    $_SESSION['descrip_espec'] = $fila['descrip_espec'];
                    $_SESSION['costo_espec'] = $fila['costo_espec'];

                    header('Location: ../../view/administrador/gestion_agenda/new_agenda.php');
                }else{
                    header('Location: ../../view/administrador/gestion_agenda/gestion_agenda.php');
                }
            }else{
                header('Location: ../../view/administrador/gestion_agenda/gestion_agenda.php');
            }
        }else{
            header('Location: ../../view/administrador/gestion_agenda/gestion_agenda.php');
        }
    };
?>