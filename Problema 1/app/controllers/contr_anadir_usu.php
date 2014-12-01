<?php
include_once MODEL_DIR.'modelo_usu.php';
//include_once LIBRARY_DIR.'library_helper.php';

$anadir_usu=new modelo_usu();

if ($_POST) 
{
	$usuario = ValorPost ( "usuario" );
	$contraseña = ValorPost ( "contraseña" );
	$anadir_usu->AnadirUsu($usuario,$contraseña);
	
}
else 
{
	include VIEW_DIR.'form_anadirUsu.php';
}
