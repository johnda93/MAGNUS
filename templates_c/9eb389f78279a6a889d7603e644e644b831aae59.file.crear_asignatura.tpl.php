<?php /* Smarty version Smarty-3.0.9, created on 2015-10-30 20:47:28
         compiled from "C:/xampp/htdocs/MAGNUS/templates\crear_asignatura.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209695633c950362db7-26633892%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9eb389f78279a6a889d7603e644e644b831aae59' => 
    array (
      0 => 'C:/xampp/htdocs/MAGNUS/templates\\crear_asignatura.tpl',
      1 => 1446234420,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209695633c950362db7-26633892',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<main>
	<div id="create-asig-principal-box" class="white container principal z-depth-1">
		<h5 class="center-align">Crear Asignatura</h5>

		<div class="row">
			<form class="col s6" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
crear_asignatura.php" method="POST">
				<div class="row">
					<div class="input-field col s6">
						<input id="id" name="id" type="text" class="create-asig-input validate">
          				<label for="id">Código</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="nombre" name="nombre" type="text" class="create-asig-input validate">
          				<label for="nombre">Nombre</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="escuela" name="escuela" type="text" class="create-asig-input validate">
          				<label for="escuela">Escuela</label>
					</div>
				</div>

				<input id="profesor1" name="profesor1" type="hidden">
				<input id="profesor2" name="profesor2" type="hidden">
				<input id="horario" name="horario" type="hidden">
			</form>
		</div>

		<div class="row inferior-buttons">
			<div class="col s4">
				<div class="container">
					<a style="width: 100%;" class="waves-effect waves-light green lighten-1 btn modal-asig-trigger asig-button" href="#modal-asig-group-1">
						<i class="material-icons left">add</i>
						Crear Grupo
					</a>
				</div>
			</div>

			<div class="col s4">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn modal-asig-trigger asig-button" href="#modal-asig-create">
						<i class="material-icons left">save</i>
						Guardar
					</a>
				</div>
			</div>

			<div class="col s4">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn modal-asig-trigger" href="#modal-asig-cancel">
						<i class="material-icons left">clear</i>
						Cancelar
					</a>
				</div>
			</div>
		</div>

		<div id="modal-asig-group-1" class="modal">
			<div class="modal-content">
				<h5>Crear Grupo</h5>
				<p>¿Está seguro que desea guardar esta asignatura y proceder a crear un grupo para ésta?</p>
			</div>
			<div class="modal-footer">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">No</a>
				<a id="conf-group-create-1" class=" modal-action modal-close waves-effect waves-green btn-flat asig-button" href="#!">Sí</a>
			</div>
		</div>

		<div id="modal-asig-create" class="modal">
			<div class="modal-content">
				<h5>Guardar Asignatura</h5>
				<p>¿Está seguro que desea guardar esta asignatura?</p>
			</div>
			<div class="modal-footer">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">No</a>
				<a id="conf-asig-create" href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Sí</a>
			</div>
		</div>

		<div id="modal-asig-cancel" class="modal">
			<div class="modal-content">
				<h5>Cancelar Asignatura</h5>
				<p>¿Está seguro que desea salir y perder el progreso?</p>
			</div>
			<div class="modal-footer">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">No</a>
				<a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
index_asignatura.php" class=" modal-action modal-close waves-effect waves-green btn-flat">Sí</a>
			</div>
		</div>

		<div id="group-box">
			<div style="display: none;"><?php echo $_smarty_tpl->getVariable('profesores')->value;?>
</div>
			<div style="display: none;"><?php echo $_smarty_tpl->getVariable('asignaturas')->value;?>
</div>
		</div>

		<input value=<?php echo $_smarty_tpl->getVariable('option')->value;?>
 id="option-crear-asignatura" name="option-crear-asignatura" type="hidden">
	</div>
</main>