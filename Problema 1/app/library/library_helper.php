<?php
/**
 * Clase con funcciones varias que necesitaremos durante la practica
 * @author Angel
 */
class filtrar {
	
	/**
	 * funcion que filtra una cadena teniendo en cuenta el tipo de datos que se quiere filtrar
	 * 
	 * @param string $cadena        	
	 * @param string $tipo        	
	 * @return mixed
	 */
	function ValidaTexto($cadena, $tipo = "letras") {
		static $tipos = array (
				'numero' => '/^[0-9]+$/',
				'letras' => '/^[a-zA-Zñáéíóú]+$/',
				'direccion' => '/^[a-z0-9\s\/]+$/i',
				'fecha' => 'mm/dd/aaaa',
				'telefono' => '/^((\+?34([ \t|\-])?)?[9|6|7]((\d{1}([ \t|\-])
							?[0-9]{3})|(\d{2}([ \t|\-])?[0-9]{2}))([ \t|\-])?[0-9]{2}
							([ \t|\-])?[0-9]{2})$/' 
		);
		
		return filter_var ( $cadena, FILTER_VALIDATE_REGEXP, array (
				'options' => array (
						'regexp' => $tipos [$tipo] 
				) 
		) );
	}
	
	/**
	 * Filtra el campo correo
	 * @param string $cadena        	
	 * @return boolean
	 */
	function ValidaCorreo($cadena) {
		return (filter_var ( $cadena, FILTER_VALIDATE_EMAIL ));
	}
	
	

}