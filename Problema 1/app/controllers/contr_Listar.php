<?php
include_once MODEL_DIR . 'modelo1.php';

$Contr_listar = new Modelo ();

// Limito la busqueda
$TAMANO_PAGINA = 3;

// examino la página a mostrar y el inicio del registro a mostrar


$pagina = isset ( $_GET ["pagina"] ) ? $_GET ["pagina"] : 1;
$inicio;
$total_paginas;
$envios=paginarLista($Contr_listar, $TAMANO_PAGINA,$pagina,$total_paginas,$inicio);


//$envios = $Contr_listar->Listar ( "select * from envio inner join tbl_provincias p on envio.provincia=p.cod  order by fechaCreacion limit " . $inicio . ",".$TAMANO_PAGINA );

// calculo el total de páginas



/*
 * //pongo el número de registros total, el tamaño de página y la p�gina que se muestra
 */
function paginarLista($contr,$tamaño,& $pagina,& $total_paginas, & $inicio )
{
	$inicio = ($pagina - 1) * $tamaño;
	
	
	if(isset($_SESSION["campo"])||isset($_SESSION["texto"]))
	{
		$total_paginas = ceil ( $contr->NumRegBuscar($_SESSION["campo"],$_SESSION["texto"]) / $tamaño );
		return $contr->Busca($_SESSION["campo"],$_SESSION["texto"],$inicio,$tamaño);
		
	}
	else 
	{
		$total_paginas = ceil ( $contr->NumReg () / $tamaño );
		return $contr->GetLista($inicio, $tamaño );
	}
	
}

include VIEW_DIR.'mostrar_envios.php';
