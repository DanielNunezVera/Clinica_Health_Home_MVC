
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Agenda</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="views/administrador/gestion_agenda/css/bootstrap.min.css">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal@4/minimal.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/fullcalendar/lib/main.min.css">
    <script src="assets/js-general/jquery-3.6.0.min.js"></script>
    <script src="assets/js-general/bootstrap.min.js"></script>
    <script src="assets/fullcalendar/lib/main.min.js"></script>
    <script src="https://kit.fontawesome.com/68088d55fd.js" crossorigin="anonymous"></script>



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
    <main>
        <div class="container__cover">
            <div class="cover"> 
                <div class="caja3">
                    <div class="container py-5" id="page-container">
                        <div class="row">
                            <div class="col-md-8">
                                <div id="calendar"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="cardt rounded-0 shadow">
                                    <div class="card-header bg-gradient bg-primary text-light">
                                        <h5 class="card-title">Crear Agenda</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="container-fluid">
                                            <form action="index.php?c=Administrador&a=nueva_agenda" method="post" id="schedule-form">
                                                <input type="hidden" name="id_profesional" id="id_profesional" value="<?php echo $data["profesional"]["id_profesional"]?>">
                                                <div class="form-group mb-2">
                                                    <label for="nombre_prof" class="control-label">Profesional</label>
                                                    <input type="text" class="form-control form-control-sm rounded-0" value="<?php echo $data["profesional"]["nombres_prof"]?>" disabled>
                                                </div>
                                                <div class="form-group mb-2">
                                                <label for="end_datetime" class="control-label">Elija el mes laboral</label>
                                                <select class="Selectordoc" name="tipo_franja_la" id="tipo_franja_la" required>
                                                <option value="">Seleccione el mes </option>
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
                                                <select class="Selectordoc" name="tipo_franja" id="tipo_franja" required>
                                                <option value="">Elige el tipo de franja</option>
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
                                        </div>
                                    </div>
                                    <div class="card-header bg-gradient bg-primary text-light">
                                        <h5 class="card-title">Execpciones</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="container-fluid">
                                            <div class="form-group mb-2">
                                                <form action="index.php?c=Administrador&a=excepciones" method="post" id="eliminar_dia">
                                                    <input type="hidden" name="id_profesional" id="id_profesional" value="<?php echo $data["profesional"]["id_profesional"]?>">
                                                    <label for="nombre_prof" class="control-label">Seleccione el dia</label>
                                                    <input type="date" class="form-control form-control-sm rounded-0" id="dia_eliminar" name="dia_eliminar" required>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-center">
                                            <button class="btn btn-warning btn-sm rounded-0" type="submit" form="eliminar_dia"><i class="fa-solid fa-delete-right"></i> Eliminar dia</button>
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
                                        <dt class="text-muted">Id cita</dt>
                                        <dd id="title" class="fw-bold fs-4"></dd>
                                        <dt class="text-muted">Numero</dt>
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
<script src="assets/js-general/menu-responsive.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
<script>
    <?php

        if(isset($alert_agenda_no_exitente)){
            if($alert_agenda_no_exitente=="0"){
                echo "var alert_agenda_no_exitente = '$alert_agenda_no_exitente';";
            }else{
                echo "var alert_agenda_no_exitente = '$alert_agenda_no_exitente';";
                echo "var tipo_alerta = '1';";
            }
        }

        if(isset($alerta_agenda_repetida)){
            echo "var alerta_agenda_repetida = '$alerta_agenda_repetida';";
            echo "var tipo_alerta = '2';";
        }

        if(isset($alert_dia_eliminado)){
            echo "var alert_dia_eliminado = '$alert_dia_eliminado';";
            echo "var tipo_alerta = '3';";
        }
    ?>
    // var alerta_agenda_repetida = "<?php  ?>";s
</script>
<script>
    var scheds = $.parseJSON('<?= json_encode($data["sched_res"]) ?>')
</script>
<script src="assets/js-general/script.js"></script>
<script src="assets/js-general/alertas_admin.js"></script>
</html>