<?php

include_once MODEL_DIR.'modelo1.php';


$Contr_Mod = new Modelo ();

$provincia = $Contr_Mod->Listar ( "select * from tbl_provincias;" );

$id= isset ( $_GET ["id"] ) ? $_GET ["id"] : "error";

$errores = array (
		'dest' => '',
		'tlf' => '',
		'direc' => '',
		'cp' => '',
		'pobla' => '',
		'email' => ''
);
include_once LIBRARY_DIR.'library_helper.php';
$funcion=new Libreria();



$bandera = false;
if ($_POST) {
	/***
	 * filtra los campos del formulario
	 */
	$dest = $funcion->ValorPost ( "destinatario" );
	if (! ValidaTexto ( $dest ) || strlen ( $dest ) > 50) {
		$errores ['dest'] = 'El campo Destinatario debe tener algún valor estar formado por letras y tener una longitud menor de 50';
		$bandera = true;
	}
	
	$tlf = $funcion->ValorPost ( "telefono" );
	if (! ValidaTexto ( $tlf, "numero" ) || strlen ( $tlf ) > 15) {
		$errores ['tlf'] = 'El campo Telefono debe tener algún valor estar formado numero de telefono nacional menor de 15';
		$bandera = true;
	}
	
	$direc = $funcion->ValorPost ( "direccion" );
	if (! ValidaTexto ( $direc, "direccion" ) || strlen ( $direc ) > 45) {
		$errores ['direc'] = 'La dirección debe tener algún valor estar formado con longitud menor a 45';
		$bandera = true;
	}
	
	$cp = $funcion->ValorPost ( "cp" );
	if (! ValidaTexto ( $cp, "numero" ) || strlen ( $cp ) > 5) {
		$errores ['cp'] = 'El Cp debe tener algún valor  o estar formado con longitud menor a 5';
		$bandera = true;
	}
	
	$pobla = $funcion->ValorPost ( "poblacion" );
	if (! ValidaTexto ( $pobla ) || strlen ( $pobla ) > 45) {
		$errores ['pobla'] = 'La poblacion debe tener algún valor  o estar formado con longitud menor a 45';
		$bandera = true;
	}
	
	$correo = $funcion->ValorPost ( "email" );
	if (! ValidaCorreo ( $correo )) {
		$errores ["email"] = "Formato incorrecto";
		$bandera = true;
	}
	
	if (! $bandera) {
		$enviar = array (
				'dest' => $dest,
				'tlf' => $tlf,
				'direc' => $direc,
				'cp' => $cp,
				'pobla' => $pobla,
				'email' => $correo,
				'prov' => $_POST ["provincia"],
				'id'=>$id,
				'obs' => $_POST ["Observaciones"]
		);
		$fecha_ac = date ( 'Y-m-d' );
	
		$Contr_Mod->Modificar( $enviar['id'],$enviar ['dest'], $enviar ["tlf"], $enviar ["direc"], $enviar ["pobla"], 
				$enviar ["cp"], $enviar ["email"], $enviar ["obs"], $enviar ["prov"] );
		header('Location:http://localhost/Tema%202/Problema%201/app/');
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
