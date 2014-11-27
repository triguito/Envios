<?php



include MODEL_DIR.'modelo_usu.php';

$verificar=new Modelo_usu();

$Usuarios=$verificar->GetUsu();

foreach ($Usuarios as $valor)
{
	
}

