<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profesional</title>
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
    <main>
    <div class="container__cover">
            <div class="cover"> 
                <div class="caja3">
                    <h1>Citas Programadas</h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
                                <thead>
                                    <tr>                                       
                                        <th>Fecha de la cita </th>
                                        <th>Tipo doc</th>
                                        <th>N° documento Pac</th>
                                        <th>Paciente</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Asistencia cita</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data["citas_prof"] as $dato) {
                                       if($dato["asistencia_cita"]==0){
                                        $url="index.php?c=Profesional&a=asistencia_cita_1&id=";
                                        $boton="class='btn btn-success active' role='button' aria-pressed='true'>Asistió</a>";
                                      }else{
                                        $url="index.php?c=Profesional&a=asistencia_cita_2&id=";
                                        $boton="class='btn btn-danger  active' role='button' aria-pressed='true'>&nbsp&nbsp&nbspNo asistió&nbsp&nbsp&nbsp</a>";
                                      }
                                      echo "<tr>";
                                      echo "<td>".$dato["fechacita_horainicio"]."</td>";
                                       echo "<td>".$dato["id_tipo_doc"]."</td>";
                                      echo "<td>".$dato["num_doc_pac"]."</td>";
                                      echo "<td>".$dato["nombres_pac"].' '.$dato["apellidos_pac"]."</td>";                                                                                                       
                                      echo "<td>".$dato["tel_pac"]."</td>";
                                      echo "<td>".$dato["correo_pac"]."</td>";
                                      echo "<td><a href='"."$url".$dato["id_cita"]."' ".$boton."</td>";
                                      echo "</tr>";
                                    }
                                    ?>
                                </tbody>
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
</body>
</html>