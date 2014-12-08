	<div id="menu">
		<div class="row">
		<div class="col-xs-3">
		</div>
			<div class="col-xs-5">
				<form action="" method="post">
					<div class="form-group">
						<label>Destinatario</label>
					 	<input type="text" class="form-control" name="destinatario" value=<?=isset($dest) ? $dest: ''  ?>><?=$errores["dest"] ?>
					</div>
					<div class="form-group">
						<label>Telefono</label> 
						<input type="text" class="form-control" name="telefono" value=<?=isset($tlf) ? $tlf: ''  ?>><?=$errores["tlf"]?>
					</div>
					<div class="form-group">
						<label>Direccion</label> 
						<input type="text" class="form-control" name="direccion" value=<?=isset($direc) ? $direc: ''  ?>><?=$errores["direc"]?>
					</div>
					<div class="form-group">
						<label>Código postal</label> 
						<input type="text" class="form-control" name="cp" value=<?=isset($cp) ? $cp: ''  ?>><?=$errores["cp"]?>
					</div>
					<div class="form-group">
						<label>Poblacion</label>
						<input type="text" class="form-control" name="poblacion" value=<?=isset($pobla) ? $pobla: ''  ?>><?=$errores["pobla"]?>
					</div>
					<div class="form-group">
						<label>Provincia</label>
					 	<select name="provincia" class="form-control" >
									<?php foreach ($provincia as $valor) :?>
									
									<option value=<?=$valor['cod'];?>><?=$valor['nombre'];?></option>
									<?php endforeach;?>
								  </select>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="email" value=<?=isset($correo) ? $correo: ''  ?>><?=$errores["email"]?>
					</div>
					<div class="form-group">
						<label>Observaciones</label>
						<input type="text" class="form-control" name="Observaciones" value="">
					</div>
					<div class="row">
						<div class="col-xs-12" align="right">
							<input type="submit" class="btn btn-default" value="enviar">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>