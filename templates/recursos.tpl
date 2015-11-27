<main>
	<div id="div-principal-asignatura" class="white container principal z-depth-1">
		<h5 class="center-align">Recursos - {$asignatura->get('nombre')}</h5>

		<table id="tabla_recursos" class="centered striped z-depth-1">
			<thead>
				<tr>
					<th data-field="nombre">Nombre</th>
					<th data-field="usuario">Usuario</th>
				</tr>
			</thead>

			<tbody>
				{section loop = $recursos name = i}
					<tr>
						<td>
							<a href="files/{$recursos[i]->get('nombre')}">
								{$recursos[i]->get('nombre')}
							</a>
						</td>

						<td>
							{$recursos[i]->get('usuario')}
						</td>
					</tr>
				{/section}
			</tbody>
		</table>


		<div class="row">
			<form class="col s12" action="crear_recurso.php" method="post" enctype="multipart/form-data">
				<div class="file-field input-field">
      				<div class="green lighten-1 btn">
        				<span>Subir Archivo</span>
        				<input id="archivo" name="archivo" type="file">
      				</div>

      				<div class="file-path-wrapper">
        				<input id="nombre" name="nombre" class="file-path validate" type="text">
      				</div>
    			</div>

				<input id="asignatura" name="asignatura" type="hidden" value={$asignatura->get('id')}>
				<input id="usuario" name="usuario" type="hidden" value={$usuario}>

				<button class="btn waves-effect waves-light green lighten-1" type="submit" name="action">Enviar
    				<i class="material-icons right">send</i>
  				</button>
			</form>
  		</div>
	</div>
</main>