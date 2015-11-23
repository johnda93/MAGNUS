<main>
	<div id="div-principal-crear-asig" class="white container principal z-depth-1">
		<h5 class="center-align">Crear Asignatura</h5>

		<div class="row">
			<form class="col s6" action="{$gvar.l_global}crear_asignatura.php" method="POST">
				<div class="row">
					<div class="input-field col s6">
						<input id="id" name="id" type="text" class="input-crear-asig validate">
          				<label for="id">Código</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="nombre" name="nombre" type="text" class="input-crear-asig validate">
          				<label for="nombre">Nombre</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="escuela" name="escuela" type="text" class="input-crear-asig validate">
          				<label for="escuela">Escuela</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s3">
						<input id="creditos" name="creditos" type="text" class="input-crear-asig validate">
          				<label for="creditos">Créditos</label>
					</div>
				</div>
			</form>
		</div>

		<div class="row botones-inferiores">
			<div class="col s4">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-crear-asig" href="#modal-crear-grupo-asig">
						<i class="material-icons left">add</i>
						Crear Grupo
					</a>
				</div>
			</div>

			<div class="col s4">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-crear-asig" href="#modal-guardar-asig">
						<i class="material-icons left">save</i>
						Guardar
					</a>
				</div>
			</div>

			<div class="col s4">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-crear-asig" href="#modal-cancelar-asig">
						<i class="material-icons left">clear</i>
						Cancelar
					</a>
				</div>
			</div>
		</div>

		<div id="div-crear-grupo-crear-asig"></div>

		<div id="modal-crear-grupo-asig" class="modal">
			<div class="modal-content">
				<h5>Crear Grupo</h5>
				<p>¿Está seguro que desea guardar esta asignatura y proceder a crear un grupo para ésta?</p>
			</div>
			<div class="modal-footer">
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
				<a id="conf-crear-grupo-asig" class="modal-action modal-close waves-effect waves-green btn-flat asig-button" href="#!">Sí</a>
			</div>
		</div>

		<div id="modal-guardar-asig" class="modal">
			<div class="modal-content">
				<h5>Guardar Asignatura</h5>
				<p>¿Está seguro que desea guardar esta asignatura?</p>
			</div>
			<div class="modal-footer">
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
				<a id="conf-guardar-asig" class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">Sí</a>
			</div>
		</div>

		<div id="modal-cancelar-asig" class="modal">
			<div class="modal-content">
				<h5>Cancelar Asignatura</h5>
				<p>¿Está seguro que desea salir y perder el progreso?</p>
			</div>
			<div class="modal-footer">
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="{$gvar.l_global}index_asignatura.php">Sí</a>
			</div>
		</div>
	</div>
</main>