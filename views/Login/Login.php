<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inicio de sesión - Clínica Health Home</title>
<!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0 300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> -->
<link rel="stylesheet" href="assets/css/estilos_login.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://kit.fontawesome.com/2d830bca63.js" crossorigin="anonymous"></script>

</head>
<body>
	<main>

		<br>
		<div class="contenedor__todo">
			<div class="caja__trasera">
				<div class="caja__trasera-login">
					<h3>Portal funcionarios</h3>
					<p>Aqui podras iniciar sesion como funcionario</p>
					<button id="btn__iniciar-sesion">Iniciar Sesión</button>
				</div>
				<div class="caja__trasera-register">
					<h3>Portal usuarios</h3>
					<p>Aqui podras iniciar sesion como paciente</p>
					<button id="btn__registrarse">Iniciar sesion</button>
				</div>
			</div>

			<!--Formulario de funcionarios-->
			<div class="contenedor__login-register">
				<!--Formulario de funcionarios-->
				<form action="index.php?c=Login&a=buscar_funcionario" class="formulario__login" method="POST">
					<h2>Iniciar sesion funcionarios</h2>
					<?php //echo $_SESSION["prof_des"];?>
					<select class="Selectordoc" name="tipo_rol" id="tipo_rol" required>
						<option value="">Rol</option>
							<option value=1>Profesional</option>
							<option value=2>Auxiliar administrativo</option>
							<option value=4>Administrador</option>
					</select>
					<select class="Selectordoc" name="id_tipo_doc" id="id_tipo_doc" required>
						<option value="">Seleccione</option>
								<?php foreach ($data["tipo_doc"] as $dato) {
								echo "<option value='".$dato["id_tipo_doc"]."'>".$dato["tipo_doc"]."</option>";
							}?>
					</select>
					<input type="text" placeholder="Numero de documento" id="num_doc" name="num_doc" class="contenedor1"> 
					<input type="password" placeholder="Contraseña" id="pass" name="pass" class="contenedor1" >
					<input type="submit" name="login" class="boton" placeholder="Iniciar sesion"></input>
					<br>
					<br>
					<a href="index.php?c=Login&a=restablecer_contraseña&id=0">Restablecer contraseña</a>
				</form>

				<!--Formulario de pacientes-->
				<form action="index.php?c=Login&a=buscar_paciente" class="formulario__register" method="POST">
					<h2>Iniciar sesion pacientes</h2>
					<select class="Selectordoc" name="id_tipo_doc" id="id_tipo_doc" required>
					<option value="">Seleccione</option>
							<?php foreach ($data["tipo_doc"] as $dato) {
							echo "<option value='".$dato["id_tipo_doc"]."'>".$dato["tipo_doc"]."</option>";
						}?>
					</select>
					<input type="text" placeholder="Numero de documento" id="num_doc" name="num_doc" class="contenedor1"> 
					<input type="password" placeholder="Contraseña" id="pass" name="pass" class="contenedor1">
					<input type="submit" name="login" class="boton" placeholder="Iniciar sesion"></input>
					<br>
					<br>
					<a href="index.php?c=Login&a=restablecer_contraseña&id=0">Restablecer contraseña</a>
					<div id="dvTabla"></div>
				</form>
			</div>
		</div>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
	</main>
	<script type="text/javascript" src = "assets/js-general/login.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
	<script type="text/javascript">
    $("#tipo_rol").change(function() {
            if($("#tipo_rol").val() == "4"){
            $('#id_tipo_doc').prop('disabled', 'disabled');
          }else{
            $('#id_tipo_doc').prop('disabled', false);
          }
        });
		<?php
			if(isset($_SESSION["Login_error"])) {
				if($_SESSION["Login_error"]=="1"){
					echo "var alert_sesion = '1';";
					echo "var alerta_login = '1';";
					unset($_SESSION["Login_error"]);
				}else {
					echo "var alert_sesion = '2';";
					echo "var alerta_login = '1';";
					unset($_SESSION["Login_error"]);
				}
			}

			if (isset($_SESSION["prof_des"])) {
				if ($_SESSION["prof_des"] == '1') {
					echo "var alert_prof_des = '1';";
					echo "var alerta_login = '3';";
					unset($_SESSION["prof_des"]);

				}
			}

			if(isset($_SESSION["aux_desct_login"])) {
				if($_SESSION["aux_desct_login"]=="1"){
					echo "var alert_aux_des = '1';";
					echo "var alerta_login = '2';";
					unset($_SESSION["aux_desct_login"]);
				}
			}
			
			if(isset($alerta_recuperar_pass)) {
				if($alerta_recuperar_pass=="1"){
					echo "var user_error = '1';";
					echo "var alerta_login = '5';";
					$alerta_recuperar_pass = null;
				}
			}

		?>
	</script>
	<script src="assets/js-general/alertas.js"></script>
</body>
<footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="#">
                        <img src="assets/images/Logo2.png" alt="Logo de SLee Dw">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>SOBRE NOSOTROS</h2>
                <p>Somos una clinica privada especialida en la prestacion del servicio de la salud, contamos con un equipo profesional y con los equipos tecgnologicos de punta para brindar un ecxelente servicio.</p>
            </div>
            <div class="box">
                <h2>CONTACTANOS</h2>
                <div class="red-social">
                    <a href="https://www.facebook.com/profile.php?id=100090351939572" class="fa fa-facebook"></a>
                    <a href="https://www.instagram.com/clinica_health_home_7/" class="fa fa-instagram"></a>
                    <a href="https://www.youtube.com/channel/UCeTmjUBKH3qsjDpfRDaEHTg" class="fa fa-youtube"></a>
					<a href="https://www.linkedin.com/in/clinica-health-home-2b9131266/" class="fa fa-linkedin"></a>
					<br>
					<br>
					<a href="mailto:<nowiki> clinica.health.home7@gmail.com" class="fa fa-envelope-o"></a>
					<br>
					<br>
					<!-- <p>Revisa las Preguntas Frecuentes</p> -->
					<h2>¿NECESITAS AYUDA?</h2>
					<a href="index.php?c=Login&a=ayuda" class="fa fa-info-circle"></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2023 <b>Clinica Healt Home</b> - Todos los Derechos Reservados.</small>
        </div>
</footer>
</html>