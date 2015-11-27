<main>
	<div id="div-principal-asignatura" class="white container principal z-depth-1">
		<h5 class="center-align">{$asignatura->get('nombre')}</h5>

		<div style="margin-bottom: 25px;">
			<p><b>ID: </b>{$asignatura->get('id')}</p>
			<p><b>Escuela: </b>{$asignatura->get('escuela')}</p>
			<p><b>Creditos: </b>{$asignatura->get('creditos')}</p>
		</div>
		
		<input id="puede_opinar_asignatura" name="puede_opinar_asignatura" type="hidden" value={$puede_opinar_asignatura}>
		{if $session == 'true'}
		<div style="margin-bottom: 25px;" class="row botones-inferiores">
			<div class="col s6">
				<div class="container">
					<a id="opinar" class="waves-effect waves-light green lighten-1 btn">
						<i class="material-icons left">create</i>
						Opina!
					</a>
				</div>
			</div>

			<div class="col s6">
				<div class="container">
					<a href="asignatura.php?id={$asignatura->get('id')}&option=ver_recursos"class="waves-effect waves-light green lighten-1 btn">
						<i class="material-icons left">library_books</i>
						Ver Recursos
					</a>
				</div>
			</div>
		</div>


		<div style="margin-bottom: 30px; display: none" id="crear-opinion" class="secundario">
			<h5 class="center-align">Crear Opinión</h5>
			
			<div class="row">
    			<form class="col s12">
      				<div class="row">
        				<div class="input-field col s12">
          					<textarea id="comentario" name="comentario" class="materialize-textarea"></textarea>
          					<label for="comentario">Comentario</label>
        				</div>

						<label for="rating">Rankea la asignatura:</label>
        				<input id="rating" name="rating" type="number" class="rating" data-show-clear=false data-show-caption=false min=0 max=5 step=1 data-size="xs">
        				<input id="asignatura" name="asignatura" type="hidden" value={$asignatura->get('id')}>
        				<input id="usuario" name="usuario" type="hidden" value="JohnDa">

        				<a id="enviar-opinion-asignatura" class="waves-effect waves-light green lighten-1 btn">
							<i class="material-icons left">add</i>
							Enviar
						</a>
      				</div>
   				</form>
  			</div>
		</div>

		{/if}

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