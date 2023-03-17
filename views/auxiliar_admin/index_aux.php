<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auxiliar admin</title>
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
                        <h1>Bienvenido auxiliar administrativo</h1>
                        <a href="index.php?c=Auxiliar&a=citas_pac" class="boton">Citas Pacientes</a>
                        <br>
                        <a href="index.php?c=Auxiliar&a=citas_prof" class="boton">Citas Profesionales</a>
                    </div>
                </div>
                <div class="caja2">
                    <img src="assets/images/auxadmin.png" alt="">
                </div> 
            </div> 
        </div>
        <div class="help">
            <input type="checkbox" id="btn-mas" style="display: none;">
            <div class="apartados">
                <!-- <a href="#" class="icon-phone"></a> -->
                <a href="index.php?c=Auxiliar&a=ayuda" class="icon-help"></a>
            </div>
            <div>
                <label for="btn-mas" class="icon-info"></label>
            </div>
        </div>
    </main>
    <?php require_once "views/Links/js.php"?>
</body>
</html>