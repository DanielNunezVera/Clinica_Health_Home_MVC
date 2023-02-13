<!DOCTYPE html>
<html lang="es"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar contraseña</title>

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
                        <li><a href="index.php?c=Paciente&a=index">Inicio</a></li>
                        <li><a href="index.php?c=Paciente&a=actualizar_pac">Actualizar datos</a></li>
                        <li><a style="cursor: pointer;" onclick="cerrarsesionpac()">Cerrar sesion</a></li>
                        <li><a href="index.php?c=Paciente&a=ayuda" >ayuda</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="container__cover">
            <div class="cover">
                <div class="caja3">
                    <h1 class="titulo1">Cambio de contraseña</h1>
                    <div class="contact-wrapper animated bounceInUp">
                        <div class="contact-form">
                            <form action="index.php?c=Paciente&a=modificar_pass" method="POST">
                                <p>
                                    <label>Contraseña actual</label>
                                    <input type="password" name="pass" required>
                                </p>
                                <br>
                                <p>
                                    <label>Nueva contraseña</label>
                                    <input type="password" name="newpass" minlength="8" required>
                                </p>
                                <p>
                                    <label>Repita contraseña</label>
                                    <input type="password" name="repass" minlength="8" required>
                                </p>
                                <p class="block">
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
    <script>

        <?php
        if (isset($_SESSION["update_pass"])) {         
            if ($_SESSION["update_pass"] == "0") {
                echo "var update_pass = '0';";
                echo "var datos  = '2';";
                unset($_SESSION["update_pass"]);
            }
        }
        ?>

    </script>
    <script src="assets/js-general/alertas.js"></script>
</body>
</html>