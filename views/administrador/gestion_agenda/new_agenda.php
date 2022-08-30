<?php
include "../../../controller/sesiones/sesiones_admin.php";
require_once('db-connect.php');
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Agenda</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./fullcalendar/lib/main.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./fullcalendar/lib/main.min.js"></script>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <link rel="stylesheet" href="../../../assets/css/estilos.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@800&display=swap');

        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
</head>
<body>
    <header>
        <div class="container__menu">
            <div class="logo">
                <img src="../../assets/images/Logo2.png" alt="">
            </div>
            <div class="menu">
                <i class="fas fa-bars" id="btn_menu"></i>
                <div id="back_menu"></div>
                <nav id="nav">
                    <img src="../../assets/images/ajustes.png" alt="">
                    <ul>
                        <li><a href="../index_admin.php">Inicio</a></li>
                        <li><a href="../../../controller/sesiones/cerrarsesion.php">Cerrar sesion</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="container__cover">
            <div class="cover"> 
                <div class="caja3">
                    <div class="container py-5" id="page-container">
                        <div class="row">
                            <div class="col-md-9">
                                <div id="calendar"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="cardt rounded-0 shadow">
                                    <div class="card-header bg-gradient bg-primary text-light">
                                        <h5 class="card-title">Crear Evento</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="container-fluid">
                                            <form action="save_schedule.php" method="post" id="schedule-form">
                                                <input type="hidden" name="id" value="">
                                                <div class="form-group mb-2">
                                                    <label for="nombre_prof" class="control-label">Nombre profesional</label>
                                                    <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" value=<?php echo $_SESSION['p_nombre_pers']."&nbsp;".$_SESSION['p_apellido_pers']?> disabled>
                                                </div>
                                                <div class="form-group mb-2">
                                                    <label for="description" class="control-label">Descripción agenda</label>
                                                    <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" disabled><?php echo $_SESSION['descrip_espec']."$".$_SESSION['costo_espec']?> </textarea>
                                                </div>
                                                <div class="form-group mb-2">
                                                <label for="end_datetime" class="control-label">Elija el mes laboral</label>
                                                <select class="Selectordoc" name="tipo_franja_la" id="tipo_franja_la">
                                                <option >Seleccione el mes </option>
                                                    <option value="01">Enero</option>
                                                    <option value="02">Febrero</option>
                                                    <option value="03">Marzo</option>
                                                    <option value="c
                                                    04">Abril</option>
                                                    <option value="05">Mayo</option>
                                                    <option value="06">Junio</option>
                                                    <option value="07">Julio</option>
                                                    <option value="08">Agosto</option>
                                                    <option value="09">Septiembre</option>
                                                    <option value="10">Octubre</option>
                                                    <option value="11">Noviembre</option>
                                                    <option value="12">Diciembre</option>
                                                </select>
                                                </div>
                                                <div class="form-group mb-2">
                                                <label for="end_datetime" class="control-label">Franja laboral</label>
                                                <select class="Selectordoc" name="tipo_franja" id="tipo_franja">
                                                <option >Elige el tipo de franja</option>
                                                    <option value="a">8:00 a.m - 4:00 p.m</option>
                                                    <option value="b">6:00 a.m - 2:00 p.m</option>
                                                    <option value="c">2:00 p.m - 10:00 p.m</option>
                                                </select>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-center">
                                            <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Guardar</button>
                                            <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Event Details Modal -->
                <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-0">
                            <div class="modal-header rounded-0">
                                <h5 class="modal-title">Detalles de evento</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body rounded-0">
                                <div class="container-fluid">
                                    <dl>
                                        <dt class="text-muted">Nombre</dt>
                                        <dd id="title" class="fw-bold fs-4"></dd>
                                        <dt class="text-muted">Descripción</dt>
                                        <dd id="description" class=""></dd>
                                        <dt class="text-muted">Inicio</dt>
                                        <dd id="start" class=""></dd>
                                        <dt class="text-muted">Fin</dt>
                                        <dd id="end" class=""></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="modal-footer rounded-0">
                                <div class="text-end">
                                    <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Editar</button>
                                    <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Eliminar</button>
                                    <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div> 
        </div>
    </main>
<?php 
$id_prof=$_SESSION['id_pers'];
$schedules = $conn->query("SELECT * FROM agenda WHERE id_prof=$id_prof");
$sched_res = [];

foreach($schedules->fetch_all(MYSQLI_ASSOC) as $row){
    $row['sdate'] = date("F d, Y h:i A",strtotime($row['start_datetime']));
    $row['edate'] = date("F d, Y h:i A",strtotime($row['end_datetime']));
    $sched_res[$row['id']] = $row;
}
?>
<?php 
if(isset($conn)) $conn->close();
?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src = "../assets/js/sweetAlert4.js"></script>
    <script src="../../assets/js-general/menu-responsive.js"></script>
</body>
<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="./js/script.js"></script>
</html>