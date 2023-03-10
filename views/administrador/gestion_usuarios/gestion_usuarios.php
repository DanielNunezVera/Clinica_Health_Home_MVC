<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión Usuarios</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

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
                    <h1>Usuarios del sistema</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="example" class="table table-bordered display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Tipo documento</th>
                                        <th>Numero de documento</th>
                                        <th>Nombre completo</th>
                                        <th>Rol</th>
                                        <th>Estado</th>
                                        <th>Modificar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data["pacientes"] as $dato) {
                                      if($dato["estado_pac"]==1){
                                        $url="index.php?c=Administrador&a=cambio_estado_1_pac&id=";
                                        $boton="class='btn btn-secondary active' role='button' aria-pressed='true'>Desactivar</a>";
                                      }else{
                                        $url="index.php?c=Administrador&a=cambio_estado_2_pac&id=";
                                        $boton="class='btn btn-success active' role='button' aria-pressed='true'>&nbsp&nbsp&nbspActivar&nbsp&nbsp&nbsp</a>";
                                      }
                                      echo "<tr>";
                                      echo "<td>".$dato["id_tipo_doc"]."</td>";
                                      echo "<td>".$dato["num_doc_pac"]."</td>";
                                      echo "<td>".$dato["nombres_pac"]."&nbsp".$dato["apellidos_pac"]."</td>";
                                      echo "<td> Paciente </td>";
                                      echo "<td><a onclick='estado_pac(\""."$url"."\",\"".$dato["id_paciente"]."\")'".$boton."</td>";
                                      echo "<td><a href='index.php?c=Administrador&a=actualizar_pac&id=".$dato["id_paciente"]."&t_doc=".$dato["id_tipo_doc"]."' class='btn btn-light active' role='button' aria-pressed='true'>Actualizar</a></td>";
                                      echo "<td><a onclick='eliminar_pac(".$dato["id_paciente"].")'  class='btn btn-danger active ' role='button' aria-pressed='true'>&nbsp&nbspEliminar&nbsp&nbsp</a>
                                      </td>";
                                      echo "</tr>";
                                    }
                                    foreach ($data["profesionales"] as $dato){
                                        if($dato["estado_prof"]==1){
                                            $url="index.php?c=Administrador&a=cambio_estado_1_prof&id=";
                                            $boton="class='btn btn-secondary active' role='button' aria-pressed='true'>Desactivar</a>";
                                          }else{
                                            $url="index.php?c=Administrador&a=cambio_estado_2_prof&id=";
                                            $boton="class='btn btn-success active' role='button' aria-pressed='true'>&nbsp&nbsp&nbspActivar&nbsp&nbsp&nbsp</a>";
                                          }
                                        echo "<tr>";
                                        echo "<td>".$dato["id_tipo_doc"]."</td>";
                                        echo "<td>".$dato["num_doc_prof"]."</td>";
                                        echo "<td>".$dato["nombres_prof"]."&nbsp".$dato["apellidos_prof"]."</td>";
                                        echo "<td> Profesional </td>";
                                        echo "<td><a onclick='estado_prof(\""."$url"."\",\"".$dato["id_profesional"]."\")'".$boton."</td>";
                                        echo "<td><a href='index.php?c=Administrador&a=actualizar_prof&id=".$dato["id_profesional"]."&t_doc=".$dato["id_tipo_doc"]."' class='btn btn-light active' role='button' aria-pressed='true'>Actualizar</a></td>";
                                        echo "<td><a onclick='eliminar_prof(".$dato["id_profesional"].")'  class='btn btn-danger active ' role='button' aria-pressed='true'>&nbsp&nbspEliminar&nbsp&nbsp</a>
                                        </td>";
                                        echo "</tr>";
                                    }
                                    foreach ($data["auxiliares"] as $dato){
                                        if($dato["estado_aux"]==1){
                                            $url="index.php?c=Administrador&a=cambio_estado_1_aux&id=";
                                            $boton="class='btn btn-secondary active' role='button' aria-pressed='true'>Desactivar</a>";
                                          }else{
                                            $url="index.php?c=Administrador&a=cambio_estado_2_aux&id=";
                                            $boton="class='btn btn-success active' role='button' aria-pressed='true'>&nbsp&nbsp&nbspActivar&nbsp&nbsp&nbsp</a>";
                                          }
                                        echo "<tr>";
                                        echo "<td>".$dato["id_tipo_doc"]."</td>";
                                        echo "<td>".$dato["num_doc_aux"]."</td>";
                                        echo "<td>".$dato["nombres_aux"]."&nbsp".$dato["apellidos_aux"]."</td>";
                                        echo "<td> Auxiliar </td>";
                                        echo "<td><a onclick='estado_aux(\""."$url"."\",\"".$dato["id_auxiliar"]."\")'".$boton."</td>";
                                        echo "<td><a href='index.php?c=Administrador&a=actualizar_aux&id=".$dato["id_auxiliar"]."' class='btn btn-light active' role='button' aria-pressed='true'>Actualizar</a></td>";
                                        echo "<td><a onclick='eliminar_aux(".$dato["id_auxiliar"].")'  class='btn btn-danger active ' role='button' aria-pressed='true'>&nbsp&nbspEliminar&nbsp&nbsp</a>
                                        </td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>  
                        </div>
                    </div>
                    <button id="btn1" class="btn btn-primary btn-lg btn-block">Registrar</button>
                </div>
            </div> 
        </div>
    </main>

  
<!-- Modal 1 -->
<div id="modal1" class="modal" role="dialog" aria-labelledby="modal3Title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal3Title">Seleccione el tipo de usuario a registrar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <a href="index.php?c=Administrador&a=nuevo_paciente" class="btn btn-primary btn active" role="button" aria-pressed="true">Paciente</a>
      <a href="index.php?c=Administrador&a=nuevo_profesional" class="btn btn-primary btn active" role="button" aria-pressed="true">Profesional</a>
      <a href="index.php?c=Administrador&a=nuevo_auxiliar" class="btn btn-primary btn active" role="button" aria-pressed="true">Auxiliar</a>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



    <script src="assets/js-general/menu-responsive.js"></script>

    
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="assets/js-general/jquery-3.6.0.min.js"></script>
    <script src="assets/js-general/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>    
     
    <!-- para usar botones en datatables JS -->  
    <script src="assets/datatables/Buttons-2.3.5/js/dataTables.buttons.min.js"></script>  
    <script src="assets/datatables/JSZip-2.5.0/jszip.min.js"></script>    
    <script src="assets/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>    
    <script src="assets/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="assets/datatables/Buttons-2.3.5/js/buttons.html5.min.js"></script>
     
    <!-- código JS propìo-->    
    <script type="text/javascript" src="assets/js-general/main.js"></script>  
    
    <!-- para los estilos Excel -->
    <script src="assets/datatables/datatables-buttons-excel-styles/js/buttons.html5.styles.min.js"></script>
    <script src="assets/datatables/datatables-buttons-excel-styles/js/buttons.html5.styles.templates.min.js"></script>

    <script>
        <?php
        ///ALERTAS PACIENTES//////////////////////////////////////////////////////////
            if(isset($_SESSION["pac_insert_1"])){
                if ($_SESSION["pac_insert_1"]!="0") {
                    echo "var alert_pac_insert = '1';";
                    echo "var alerta_pac = '1';";
                    unset($_SESSION["pac_insert_1"]);
                }else {
                    echo "var alert_pac_insert = '0';";
                    echo "var alerta_pac = '1';";
                    unset($_SESSION["pac_insert_1"]);
                }
            }

            if(isset($_SESSION["pac_eliminado"])){
                if ($_SESSION["pac_eliminado"]!="0") {
                    echo "var alert_pac_eliminado = '1';";
                    echo "var alerta_pac = '2';";
                    unset($_SESSION["pac_eliminado"]);
                }else {
                    echo "var alert_pac_eliminado = '0';";
                    echo "var alerta_pac = '2';";
                    unset($_SESSION["pac_eliminado"]);
                }
            }

            if(isset($_SESSION["pac_update"])){
                if ($_SESSION["pac_update"]!="0") {
                    echo "var alert_pac_update = '1';";
                    echo "var alerta_pac = '3';";
                    unset($_SESSION["pac_update"]);
                }else {
                    echo "var alert_pac_update = '0';";
                    echo "var alerta_pac = '3';";
                    unset($_SESSION["pac_update"]);
                }
            }

            ///ALERTAS PROFESIONALES ////////////////////////////////////////////////////
            if(isset($_SESSION["prof_insert_1"])) {
                if ($_SESSION["prof_insert_1"]!="0") {
                    echo "var alert_prof_insert = '1';";
                    echo "var alerta_prof = '1';";
                    unset($_SESSION["prof_insert_1"]);
                }else {
                    echo "var alert_prof_insert = '0';";
                    echo "var alerta_prof = '1';";
                    unset($_SESSION["prof_insert_1"]);
                }
            }
            
            if(isset($_SESSION["prof_eliminado"])) {
                if ($_SESSION["prof_eliminado"]!="0") {
                    echo "var alert_prof_eliminado = '1';";
                    echo "var alerta_prof = '2';";
                    unset($_SESSION["prof_eliminado"]);
                }else {
                    echo "var alert_prof_eliminado = '0';";
                    echo "var alerta_prof = '2';";
                    unset($_SESSION["prof_eliminado"]);
                }
            }

            if(isset($_SESSION["prof_update"])){
                if ($_SESSION["prof_update"]!="0") {
                    echo "var alert_prof_update = '1';";
                    echo "var alerta_prof = '3';";
                    unset($_SESSION["prof_update"]);
                }else {
                    echo "var alert_prof_update = '0';";
                    echo "var alerta_prof = '3';";
                    unset($_SESSION["prof_update"]);
                }
            }

            if(isset($_SESSION["Error_consult"])) {
                if ($_SESSION["Error_consult"]!="0") {
                    echo "var alert_error_consult = '1';";
                    echo "var alerta_prof = '4';";
                    unset($_SESSION["Error_consult"]);
                }
            }

            if(isset($_SESSION["Error_espec"])) {
                if ($_SESSION["Error_espec"]!="0") {
                    echo "var alert_error_espec = '1';";
                    echo "var alerta_prof = '5';";
                    unset($_SESSION["Error_espec"]);
                }
            }

            /////////ALERTAS AUXILIARES ///////////////////////////////////////////////////////
            if(isset($_SESSION["aux_insert_1"])) {
                if ($_SESSION["aux_insert_1"]!="0") {
                    echo "var alert_aux_insert = '1';";
                    echo "var alerta_aux= '1';";
                    unset($_SESSION["aux_insert_1"]);
                }else {
                    echo "var alert_aux_insert = '0';";
                    echo "var alerta_aux = '1';";
                    unset($_SESSION["aux_insert_1"]);
                }
            }

            if(isset($_SESSION["aux_eliminado"])) {
                if ($_SESSION["aux_eliminado"]!="0") {
                    echo "var alert_aux_eliminado = '1';";
                    echo "var alerta_aux= '2';";
                    unset($_SESSION["aux_eliminado"]);
                }else {
                    echo "var alert_aux_eliminado = '0';";
                    echo "var alerta_aux = '2';";
                    unset($_SESSION["aux_eliminado"]);
                }
            }

            if(isset($_SESSION["aux_update"])){
                if ($_SESSION["aux_update"]!="0") {
                    echo "var alert_aux_update = '1';";
                    echo "var alerta_aux = '3';";
                    unset($_SESSION["aux_update"]);
                }else {
                    echo "var alert_aux_update = '0';";
                    echo "var alerta_aux = '3';";
                    unset($_SESSION["aux_update"]);
                }
            }

        ?>
    </script>
 		 	  	
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        <?php

            if(isset($user_reg)){
                if($user_reg==1){
                    echo "var user_reg = '$user_reg';";
                    echo "var alerta_gestion_usuarios = '2';";
                }elseif ($user_reg==0) {
                    echo "var user_reg = '$user_reg';";
                    echo "var alerta_gestion_usuarios = '1';";
                }
            }

            if(isset($act_datos)){
                if ($act_datos == 1) {
                    echo "var act_datos = '$act_datos';";
                    echo "var alerta_gestion_usuarios = '3';";
                }
            }
        ?>
    </script>
        
    <script src="assets/js-general/codigo.js"></script>
    <script src="assets/js-general/alertas.js"></script>
</body>
</html>