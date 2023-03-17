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
                    <h1 class="titulo1">Nuevo paciente</h1>
                    <div class="contact-wrapper animated bounceInUp">
                        <div class="contact-form">
                            <form action="index.php?c=Administrador&a=guarda_paciente" method="POST" >
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
                                    <label class="form-label">N° documento</label>
                                    <input type="number" name="num_doc_pac" required>
                                </p>
                                <p>
                                    <label>Nombres</label>
                                    <input type="text" name="nombres_pac" id="nombres_pac" required>
                                </p>
                                <p>
                                    <label>Apellidos</label>
                                    <input type="text" name="apellidos_pac" id="apellidos_pac" required>
                                </p>
                                <p>
                                    <label>Teléfono</label>
                                    <input type="number" name="tel_pac" id="	tel_pac"required>
                                </p>
                                <p>
                                    <label>Email</label>
                                    <input type="email" name="correo_pac" id="correo_pac" required>
                                </p>
                                <p>
                                    <label>Sexo paciente</label>
                                    <select class="Selectorconsult" name="sexo_pac" id="sexo_pac" required>
                                        <option value="">Seleccione</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Masculino">Masculino</option>
                                    </select>
                                </p>
                                <p class="block">
                                <a href="index.php?c=Administrador&a=gestion_u" class="btn btn-lg btn-outline-danger">&nbsp&nbspVolver&nbsp&nbsp</a>  
                                <button class="btn btn-primary btn-lg btn-block" style="float: right" name="registrar" id="reistrar" type="submit">Registrar</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </main>
    <?php require_once "views/Links/js.php"?>

</body>
</html>