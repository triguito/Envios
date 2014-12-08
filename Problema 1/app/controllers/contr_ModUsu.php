<?php
include_once MODEL_DIR.'modelo_usu.php';
$Contr_ModUsu =new modelo_usu();
include_once LIBRARY_DIR.'library_helper.php';
$filtra= new filtrar();

$id= isset ( $_GET ["id"] ) ? $_GET ["id"] : "error";

$errores = array (
		'usu' => '',
		'pass' => '',
);
$bandera = false;
if ($_POST) 
{
	$usu = ValorPost ( "usuario" );
	if (! $filtra->ValidaTexto ( $usu ) || strlen ( $usu ) > 50) 
	{
		$errores ['usu'] = 'El campo usuario debe tener algún valor estar formado por letras y tener una longitud menor de 50';
		$bandera = true;
	}
	$pass = ValorPost ( "contraseña" );
	if($pass=="")
	{
		$errores ['pass']='El campo no puede estar vacio';
		$bandera = true;
	}
	if(!$bandera)
	{
		$enviar = array (
				'id' => $id,
				'usu' => $usu,
				'pass' => $pass,
		);
		$Contr_ModUsu-> ModUsu($id,$usu,$pass);
	}
}
else
{
	include_once VIEW_DIR.'form_anadirUsu.php';
}
function ValorPost($campo, $default = '') {
	if (isset ( $_POST [$campo] ))
		return $_POST [$campo];
	else
		return $default;
}