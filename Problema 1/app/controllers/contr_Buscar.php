<?php
include_once MODEL_DIR.'modelo1.php';

$Contr_Buscar = new Modelo ();

include_once LIBRARY_DIR.'library_helper.php';
$funcion=new Libreria();

if ($_POST)
{
	$campo = $funcion->ValorPost ( "campo" );
	$texto = $funcion->ValorPost ( "texto" );
	$_SESSION["campo"]=$campo;
	$_SESSION["texto"]=$texto;
	
	$TAMANO_PAGINA=3;
	
	$pagina = isset ( $_GET ["pagina"] ) ? $_GET ["pagina"] : 1;
	$inicio;
	$total_paginas;
	
	$envios=$funcion->paginarBusca($Contr_Buscar, $TAMANO_PAGINA,$pagina,$total_paginas,$inicio,$campo,$texto);
	
	include VIEW_DIR.'mostrar_envios.php';
	
}
else
{
	include VIEW_DIR.'form_buscar.php';
}
