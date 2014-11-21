<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Mostrar</title>
</head>
<body>
	<table border="1">
	<tr>
	<td>Destinatario</td>
	<td>Telefono</td>
	<td>Direccion</td>
	<td>Codigo Postal</td>
	<td>Poblacion</td>
	<td>Nombre</td>
	<td>Correo</td>
	<td>Estado</td>
	<td>fecha Creacion</td>
	<td>fecha Entrega</td>
	<td>Obsevaciones</td>
	<td>Modificar</td>
	<td>Eliminar</td>
	<td>Anotar Recepcion</td>
	</tr>
	<?php foreach ($envios as $valor) :?>
	<tr>
	<td><?=$valor['destinatario'];?></td>
	<td><?=$valor['tlfno'];?></td>
	<td><?=$valor['direccion'];?></td>
	<td><?=$valor['cp'];?></td>
	<td><?=$valor['poblacion'];?></td>
	<td><?=$valor['nombre'];?></td>
	<td><?=$valor['email'];?></td>
	<td><?=$valor['estado'];?></td>
	<td><?=$valor['fechaCreacion'];?></td>
	<td><?=$valor['fechaEntrega'];?></td>
	<td><?=$valor['obsevaciones'];?></td>
	<?php if($valor['estado']!='e'):?>
	<td><a href='?accion=Modificar_envio&id=<?=$valor['id']?>'>modificar</a></td>
	<td><a href='?accion=Eliminar_envio&id=<?=$valor['id']?>'>Eliminar</a></td>
	<td><a href='?accion=Anotar_recepcion&id=<?=$valor['id']?>'>Recepcion</a></td>
	<?php else:?>
	<td></td>
	<td></td>
	<td></td>
	<?php endif;?>

	</tr>
	
	
	<?php endforeach;?>
	</table>
	<p>Número de registros encontrados:<?= $Contr_listar->NumReg()?> <p>
	<p>Se muestran páginas de <?= $TAMANO_PAGINA ?> registros cada una<p>
	<p> Mostrando la página <?= $pagina ?> de <?= $total_paginas ?><p>
	
	<?php
	if ($total_paginas > 1)
	{
		for ($i=1;$i<=$total_paginas;$i++)
		{
			if ($pagina == $i)
				//si muestro el índice de la página actual, no coloco enlace
				echo $pagina . " ";
			else
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
				echo "<a href='?accion=ver_lista&pagina=" . $i. "'>" . $i . "</a> ";
		}
	}
	
	?>
	
</body>

</html>