<?php
include_once MODEL_DIR.'modelo_usu.php';
$Contr_Elimi = new Modelo_usu();

if(isset($_GET["id"]))
{	
	$id=$_GET["id"];
}
include VIEW_DIR.'form_confirmarUsu.php';

$op= isset ( $_GET["op"] ) ? $_GET["op"] : "nada";

echo $op;
if($op!="nada")
{
	if($op=="Aceptar")
	{
		$Contr_Elimi->BorrarUsu($id);
		header('Location:http://localhost/Envios/Problema%201/app/?accion=Ver_usu');
	}
	else
	{
		header('Location:http://localhost/Envios/Problema%201/app/?accion=Ver_usu');
	}
}


