<?php /* Smarty version Smarty-3.0.9, created on 2015-11-06 05:40:53
         compiled from "C:/xampp/htdocs/MAGNUS/templates\crear_asignatura.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31546563c2f55aca176-46423088%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9eb389f78279a6a889d7603e644e644b831aae59' => 
    array (
      0 => 'C:/xampp/htdocs/MAGNUS/templates\\crear_asignatura.tpl',
      1 => 1446783144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31546563c2f55aca176-46423088',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<main>
	<div id="div-principal-crear-asig" class="white container principal z-depth-1">
		<h5 class="center-align">Crear Asignatura</h5>

		<div class="row">
			<form class="col s6" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
crear_asignatura.php" method="POST">
				<div class="row">
					<div class="input-field col s6">
						<input id="id" name="id" type="text" class="input-crear-asig validate">
          				<label for="id">Código</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="nombre" name="nombre" type="text" class="input-crear-asig validate">
          				<label for="nombre">Nombre</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="escuela" name="escuela" type="text" class="input-crear-asig validate">
          				<label for="escuela">Escuela</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s3">
						<input id="creditos" name="creditos" type="text" class="input-crear-asig validate">
          				<label for="creditos">Créditos</label>
					</div>
				</div>

				<input id="profesor1" name="profesor1" type="hidden">
				<input id="profesor2" name="profesor2" type="hidden">
				<input id="horario" name="horario" type="hidden">
			</form>
		</div>

		<div class="row botones-inferiores">
			<div class="col s4">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-crear-asig" href="#modal-crear-grupo-asig">
						<i class="material-icons left">add</i>
						Crear Grupo
					</a>
				</div>
			</div>

			<div class="col s4">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-crear-asig" href="#modal-guardar-asig">
						<i class="material-icons left">save</i>
						Guardar
					</a>
				</div>
			</div>

			<div class="col s4">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-crear-asig" href="#modal-cancelar-asig">
						<i class="material-icons left">clear</i>
						Cancelar
					</a>
				</div>
			</div>
		</div>

		<div class="datos-ocultos"><?php echo $_smarty_tpl->getVariable('asignaturas')->value;?>
</div>

		<div id="div-crear-grupo">
			<div class="datos-ocultos"><?php echo $_smarty_tpl->getVariable('profesores')->value;?>
</div>
		</div>

		<input value=<?php echo $_smarty_tpl->getVariable('msj')->value;?>
 id="msj-crear-asig" name="msj-crear-asig" type="hidden">

		<div id="modal-crear-grupo-asig" class="modal">
			<div class="modal-content">
				<h5>Crear Grupo</h5>
				<p>¿Está seguro que desea guardar esta asignatura y proceder a crear un grupo para ésta?</p>
			</div>
			<div class="modal-footer">
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
				<a id="conf-crear-grupo-asig" class="modal-action modal-close waves-effect waves-green btn-flat asig-button" href="#!">Sí</a>
			</div>
		</div>

		<div id="modal-guardar-asig" class="modal">
			<div class="modal-content">
				<h5>Guardar Asignatura</h5>
				<p>¿Está seguro que desea guardar esta asignatura?</p>
			</div>
			<div class="modal-footer">
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
				<a id="conf-guardar-asig" class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">Sí</a>
			</div>
		</div>

		<div id="modal-cancelar-asig" class="modal">
			<div class="modal-content">
				<h5>Cancelar Asignatura</h5>
				<p>¿Está seguro que desea salir y perder el progreso?</p>
			</div>
			<div class="modal-footer">
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
index_asignatura.php">Sí</a>
			</div>
		</div>
	</div>
</main>