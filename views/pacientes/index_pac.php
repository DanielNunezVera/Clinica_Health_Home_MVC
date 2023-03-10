<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
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
    <main>
        <div class="container__cover">
            <div class="cover"> 
                <div class="caja1">
                    <div class="row">
                        <?php 

                        if ($dato["sexo_pac"] == "Masculino"){

                            echo "<h1>Bienvenido"." - ".$dato["nombres_pac"]."</h1>";

                        } elseif ($dato["sexo_pac"] == "Femenino"){

                            echo "<h1>Bienvenida"." - ".$dato["apellidos_pac"]."</h1>";

                        } else {

                            echo "<h1>Bienvenido(a)"." - ".$dato["nombres_pac"]."</h1>";

                        }
                        
                        ?>
                        <br>
                        <a href="index.php?c=Paciente&a=agendar_cita_i" class="boton">Agendar cita</a>
                        
                        <a href="index.php?c=Paciente&a=citas_agendadas" class="boton">Citas agendadas</a>
                    </div>
                </div>
                <div class="caja2">
                    <img src="assets/images/pacienteprincipal.png" alt="">
                </div> 
            </div> 
        </div>
        <div class="help">
            <input type="checkbox" id="btn-mas" style="display: none;">
            <div class="apartados">
                <a href="#" class="icon-phone"></a>
                <a href="index.php?c=Paciente&a=ayuda" class="icon-help"></a>
            </div>
            <div>
                <label for="btn-mas" class="icon-info"></label>
            </div>
        </div>
    </main>

    <script>
    <?php

        if (isset($_SESSION['sin_personal'])) {
            if ($_SESSION['sin_personal']=="1") {
                echo "var sin_personal = '1';";

                unset($_SESSION['sin_personal']);
            };
        };
    ?>
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js-general/menu-responsive.js"></script>
    <script src="assets/js-general/alertas.js"></script>
</body>
</html>