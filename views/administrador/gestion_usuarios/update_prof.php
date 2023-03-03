<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Usuarios</title>
    <?php require_once "views/Links/Css.php"?>
</head>
<body>
    <main>
        <div class="container__cover">
            <div class="cover"> 
                <div class="caja3">
                    <h1 class="titulo1">Actualizar profesional</h1>
                    <div class="contact-wrapper animated bounceInUp">
                        <div class="contact-form">
                            <form action="index.php?c=Administrador&a=modificar_prof" method="POST">
                                <input type="hidden" id="id_profesional" name="id_profesional" value="<?php echo $data["profesional"]["id_profesional"]?>">
                                <p>
                                    <label>Tipo doc</label>
                                    <select class="Selectorconsult" name="id_tipo_doc" id="id_tipo_doc" required>
                                    <?php   
                                    foreach ($data["tipo_doc"] as $dato) {
                                        if($dato["id_tipo_doc"]==$data["profesional"]["id_tipo_doc"]){
                                            $documento = $dato["tipo_doc"];
                                            }
                                        }

                                    echo "<option value='".$data["profesional"]["id_tipo_doc"]."'>".$documento
                                    ."</option>";

                                        foreach ($data["tipo_doc"] as $dato) {
                                           echo "<option value='".$dato["id_tipo_doc"]."'>".$dato["tipo_doc"]."</option>";
                                    }?>
                                    </select>
                                </p>
                                <p>
                                    <label>N° documento</label>
                                    <input type="number" name="num_doc_prof" id="num_doc_prof" value="<?php echo $data["profesional"]["num_doc_prof"]?>" readonly>
                                </p>
                                <p>
                                    <label>Consultorio</label>
                                    <select class="Selectorconsult" name="id_consultorios" id="id_consultorios" disabled>
                                    <?php echo "<option value='".$data["profesional"]["id_consultorios"]."'>".$data["profesional"]["id_consultorios"]."</option>";?>
                                    </select>
                                </p>
                                <p>
                                    <label>Especialidad</label>
                                    <select class="Selectorconsult" name="id_especialidad" id="id_especialidad" required>
                                  
                                    <?php 
                                    foreach ($data["especialidad"] as $dato) {
                                        if($dato["id_especialidad"]==$data["profesional"]["id_especialidad"]){
                                            $especialidad= $dato["descrip_espec"];
                                            $resultado = $especialidad;
                                            $value=$data["profesional"]["id_especialidad"];
                                            $contador=1;
                                        }
                                    }
                                    if ($contador!=1) {
                                        $resultado = "Seleccione una opcion";
                                        $value = $data["profesional"]["id_especialidad"];
                                        $_SESSION["Error_espec"] = "1";
                                    }
                                   

                                  
                                echo "<option value='".$value."'>".$resultado
                                    ."</option>";
                                    
                                    foreach ($data["especialidad"] as $dato) {
                                        echo "<option value='".$dato["id_especialidad"]."'>".$dato["descrip_espec"]."</option>";
                                    }?>
                                    </select>
                                </p>
                                <p>
                                    <label>Nombres</label>
                                    <input type="text" name="nombres_prof" id="nombres_prof" value="<?php echo $data["profesional"]["nombres_prof"]?>" readonly>
                                </p>
                                <p>
                                    <label>Apellidos</label>
                                    <input type="text" name="apellidos_prof" id="apellidos_prof" value="<?php echo $data["profesional"]["apellidos_prof"]?>" readonly>
                                </p>
                                <p>
                                    <label>Teléfono</label>
                                    <input type="tel" name="tel_prof" id="	tel_prof" value="<?php echo $data["profesional"]["tel_prof"]?>" >
                                </p>
                                <p>
                                    <label>Email</label>
                                    <input type="email" name="correo_prof" id="correo_prof" value="<?php echo $data["profesional"]["correo_prof"]?>" >
                                </p>
                                <p>
                                    <label>Dias laborales</label>
                                    <input type="text" name="dias_laborales" id="dias_laborales" value="<?php echo $data["profesional"]["dias_laborales"]?>">
                                </p>
                                <p>
                                    <label>Franja horaria</label>
                                    <input type="text" name="franja_horaria" id="franja_horaria" value="<?php if ($data['profesional']['franja_horaria']=="b") {
                                        echo '6:00 a.m - 2:00 p.m';
                                    } 
                                    if ($data['profesional']['franja_horaria']=="c") {
                                        echo '2:00 p.m - 10:00 p.m';
                                    } ?>" disabled>
                                </p>
                                <p>
                                    <label>Estado</label>
                                    <input type="text" name="estado_prof" id="estado_prof" value="<?php 
                                    if($data["profesional"]["estado_prof"]==1){
                                        echo "Activo";
                                    }else{
                                        echo "Inactivo";
                                    }
                                    ?>" readonly>
                                </p>
                                <p>
                                    <label>Fecha de creacion</label>
                                    <input type="datetime" name="create_prof" id="create_prof" value="<?php echo $data["profesional"]["create_prof"]?>" readonly>
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

    <script>
    <?php 
        if(isset($_SESSION["Error_espec"])) {
            if ($_SESSION["Error_espec"]!="0") {
                echo "var alert_error_espec = '1';";
                echo "var alerta_prof = '6';";
                unset($_SESSION["Error_espec"]);
            }
        }
    ?>
    </script>

<?php require_once "views/Links/js.php"?>
</body>
</html>