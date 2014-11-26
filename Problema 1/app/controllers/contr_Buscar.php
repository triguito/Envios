<?php
include_once MODEL_DIR.'modelo1.php';

$Contr_Buscar = new Modelo ();

include LIBRARY_DIR.'library_helper.php';

if ($_POST)
{
	$campo = ValorPost ( "campo" );
	$texto = ValorPost ( "texto" );
	
	$TAMANO_PAGINA=3;
	
	$pagina = isset ( $_GET ["pagina"] ) ? $_GET ["pagina"] : 1;
	$inicio;
	$total_paginas;
	
	$envios=paginarBusca($Contr_Buscar, $TAMANO_PAGINA,$pagina,$total_paginas,$inicio,$campo,$texto);
	
	include VIEW_DIR.'mostrar_envios.php';
	
}
else
{
	include VIEW_DIR.'form_buscar.php';
}

function paginarBusca($contr,$tamaño,& $pagina,& $total_paginas, & $inicio,$campo,$texto)
{

	var_dump($pagina);
	$inicio = ($pagina - 1) * $tamaño;
	$total_paginas = ceil ( $contr->NumReg () / $tamaño );

	return $contr->Busca($campo,$texto,$inicio,$tamaño);
}