<main>
	<div id="div-principal-crear-prof" class="white container principal z-depth-1">
		<h5 class="center-align">Crear Profesor</h5>

		<div class="row">
			<form class="col s6" action="{$gvar.l_global}crear_profesor.php" method="POST">
				<div class="row">
					<div class="input-field col s6">
						<input id="id" name="id" type="text" class="input-crear-prof validate">
          				<label for="id">Cédula</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="nombre" name="nombre" type="text" class="input-crear-prof validate">
          				<label for="nombre">Nombre</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="escuela" name="escuela" type="text" class="input-crear-prof validate">
          				<label for="escuela">Escuela</label>
					</div>
				</div>
			</form>
		</div>

		<div class="row botones-inferiores">
			<div class="col s6">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-crear-prof" href="#modal-crear-prof">
						<i class="material-icons left">save</i>
						Guardar
					</a>
				</div>
			</div>

			<div class="col s6">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-crear-prof" href="#modal-cancelar-prof">
						<i class="material-icons left">clear</i>
						Cancelar
					</a>
				</div>
			</div>
		</div>

		<div id="modal-crear-prof" class="modal">
			<div class="modal-content">
				<h5>Guardar Profesor</h5>
				<p>¿Está seguro que desea guardar este profesor?</p>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
				<a id="conf-crear-prof" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Sí</a>
			</div>
		</div>

		<div id="modal-cancelar-prof" class="modal">
			<div class="modal-content">
				<h5>Cancelar Profesor</h5>
				<p>¿Está seguro que desea salir y perder el progreso?</p>
			</div>
			<div class="modal-footer">
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="{$gvar.l_global}index_profesor.php">Sí</a>
			</div>
		</div>
	</div>
</main>