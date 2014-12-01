<?php
include_once MODEL_DIR.'modelo_usu.php';
include LIBRARY_DIR.'library_helper.php';

$anadir_usu=new modelo_usu();

if ($_POST) 
{
	$usuario = ValorPost ( "usuario" );
	$contraseña = ValorPost ( "contraseña" );
	$salt = str_replace('=', '.', base64_encode(mcrypt_create_iv(20)));
	$hash = hash_password($contraseña, $salt);
	var_dump($hash);
	$anadir_usu->AnadirUsu($usuario,$hash);
	
}
else 
{
	include VIEW_DIR.'form_anadirUsu.php';
}

function hash_password($password, $salt)
{
	$hash = hash_hmac('SHA512', $password, $salt);
	for ($i = 0; $i < 5000; $i++)
	{
	$hash = hash_hmac('SHA512', $hash, $salt);
	}

	return $hash;
}
/*
$nombre = $_POST['nombre'];
$password = $_POST['password'];


$salt = str_replace('=', '.', base64_encode(mcrypt_create_iv(20)));
$hash = hash_password($password, $salt);
var_dump($hash);*/