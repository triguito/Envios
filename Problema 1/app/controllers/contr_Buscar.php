<?php
include_once MODEL_DIR.'modelo1.php';

$Contr_Buscar = new Modelo ();

include LIBRARY_DIR.'library_helper.php';

if ($_POST)
{
	$campo = ValorPost ( "campo" );
	$texto = ValorPost ( "texto" );
	$envios =$Contr_Buscar->Busca($campo,$texto);
	include VIEW_DIR.'mostrar_envios.php';
	
}
else
{
	include VIEW_DIR.'form_buscar.php';
}