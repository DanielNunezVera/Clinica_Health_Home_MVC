
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar especialidad</title>
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
                    <h1 class="titulo1">Actualizar especialidad</h1>
                    <div class="contact-wrapper animated bounceInUp">
                        <div class="contact-form">
                            <form action="index.php?c=Administrador&a=modificar_espec" method="POST">
                                <input type="hidden" id="id_especialidad" name="id_especialidad" value="<?php echo $data["especialidad"]["id_especialidad"]?>">
                                <p>
                                    <label>Especialidad</label>
                                    <input type="text" name="descrip_espec" id="descrip_espec" value="<?php echo $data["especialidad"]["descrip_espec"]?>" readonly>
                                </p>
                                <p>
                                    <label>Costo</label>
                                    <input type="number" name="costo_espec" id="costo_espec" value="<?php echo $data["especialidad"]["costo_espec"]?>" required>
                                </p>
                                <p>
                                    <label>Estado</label>
                                    <input type="text" name="estado_espec" id="estado_espec" value="<?php 
                                    if($data["especialidad"]["estado_espec"]==1){
                                        echo "Activo";
                                    }else{
                                        echo "Inactivo";
                                    }
                                    ?>" readonly>
                                </p>
                                <p>
                                    <label>Fecha de creacion</label>
                                    <input type="datetime" name="" id="" value="<?php echo $data["especialidad"]["create_espec"]?>" readonly>
                                </p>
                                <p class="block">
                                    <a href="index.php?c=Administrador&a=gestion_espec" class="btn btn-lg btn-outline-danger">&nbsp&nbspVolver&nbsp&nbsp</a>
                                    <button class="btn btn-primary btn-lg" style="float: right" name="registrar" id="reistrar" type="submit">Actualizar</button>
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