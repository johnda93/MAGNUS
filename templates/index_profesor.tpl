<main>
	<div class="white container principal z-depth-1">
		<h5 class="center-align">Profesores</h5>

		<table class="centered striped z-depth-1">
			<thead>
				<tr>
					<th data-field="nombre">Nombre</th>
					<th data-field="escuela">Escuela</th>
					<th data-field="acciones">Acciones</th>
				</tr>
			</thead>

			<tbody>
				{section loop=$profesores name=i}
				<tr>
					<td>{$profesores[i]->get('nombre')}</td>
					<td>{$profesores[i]->get('escuela')}</td>
					<td>
						<a href="{$gvar.l_global}editar_profesor.php?id={$profesores[i]->get('id')}">
							<i class="material-icons center iconos-accion">create</i>
						</a>

						<a href="#!">
							<i class="material-icons center iconos-accion">delete</i>
							<form action="{$gvar.l_global}eliminar_profesor.php" method="POST">
								<input value="{$profesores[i]->get('id')}" id="id" name="id" type="hidden">
							</form>
						</a>
					</td>
				</tr>
				{/section}
			</tbody>
		</table>

		<a class="waves-effect waves-light green lighten-1 btn" href="{$gvar.l_global}crear_profesor.php">
			<i class="material-icons left">add</i>
			Crear Profesor
		</a>
	</div>
</main>