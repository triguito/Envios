<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Mostrar</title>
</head>
<body>
	<form action="" method="post">
		<p>Destinatario <input type="text" name="destinatario" value=<?=isset($dest) ? $dest: ''  ?>><?=$errores["dest"] ?></p>
		<p>Telefono <input type="text" name="telefono" value=<?=isset($tlf) ? $tlf: ''  ?>><?=$errores["tlf"]?></p>
		<p>Direccion <input type="text" name="direccion" value=<?=isset($direc) ? $direc: ''  ?>><?=$errores["direc"]?></p>
		<p>Código postal <input type="text" name="cp" value=<?=isset($cp) ? $cp: ''  ?>><?=$errores["cp"]?></p>
		<p>Poblacion <input type="text" name="poblacion" value=<?=isset($pobla) ? $pobla: ''  ?>><?=$errores["pobla"]?></p>
		<p>Provincia: <select name="provincia" >
						<option value=""></option>
						<?php foreach ($provincia as $valor) :?>
						
						<option value=<?=$valor['cod'];?>><?=$valor['nombre'];?></option>
						<?php endforeach;?>
					  </select></p>
		<p>Email <input type="text" name="email" value=<?=isset($correo) ? $correo: ''  ?>><?=$errores["email"]?></p>
		<p>Observaciones <input type="text" name="Observaciones" value=""></p>
		<input type="submit" value="enviar">
	</form>
	
	
	
	
</body>

</html>