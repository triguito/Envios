<?php
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