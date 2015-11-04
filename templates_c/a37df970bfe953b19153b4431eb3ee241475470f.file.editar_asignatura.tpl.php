<?php /* Smarty version Smarty-3.0.9, created on 2015-11-04 15:25:41
         compiled from "C:/xampp/htdocs/MAGNUS/templates\editar_asignatura.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28254563a1565246501-23970355%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a37df970bfe953b19153b4431eb3ee241475470f' => 
    array (
      0 => 'C:/xampp/htdocs/MAGNUS/templates\\editar_asignatura.tpl',
      1 => 1446647132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28254563a1565246501-23970355',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<main>
	<div id="div-principal-editar-asig" class="white container principal z-depth-1">
		<h5 class="center-align">Editar Asignatura</h5>

		<div class="row">
			<form class="col s6" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
editar_asignatura.php" method="POST">
				<div class="row">
					<div class="input-field col s6">
						<input value="<?php echo $_smarty_tpl->getVariable('asignatura')->value->get('id');?>
" id="id" name="id" type="text" class="validate">
          				<label for="id">Código</label>
					</div>
					<div class="input-field col s12">
						<input value="<?php echo $_smarty_tpl->getVariable('asignatura')->value->get('nombre');?>
" id="nombre" name="nombre" type="text" class="validate">
          				<label for="nombre">Nombre</label>
					</div>
					<div class="input-field col s12">
						<input value="<?php echo $_smarty_tpl->getVariable('asignatura')->value->get('escuela');?>
" id="escuela" name="escuela" type="text" class="validate">
          				<label for="escuela">Escuela</label>
					</div>
				</div>
			</form>
		</div>

		<h5 class="center-align">Grupos</h5>

		<table class="centered striped z-depth-1">
			<thead>
				<tr>
					<th data-field="nombre">Profesor</th>
					<th data-field="facultad">Horario</th>
					<th data-field="acciones">Acciones</th>
				</tr>
			</thead>

			<tbody>
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('grupos')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
				<tr>
					<td>
						<?php echo $_smarty_tpl->getVariable('grupos')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->components['profesor']['p1_g'][0]->get('nombre');?>
<br />
						<?php if (isset($_smarty_tpl->getVariable('grupos',null,true,false)->value[$_smarty_tpl->getVariable('smarty',null,true,false)->value['section']['i']['index']]->components['profesor']['p2_g'])){?>
						<?php echo $_smarty_tpl->getVariable('grupos')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->components['profesor']['p2_g'][0]->get('nombre');?>

						<?php }?>
					</td>
					<td>
						<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['j']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('horarios')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['name'] = 'j';
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['j']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['j']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['j']['total']);
?>
						<?php echo $_smarty_tpl->getVariable('horarios')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]->dia;?>
: <?php echo $_smarty_tpl->getVariable('horarios')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]->hora;?>


						<?php if ((($_smarty_tpl->getVariable('smarty')->value['section']['j']['index']+1)%3)===0){?>
						<br />
						<?php }elseif(!$_smarty_tpl->getVariable('smarty')->value['section']['j']['last']){?>
						,
						<?php }?>
						<?php endfor; endif; ?>
					</td>
					<td>
						<a href="#"><i class="material-icons center iconos-accion">create</i></a>
						<a href="#"><i class="material-icons center iconos-accion">delete</i></a>
					</td>
				</tr>
				<?php endfor; endif; ?>
			</tbody>
		</table>

		<div class="row botones-inferiores">
			<div class="col s4">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-editar-asig" href="#modal-crear-grupo-editar">
						<i class="material-icons left">add</i>
						Crear Grupo
					</a>
				</div>
			</div>

			<div class="col s4">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-editar-asig" href="#modal-editar-asig">
						<i class="material-icons left">save</i>
						Guardar
					</a>
				</div>
			</div>

			<div class="col s4">
				<div class="container">
					<a class="waves-effect waves-light green lighten-1 btn boton-editar-asig" href="#modal-cancelar-editar-asig">
						<i class="material-icons left">clear</i>
						Cancelar
					</a>
				</div>
			</div>
		</div>

		<input value=<?php echo $_smarty_tpl->getVariable('msj')->value;?>
 id="msj-editar-asig" name="msj-editar-asig" type="hidden">

		<div id="modal-crear-grupo-editar" class="modal">
			<div class="modal-content">
				<h5>Crear Grupo</h5>
				<p>¿Está seguro que desea editar esta asignatura y proceder a crear un grupo para ésta?</p>
			</div>
			<div class="modal-footer">
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">Sí</a>
			</div>
		</div>

		<div id="modal-editar-asig" class="modal">
			<div class="modal-content">
				<h5>Editar Asignatura</h5>
				<p>¿Está seguro que desea editar esta asignatura?</p>
			</div>
			<div class="modal-footer">
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
				<a id="conf-editar-asig" class=" modal-action modal-close waves-effect waves-green btn-flat">Sí</a>
			</div>
		</div>

		<div id="modal-cancelar-editar-asig" class="modal">
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