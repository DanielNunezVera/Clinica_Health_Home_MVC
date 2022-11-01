<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Consultorio</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
                    <h1 class="titulo1">Actualizar consultorio</h1>
                    <div class="contact-wrapper animated bounceInUp">
                        <div class="contact-form">
                            <form action="index.php?c=Administrador&a=modificar_consult" method="POST">
                                <input type="hidden" id="id_consultorios_a" name="id_consultorios_a" value="<?php echo $data["consultorios"]["id_consultorios"]?>">
                                <p>
                                    <label>Id consultorio</label>
                                    <input type="text" name="id_consultorios" id="id_consultorios" value="<?php echo $data["consultorios"]["id_consultorios"]?>">
                                </p>
                                <p>
                                    <label>Estado</label>
                                    <input type="text" name="" id="" value="<?php echo $data["consultorios"]["estado_consult"]?>" readonly>
                                </p>
                                <p>
                                    <label>fecha de creacion</label>
                                    <input type="datetime" name="" id="" value="<?php echo $data["consultorios"]["create_consult"]?>" readonly>
                                </p>
                                <p class="block">
                                <button class="btn btn-primary btn-lg btn-block" name="registrar" id="reistrar" type="submit">Actualizar</button>
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