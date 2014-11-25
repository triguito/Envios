<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Mostrar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
	<link type="tex/css" rel="stylesheet" href="css/envios.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" id="cabecera">
	<div class="row">
		<div class="col-xs-12">
			<?php include VIEW_DIR.'cabecera.php';?>
		</div>
	</div>
</div>

<div id="menu">
	<div class="row">
		<div class="col-xs-2" align="center">
			<?php include VIEW_DIR.'menu.php';?>
		</div>
		<div class="col-xs-9">
			<?php
			if(isset($_GET['accion']))
			{
				$accion=$_GET['accion'];
			}
			else 
			{
				$accion='';
			} 

			ir_pagina($accion);
			?>
		</div>
		<div class="col-xs-4">

		</div>
	</div>
</div>
<div id="pie">
	<div class="row">
		<div class="col-xs-12" align="center">
			<?php include VIEW_DIR.'pie.php';?>
		</div>
	</div>
</div>

</body>
</html>