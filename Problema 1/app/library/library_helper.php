<?php
/**
 * Clase con funcciones varias que necesitaremos durante la practica
 * @author Angel
 */
class Libreria {
	
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
	
	/**
	 * devuelve $post para simplificar código
	 * 
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
	/**
	 * Controlador frontal para controlar que mostrar
	 * @param string $accion
	 */
	function ir_pagina($accion) {
		switch ($accion) {
			case "ver_lista" :
				echo CTRL_DIR;
				return include CTRL_DIR . 'contr_Listar.php';
			case "Añadir_envio" :
				return include CTRL_DIR . 'contr_Anadir.php';
			case "Modificar_envio" :
				return include CTRL_DIR . 'contr_Mod.php';
			case "Eliminar_envio" :
				return include CTRL_DIR . 'contr_Eliminar.php';
			case "Anotar_recepcion" :
				return include CTRL_DIR . 'contr_Recepcion.php';
			case "Buscar_envio" :
				return include CTRL_DIR . 'contr_Buscar.php';
			case "BorraFiltro" :
				unset ( $_SESSION ["campo"] );
				unset ( $_SESSION ["texto"] );
				return include CTRL_DIR . 'contr_Listar.php';
			case "Añadir_usu" :
				return include CTRL_DIR . 'contr_anadir_usu.php';
			
			default :
				return include VIEW_DIR . 'cuerpo.php';
		}
		include VIEW_DIR . 'base.php';
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
}