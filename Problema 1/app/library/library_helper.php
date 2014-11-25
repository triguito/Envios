<?php
/**
 * funcion que filtra una cadena teniendo en cuenta el tipo de datos que se quiere filtrar
 * @param string $cadena
 * @param string $tipo
 * @return mixed
 */
function ValidaTexto($cadena, $tipo="letras")
{
	static $tipos= array(
			'numero'=>'/^[0-9]+$/',
			'letras'=>'/^[a-zA-Zñáéíóú]+$/',
			'direccion'=>'/^[a-z0-9\s\/]+$/i',
			'fecha'=>'mm/dd/aaaa',
			'telefono'=>'/^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])
							?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}
							([ \t|\-])?[0-9]{2})$/');
	
	return filter_var(
			$cadena, 
			FILTER_VALIDATE_REGEXP, 
			array('options'=>array('regexp'=>$tipos[$tipo])));
	
	
}

/**
 * 
 * @param string $cadena
 * @return boolean
 */
function ValidaCorreo($cadena)
{
	return  (filter_var ( $cadena, FILTER_VALIDATE_EMAIL ));
		
	
}

/**
 * devuelve $post para simplificar código
 * @param string $campo
 * @param string $default
 * @return string
 */
function ValorPost($campo, $default = '') {
	if (isset ( $_POST [$campo] ))
		return $_POST [$campo];
	else
		return $default;
}