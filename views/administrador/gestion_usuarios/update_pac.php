<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Usuarios</title>

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
                        <li><a href="index.php?c=Administrador&a=index">Inicio</a></li>
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
                    <h1 class="titulo1">Actualizar paciente</h1>
                    <div class="contact-wrapper animated bounceInUp">
                        <div class="contact-form">
                            <form action="index.php?c=Administrador&a=modificar_pac" method="POST" autocomplete="off">
                                <p>
                                    <label>Tipo doc</label>
                                    <select class="Selectorconsult" name="id_tipo_doc" id="id_tipo_doc" required>
                                    <?php   
                                    
                                    foreach ($data["tipo_doc"] as $dato) {
                                        if($dato["id_tipo_doc"]==$data["paciente"]["id_tipo_doc"]){
                                            $documento = $dato["tipo_doc"];
                                        }
                                    }

                                    echo "<option value='".$data["paciente"]["id_tipo_doc"]."'>".$documento
                                    ."</option>";


                                         foreach ($data["tipo_doc"] as $dato) {
                                            echo "<option value='".$dato["id_tipo_doc"]."'>".$dato["tipo_doc"]."</option>";
                                    }?>
                                    </select>
                                </p>
                                <p>
                                    <label>N° documento</label>
                                    <input type="number" name="id_paciente" id="id_paciente" value="<?php echo $data["paciente"]["id_paciente"]?>" readonly>
                                </p>
                                <p>
                                    <label>Nombres</label>
                                    <input type="text" name="nombres_pac" id="nombres_pac" value="<?php echo $data["paciente"]["nombres_pac"]?>" readonly>
                                </p>
                                <p>
                                    <label>Apellidos</label>
                                    <input type="text" name="apellidos_pac" id="apellidos_pac" value="<?php echo $data["paciente"]["apellidos_pac"]?>" readonly>
                                </p>
                                <p>
                                    <label>Teléfono</label>
                                    <input type="tel" name="tel_pac" id="	tel_pac" value="<?php echo $data["paciente"]["tel_pac"]?>" required>
                                </p>
                                <p>
                                    <label>Email</label>
                                    <input type="email" name="correo_pac" id="correo_pac" value="<?php echo $data["paciente"]["correo_pac"]?>" required>
                                </p>
                                <p>
                                    <label>Sexo</label>
                                    <input type="text" name="sexo_pac" id="sexo_pac" value="<?php echo $data["paciente"]["sexo_pac"]?>" readonly>
                                </p>
                                <p>
                                    <label>Estado</label>
                                    <input type="text" name="estado_pac" id="estado_pac" value="<?php 
                                    if($data["paciente"]["estado_pac"]==1){
                                        echo "Activo";
                                    }else{
                                        echo "Inactivo";
                                    }
                                    ?>" readonly>
                                </p>
                                <p>
                                    <label>Fecha de creacion</label>
                                    <input type="datetime" name="create_pac" id="create_pac" value="<?php echo $data["paciente"]["create_pac"]?>" readonly>
                                </p>
                                <p class="block">
                                <button class="btn btn-primary btn-lg btn-block" name="registrar" id="reistrar" type="submit">Actualizar</button>
                                </p>
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