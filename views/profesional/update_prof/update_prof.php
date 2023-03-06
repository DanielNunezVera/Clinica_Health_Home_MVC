<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar datos de profesional</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/estilos_ayuda.css">
    <link rel="stylesheet" href="assets/css/fontello.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@800&display=swap');
    </style>
</head>
<body>
    <header>
        <div class="container__menu">
            <div class="logo">
                <img src="assets/images/Logo2.png" alt="">
            </div>
            <div class="menu">
                <i class="fas fa-bars" id="btn_menu"></i>
                <div id="back_menu"></div>
                <nav id="nav">
                    <img src="assets/images/ajustes.png" alt="">
                    <ul>
                        <li><a href="index.php?c=Profesional&a=index" >Inicio</a></li>
                        <li><a style="cursor:pointer;" onclick="cerrarsesion()">Cerrar sesion</a></li>
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
                            <form action="index.php?c=Profesional&a=modificar_prof" method="POST">
                                <p>
                                    <label>Tipo doc</label>
                                    <input type="text" name="t_doc" value="<?php echo $data["profesional"]["id_tipo_doc"];?>" disabled>
                                </p>
                                <p>
                                    <label>N° documento</label>
                                    <input type="number" name="num_doc" value="<?php echo $data["profesional"]["num_doc_prof"];?>" disabled>
                                </p>
                                <p>
                                    <label>Nombre </label>
                                    <input type="text" name="fullnombre" value="<?php echo $data["profesional"]["nombres_prof"]." ".$data["profesional"]["apellidos_prof"];?>" disabled>
                                </p>
                                <p>
                                    <label>Teléfono</label>
                                    <input type="tel" name="tel_prof" value="<?php echo $data["profesional"]["tel_prof"];?>" required>
                                </p>
                                <p>
                                    <label>Email</label>
                                    <input type="email" name="correo_prof" value="<?php echo $data["profesional"]["correo_prof"]?>" required>
                                </p>
                                <p>
                                    <label>Dias laborales </label>
                                    <input name="dias_laborales" value="<?php echo $data["profesional"]["dias_laborales"]?>" disabled>
                                </p>

                                <p>
                                    <label>Franja laboral </label>
                                    <input name="franja_horaria" value="<?php echo $data["profesional"]["franja_horaria"]?>" disabled>
                                </p>
                                
                                <p>
                                    <label><br></label>
                                    <a href="index.php?c=Profesional&a=actualizar_pass" class="btn btn-outline-primary btn-lg btn-block">Actualizar contraseña</a>
                                </p>
                                <p>
                                    <a href="index.php?c=Profesional&a=index" class="btn btn-lg btn-outline-danger">Volver</a>
                                </p>
                                <p>
                                    <button class="btn btn-primary btn-lg btn-block" style="float: right;" name="registrar" id="registrar" type="submit">Actualizar</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="help">
            <input type="checkbox" id="btn-mas" style="display: none;">
            <div class="apartados">
                <a href="#" class="icon-phone"></a>
                <a href="index.php?c=Profesional&a=ayuda1" class="icon-help"></a>
            </div>
            <div>
                <label for="btn-mas" class="icon-info"></label>
            </div>
        </div>
    </main>
    <script src="assets/js-general/menu-responsive.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php

        if (isset($_SESSION["update_prof"])) {
            if ($_SESSION["update_prof"] != "0") {
                echo "var update_prof = '1';";
                echo "var alertas = '3';";
                unset($_SESSION["update_prof"]);
            }else {
                echo "var update_prof = '0';";
                echo "var alertas = '3';";
                unset($_SESSION["update_prof"]);
            }
        }

        if(isset($_SESSION["update_pass"])){
            if ($_SESSION["update_pass"]!="0") {
                echo "var update_pass = '1';";
                echo "var alertas = '2';";
                unset($_SESSION["update_pass"]);
            }
        }
        
        ?>
    </script>
    <?php require_once "views/Links/js.php"?>
</body>
</html>