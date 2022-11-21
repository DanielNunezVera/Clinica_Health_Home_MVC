<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion datos</title>

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

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
                        <li><a href="index.php?c=Auxiliar&a=index" >Inicio</a></li>
                        <li><a href="index.php?c=Auxiliar&a=cerrarsesion">Cerrar sesion</a></li>
                        <li><a href="index.php?c=Administrador&a=ayuda" >ayuda</a></li>
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
                            <form action="index.php?c=Auxiliar&a=modificar_aux" method="POST">
                                <!-- <p>
                                    <label>Tipo de documento</label>
                                    <input type="text" name="t_doc" disabled>
                                </p> -->
                                <p>
                                    <label>N° documento</label>
                                    <input type="number" name="num_doc" value="<?php echo $data["auxiliar"]["num_doc_aux"];?>" disabled>
                                </p>

                                <p>
                                    <label>Nombre</label>
                                    <input type="text" name="fullnombre" value="<?php echo $data["auxiliar"]["nombres_aux"]." ".$data["auxiliar"]["apellidos_aux"]?>" disabled>
                                </p>
                               
                                <p>
                                    <label>Email</label>
                                    <input type="email" name="correo_aux" id="correo_aux" value="<?php echo $data["auxiliar"]["correo_aux"]?>" required>
                                </p>

                                <p>
                                    <label>Teléfono</label>
                                    <input type="number" name="tel_aux" id="tel_aux" value="<?php echo $data["auxiliar"]["tel_aux"];?>" required>
                                </p>

                                <p>
                                    <label><br></label>
                                    <a href="index.php?c=Auxiliar&a=actualizar_pass" class="btn btn-outline-primary btn-lg btn-block">Actualizar contraseña</a>
                                </p>

                                <p class="block d-grid gap-2">
                                <button class="btn btn-primary btn-lg btn-block" name="registrar" id="registrar" type="submit">Actualizar</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </main>
    <script src="assets/js-general/menu-responsive.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script >
        <?php
            if(isset($_SESSION["update_info"])){
                if ($_SESSION["update_info"]!="0") {
                    echo "var alerta_update_info  = '1';";
                    echo "var alerta_aux = '2';";
                    unset($_SESSION["update_info"]);
                }else {
                    echo "var alerta_update_info = '0';";
                    echo "var alerta_aux  = '2';";
                    unset($_SESSION["update_info"]);
                }
            }
        ?>
    </script>
    <script src="assets/js-general/alertas_aux.js"></script>
    
</body>
</html>