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
                                <p>
                                    <a href="index.php?c=Paciente&a=index" class="btn btn-lg btn-outline-danger">Volver</a>
                                </p> 
                                <p >
                                <a href="index.php?c=Paciente&a=buscar_cita">
                                <button class="btn btn-primary btn-lg btn-block" style="float: right;" name="registrar" id="reistrar" type="submit">Buscar</button>
                                </a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </main>
    <script>

        <?php

            if (isset($_SESSION['error_cita'])) {

                if ($_SESSION['error_cita'] == "1"){

                    echo "var error_cita_fecha = '1';";
                    echo "var error_cita = '1';";

                    unset($_SESSION['error_cita']);

                } elseif ($_SESSION['error_cita'] == "2") {

                    echo "var error_cita_fecha = '1';";
                    echo "var error_cita = '2';";

                    unset($_SESSION['error_cita']);

                }

            }

            if (isset($_SESSION['cita_success'])) {

                if ($_SESSION['cita_success'] == "1") {

                    echo "var cita_agendada = '1';";
                    echo "var cita_success = '1';";

                    unset($_SESSION['cita_success']);
                    
                } elseif ($_SESSION['cita_success'] == "2") {

                    echo "var cita_agendada = '1';";
                    echo "var cita_success = '2';";

                    unset($_SESSION['cita_success']);

                } elseif ($_SESSION['cita_success'] == "3") {

                    echo "var cita_agendada = '1';";
                    echo "var cita_success = '3';";
        
                    unset ($_SESSION['cita_success']);

                }

            }

        ?>

    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js-general/menu-responsive.js"></script>
    <script src="assets/js-general/alertas.js"></script>
</body>
</html>