<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Especialidades</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="assets/datatables/DataTables-1.13.3/css/dataTables.bootstrap4.min.css">
            
    <!--font awesome con CDN-->  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@800&display=swap');
    </style>
</head>
<body>
    <main>
        <div class="container__cover">
            <div class="cover"> 
                <div class="caja3">
                    <h1>Gestión Especialidades</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Especialidad</th>
                                        <th>Costo</th>
                                        <th>Estado</th>
                                        <th>Modificar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data["especialidad"] as $dato) {
                                      if($dato["estado_espec"]==1){
                                        $estado="Activo";
                                        $url="index.php?c=Administrador&a=cambio_estado_1_espec&id=";
                                        $boton="class='btn btn-secondary active' role='button' aria-pressed='true'>Desactivar</a>";
                                      }else{
                                        $estado="Inactivo";
                                        $url="index.php?c=Administrador&a=cambio_estado_2_espec&id=";
                                        $boton="class='btn btn-success active' role='button' aria-pressed='true'>&nbsp&nbsp&nbspActivar&nbsp&nbsp&nbsp</a>";
                                      }
                                      echo "<tr>";
                                      echo "<td>".$dato["id_especialidad"]."</td>";
                                      echo "<td>".$dato["descrip_espec"]."</td>";
                                      echo "<td>".$dato["costo_espec"]."</td>";
                                      echo "<td><a onclick='estado_espec(\""."$url"."\",\"".$dato["id_especialidad"]."\")'".$boton."</td>";
                                      echo "<td><a href='index.php?c=Administrador&a=actualizar_espec&id=".$dato["id_especialidad"]."' class='btn btn-light active' role='button' aria-pressed='true'>Actualizar</a></td>";
                                      echo "<td><a onclick='eliminar_espec(".$dato["id_especialidad"].")'  class='btn btn-danger active ' role='button' aria-pressed='true'>&nbsp&nbspEliminar&nbsp&nbsp</a>
                                      </td>";
                                      echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>  
                        </div>
                    </div> 
                    <a href="index.php?c=Administrador&a=nuevo_espec" class="btn btn-primary btn-lg btn-block" role="button" aria-pressed="true">Registrar</a>
                </div>
            </div> 
        </div>
    </main>
    <script src="assets/js-general/menu-responsive.js"></script>

    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="assets/js-general/jquery-3.6.0.min.js"></script>
    <!-- <script src="assets/js-general/popper.min.js"></script> -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="assets/datatables/Buttons-2.3.5/js/dataTables.buttons.min.js"></script>  
    <script src="assets/datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <!-- <script src="assets/datatables/pdfmake-0.1.36/pdfmake.min.js"></script> -->
    <!-- <script src="assets/datatables/pdfmake-0.1.36/vfs_fonts.js"></script> -->
    <script src="assets/datatables/Buttons-2.3.5/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="assets/js-general/main.js"></script>  


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php
            if(isset($_SESSION["espec_insert_1"])){
                    if ($_SESSION["espec_insert_1"]!="0") {
                        echo "var alert_espec_insert = '1';";
                        echo "var alerta_espec = '1';";
                        unset($_SESSION["espec_insert_1"]);
                    }else {
                        echo "var alert_espec_insert = '0';";
                        echo "var alerta_espec = '1';";
                        unset($_SESSION["espec_insert_1"]);
                    }
            }

            if(isset($_SESSION["espec_eliminado"])){
                if ($_SESSION["espec_eliminado"]!="0") {
                    echo "var alert_espec_eliminado = '1';";
                    echo "var alerta_espec = '2';";
                    unset($_SESSION["espec_eliminado"]);
                }else {
                    echo "var alert_espec_eliminado = '0';";
                    echo "var alerta_espec = '2';";
                    unset($_SESSION["espec_eliminado"]);
                }
            }

            if(isset($_SESSION["espec_update"])){
                if ($_SESSION["espec_update"]!="0") {
                    echo "var alert_espec_update = '1';";
                    echo "var alerta_espec = '3';";
                    unset($_SESSION["espec_update"]);
                }else {
                    echo "var alert_espec_update = '0';";
                    echo "var alerta_espec = '3';";
                    unset($_SESSION["espec_update"]);
                }
            }

        ?>
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php

            if(isset($act_esp)){
                if ($act_esp == 1) {
                    echo "var act_esp = '$act_esp';";
                    echo "var alerta_gestion_especialidades = '1';";
                }
            }

            if (isset($esp_reg)) {
                if ($esp_reg == 1) {
                    echo "var esp_reg = '$esp_reg';";
                    echo "var alerta_gestion_especialidades = '2';";
                }
            }
        ?>
    </script>
    <script src="assets/js-general/alertas.js"></script>
</body>
</html>