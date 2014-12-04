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
	$dest = ValorPost ( "usuario" );
	if (! $filtra->ValidaTexto ( $dest ) || strlen ( $dest ) > 50) 
	{
		$errores ['usu'] = 'El campo usuario debe tener algún valor estar formado por letras y tener una longitud menor de 50';
		$bandera = true;
	}
	$pass = ValorPost ( "contraseña" );
	if($pass=="")
	{
		$errores ['dest']='El campo no puede estar vacio';
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