<?php
    include "../../../controller/conexion-db/db_connect.php";

    include "../../../controller/sesiones/sesiones_aux.php";

    $consulta = "SELECT * FROM personas INNER JOIN auxiliares_admin ON personas.id_pers = auxiliares_admin.id_aux WHERE personas.num_doc_pers=$_SESSION[num_doc_pers]";

    $resultado = mysqli_query($conectar, $consulta);

    $fila = mysqli_fetch_assoc($resultado);

    $filas = mysqli_num_rows($resultado);

    if($filas == 1){        
        $_SESSION['id_aux'] = $fila['id_aux'];
        $_SESSION['creacion'] = $fila['creacion'];
        $_SESSION['actualizacion'] = $fila['actualizacion'];
        $_SESSION['delete'] = $fila['delete'];
    }
?>
<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion datos</title>

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="../../../assets/css/estilos.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@800&display=swap');
    </style>
</head>
<body>
    <header>
        <div class="container__menu">
            <div class="logo">
                <img src="../../assets/images/Logo2.png" alt="">
            </div>
            <div class="menu">
                <i class="fas fa-bars" id="btn_menu"></i>
                <div id="back_menu"></div>
                <nav id="nav">
                    <img src="../../../assets/images/ajustes.png" alt="">
                    <ul>
                        <li><a href="../index_aux.php">Inicio</a></li>
                        <li><a href="update_aux.php">Actualizar datos</a></li>
                        <li><a href="../../../controller/sesiones/cerrarsesion.php">Cerrar sesion</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="container__cover">
            <div class="cover"> 
                <div class="caja3">
                    <h1 class="titulo1">Información general</h1>
                    <div class="contact-wrapper animated bounceInUp">
                        <div class="contact-form">
                            <form action="update_aux_alert4.php" method="POST">
                                <!-- <p>
                                    <label>Tipo de documento</label>
                                    <input type="text" name="t_doc" disabled>
                                </p> -->
                                <p>
                                    <label>N° documento</label>
                                    <input type="number" name="num_doc" value="<?php echo $_SESSION['num_doc_pers'];?>" disabled>
                                </p>
                                <p>
                                    <label>Nombre</label>
                                    <input type="text" name="fullnombre" value="<?php echo $_SESSION['p_nombre_pers']." ".$_SESSION['s_nombre_pers']." ".$_SESSION['p_apellido_pers']." ".$_SESSION['s_apellido_pers'];?>" disabled>
                                </p>
                                <!-- <p>
                                    <label>Segundo nombre</label>
                                    <input type="text" name="s_nombre">
                                </p>
                                <p>
                                    <label>Primer apellido</label>
                                    <input type="text" name="p_apellido" required>
                                </p>
                                <p>
                                    <label>Segundo apellido</label>
                                    <input type="text" name="s_apellido">
                                </p> -->
                                <p>
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?php echo $_SESSION['correo_pers']?>" required>
                                </p>
                                <p>
                                    <label>Teléfono</label>
                                    <input type="tel" name="tel" value="<?php echo $_SESSION['tel_pers'];?>" required>
                                </p>
                                <p>
                                    <label>Contraseña</label>
                                    <input style="color:blue;" name="pass" value="Cambiar contraseña" onclick="contraseña()">
                                </p>
                                <p class="block">
                                    <button name="update" type="submit">
                                        Actualizar
                                    </button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </main>
    <script src="../../assets/js-general/menu-responsive.js"></script>
    <script>
        function contraseña(){
            window.location = "update_contraseña.php"
        }
    </script>
</body>
</html>