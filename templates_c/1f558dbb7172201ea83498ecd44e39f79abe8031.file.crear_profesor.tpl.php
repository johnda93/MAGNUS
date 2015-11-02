<?php /* Smarty version Smarty-3.0.9, created on 2015-10-30 21:01:09
         compiled from "C:/xampp/htdocs/MAGNUS/templates\crear_profesor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36945633cc85b128b9-44833696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f558dbb7172201ea83498ecd44e39f79abe8031' => 
    array (
      0 => 'C:/xampp/htdocs/MAGNUS/templates\\crear_profesor.tpl',
      1 => 1445645948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36945633cc85b128b9-44833696',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<main>
	<div id="create-prof-principal-box" class="white container principal z-depth-1">
		<h5 class="center-align">Crear Profesor</h5>

		<div class="row">
			<form class="col s6" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
crear_profesor.php" method="POST">
				<div class="row">
					<div class="input-field col s6">
						<input id="id" name="id" type="text" class="create-prof-input validate">
          				<label for="id">Cédula</label>
					</div>
					<div class="input-field col s12">
						<input id="nombre" name="nombre" type="text" class="create-prof-input validate">
          				<label for="nombre">Nombre</label>
					</div>
					<div class="input-field col s12">
						<input id="escuela" name="escuela" type="text" class="create-prof-input validate">
          				<label for="escuela">Escuela</label>
					</div>
				</div>
			</form>
		</div>

		<div class="row inferior-buttons">
			<div class="col s6">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn modal-prof-trigger" href="#modal-prof-create">
						<i class="material-icons left">add</i>
						Guardar Profesor
					</a>
				</div>
			</div>

			<div class="col s6">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn modal-prof-trigger">
						<i class="material-icons left">clear</i>
						Cancelar
					</a>
				</div>
			</div>
		</div>

		<div id="modal-prof-create" class="modal">
			<div class="modal-content">
				<h5>Guardar Profesor</h5>
				<p>¿Está seguro que desea guardar este profesor?</p>
			</div>
			<div class="modal-footer">
				<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
				<a id="conf-prof-create" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Sí</a>
			</div>
		</div>
	</div>
</main>