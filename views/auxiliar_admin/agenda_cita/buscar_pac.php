<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Usuarios</title>

    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

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
                        <li><a href="index_admin.php">Inicio</a></li>
                        <li><a href="controller/sesiones/cerrarsesion.php">Cerrar sesion</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="container__cover">
            <div class="cover"> 
                <div class="caja3">
                    <h1>Gestión Usuarios</h1>
                    <div class="contenedor__login-register">
                        <form action="index.php?c=Auxiliar&a=buscar_pacientef" method="POST">
                            <select class="Selectorconsult" name="id_tipo_doc" id="id_tipo_doc" required>
                                <option value="">Seleccione</option>
                                <?php foreach ($data["tipo_doc"] as $dato) {
                                    echo "<option value='".$dato["id_tipo_doc"]."'>".$dato["tipo_doc"]."</option>";
                                    }?>
                            </select>
                            <input type="text" placeholder="Numero de documento" id="num_doc_pac" name="num_doc_pac" class="contenedor1" required> 
                            <br>
                            <br>
                            <button class="btn btn-primary btn-lg btn-block">Buscar</button>
                        </form>
                    </div>
                  </div>
            </div> 
        </div>
    </main>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js-general/menu-responsive.js"></script>
    <script >
        <?php
            if(isset($_SESSION["descti_pac_age"])){
                if ($_SESSION["descti_pac_age"]!="0") {
                    echo "var alerta_pac_desacti = '1';";
                    echo "var alerta_m_aux = '7';";
                    unset($_SESSION["descti_pac_age"]);
                }else {
                    echo "var alerta_pac_desacti = '0';";
                    echo "var alerta_m_aux  = '7';";
                    unset($_SESSION["descti_pac_age"]);
                }
            }
        ?>
    </script>
    <script src="assets/js-general/alertas.js"></script>
</body>
</html>