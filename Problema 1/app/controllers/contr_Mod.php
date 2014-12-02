<?php

include_once MODEL_DIR.'modelo1.php';
include_once LIBRARY_DIR.'library_helper.php';


$Contr_Mod = new Modelo ();

$filtra=new filtrar();

$provincia = $Contr_Mod->Getprovincia();

$id= isset ( $_GET ["id"] ) ? $_GET ["id"] : "error";

$errores = array (
		'dest' => '',
		'tlf' => '',
		'direc' => '',
		'cp' => '',
		'pobla' => '',
		'email' => ''
);




$bandera = false;
if ($_POST) {
	/***
	 * filtra los campos del formulario
	 */
	$dest = ValorPost ( "destinatario" );
	if (! $filtra->ValidaTexto ( $dest ) || strlen ( $dest ) > 50) {
		$errores ['dest'] = 'El campo Destinatario debe tener algún valor estar formado por letras y tener una longitud menor de 50';
		$bandera = true;
	}
	
	$tlf = ValorPost ( "telefono" );
	if (! $filtra->ValidaTexto ( $tlf, "numero" ) || strlen ( $tlf ) > 15) {
		$errores ['tlf'] = 'El campo Telefono debe tener algún valor estar formado numero de telefono nacional menor de 15';
		$bandera = true;
	}
	
	$direc = ValorPost ( "direccion" );
	if (! $filtra->ValidaTexto ( $direc, "direccion" ) || strlen ( $direc ) > 45) {
		$errores ['direc'] = 'La dirección debe tener algún valor estar formado con longitud menor a 45';
		$bandera = true;
	}
	
	$cp = ValorPost ( "cp" );
	if (! $filtra->ValidaTexto ( $cp, "numero" ) || strlen ( $cp ) > 5) {
		$errores ['cp'] = 'El Cp debe tener algún valor  o estar formado con longitud menor a 5';
		$bandera = true;
	}
	
	$pobla = ValorPost ( "poblacion" );
	if (! $filtra->ValidaTexto ( $pobla ) || strlen ( $pobla ) > 45) {
		$errores ['pobla'] = 'La poblacion debe tener algún valor  o estar formado con longitud menor a 45';
		$bandera = true;
	}
	
	$correo = ValorPost ( "email" );
	if (! $filtra->ValidaCorreo ( $correo )) {
		$errores ["email"] = "Formato incorrecto";
		$bandera = true;
	}
	$provincia=ValorPost("provincia");
	$observaciones=ValorPost("Observaciones");
	
	if (! $bandera) {
		$enviar = array (
				'dest' => $dest,
				'tlf' => $tlf,
				'direc' => $direc,
				'cp' => $cp,
				'pobla' => $pobla,
				'email' => $correo,
				'prov' => $provincia,
				'id'=>$id,
				'obs' => $observaciones
		);
		$fecha_ac = date ( 'Y-m-d' );
	
		$Contr_Mod->Modificar( $enviar['id'],$enviar ['dest'], $enviar ["tlf"], $enviar ["direc"], $enviar ["pobla"], 
				$enviar ["cp"], $enviar ["email"], $enviar ["obs"], $enviar ["prov"] );
		header('Location:http://localhost/Envios/Problema%201/app/?accion=ver_lista');
	}
	else 
	{
		include VIEW_DIR.'form_anadir.php';
	}
	
}
else 
{
	include VIEW_DIR.'form_anadir.php';
}
function ValorPost($campo, $default = '') {
	if (isset ( $_POST [$campo] ))
		return $_POST [$campo];
	else
		return $default;
}
