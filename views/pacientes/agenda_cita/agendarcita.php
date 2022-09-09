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
                    <img src="assets/images/pacientemenu.png" alt="">
                    <ul>
                        <li><a href="index.php?c=Administrador&a=index">Inicio</a></li>
                        <li><a href="">Actualizar datos</a></li>
                        <li><a href="">Cerrar sesion</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
    <div class="container__cover">
            <div class="cover"> 
                <div class="caja3">
                    <h1 class="titulo1">Agendar cita</h1>
                    <div class="contact-wrapper animated bounceInUp">
                        <div class="contact-form">
                            <form action="index.php?c=Paciente&a=buscar_cita" method="POST">
                                <p>
                                    <label>Especialidad</label>
                                    <select class="Selectorconsult" name="id_especialidad" id="id_especialidad" required>
                                    <option value="">Seleccione</option>
                                    <?php foreach ($data["especialidad"] as $dato) {
                                        echo "<option value='".$dato["id_especialidad"]."'>".$dato["descrip_espec"]."</option>";
                                    }?>
                                    </select>
                                </p>
                                <p>
                                    <label class="txtlabel">Elija fecha</label>
                                    <input type="date" name="fecha" id="fecha" required>
                                </p> 
                                <p class="block">
                                <a href="gestion_usuarios.php">
                                <button class="btn btn-primary btn-lg btn-block" name="registrar" id="reistrar" type="submit">Buscar</button>
                                </a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </main>
    <script src="assets/js-general/menu-responsive.js"></script>
</body>
</html>