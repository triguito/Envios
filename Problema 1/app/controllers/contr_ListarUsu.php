<?php
include MODEL_DIR.'modelo_usu.php';
$contr_listarUsu=new Modelo_usu();

$TAMANO_PAGINA = 3;

// examino la página a mostrar y el inicio del registro a mostrar


$pagina = isset ( $_GET ["pagina"] ) ? $_GET ["pagina"] : 1;
$inicio;
$total_paginas;
$usuarios=paginarLista($contr_listarUsu, $TAMANO_PAGINA,$pagina,$total_paginas,$inicio);

include VIEW_DIR.'mostrar_usu.php';

function paginarLista($contr, $tamaño, & $pagina, & $total_paginas, & $inicio) 
{
	$inicio = ($pagina - 1) * $tamaño;

	$total_paginas = ceil ( $contr->NumReg () / $tamaño );
		return $contr->GetUsuLimit($inicio, $tamaño);
}

