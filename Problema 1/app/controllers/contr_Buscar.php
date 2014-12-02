<?php
include_once MODEL_DIR.'modelo1.php';

$Contr_Buscar = new Modelo ();

include_once LIBRARY_DIR.'library_helper.php';
$funcion=new filtrar();

if ($_POST)
{
	$campo = ValorPost ( "campo" );
	$texto = ValorPost ( "texto" );
	$_SESSION["campo"]=$campo;
	$_SESSION["texto"]=$texto;
	
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
/**
 * Lista las paginas de los envios buscados
 * @param string $contr
 * @param string $tamaño
 * @param string $pagina
 * @param string $total_paginas
 * @param string $inicio
 * @param string $campo
 * @param string $texto
 */
function paginarBusca($contr,$tamaño,& $pagina,& $total_paginas, & $inicio,$campo,$texto)
{

	var_dump($pagina);
	$inicio = ($pagina - 1) * $tamaño;
	$total_paginas = ceil ( $contr->NumRegBuscar($campo,$texto) / $tamaño );

	return $contr->Busca($campo,$texto,$inicio,$tamaño);
}
function ValorPost($campo, $default = '') {
	if (isset ( $_POST [$campo] ))
		return $_POST [$campo];
	else
		return $default;
}
