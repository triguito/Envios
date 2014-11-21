<?php
/***
 * Abstraccion de base de datos
 */
class Bd
{
	private $host;
	private $usu;
	private $pass;
	private $bd;
	
	private $resource;
	
	public function __construct()
	{
		$this->host="localhost";
		$this->usu="root";
		$this->pass="";
		$this->bd="bdkenollega";
		
		$this->Conexion();
	}
	/**
	 * Conecta la base de datos
	 */
	private function Conexion()
	{
		$this->resource=mysqli_connect( $this->host, $this->usu, $this->pass, $this->bd);
		mysqli_query($this->resource, "SET NAMES 'utf8'");
		return $this->resource;
	}
	/**
	 * 
	 * @param resource $q
	 * @return resource
	 */
	public function Consulta($q)
	{
		echo "<pre style='border:1px #999; padding:.5em; margin:.5em; border-radiux:3px; background:#aaa'>$q</pre>";
		$cons=mysqli_query($this->resource,$q);
		
		if (! $cons)
		{
			echo mysqli_error($this->resource);
			exit;
		}
		
		return $cons;
	}
	/**
	 * devuelve los registros en array
	 * @param resource $cons
	 */
	public function fetch_array($cons)
	{
		return mysqli_fetch_array($cons,MYSQL_BOTH);
	}
}
