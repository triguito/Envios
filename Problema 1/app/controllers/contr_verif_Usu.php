<?php



include MODEL_DIR.'modelo_usu.php';

$verificar=new Modelo_usu();

$Usuarios=$verificar->GetUsu();

foreach ($Usuarios as $valor)
{
	if($valor["user"]==$_POST["user"] && $valor["pass"]==$_POST["pass"] )
	{
		
		$_SESSION["estaDentro"]=true;
		header('Location:http://localhost/Envios/Problema%201/app/');
	}
	else 
	{
		header('Location:http://localhost/Envios/Problema%201/app/');
	}
}

/*if (crypt($password, $dbHash) == $dbHash)
    echo 'El usuario ha sido autenticado correctamente';
else
    die('Mal Password');
?>*/
