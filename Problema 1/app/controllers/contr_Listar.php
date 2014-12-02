<?php
include_once MODEL_DIR . 'modelo1.php';
include_once LIBRARY_DIR.'library_helper.php';

$Contr_listar = new Modelo ();

// Limito la busqueda
$TAMANO_PAGINA = 3;

// examino la página a mostrar y el inicio del registro a mostrar


$pagina = isset ( $_GET ["pagina"] ) ? $_GET ["pagina"] : 1;
$inicio;
$total_paginas;
$envios=paginarLista($Contr_listar, $TAMANO_PAGINA,$pagina,$total_paginas,$inicio);




include VIEW_DIR.'mostrar_envios.php';

/**
 * Lista las paginas de los envios
 * @param unknown $contr
 * @param unknown $tamaño
 * @param unknown $pagina
 * @param unknown $total_paginas
 * @param unknown $inicio
 */
function paginarLista($contr, $tamaño, & $pagina, & $total_paginas, & $inicio) {
	$inicio = ($pagina - 1) * $tamaño;

	if (isset ( $_SESSION ["campo"] ) || isset ( $_SESSION ["texto"] )) {
		$total_paginas = ceil ( $contr->NumRegBuscar ( $_SESSION ["campo"], $_SESSION ["texto"] ) / $tamaño );
		return $contr->Busca ( $_SESSION ["campo"], $_SESSION ["texto"], $inicio, $tamaño );
	} else {
		$total_paginas = ceil ( $contr->NumReg () / $tamaño );
		return $contr->GetLista ( $inicio, $tamaño );
	}
}