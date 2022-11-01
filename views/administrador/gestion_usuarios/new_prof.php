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
                    <h1 class="titulo1">Nuevo profesional</h1>
                    <div class="contact-wrapper animated bounceInUp">
                        <div class="contact-form">
                            <form action="index.php?c=Administrador&a=guarda_profesional" method="POST">
                                <p>
                                    <label>Tipo doc</label>
                                    <select class="Selectorconsult" name="id_tipo_doc" id="id_tipo_doc" required>
                                    <option value="">Seleccione</option>
                                    <?php foreach ($data["tipo_doc"] as $dato) {
                                        echo "<option value='".$dato["id_tipo_doc"]."'>".$dato["tipo_doc"]."</option>";
                                    }?>
                                    </select>
                                </p>
                                <p>
                                    <label>N° documento</label>
                                    <input type="number" name="num_doc_prof" id="num_doc_prof">
                                </p>
                                <p>
                                    <label>Consultorio</label>
                                    <select class="Selectorconsult" name="id_consultorios" id="id_consultorios" required>
                                    <option value="">Seleccione</option>
                                    <?php foreach ($data["consultorios"] as $dato) {
                                        echo "<option value='".$dato["id_consultorios"]."'>".$dato["id_consultorios"]."</option>";
                                    }?>
                                    </select>
                                </p>
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
                                    <label>Nombres</label>
                                    <input type="text" name="nombres_prof" id="nombres_prof" required>
                                </p>
                                <p>
                                    <label>Apellidos</label>
                                    <input type="text" name="apellidos_prof" id="apellidos_prof" required>
                                </p>
                                <p>
                                    <label>Teléfono</label>
                                    <input type="tel" name="tel_prof" id="	tel_prof"required>
                                </p>
                                <p>
                                    <label>Email</label>
                                    <input type="email" name="correo_prof" id="correo_prof" required>
                                </p>
                                <p>
                                    <label>Dias laborales</label>
                                    <input type="text" name="dias_laborales" id="dias_laborales" required>
                                </p>
                                <p>
                                    <label>Franja horaria</label>
                                    <input type="text" name="franja_horaria" id="franja_horaria" required>
                                </p>
                                <p class="block">
                                    <button class="btn btn-primary btn-lg btn-block" name="registrar" id="reistrar" type="submit" >Registrar</button>
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