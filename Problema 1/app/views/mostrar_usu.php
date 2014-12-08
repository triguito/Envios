<div class="container">
	<div class="row">
		<div class="col-xs-5">
			<table class="table table-bordered table-striped table-condensed">
				<tr>
					<th class="list-group-item-info">Usuario</th>
					<th class="list-group-item-info">Clave</th>
					<th colspan="2" class="list-group-item-info">Acción</th>
				</tr>
				<?php foreach ($usuarios as $valor) :?>
				<tr>
					<td><?=$valor['user'];?></td>
					<td><?=$valor['pass'];?></td>
					<td class="btn-info"><a
						href='?accion=Modificar_usu&id=<?=$valor['id']?>'><span
							class="glyphicon glyphicon-pencil color"></span></a></td>
					<td class="btn-danger"><a
						href='?accion=Eliminar_usu&id=<?=$valor['id']?>'><span
							class="glyphicon glyphicon-trash color"></span></a></td>
				</tr>
				<?php endforeach;?>
				</table>
				<p>Número de registros encontrados:<?= $contr_listarUsu->NumReg() ?> </p>
				<p>Se muestran páginas de <?= $TAMANO_PAGINA ?> registros cada una</p>
				<p> Mostrando la página <?= $pagina ?> de <?= $total_paginas?></p>
				
					<nav>
						<ul class="pagination">
					<?php
					if ($total_paginas > 1) {
						echo '<li><a href="?accion=Ver_usu&pagina=1"><span aria-hidden="true">&laquo;</span><span class="sr-only">Previous</span></a></li>';
						for($i = 1; $i <= $total_paginas; $i ++) {
							if ($pagina == $i)
								// si muestro el índice de la página actual, no coloco enlace
								echo '<li><a href="#">' . $pagina . " " . '</a></li>';
							else
								// si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
								
								echo "<li><a href='?accion=Ver_usu&pagina=" . $i . "'>" . $i . "</a></li> ";
						}
						echo '<li><a href="?accion=Ver_usu&pagina=' . $total_paginas . '"><span aria-hidden="true">&raquo;</span><span class="sr-only">Next</span></a></li>';
					}
					?>	
				  </ul>
		</div>
	</div>
</div>