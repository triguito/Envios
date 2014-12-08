<?php
include_once LIBRARY_DIR.'bd.php';
/**
 * clase para el modelo de la base de datos
 * @author Angel
*/
class Modelo_usu
{
	private $baseDatos;
	/**
	 * Constructor de base de datos
	 */
	public function __construct()
	{
		$this->baseDatos=new Bd();
	}
	/**
	 * Lista una tabla de la base de datos
	 * @param resource $con
	 * @return multitype:array
	 */
	private function & Listar($con)
	{

		$lista=array();
		$Consulta=$this->baseDatos->Consulta($con);
		while ($reg=$this->baseDatos->fetch_array($Consulta))
		{
			$lista[]=$reg;		
		}
		return $lista;
	}
	/**
	 * funcion para ver los usuarios existentes en el sistema
	 * @return string  
	 */
	public function GetUsu()
	{
		$sql="select * from usuarios";
		return $this->Listar($sql);
	}
	/**
	 * 
	 * @param string $inicio
	 * @param string $tamaño
	 * @return Ambigous <multitype:multitype: , multitype:unknown >
	 */
	public function GetUsuLimit($inicio, $tamaño)
	{
		$sql="select * from usuarios limit " . $inicio . ",".$tamaño;
		return $this->Listar($sql);
	}
	
	/**
	 * Cuenta los numeros de registros
	 * @return float
	 */
	public function NumReg()
	{
		$Consulta=$this->baseDatos->Consulta("select count(*) from usuarios");
		$reg=$this->baseDatos->fetch_array($Consulta);
		return $reg[0];
	}
	/**
	 * Añade un usuario a la base de datos
	 * @param string $usu
	 * @param string $pass
	 */
	public function AnadirUsu($usu,$pass)
	{
		$dest=$this->baseDatos->EscaparString($usu);
		$dest=$this->baseDatos->EscaparString($pass);
		$sql="insert into usuarios values(null,'".$usu."','".$pass."');";
		$Consulta=$this->baseDatos->Consulta($sql);
	}
	
	public function ModUsu($cod,$usu,$pass)
	{
		$cod=$this->baseDatos->EscaparString($cod);
		$usu=$this->baseDatos->EscaparString($usu);
		$pass=$this->baseDatos->EscaparString($pass);
	
		$Consulta=$this->baseDatos->Consulta("update usuarios set user='".$usu."',pass='".$pass."' where id=".$cod);
	}
	
	public function BorrarUsu($cod)
	{
		$cod=$this->baseDatos->EscaparString($cod);
		$Consulta=$this->baseDatos->Consulta("delete from usuarios where id=".$cod);
	}
}