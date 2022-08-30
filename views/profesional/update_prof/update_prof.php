<?php
include "../../../controller/sesiones/sesiones_prof.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar datos de profesional</title>
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
                    <img src="../../assets/images/ajustes.png" alt="">
                    <ul>
                        <li><a href="../index_prof.php" >Inicio</a></li>
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
                    <h1 class="titulo1">Actualizar Datos</h1>
                    <div class="contact-wrapper animated bounceInUp">
                        <div class="contact-form">
                            <form action="update_prof_alert1.php" method="POST">
                                <p>
                                    <label>Tipo doc</label>
                                    <input type="text" name="t_doc" value="<?php echo $_SESSION['t_doc_pers']?>" disabled>
                                </p>
                                <p>
                                    <label>N° documento</label>
                                    <input type="number" name="num_doc" value="<?php echo $_SESSION['num_doc_pers'];?>" disabled>
                                </p>
                                <p>
                                    <label>Nombre </label>
                                    <input type="text" name="fullnombre" value="<?php echo $_SESSION['p_nombre_pers']."".$_SESSION['s_nombre_pers']."".$_SESSION['p_apellido_pers']."".$_SESSION['s_apellido_pers'];?>" disabled>
                                </p>
                                <p>
                                    <label>Teléfono</label>
                                    <input type="tel" name="tel" value="<?php echo $_SESSION['tel_pers'];?>" required>
                                </p>
                                <p>
                                    <label>Email</label>
                                    <input type="email" name="email" value="<?php echo $_SESSION['correo_pers']?>" required>
                                </p>
                                <p>
                                    <label>Dias laborales </label>
                                    <input value="lunes - viernes" name="dias_laborales" disabled>
                                </p>

                                <p>
                                    <label>Franja laboral </label>
                                    <input value="8:00am - 6:00pm" name="franja_horaria" disabled>
                                </p>
                                
                                <p>
                                    <label>Contraseña</label>
                                    <input name="pass" value="Cambiar contraseña" onclick="contraseña()" style="color:blue;">
                                </p>
                                <p class="block">
                                    <button name="registrar" type="submit">
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
            window.location = "update_pass.php"
        }
    </script>
</body>
</html>