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
                        <?php 
                        echo "<h1>Bienvenido"." - ".$dato["nombres_prof"]."</h1>";
                        ?>
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
</body>
</html>