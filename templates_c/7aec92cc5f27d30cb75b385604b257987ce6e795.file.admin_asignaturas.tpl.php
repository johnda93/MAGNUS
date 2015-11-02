<?php /* Smarty version Smarty-3.0.9, created on 2015-10-13 21:33:08
         compiled from "C:/xampp/htdocs/MAGNUS/templates\admin_asignaturas.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15868561d5c747a2d01-98836763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7aec92cc5f27d30cb75b385604b257987ce6e795' => 
    array (
      0 => 'C:/xampp/htdocs/MAGNUS/templates\\admin_asignaturas.tpl',
      1 => 1444764692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15868561d5c747a2d01-98836763',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<main>
	<div id="asignatures" class="white container z-depth-1">
		<h5 class="center-align">Asignaturas</h5>

		<div id="table" class="white container">
			<table class="centered striped z-depth-1">
				<thead>
					<tr>
						<th data-field="nombre">Nombre</th>
						<th data-field="facultad">Facultad</th>
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
						<td>Minas</td>
						<td>
							<a href="#"><i class="material-icons center action-icons">create</i></a>
							<a href="#"><i class="material-icons center action-icons">delete</i></a>
						</td>
					</tr>
					<tr>
						<td>DCPS</td>
						<td>Minas</td>
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