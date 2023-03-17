<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion datos</title>

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/estilos_ayuda.css">
    <link rel="stylesheet" href="assets/css/fontello.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
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
                        <li><a href="index.php?c=Paciente&a=index">Inicio</a></li>
                        <li><a style="cursor: pointer;" onclick="cerrarsesionpac()">Cerrar sesion</a></li>
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
                            <form action="index.php?c=Paciente&a=update_pac" method="POST">
                                <p>
                                    <label>N° documento</label>
                                    <input type="number" name="num_doc_pac" value="<?php echo $dato["num_doc_pac"];?>" readonly>
                                </p>
                                <p>
                                    <label>Nombre completo</label>
                                    <input type="text" name="nombrecompleto" id="nombrecompleto" value="<?php echo $dato["nombres_pac"]." ". $dato["apellidos_pac"];?>" readonly>
                                </p>
                                <p>
                                    <label>Email</label>
                                    <input type="email" name="correo_pac" id="correo_pac" value="<?php echo $dato["correo_pac"];?>" required>
                                </p>
                                <p>
                                    <label>Teléfono</label>
                                    <input type="tel" name="tel_pac" id="tel_pac" value="<?php echo $dato["tel_pac"];?>" required>
                                </p>
                                <p>
                                    <label>Genero</label>
                                    <input type="text" name="sexo_pac" value="<?php echo $dato["sexo_pac"];?>" readonly>
                                </p>
                                <p>
                                    <label><br></label>
                                    <a href="index.php?c=Paciente&a=actualizar_pass" class="btn btn-outline-primary btn-lg btn-block">Actualizar contraseña</a>
                                </p>
                                <p>
                                    <a href="index.php?c=Paciente&a=index" class="btn btn-lg btn-outline-danger">Volver</a>
                                </p> 
                                <p>
                                    <button class="btn btn-primary btn-lg btn-block"  style="float: right;" name="update" id="update" type="submit">
                                        Actualizar
                                    </button>
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
                <!-- <a href="#" class="icon-phone"></a> -->
                <a href="index.php?c=Paciente&a=ayuda1" class="icon-help"></a>
            </div>
            <div>
                <label for="btn-mas" class="icon-info"></label>
            </div>
        </div>
    </main>
    <script src="assets/js-general/menu-responsive.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="assets/js-general/alertas_actualizar_datos.js"></script> -->
    <script>

        <?php
        
        if (isset($_SESSION['datos'])){

            if ($_SESSION['datos'] == "1") {

                echo "var update_datos = '1';";
                echo "var datos = '1';";
                
                unset($_SESSION['datos']);
                
            } else {
                
                echo "var update_datos = '0';";
                echo "var datos = '1';";

                unset($_SESSION['datos']);

            }

        }

        if(isset($_SESSION["update_pass"])){
            if ($_SESSION["update_pass"]!="0") {
                
                echo "var update_pass = '1';";
                echo "var datos = '2';";

                unset($_SESSION["update_pass"]);
            }else {
                
                echo "var update_pass = '0';";
                echo "var datos = '2';";
                
                unset($_SESSION["update_pass"]);
            }
        }

        ?>

    </script>
    <script src="assets/js-general/alertas.js"></script>
</body>
</html>