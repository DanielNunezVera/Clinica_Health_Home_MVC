<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Sumar y restar horas en PHP</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
	<head>
	<body>
 <?php date_default_timezone_set("America/Lima"); ?>
  <nav class="navbar navbar-default">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="./">BaulPHP</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a href="ListaContactos.php">Inicio <span class="sr-only">(current)</span></a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<div class="container">

  <div class="row">
    <div class="col-md-12">

<!--Inicio elementos contenedor-->
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h3>Sumar y restar horas en PHP4</h3>
			</div>
				<div class="form-group">
<label for="Sumar" class="col-sm-2 control-label">Sumar en PHP4 </label>
<div class="col-sm-10">
<?php
$dato = "7";
$mifecha= date("Y-$dato-d H:i:s"); 
$NuevaFecha = strtotime ( '+1 hour' , strtotime ($mifecha) ) ; 
$NuevaFecha = strtotime ( '+18 minute' , $NuevaFecha ) ; 
$NuevaFecha = strtotime ( '+30 second' , $NuevaFecha ) ; 
$NuevaFecha = date ( 'Y-m-d H:i:s' , $NuevaFecha); 
echo $NuevaFecha;
?>
					</div>
				</div>
	
    
				<div class="form-group">
<label for="Sumar" class="col-sm-2 control-label">Restar en PHP4 </label>
<div class="col-sm-10">
<?php
$mifecha= date('Y-m-d H:i:s'); 
$NuevaFecha = strtotime ( '-5 hour' , strtotime ($mifecha) ) ; 
$NuevaFecha = strtotime ( '-18 minute' , $NuevaFecha ) ; 
$NuevaFecha = strtotime ( '-30 second' , $NuevaFecha ) ; 
$NuevaFecha = date ( 'Y-m-d H:i:s' , $NuevaFecha); 
echo $NuevaFecha;
?>
					</div>
				</div>    
    
 			<div class="page-header">
				<h3>Sumar y restar horas en PHP5</h3>
			</div>
				<div class="form-group">
<label for="Sumar" class="col-sm-2 control-label">Sumar en PHP5: </label>
<div class="col-sm-10">
<?php
$mifecha = new DateTime(); 
$mifecha->modify('+5 hours'); 
$mifecha->modify('+18 minute'); 
$mifecha->modify('+30 second'); 
echo $mifecha->format('d-m-Y H:i:s');
?>
					</div>
				</div>
	
    
				<div class="form-group">
<label for="Sumar" class="col-sm-2 control-label">Restar en PHP5: </label>
<div class="col-sm-10">
<?php
$mifecha = new DateTime(); 
$mifecha->modify('-5 hours'); 
$mifecha->modify('-18 minute'); 
$mifecha->modify('-30 second'); 
echo $mifecha->format('d-m-Y H:i:s');
?>
					</div>
				</div>    
                
                   
    
    
                			
</div>

<!--Fin elementos contenedor-->

</div>
  </div>
</div>
<div class="panel-footer">
  <div class="container">
    <p>Códigos <a href="https://www.baulphp.com/" target="_blank">BaulPHP</a></p>
  </div>
</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
</body>
</html>