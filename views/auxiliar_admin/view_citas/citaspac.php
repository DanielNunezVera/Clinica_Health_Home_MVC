<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas pacientes</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  

    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">

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
                    <img src="assets/images/icon_auxadmin.png" alt="">
                    <ul>
                        <li><a href="index.php?c=Administrador&a=index">Inicio</a></li>
                        <li><a href="index.php?c=Auxiliar&a=actualizar_aux">Actualizar datos</a></li>
                        <li><a href="controller/sesiones/cerrarsesion.php">Cerrar sesión</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="container__cover">
            <div class="cover"> 
                <div class="caja3">
                    <h1>Citas pacientes</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Fecha de la cita</th>
                                        <th>N° documento pac</th>
                                        <th>Paciente</th>
                                        <th>Tel paciente</th>
                                        <th>N° documento prof</th>
                                        <th>Profesional</th>
                                        <th>Especialidad</th>
                                        <th>Costo cita</th>
                                        <th>Consultorio</th>
                                        <th> pago cita</th>
                                        <th>Cancelar cita</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data["citas_pac"] as $dato) {
                                    if($dato["estado_pago_cita"]==1){
                                        $url="'pago_ok(".$dato["id_cita"].")'";
                                        $boton="class='btn btn-success active' role='button' aria-pressed='true'>&nbspPago&nbspOK&nbsp</a>";
                                      }else{
                                        $url="'pdte_pago(".$dato["id_cita"].")'";
                                        $boton="class='btn btn-danger active' role='button' aria-pressed='true'>Pendiente Pago</a>";
                                      }


                                      echo "<tr>";
                                      echo "<td>".$dato["fechacita_horainicio"]."</td>";
                                      echo "<td>".$dato["num_doc_pac"]."</td>";
                                      echo "<td>".$dato["nombres_pac"]."&nbsp".$dato["apellidos_pac"]."</td>";
                                      echo "<td>".$dato["tel_pac"]."</td>";
                                      echo "<td>".$dato["num_doc_prof"]."</td>";
                                      echo "<td>".$dato["nombres_prof"]."&nbsp".$dato["apellidos_prof"]."</td>";
                                      echo "<td>".$dato["descrip_espec"]."</td>";
                                      echo "<td>".$dato["costo_espec"]."</td>";
                                      echo "<td>".$dato["id_consultorios"]."</td>";
                                      echo "<td><a onclick="."$url"." ".$boton."</td>";
                                      echo "<td><a onclick='cancelar_cita_pac(".$dato["id_cita"].")'  class='btn btn-danger active' role='button' aria-pressed='true'>&nbsp&nbspEliminar&nbsp&nbsp</a></td>";
                                      echo "</tr>";  
                                }
                                ?>

                                    
                                        
                                    </tr>
                                    
                                </tbody>
                                
                            </table>  
                            <a href="index.php?c=Auxiliar&a=buscar_pacientei">
                            <button class="btn btn-primary btn-lg btn-block">Agendar</button>
                            </a>
                        </div>
                    </div> 
                    
                </div>
            </div> 
        </div>
    </main>
    <script src="assets/js-general/menu-responsive.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
      
    <!-- extension responsive -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function enviarform(){
            window.location = "../agenda_cita/agendarcita.php"
        };

        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true,
                "language": {
                    "lengthMenu": "Mostrar " + 
                        `<select class="custom-select custom-select-sm form-control form-control-sm">
                            <option value='10'>10</option>
                            <option value='25'>25</option>
                            <option value='50'>50</option>
                            <option value='100'>100</option>
                            <option value='-1'>Todos</option>
                        </select>` + 
                        " registros por página",
                    "zeroRecords": "No hay registros ",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No registros disponibles",
                    "infoFiltered": "(Filtrado de _MAX_ registros)",
                    "search":"Buscar",
                    "paginate":{
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
                });
        });  


    </script>
    <script >
        <?php
            if(isset($_SESSION["cancel_cita_pac"])){
                if ($_SESSION["cancel_cita_pac"]!="0") {
                    echo "var alert_cita_pac_cancel = '1';";
                    echo "var alerta_citas_pac_aux = '1';";
                    unset($_SESSION["cancel_cita_pac"]);
                }else {
                    echo "var alert_cita_pac_cancel = '0';";
                    echo "var alerta_citas_pac_aux  = '1';";
                    unset($_SESSION["cancel_cita_pac"]);
                }
            }

            if(isset($_SESSION["pediente_pago"])){
                if ($_SESSION["pediente_pago"]!="0") {
                    echo "var alert_pdte_pago = '1';";
                    echo "var alerta_citas_pac_aux = '2';";
                    unset($_SESSION["pediente_pago"]);
                }else {
                    echo "var alert_pdte_pago = '0';";
                    echo "var alerta_citas_pac_aux  = '2';";
                    unset($_SESSION["pediente_pago"]);
                }
            }
            if(isset($_SESSION["pago_ok"])){
                if ($_SESSION["pago_ok"]!="0") {
                    echo "var alert_pdte_pago = '1';";
                    echo "var alerta_citas_pac_aux = '2';";
                    unset($_SESSION["pago_ok"]);
                }else {
                    echo "var alert_pdte_pago = '0';";
                    echo "var alerta_citas_pac_aux  = '2';";
                    unset($_SESSION["pago_ok"]);
                }
            }
        ?>
    </script>
    <script src="assets/js-general/alertas_aux.js"></script>
</body>
</html>