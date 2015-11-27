<main>
	<div id="div-principal-profesor" class="white container principal z-depth-1">
		<h5 class="center-align">{$profesor->get('nombre')}</h5>

		<div style="margin-bottom: 25px;">
		    <p><b>ID: </b>{$profesor->get('id')}</p>
		    <p><b>Escuela: </b>{$profesor->get('escuela')}</p>
	    </div>

	    <input id="puede_opinar_profesor" name="puede_opinar_profesor" type="hidden" value={$puede_opinar_profesor}>
		{if $session == 'true'}
	    <div style="margin-bottom: 25px;" class="row botones-inferiores">
			<div class="col s6 offset-s3">
				<div class="container">
				<a id="opinar" class="waves-effect waves-light green lighten-1 btn">
						<i class="material-icons left">create</i>
						Opina!
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

						<label for="rating">Rankea el profesor:</label>
        				<input id="rating" name="rating" type="number" class="rating" data-show-clear=false data-show-caption=false min=0 max=5 step=1 data-size="xs">
        				<input id="profesor" name="profesor" type="hidden" value={$profesor->get('id')}>
        				<input id="usuario" name="usuario" type="hidden" value="JohnDa">

        				<a id="enviar-opinion-profesor" class="waves-effect waves-light green lighten-1 btn">
							<i class="material-icons left">add</i>
							Enviar
						</a>
      				</div>
   				</form>
  			</div>
		</div>

		{/if}

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
						<a href="asignatura.php?id={$profesor->components['grupo']['p1_g'][i]->get('asignatura')}">
							{$profesor->components['grupo']['p1_g'][i]->auxiliars['nombre_asignatura']}
						</a>
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
						<a href="asignatura.php?id={$profesor->components['grupo']['p2_g'][i]->get('asignatura')}">
							{$profesor->components['grupo']['p2_g'][i]->auxiliars['nombre_asignatura']}
						</a>
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