<?php 
include_once LIBRARY_DIR.'library_helper.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Mostrar</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <link type="tex/css" rel="stylesheet" href="css/envios.css">
</head>
<body>
<div id="cabecera">
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
			<?php $this->ProcesaPeticionAplicacion(); ?>
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