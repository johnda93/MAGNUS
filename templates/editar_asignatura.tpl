<main>
	<div id="div-principal-editar-asig" class="white container principal z-depth-1">
		<h5 class="center-align">Editar Asignatura</h5>

		<div class="row">
			<form class="col s6" action="{$gvar.l_global}editar_asignatura.php" method="POST">
				<div class="row">
					<div class="input-field col s6">
						<input value="{$asignatura->get('id')}" id="id" name="id" type="text" class="input-editar-asig validate">
          				<label for="id">Código</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input value="{$asignatura->get('nombre')}" id="nombre" name="nombre" type="text" class="input-editar-asig validate">
          				<label for="nombre">Nombre</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input value="{$asignatura->get('escuela')}" id="escuela" name="escuela" type="text" class="input-editar-asig validate">
          				<label for="escuela">Escuela</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input value="{$asignatura->get('creditos')}" id="creditos" name="creditos" type="text" class="input-editar-asig validate">
          				<label for="creditos">Créditos</label>
					</div>
				</div>

				<input value="{$asignatura->get('id')}" id="id-viejo" name="id_viejo" type="hidden">
			</form>
		</div>

		<h5 id="titulo_tabla" class="center-align">Grupos</h5>

		<table id="tabla_grupos" class="centered striped z-depth-1">
			<thead>
				<tr>
					<th data-field="nombre">Profesor</th>
					<th data-field="facultad">Horario</th>
					<th data-field="acciones">Acciones</th>
				</tr>
			</thead>

			<tbody>
				{section loop = $grupos name = i}
				<tr>
					<td>
						{$grupos[i]->components['profesor']['p1_g'][0]->get('nombre')}<br />
						{if isset($grupos[i]->components['profesor']['p2_g'])}
						{$grupos[i]->components['profesor']['p2_g'][0]->get('nombre')}
						{/if}
					</td>
					<td>
						{section loop = $horarios[i] name = j}
						{$horarios[i][j]->dia}: {$horarios[i][j]->hora}

						{if (($smarty.section.j.index + 1) mod 3) === 0 }
						<br />
						{elseif !$smarty.section.j.last}
						,
						{/if}
						{/section}
					</td>
					<td>
						<a class="boton-editar-grupo" href="#">
							<i class="material-icons center iconos-accion">create</i>
							<input value="{$grupos[i]->get('id')}" id="id" name="id" type="hidden">
						</a>

						<a class="boton-eliminar-grupo" href="#modal-eliminar-grupo">
							<i class="material-icons center iconos-accion">delete</i>
							<form action="{$gvar.l_global}eliminar_grupo.php" method="POST">
								<input value="{$grupos[i]->get('id')}" id="id" name="id" type="hidden">
							</form>
						</a>
					</td>
				</tr>
				{/section}
			</tbody>
		</table>

		<div id="div-crear-grupo-editar-asig"></div>

		<div class="row botones-inferiores">
			<div class="col s4">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-editar-asig" href="#modal-crear-grupo-editar-asig">
						<i class="material-icons left">add</i>
						Crear Grupo
					</a>
				</div>
			</div>

			<div class="col s4">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-editar-asig" href="#modal-editar-asig">
						<i class="material-icons left">save</i>
						Guardar
					</a>
				</div>
			</div>

			<div class="col s4">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-editar-asig" href="#modal-cancelar-editar-asig">
						<i class="material-icons left">clear</i>
						Cancelar
					</a>
				</div>
			</div>
		</div>

		<div id="modal-crear-grupo-editar-asig" class="modal">
			<div class="modal-content">
				<h5>Crear Grupo</h5>
				<p>¿Está seguro que desea editar esta asignatura y proceder a crear un grupo para ésta?</p>
			</div>
			<div class="modal-footer">
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
				<a id="conf-crear-grupo-editar-asig" class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">Sí</a>
			</div>
		</div>

		<div id="modal-editar-asig" class="modal">
			<div class="modal-content">
				<h5>Editar Asignatura</h5>
				<p>¿Está seguro que desea editar esta asignatura?</p>
			</div>
			<div class="modal-footer">
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
				<a id="conf-editar-asig" class=" modal-action modal-close waves-effect waves-green btn-flat">Sí</a>
			</div>
		</div>

		<div id="modal-eliminar-grupo" class="modal">
			<div class="modal-content">
				<h5>Eliminar Grupo</h5>
				<p>¿Está seguro que desea eliminar este grupo?</p>
			</div>
			<div class="modal-footer">
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
				<a id="conf-eliminar-grupo" class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">Sí</a>
			</div>
		</div>

		<div id="modal-cancelar-editar-asig" class="modal">
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