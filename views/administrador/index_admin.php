<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador del sistema</title>
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
                        <h1>Administrador Sistema</h1>
                        <a href="index.php?c=Administrador&a=gestion_u" class="boton">Gestión Usuarios</a>
                        <br>
                        <a href="index.php?c=Administrador&a=gestion_espec" class="boton">Gestión Especialidades</a>
                        <br>
                        <a href="index.php?c=Administrador&a=gestion_consult" class="boton">Gestión Consultorios</a>
                        <br>
                        <a href="index.php?c=Administrador&a=gestion_agenda" class="boton">Gestión Agenda</a>
                        <br>
                        <!-- <a href="index.php?c=Auxiliar&a=citas_pac" class="boton">Citas Pacientes</a>
                        <br>
                        <a href="index.php?c=Auxiliar&a=citas_prof" class="boton">Citas Profesionales</a>
                        <br>
                        <a href="index.php?c=Paciente&a=agendar_cita_i" class="boton">Agendar cita</a>
                        <br>
                        <a href="index.php?c=Profesional&a=set_citas_prom_prof" class="boton">Citas Programadas</a>
                        <br>
                        <a href="index.php?c=Paciente&a=citas_agendadas" class="boton">Citas agendadas</a> -->
                    </div>
                </div>
                <div class="caja2">
                    <img src="assets/images/pngwing.com.png" alt="">
                </div> 
            </div> 
        </div>
    </main>
    <?php require "views/Links/js.php"?>
</body>
</html>