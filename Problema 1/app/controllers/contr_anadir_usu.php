<?php
include_once MODEL_DIR.'modelo_usu.php';
//include_once LIBRARY_DIR.'library_helper.php';

$anadir_usu=new modelo_usu();

$errores = array (
		'usu' => '',
		'pass' => '',
		);


if ($_POST) 
{
	$bandera=false;
	$usuario = ValorPost ( "usuario" );
	$contraseña = ValorPost ( "contraseña" );
	$todos=$anadir_usu->GetUsu();
	foreach ($todos as $valor)
	{
		if($valor["user"]==$usuario)
		{
			$bandera=true;
		}
	}
	
	if(!$bandera)
	{
		$anadir_usu->AnadirUsu($usuario,$contraseña);
	}
	else 
	{
		echo "El usuario ya existe";
	}
}
else 
{
	include VIEW_DIR.'form_anadirUsu.php';
}

/**
 * devuelve $post para simplificar código
 *
 * @param string $campo
 * @param string $default
 * @return string
 */
function ValorPost($campo, $default = '') {
	if (isset ( $_POST [$campo] ))
		return $_POST [$campo];
	else
		return $default;
}