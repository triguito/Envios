<?php
include_once LIBRARY_DIR.'bd.php';
/**
 * clase para el modelo de la base de datos
 * @author Angel
 */
class Modelo
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
			if(isset($reg['fechaCreacion']))
			{
				$reg['fechaCreacion']=$this->OrdenarFecha($reg['fechaCreacion']);
				
			}
			if(isset($reg['fechaEntrega']))
			{
				$reg['fechaEntrega']=$this->OrdenarFecha($reg['fechaEntrega']);
			
			}
			
			$lista[]=$reg;
			
		}
		return $lista;
	}
	/**
	 * Lista todos los envios con un rango para la paginacion
	 * @param string $inicio
	 * @param string $tamaño
	 * @return string 
	 */
	public function GetLista($inicio, $tamaño)
	{
		$sql="select * from envio inner join tbl_provincias p on envio.provincia=p.cod  order by fechaCreacion limit " . $inicio . ",".$tamaño;
		return $this->Listar($sql);
	}
	/**
	 * Lista todas las provincias
	 * @return string
	 */
	public function Getprovincia()
	{
		$sql="select * from tbl_provincias";
		return $this->Listar($sql);
	}
	/**
	 * Cuenta los numeros de registros
	 * @return float
	 */
	public function NumReg()
	{
		$Consulta=$this->baseDatos->Consulta("select count(*) from envio");
		$reg=$this->baseDatos->fetch_array($Consulta);
		return $reg[0];
	}
	/**
	 * Devuelve el numero de registros encontrados
	 * @param string $campo
	 * @param string $valor
	 * @return string
	 */
	public function NumRegBuscar($campo,$valor)
	{
		$sql="select count(*) from envio inner join tbl_provincias p on envio.provincia=p.cod where  ".$campo." LIKE '%".$valor."%'";
		
		$Consulta=$this->baseDatos->Consulta($sql);
		$reg=$this->baseDatos->fetch_array($Consulta);
		return $reg[0];
	}
	
	/**
	 * Introduce datos en la base de datos los patos se los pasamos en los parametros
	 * @param string $dest
	 * @param string $tlf
	 * @param string $direc
	 * @param string $pobla
	 * @param string $cp
	 * @param string $correo
	 * @param string $obs
	 * @param string $prov
	 */
	public function Introducir($dest,$tlf,$direc,$pobla,$cp,$correo,$obs,$prov)
	{
		$dest=$this->baseDatos->EscaparString($dest);
		$tlf=$this->baseDatos->EscaparString($tlf);
		$direc=$this->baseDatos->EscaparString($direc);
		$pobla=$this->baseDatos->EscaparString($pobla);
		$cp=$this->baseDatos->EscaparString($cp);
		$correo=$this->baseDatos->EscaparString($correo);
		$obs=$this->baseDatos->EscaparString($obs);
		$prov=$this->baseDatos->EscaparString($prov);
		$fecha_ac = date ( 'Y-m-d' );
		$Consulta=$this->baseDatos->Consulta("INSERT INTO `envio` VALUES(null,'".$dest."','".$tlf."','".$direc."','".$pobla."','".$cp."','".$correo."','P','".$fecha_ac."',null,'".$obs."','".$prov."')");
	}
	
	/**
	 * modifica un campo de la base de datos
	 * @param string $cod
	 * @param string $dest
	 * @param string $tlf
	 * @param string $direc
	 * @param string $pobla
	 * @param string $cp
	 * @param string $correo
	 * @param string $obs
	 * @param string $prov
	 */
	public function Modificar($cod,$dest,$tlf,$direc,$pobla,$cp,$correo,$obs,$prov)
	{
		$cod=$this->baseDatos->EscaparString($cod);
		$dest=$this->baseDatos->EscaparString($dest);
		$tlf=$this->baseDatos->EscaparString($tlf);
		$direc=$this->baseDatos->EscaparString($direc);
		$pobla=$this->baseDatos->EscaparString($pobla);
		$cp=$this->baseDatos->EscaparString($cp);
		$correo=$this->baseDatos->EscaparString($correo);
		$obs=$this->baseDatos->EscaparString($obs);
		$prov=$this->baseDatos->EscaparString($prov);
		
		$Consulta=$this->baseDatos->Consulta("update envio set destinatario='".$dest."',tlfno='".$tlf."',direccion='".$direc."'
				,poblacion='".$pobla."',cp='".$cp."',email='".$correo."',observaciones='".$obs."',provincia='".$prov."' where id=".$cod);
	}
	/**
	 * funcion que borra un registro de la base de datos introduciendo mediante parametro la id
	 * @param string $cod
	 */
	public function Borrar($cod)
	{
		$dest=$this->baseDatos->EscaparString($cod);
		$Consulta=$this->baseDatos->Consulta("delete from envio where id=".$cod);
	}
	/**
	 * Anota la recepcion del envio modificando la fecha de entrega y el estado a e (entregado)
	 * @param string $cod
	 */
	public function Recepcion($cod)
	{
		$dest=$this->baseDatos->EscaparString($cod);
		$fecha_ac = date ( 'Y-m-d' );
	
		$Consulta=$this->baseDatos->Consulta("update envio set fechaEntrega='".$fecha_ac."',estado='e' where id=".$cod);
	}
	/**
	 * 
	 * @param string $campo
	 * @param string $valor
	 * @param string $inicio
	 * @param string $tamaño_pag
	 * @return Ambigous <multitype:multitype: , multitype:string >
	 */
	public function Busca($campo,$valor,$inicio,$tamaño_pag)
	{
		$dest=$this->baseDatos->EscaparString($campo);
		$dest=$this->baseDatos->EscaparString($valor);
		$lista=array();
		//$Consulta=$this->baseDatos->Consulta("select * from envio where  ".$campo." LIKE '%".$valor."%'");
		return $lista=$this->Listar("select * from envio inner join tbl_provincias p on envio.provincia=p.cod where  ".$_SESSION["campo"]." LIKE '%".$_SESSION["texto"]."%' order by fechaCreacion limit " . $inicio . ",".$tamaño_pag);
		
		
	}
	/**
	 * Ordena la fecha para cuando devuelva la base de datos lo ponga en formato dd/mm/aaaa
	 * @param string $fecha
	 * @return string
	 */
	public function OrdenarFecha($fecha)
	{
		$separados=preg_split('/[\-]+/',$fecha);
		$invertir=array_reverse($separados);
		return $fecha=implode("/", $invertir);
	}
	
}

