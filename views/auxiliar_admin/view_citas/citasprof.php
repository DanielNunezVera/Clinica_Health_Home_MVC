<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/estilos_ayuda.css">
    <link rel="stylesheet" href="assets/css/fontello.css">
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
                    <h1>Citas profesional</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>                                       
                                        <th>N° documento Prof</th>
                                        <th>Profesional</th>
                                        <th>Fecha de la cita</th>
                                        <th>Especialidad</th>
                                        <th>Tipo doc</th>
                                        <th>N° documento Pac</th>
                                        <th>Paciente</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Reagendar cita</th>
                                        <th>Cancelar cita</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data["citas_profe"] as $dato) {
                                      
                                      echo "<tr>";
                                      echo "<td>".$dato["num_doc_prof"]."</td>";
                                      echo "<td>".$dato["nombres_prof"].' '.$dato["apellidos_prof"]."</td>";
                                      echo "<td>".$dato["fechacita_horainicio"]."</td>";
                                      echo "<td>".$dato["descrip_espec"]."</td>";
                                      echo "<td>".$dato["id_tipo_doc"]."</td>";
                                      echo "<td>".$dato["num_doc_pac"]."</td>";
                                      echo "<td>".$dato["nombres_pac"].' '.$dato["apellidos_pac"]."</td>";
                                      echo "<td>".$dato["tel_pac"]."</td>";
                                      echo "<td>".$dato["correo_pac"]."</td>";
                                      echo"<td>
                                        <form id='".$dato["id_cita"]."' name='".$dato["id_cita"]."' action='index.php?c=Auxiliar&a=cancelar_cita_prof&id=".$dato["id_cita"]."'  method=POST>                                            
                                        <input type='hidden' name='id_paciente' id='id_paciente' value='".$dato["id_paciente"]."'>
                                        <a onclick='reagendar_cita(".$dato["id_cita"].")' class='btn btn-danger active' role='button' aria-pressed='true'>Reagendar</a>
                                        </form>
                                        </td>
                                        ";
                                      echo "<td><a onclick='cancelar_cita_prof_aux(".$dato["id_cita"].")' class='btn btn-danger active' role='button' aria-pressed='true'>&nbsp&nbspCancelar&nbsp&nbsp</a>"."</td>";
                                      echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                        </div>
                    </div> 
                </div>
            </div> 
        </div>
        <div class="help">
            <input type="checkbox" id="btn-mas" style="display: none;">
            <div class="apartados">
                <!-- <a href="#" class="icon-phone"></a> -->
                <a href="index.php?c=Auxiliar&a=ayuda" class="icon-help"></a>
            </div>
            <div>
                <label for="btn-mas" class="icon-info"></label>
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
    
    
    <script >
        <?php
            if(isset($_SESSION["cancel_cita_prof"])){
                if ($_SESSION["cancel_cita_prof"]!="0") {
                    echo "var alerta_cita_cancel = '1';";
                    echo "var alerta_m_aux = '3';";
                    unset($_SESSION["cancel_cita_prof"]);
                }else {
                    echo "var alerta_cita_cancel = '0';";
                    echo "var alerta_m_aux  = 3';";
                    unset($_SESSION["cancel_cita_prof"]);
                }
            }

            if(isset($_SESSION["confi_cit_aux"])){
                if ($_SESSION["confi_cit_aux"]!="0") {
                    echo "var alerta_cita_pac_aux = '1';";
                    echo "var alerta_m_aux = '8';";
                    unset($_SESSION["confi_cit_aux"]);
                }else {
                    echo "var alerta_cita_pac_aux = '0';";
                    echo "var alerta_m_aux  = '8';";
                    unset($_SESSION["confi_cit_aux"]);
                }
            }
        ?>
    </script>
    <script src="assets/js-general/alertas.js"></script>
</body>
</html>