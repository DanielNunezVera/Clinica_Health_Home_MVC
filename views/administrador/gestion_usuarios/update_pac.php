<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Usuarios</title>
    <?php require "views/Links/Css.php"?>
</head>
<body>
    <main>
        <div class="container__cover">
            <div class="cover"> 
                <div class="caja3">
                    <h1 class="titulo1">Actualizar paciente</h1>
                    <div class="contact-wrapper animated bounceInUp">
                        <div class="contact-form">
                            <form action="index.php?c=Administrador&a=modificar_pac" method="POST" autocomplete="off">
                                <input type="hidden" id="id_paciente" name="id_paciente" value="<?php echo $data["paciente"]["id_paciente"]?>">
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
                                    <input type="number" name="num_doc_pac" id="num_doc_pac" value="<?php echo $data["paciente"]["num_doc_pac"]?>" readonly>
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
                                    <input type="tel" name="tel_pac" id="tel_pac" value="<?php echo $data["paciente"]["tel_pac"]?>" required>
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
    <?php require "views/Links/js.php"?>
</body>
</html>