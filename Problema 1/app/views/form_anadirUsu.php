<div id="menu">
	<div class="row">
	<div class="col-xs-5">
	</div>
		<div class="col-xs-3" align="center">
			<form action="" method="post">
				<div class="form-group">
					<label>Usuario</label>
				 	<input type="text" class="form-control" name="usuario"><?=$errores["usu"] ?>
				</div>
				<div class="form-group">
					<label>Contraseña</label> 
					<input type="password" class="form-control" name="contraseña"><?=$errores["pass"] ?>
				</div>
				<div class="row">
					<div class="col-xs-12" align="center">
						<input type="submit" class="btn btn-default" value="Introducir">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>