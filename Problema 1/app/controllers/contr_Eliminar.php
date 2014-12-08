<?php

include_once MODEL_DIR.'modelo1.php';
$Contr_Elimi = new Modelo ();


if(isset($_GET["id"]))
{	
	$id=$_GET["id"];
}
include VIEW_DIR.'form_confirmar.php';

$op= isset ( $_GET["op"] ) ? $_GET["op"] : "nada";

if($op!="nada")
{
	if($op=="Aceptar")
	{
		$Contr_Elimi->Borrar($id);
		header('Location:http://localhost/Envios/Problema%201/app/?accion=ver_lista');
	}
	else 
	{
		header('Location:http://localhost/Envios/Problema%201/app/?accion=ver_lista');
	}
}



