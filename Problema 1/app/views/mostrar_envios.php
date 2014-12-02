<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Mostrar</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-5">
				<table class="table table-bordered table-striped table-condensed">
					<tr>
						<th class="list-group-item-info">Destinatario</th>
						<th class="list-group-item-info">Telefono</th>
						<th class="list-group-item-info">Direccion</th>
						<th class="list-group-item-info">Codigo Postal</th>
						<th class="list-group-item-info">Poblacion</th>
						<th class="list-group-item-info">Provincia</th>
						<th class="list-group-item-info">Correo</th>
						<th class="list-group-item-info">Estado</th>
						<th class="list-group-item-info">fecha Creacion</th>
						<th class="list-group-item-info">fecha Entrega</th>
						<th class="list-group-item-info">Obsevaciones</th>
						<th colspan="3" class="list-group-item-info">Modificar</th>
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
						<td><?=$valor['observaciones'];?></td>
						<?php if($valor['estado']!='e'):?>
						<td class="btn-info"><a href='?accion=Modificar_envio&id=<?=$valor['id']?>'><span class="glyphicon glyphicon-pencil color" ></span></a></td>
						<td class="btn-danger"><a href='?accion=Eliminar_envio&id=<?=$valor['id']?>'><span class="glyphicon glyphicon-trash color"></span></a></td>
						<td class="btn-success"><a href='?accion=Anotar_recepcion&id=<?=$valor['id']?>'><span class="glyphicon glyphicon-thumbs-up color"></span></a></td>
						<?php else:?>
						<td></td>
						<td></td>
						<td></td>
						
						<?php endif;?>
					</tr>
				<?php endforeach;?>
				</table>
			</div>
		</div>
	</div>
	
	<p>Número de registros encontrados:<?PHP isset($Contr_listar)? $Contr_listar->NumReg(): $Contr_Buscar->NumRegBuscar($campo,$texto) ?> <p>
	<p>Se muestran páginas de <?= $TAMANO_PAGINA ?> registros cada una<p>
	<p> Mostrando la página <?= $pagina ?> de <?= $total_paginas ?><p>

	
<nav>
  <ul class="pagination">
	<?php
	if ($total_paginas > 1)
	{
		echo '<li><a href="?accion=ver_lista&pagina=1"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';
		for ($i=1;$i<=$total_paginas;$i++)
		{
			if ($pagina == $i)
				//si muestro el índice de la página actual, no coloco enlace
				echo '<li><a href="#">'.$pagina. " ".'</a></li>';
			else
				//si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
				
				echo "<li><a href='?accion=ver_lista&pagina=" . $i. "'>" . $i . "</a></li> ";
		}
		 echo '<li><a href="?accion=ver_lista&pagina='.$total_paginas.'"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>';
	}
	?>	
  </ul>
</nav>
	
</body>

</html>