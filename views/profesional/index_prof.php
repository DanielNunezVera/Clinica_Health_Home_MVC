<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesional</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/estilos.css">
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
                        <h1>Bienvenido prof</h1>
                        <br>
                        <a href="index.php?c=Profesional&a=set_citas_prom_prof" class="boton">Citas Programadas</a>
                        <br>
                    </div>
                </div>
                <div class="caja2">
                    <img src="assets/images/profesional.png" alt="">
                </div>
            </div>
        </div>
    </main>
    <script src="views/Links/js.php"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php
            if(isset($_SESSION["update_pass"])){
                if ($_SESSION["update_pass"]!="0") {
                    echo "var update_pass = '1';";
                    echo "var alertas = '2';";
                    unset($_SESSION["update_pass"]);
                }else {
                    echo "var update_pass = '0';";
                    echo "var alertas  = '2';";
                    unset($_SESSION["update_pass"]);
                }
            }

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
        ?>
    </script>
    <script src="assets/js-general/alertas_prof.js"></script>
</body>
</html>