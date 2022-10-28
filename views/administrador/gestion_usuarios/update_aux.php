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
                    <h1 class="titulo1">Actualizar auxiliar</h1>
                    <div class="contact-wrapper animated bounceInUp">
                        <div class="contact-form">
                            <form action="index.php?c=Administrador&a=modificar_aux" method="POST">
                                <input type="hidden" id="id_auxiliar" name="id_auxiliar" value="<?php echo $data["auxiliar"]["id_auxiliar"]?>">
                                <p>
                                    <label>Tipo doc</label>
                                    <select class="Selectorconsult" name="id_tipo_doc" id="id_tipo_doc">
                                    <?php   
                                    
                                    foreach ($data["tipo_doc"] as $dato) {
                                        if($dato["id_tipo_doc"]==$data["auxiliar"]["id_tipo_doc"]){
                                            $documento = $dato["tipo_doc"];
                                        }
                                    }

                                    echo "<option value='".$data["auxiliar"]["id_tipo_doc"]."'>".$documento
                                    ."</option>";


                                         foreach ($data["tipo_doc"] as $dato) {
                                            echo "<option value='".$dato["id_tipo_doc"]."'>".$dato["tipo_doc"]."</option>";
                                    }?>
                                    </select>
                                </p>
                                <p>
                                    <label>N° documento</label>
                                    <input type="number" name="num_doc_aux" id="num_doc_aux" value="<?php echo $data["auxiliar"]["num_doc_aux"]?>" readonly>
                                </p>
                                <p>
                                    <label>Nombres</label>
                                    <input type="text" name="nombres_aux" id="nombres_aux" value="<?php echo $data["auxiliar"]["nombres_aux"]?>" readonly>
                                </p>
                                <p>
                                    <label>Apellidos</label>
                                    <input type="text" name="apellidos_aux" id="apellidos_aux" value="<?php echo $data["auxiliar"]["apellidos_aux"]?>" readonly>
                                </p>
                                <p>
                                    <label>Teléfono</label>
                                    <input type="tel" name="tel_aux" id="	tel_aux" value="<?php echo $data["auxiliar"]["tel_aux"]?>" required>
                                </p>
                                <p>
                                    <label>Email</label>
                                    <input type="email" name="correo_aux" id="correo_aux" value="<?php echo $data["auxiliar"]["correo_aux"]?>" required>
                                </p>
                                <p>
                                    <label>Estado</label>
                                    <input type="text" name="estado_aux" id="estado_aux" value="<?php 
                                    if($data["auxiliar"]["estado_aux"]==1){
                                        echo "Activo";
                                    }else{
                                        echo "Inactivo";
                                    }
                                    ?>" readonly>
                                </p>
                                <p>
                                    <label>Fecha de creacion</label>
                                    <input type="text" name="create_aux" id="create_aux" value="<?php echo $data["auxiliar"]["create_aux"]?>" readonly>
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