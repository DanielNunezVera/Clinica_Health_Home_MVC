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
                    <img src="assets/images/ajustes.png" alt="">
                    <ul>
                        <li><a href="index.php?c=Administrador&a=index">Inicio</a></li>
                        <li><a href="">Cerrar sesion</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
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
                                      echo "<td><a href='"."$url".$dato["id_paciente"]."' ".$boton."</td>";
                                      echo "<td><a href='index.php?c=Administrador&a=actualizar_pac&id=".$dato["id_paciente"]."&t_doc=".$dato["id_tipo_doc"]."' class='btn btn-light active' role='button' aria-pressed='true'>Actualizar</a></td>";
                                      echo "<td><a href='index.php?c=Administrador&a=eliminar_pac&id=".$dato["id_paciente"]."' class='btn btn-danger active' role='button' aria-pressed='true'>&nbsp&nbspEliminar&nbsp&nbsp</a></td>";
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
                                        echo "<td><a href='"."$url".$dato["id_profesional"]."' ".$boton."</td>";
                                        echo "<td><a href='index.php?c=Administrador&a=actualizar_prof&id=".$dato["id_profesional"]."&t_doc=".$dato["id_tipo_doc"]."' class='btn btn-light active' role='button' aria-pressed='true'>Actualizar</a></td>";
                                        echo "<td><a href='index.php?c=Administrador&a=eliminar_prof&id=".$dato["id_profesional"]."' class='btn btn-danger active' role='button' aria-pressed='true'>&nbsp&nbspEliminar&nbsp&nbsp</a></td>";
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
                                        echo "<td><a href='"."$url".$dato["id_auxiliar"]."' ".$boton."</td>";
                                        echo "<td><a href='index.php?c=Administrador&a=actualizar_aux&id=".$dato["id_auxiliar"]."' class='btn btn-light active' role='button' aria-pressed='true'>Actualizar</a></td>";
                                        echo "<td><a href='index.php?c=Administrador&a=eliminar_aux&id=".$dato["id_auxiliar"]."' class='btn btn-danger active' role='button' aria-pressed='true'>&nbsp&nbspEliminar&nbsp&nbsp</a></td>";
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
    <script src="assets/js-general/main.js"></script>
    
    
    
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
            window.location = "new_consult.php"
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
    <script src="assets/js-general/alertas_admin.js"></script>
    <script src="assets/js-general/codigo.js"></script>
        
</body>
</html>