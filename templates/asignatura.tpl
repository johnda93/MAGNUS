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
        </tr>
        {/section}
      </tbody>
    </table>
	</div>
</main>