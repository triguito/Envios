<?php
session_start();
define("BASE_DIR", __DIR__.'/');
define("CTRL_DIR", BASE_DIR.'controllers/');
define("MODEL_DIR", BASE_DIR.'models/');
define("VIEW_DIR",BASE_DIR.'views/');
define("LIBRARY_DIR",BASE_DIR.'library/');
define("CSS_DIR",BASE_DIR.'css/');


$ctrFrontal=new ControladorFrontal();
$ctrFrontal->Run();

//Controlar el filtrado de campo buscar y cuando punga una fecha poner desde una fecha hasta otra.

class ControladorFrontal
{	

	
	public function Run()
	{
		if(isset($_SESSION['estaDentro']) && $_SESSION['estaDentro'])
		{
			include VIEW_DIR.'base.php';
		}
		else
		{
			if(!$_POST)
			{
				include VIEW_DIR.'login.php';
			}
			else
			{
				include CTRL_DIR.'contr_verif_Usu.php';
				$_SESSION["tiempo"]=date ("G:i");
			}
		}		
	}
	
	
	/**
	 * Controlador frontal para controlar que mostrar
	 * @param string $accion
	 */
	function ProcesaPeticionAplicacion() {
		
		if(isset($_GET['accion']))
		{
			$accion=$_GET['accion'];
		}
		else
		{
			$accion='';
		}
				
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
			case "fuera" :
				session_destroy();
				header('Location:http://localhost/Envios/Problema%201/app/');
			case "Ver_usu" :
				return include CTRL_DIR . 'contr_ListarUsu.php';
			default :
				return include VIEW_DIR . 'cuerpo.php';
		}
		include VIEW_DIR . 'base.php';
	}
}



