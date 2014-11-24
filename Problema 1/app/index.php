
<?php
session_start();
$_SESSION["user"]="Admin";
$_SESSION["pass"]="Admin";
define("BASE_DIR", __DIR__.'/');
define("CTRL_DIR", BASE_DIR.'controllers/');
define("MODEL_DIR", BASE_DIR.'models/');
define("VIEW_DIR",BASE_DIR.'views/');
define("LIBRARY_DIR",BASE_DIR.'library/');



if(isset($_GET['accion']))
{
	$accion=$_GET['accion'];
}
else 
{
	$accion='';
}
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
</head>
<body>
</body>
</html>
<?php 
switch ($accion)
{
	case "ver_lista":
			echo CTRL_DIR;
			include CTRL_DIR.'contr_Listar.php';
			break;
	case "Añadir_envio":
			include CTRL_DIR.'contr_Anadir.php';
			break;
	case "Modificar_envio":
			include CTRL_DIR.'contr_Mod.php';
			break;
	case "Eliminar_envio":
			include CTRL_DIR.'contr_Eliminar.php';
			break;
	case "Anotar_recepcion":
			include CTRL_DIR.'contr_Recepcion.php';
			break;
	default:
		include VIEW_DIR.'principal.php';
}
