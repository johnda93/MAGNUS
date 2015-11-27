<main>
	<div class="white container principal z-depth-1">
		<h5 class="center-align">{$asignatura->get('nombre')}</h5>
		<p><b>ID: </b>{$asignatura->get('id')}</p>
		<p><b>Escuela: </b>{$asignatura->get('escuela')}</p>
		<p><b>Creditos: </b>{$asignatura->get('creditos')}</p>

		<h5 id="titulo_tabla" class="center-align">Grupos</h5>

		<table id="tabla_grupos" class="centered striped z-depth-1">
			<thead>
				<tr>
					<th data-field="nombre">Profesor</th>
					<th data-field="facultad">Horario</th>
				</tr>
			</thead>

			<tbody>
				{section loop = $grupos name = i}
					<tr>
						<td>
							<a href="profesor.php?id={$grupos[i]->components['profesor']['p1_g'][0]->get('id')}">
								{$grupos[i]->components['profesor']['p1_g'][0]->get('nombre')}
							</a><br />

							{if isset($grupos[i]->components['profesor']['p2_g'])}
								<a href="profesor.php?id={$grupos[i]->components['profesor']['p2_g'][0]->get('id')}">
									{$grupos[i]->components['profesor']['p2_g'][0]->get('nombre')}
								</a>
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
					</tr>
				{/section}
			</tbody>
		</table>

		<h5 class="center-align">Opiniones</h5>

		{section loop=$opiniones name=i}
			<div class="row">
				<div class="col s12 m6">
					<div class="card green">
						<div class="card-content white-text">
							<span class="card-title">De: {$opiniones[i]->get('usuario')}</span>
							<p>{$opiniones[i]->get('comentario')}</p>
						</div>

						<div class="card-action">
							<input id="input-id" type="number" class="rating" data-show-clear=false data-show-caption=false value={$opiniones[i]->get('rating')} min=0 max=5 step=1 data-size="xs" data-readonly="true">
						</div>
					</div>
				</div>
			</div>
		{/section}
	</div>
</main>