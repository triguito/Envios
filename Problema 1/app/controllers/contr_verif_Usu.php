<?php
include MODEL_DIR.'modelo_usu.php';
include_once LIBRARY_DIR.'library_helper.php';

$verificar=new Modelo_usu();

$funcion=new Libreria();

$Usuarios=$verificar->GetUsu();

$usuario = $funcion->ValorPost ( "user" );
$contraseña = $funcion->ValorPost ( "pass" );

foreach ($Usuarios as $valor)
{
	if($valor["user"]==$_POST["user"] && $valor["pass"]==$_POST["pass"] )
	{
		
		$_SESSION["estaDentro"]=true;
		header('Location:http://localhost/Envios/Problema%201/app/');
	}
	else 
	{
		header('Location:http://localhost/Envios/Problema%201/app/');
	}
}
