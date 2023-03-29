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
                    <h1 class="titulo1">Nuevo auxiliar</h1>
                    <div class="contact-wrapper animated bounceInUp">
                        <div class="contact-form">
                            <form action="index.php?c=Administrador&a=guarda_auxiliar" method="POST">
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
                                    <input type="number" name="num_doc_aux" id="num_doc_aux" maxlength="20">
                                </p>
                                <p>
                                    <label>Nombres</label>
                                    <input type="text" name="nombres_aux" id="nombres_aux" required>
                                </p>
                                <p>
                                    <label>Apellidos</label>
                                    <input type="text" name="apellidos_aux" id="apellidos_aux" required>
                                </p>
                                <p>
                                    <label>Teléfono</label>
                                    <input type="number" name="tel_aux" id="tel_aux" maxlength="10" required>
                                </p>
                                <p>
                                    <label>Email</label>
                                    <input type="email" name="correo_aux" id="correo_aux" required>
                                </p>
                                <p class="block">
                                <a href="index.php?c=Administrador&a=gestion_u" class="btn btn-lg btn-outline-danger">&nbsp&nbspVolver&nbsp&nbsp</a>  
                                <button class="btn btn-primary btn-lg btn-block" style="float: right" name="registrar" id="registrar" type="submit">Registrar</button>
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