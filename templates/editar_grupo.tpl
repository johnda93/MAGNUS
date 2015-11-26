<div class="white container secundario z-depth-1">
	<h5 class="center-align"></h5>

	<div class="row">
		<form class="col s12">
			<div class="row">
				<div class="input-field col s12">
					<select id="lista_desplegable_profesor_1"></select>
					<label>Profesor 1</label>
				</div>

				<div class="input-field col s12">
					<select id="lista_desplegable_profesor_2"></select>
					<label>Profesor 2</label>
				</div>

				<input id="asignatura" name="asignatura" type="hidden">
				<input id="profesor1" name="profesor1" type="hidden">
				<input id="profesor2" name="profesor2" type="hidden">
				<input id="horario" name="horario" type="hidden">
			</div>
		</form>
	</div>

	<table id="horario" class="centered bordered">
		<thead>
			<tr>
				<th data-field="nombre"></th>
				<th data-field="facultad">Lunes</th>
				<th data-field="acciones">Martes</th>
				<th data-field="acciones">Miércoles</th>
				<th data-field="acciones">Jueves</th>
				<th data-field="acciones">Viernes</th>
				<th data-field="acciones">Sábado</th>
				<th data-field="acciones">Domingo</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>6 - 8</td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
			</tr>
			<tr>
				<td>8 - 10</td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
			</tr>
			<tr>
				<td>10 - 12</td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
			</tr>
			<tr>
				<td>12 - 14</td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
			</tr>
			<tr>
				<td>14 - 16</td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
			</tr>
			<tr>
				<td>16 - 18</td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
			</tr>
			<tr>
				<td>18 - 20</td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
				<td><a class="waves-effect waves-teal btn-flat bloque-horario"></a></td>
			</tr>
		</tbody>
	</table>


	<div class="row botones-inferiores">
		<div class="col s6">
			<div class="container">
			<a class="waves-effect waves-light green lighten-1 btn boton-editar-grupo" href="#modal-editar-grupo">
					<i class="material-icons left">add</i>
					Guardar Grupo
				</a>
			</div>
		</div>

		<div class="col s6">
			<div class="container">
				<a class="waves-effect waves-light green lighten-1 btn boton-editar-grupo" href="#modal-cancelar-editar-grupo">
					<i class="material-icons left">clear</i>
					Cancelar
				</a>
			</div>
		</div>
	</div>

	<div id="modal-editar-grupo" class="modal">
		<div class="modal-content">
			<h5>Editar Grupo</h5>
			<p>¿Está seguro que desea editar este grupo?</p>
		</div>
		<div class="modal-footer">
			<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
			<a id="conf-editar-grupo" class="modal-action modal-close waves-effect waves-green btn-flat">Sí</a>
		</div>
	</div>

	<div id="modal-cancelar-editar-grupo" class="modal">
		<div class="modal-content">
			<h5>Cancelar Grupo</h5>
			<p>¿Está seguro que desea cancelar la edición del grupo?</p>
		</div>
		<div class="modal-footer">
			<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
			<a id="conf-cancelar-editar-grupo" class="modal-action modal-close waves-effect waves-green btn-flat">Sí</a>
		</div>
	</div>
</div>