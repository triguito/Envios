<?php
include_once LIBRARY_DIR.'bd.php';
/***
 * clase para el modelo de la base de datos
*/
class Modelo_usu
{
	private $baseDatos;

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
	public function GetUsu()
	{
		$sql="select * from usuarios";
		return $this->Listar($sql);
	}
	public function AnadirUsu($usu,$pass)
	{
		$sql="insert into usuarios values(null,'".$usu."','".$pass."');";
		$Consulta=$this->baseDatos->Consulta($sql);
	}
}