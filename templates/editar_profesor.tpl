<main>
	<div id="div-principal-editar-prof" class="white container principal z-depth-1">
		<h5 class="center-align">Editar Profesor</h5>

		<div class="row">
			<form class="col s6" action="{$gvar.l_global}editar_profesor.php" method="POST">
				<div class="row">
					<div class="input-field col s6">
						<input value="{$profesor->get('id')}" id="id" name="id" type="text" class="input-editar-prof validate">
          				<label for="id">Cédula</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input value="{$profesor->get('nombre')}" id="nombre" name="nombre" type="text" class="input-editar-prof validate">
          				<label for="nombre">Nombre</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input value="{$profesor->get('escuela')}" id="escuela" name="escuela" type="text" class="input-edita-prof validate">
          				<label for="escuela">Escuela</label>
					</div>
				</div>
			</form>
		</div>

		<h5 class="center-align">Grupos</h5>

		<table class="centered striped z-depth-1">
			<thead>
				<tr>
					<th data-field="id">Código</th>
					<th data-field="asignatura">Asignatura</th>
					<th data-field="horario">Horario</th>
				</tr>
			</thead>

			<tbody>
				{section loop = $profesor->components['grupo']['p1_g'] name = i}
				<tr>
					<td>
						{$profesor->components['grupo']['p1_g'][i]->get('id')}
					</td>
					<td>
						{$profesor->components['grupo']['p1_g'][i]->auxiliars['nombre_asignatura']}
					</td>
					<td>
						{section loop = $horarios1[i] name = j}
						{$horarios1[i][j]->dia}: {$horarios1[i][j]->hora}

						{if (($smarty.section.j.index + 1) mod 3) === 0 }
						<br />
						{elseif !$smarty.section.j.last}
						,
						{/if}
						{/section}
					</td>
				</tr>
				{/section}

				{section loop = $profesor->components['grupo']['p2_g'] name = i}
				<tr>
					<td>
						{$profesor->components['grupo']['p2_g'][i]->get('id')}
					</td>
					<td>
						{$profesor->components['grupo']['p2_g'][i]->auxiliars['nombre_asignatura']}
					</td>
					<td>
						{section loop = $horarios2[i] name = j}
						{$horarios2[i][j]->dia}: {$horarios2[i][j]->hora}

						{if (($smarty.section.j.index + 1) mod 3) === 0 }
						<br />
						{elseif !$smarty.section.j.last}
						,
						{/if}
						{/section}
					</td>
				</tr>
				{/section}
			</tbody>
		</table>

		<div class="row botones-inferiores">
			<div class="col s6">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-editar-prof" href="#modal-prof-edit">
						<i class="material-icons left">save</i>
						Guardar
					</a>
				</div>
			</div>

			<div class="col s6">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-editar-prof">
						<i class="material-icons left">clear</i>
						Cancelar
					</a>
				</div>
			</div>
		</div>

		<div id="modal-prof-edit" class="modal">
			<div class="modal-content">
				<h5>Editar Profesor</h5>
				<p>¿Está seguro que desea editar este profesor?</p>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
				<a id="conf-prof-edit" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Sí</a>
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