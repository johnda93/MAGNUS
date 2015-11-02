<?php /* Smarty version Smarty-3.0.9, created on 2015-10-14 19:11:36
         compiled from "C:/xampp/htdocs/MAGNUS/templates\index_asignaturas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30031561e8cc8c6d814-51449774%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0414dc7ff8f2ac3bdcee78fab819c5a56d59a304' => 
    array (
      0 => 'C:/xampp/htdocs/MAGNUS/templates\\index_asignaturas.tpl',
      1 => 1444842694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30031561e8cc8c6d814-51449774',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<main>
	<div id="principal" class="white container z-depth-1">
		<h5 class="center-align">Asignaturas</h5>

		<div id="table" class="white container">
			<table class="centered striped z-depth-1">
				<thead>
					<tr>
						<th data-field="nombre">Nombre</th>
						<th data-field="facultad">Escuela</th>
						<th data-field="acciones">Acciones</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td>Cálculo Diferencial</td>
						<td>Matemáticas</td>
						<td>
							<a href="#"><i class="material-icons center action-icons">create</i></a>
							<a href="#"><i class="material-icons center action-icons">delete</i></a>
						</td>
					</tr>
					<tr>
						<td>Bases de Datos II</td>
						<td>Ciencias de la computación y de la decisión</td>
						<td>
							<a href="#"><i class="material-icons center action-icons">create</i></a>
							<a href="#"><i class="material-icons center action-icons">delete</i></a>
						</td>
					</tr>
					<tr>
						<td>DCPS</td>
						<td>Ciencias de la computación y de la decisión</td>
						<td>
							<a href="#"><i class="material-icons center action-icons">create</i></a>
							<a href="#"><i class="material-icons center action-icons">delete</i></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div style="padding: 20px;">
			<a class="waves-effect waves-light green lighten-1 btn">
				<i class="material-icons left">add</i>
				Crear Asignatura
			</a>
		</div>
	</div>
</main>