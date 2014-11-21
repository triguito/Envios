<?php
include_once MODEL_DIR . 'modelo1.php';

$Contr_listar = new Modelo ();

// Limito la busqueda
$TAMANO_PAGINA = 3;

// examino la página a mostrar y el inicio del registro a mostrar
$pagina = isset ( $_GET ["pagina"] ) ? $_GET ["pagina"] : 1;

$inicio = ($pagina - 1) * $TAMANO_PAGINA;

$envios = $Contr_listar->Listar ( "select * from envio inner join tbl_provincias p on envio.provincia=p.cod  order by fechaCreacion limit " . $inicio . ",3" );

// calculo el total de páginas

$total_paginas = ceil ( $Contr_listar->NumReg () / $TAMANO_PAGINA );

/*
 * //pongo el n�mero de registros total, el tamaño de p�gina y la p�gina que se muestra
 */
include VIEW_DIR.'mostrar_envios.php';
