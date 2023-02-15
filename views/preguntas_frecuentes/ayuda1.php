<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="stylesheet" href="assets/css/estilos_ayuda.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@800&display=swap');
        </style>
</head>
<body>
    <?php 
    if (isset($_SESSION["pac"])) {
    ?>
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
                        <li><a href="index.php?c=Paciente&a=index" >Inicio</a></li>
                        <li><a href="index.php?c=Paciente&a=actualizar_pac">Actualizar Datos</a></li>
                        <li><a style="cursor: pointer;" onclick="cerrarsesionpac()">Cerrar sesion</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>  
    <?php 
    } elseif (isset($_SESSION["auxiliar"])) {
    ?>
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
                        <li><a href="index.php?c=Auxiliar&a=index" >Inicio</a></li>
                        <li><a href="index.php?c=Auxiliar&a=actualizar_aux">Actualizar Datos</a></li>
                        <li><a style="cursor: pointer;" onclick="cerrarsesionpac()">Cerrar sesion</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <?php
    } elseif (isset($_SESSION["prof"])) {
    ?>
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
                        <li><a href="index.php?c=Profesional&a=index" >Inicio</a></li>
                        <li><a href="index.php?c=Profesional&a=actualizar_prof">Actualizar Datos</a></li>
                        <li><a style="cursor: pointer;" onclick="cerrarsesionpac()">Cerrar sesion</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <?php
    }
    ?>
    <main>
        <div class="container__cover">
            <div class="cover"> 
                <div class="caja2">
                    <img src="assets/images/Q&A.png" alt="">
                </div> 
                <div class="caja1">
                    <div class="row" style="margin-top: 1.5em">
                        <h1>Preguntas Frecuentes</h1>
                        <div class="preguntas" style="margin-top: 1em;">
                            <div class="contenedor-preguntas">
                                <div class="caja-pregunta">
                                    <p class="pregunta">¿Cómo inicio sesión?<img src="assets/images/iconmonstr-plus-1.svg" alt="Abrir respuesta"></p>
                                    <p class="respuesta">Para ingrear a mi cuenta debo identidicar mi rol, ya sea paciente, auxiliar, administrador o profesinal. 
una vez identificado que tipo de rol poseo me dirigo al portal correspondinte usurios Pacientes si es paciente o si es profesional(Auxiliar Administrativo, 
porfesional o Admin), 
seleccione el tipo de documento de identidad posteriormente en escriba el numero de identidad, finalmente escriba la contraseña y da click en enviar,
si esta registrado y los datos son correctos ingresara a su cuenta.  
En portal funcionarios seleccione el rol con el cual va ingresar, selecione el tipo de documento, escriba su numero de documento y posterirmente su contraseña, 
da click al voton enviar y si esta registrado y los datos son correctos ingresara a su cuenta.</p>
                                </div>
                                <div class="caja-pregunta">
                                    <p class="pregunta">¿Cómo restablecer la contraseña?<img src="assets/images/iconmonstr-plus-1.svg" alt="Abrir respuesta"></p>
                                    <p class="respuesta">Se ubica en donde normalmnte inicia session, de bajo del boton "Enviar" encontrara el boton "Restablecer contraseña" da click, lo va a redirigir a una nueva ventana donde
debe selecciona su rol o usuario ya sea paciente,Auxiliar Administrativo o Profesional, digita sus datos en los demas apartados despues dbera hacer click en el boton 
"Restablecer contraseña" donde se enviara un codigo que sera su nueva contraseña, una vez recuperda e ingrese a su cuenta se recomienda cambiar la contraseña en el apartdado 
de actualizar datos, una vez ubicado ahi ingresara el codigo que llego a su correo en el apartado de contraseña actual, despues podra escribir su nueva clave no menor a 8 caracteres, dara click en boton "actualizar"</p>
                                </div>
                                <div class="caja-pregunta">
                                    <p class="pregunta">¿Cómo puedo registrarme?<img src="assets/images/iconmonstr-plus-1.svg" alt="Abrir respuesta"></p>
                                    <p class="respuesta">Debe comunicarse con la Clinica Health Home a traves de sus canales de atencion, ya sea por sus redes sociales, email o telefono que aparece en la parte inferior de la 
primera pagina.</p>
                                </div>
                                <div class="caja-pregunta">
                                    <p class="pregunta">¿Cómo agendar una cita?<img src="assets/images/iconmonstr-plus-1.svg" alt="Abrir respuesta"></p>
                                    <p class="respuesta">Los pacientes que quieran agendar una cita deberan iniciar session con su cuenta, una vez lo haya hecho debera ingresar agendar cita dando click al boton "Agendar cita"
donde debe elegir la especialidad ademas de la fecha, si hay disponibilidad lo enviara a un nuevo apartado donde vera las citas describiendo profesinal, especialidad, fecha y hora da clikc a l que vea conveniente 
y para agendar debe dar click en el botn "Agendar", eso desplegara una pequeña ventana con el resumen de la cita donde podra confirmar la cita dando click al boton "Aceptar" su cita quedara agendada.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </main>
    <script src="assets/js-general/ayuda.js"></script>
    <script src="assets/js-general/menu-responsive.js"></script>
</body>
</html>