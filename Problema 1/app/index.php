
<?php
session_start();
$_SESSION["user"]="Admin";
$_SESSION["pass"]="Admin";
define("BASE_DIR", __DIR__.'/');
define("CTRL_DIR", BASE_DIR.'controllers/');
define("MODEL_DIR", BASE_DIR.'models/');
define("VIEW_DIR",BASE_DIR.'views/');
define("LIBRARY_DIR",BASE_DIR.'library/');
define("CSS_DIR",BASE_DIR.'css/');




include VIEW_DIR.'base.php';
function ir_pagina($accion) 
{
	
	switch ($accion)
	{
		case "ver_lista":
				echo CTRL_DIR;
			return	include CTRL_DIR.'contr_Listar.php';
		case "Añadir_envio":
			return include CTRL_DIR.'contr_Anadir.php';
		case "Modificar_envio":
			return include CTRL_DIR.'contr_Mod.php';
		case "Eliminar_envio":
			return include CTRL_DIR.'contr_Eliminar.php';
		case "Anotar_recepcion":
			return include CTRL_DIR.'contr_Recepcion.php';
		case "Buscar_envio":
			return include CTRL_DIR.'contr_Buscar.php';
		default:
			return include VIEW_DIR.'cuerpo.php';
	}
}
