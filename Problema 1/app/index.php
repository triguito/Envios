<?php
session_start();
//session_destroy();
define("BASE_DIR", __DIR__.'/');
define("CTRL_DIR", BASE_DIR.'controllers/');
define("MODEL_DIR", BASE_DIR.'models/');
define("VIEW_DIR",BASE_DIR.'views/');
define("LIBRARY_DIR",BASE_DIR.'library/');
define("CSS_DIR",BASE_DIR.'css/');



if(isset($_SESSION['estaDentro']) && $_SESSION['estaDentro'])
{
	include VIEW_DIR.'base.php';
}
else
{
	if(!$_POST)
	{
		include VIEW_DIR.'login.php';
	}
	else 
	{
		include CTRL_DIR.'contr_verif_Usu.php';
		$_SESSION["tiempo"]=date ("G:i");
	}
}


//Controlar el filtrado de campo buscar y cuando punga una fecha poner desde una fecha hasta otra.

