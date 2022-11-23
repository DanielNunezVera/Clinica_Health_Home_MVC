<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Restablecimiento Password</title>
  	<link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/estilos_login.css">
  	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
  	<link rel="stylesheet" href="assets/css/adminlte.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo"><p style="color:#085CC6">Clinica Health Home</p>
  </div>

  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Has olvidado la contraseña? ingresa los datos y podras restaurar la contraseña.</p>
    <span id="aviso" class="text-success text-bold">Alerta</span>
    <span id="aviso2" class="text-danger text-bold">Alerta2</span>
      <form id="form-recuperar" action="index.php?c=Recuperarp&a=restablecer_pass" method="post">
        <div class="input-group mb-3">
          <select class="form-control" name="tipo_usuario" id="tipo_usuario" required>
						<option value="">usuario</option></option>
							<option value=1>Profesional</option>
							<option value=2>Auxiliar administrativo</option>
							<option value=3>paciente</option>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
          </select>
        </div>
        <div class="input-group mb-3">
        <select class="form-control" name="id_tipo_doc" id="id_tipo_doc" required>
						<option value="">Seleccione</option>
								<?php foreach ($data["tipo_doc"] as $dato) {
								echo "<option value='".$dato["id_tipo_doc"]."'>".$dato["tipo_doc"]."</option>";
							}?>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
          </select>
        </div>
         <div class="input-group mb-3">
          <input type="text" class="form-control" name="num_doc" id="num_doc" placeholder="Numero de documento" required>
          <div class="input-group-append">
            <div class="input-group-text">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Restablecer Contraseña</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="login-box-msg mt-3">Se le enviara un codigo al correo electronico registrado en la plataforma</p>
      <p class="mt-3 mb-1">
        <a href="index.php?c=Login&a=index">Inicio</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<!-- js recuperar -->
<script src="assets/js-general/recuperar.js"></script>
<!-- Responsive -->
<script src="assets/js-general/menu-responsive.js"></script>

</body>
</html>
