<?php /* Smarty version Smarty-3.0.9, created on 2015-11-04 14:39:49
         compiled from "C:/xampp/htdocs/MAGNUS/templates\index_asignatura.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5686563709080ddd85-31523683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c96077c8ce167299b3170a107c4ce22defe8528c' => 
    array (
      0 => 'C:/xampp/htdocs/MAGNUS/templates\\index_asignatura.tpl',
      1 => 1446572871,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5686563709080ddd85-31523683',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<main>
	<div class="white container principal z-depth-1">
		<h5 class="center-align">Asignaturas</h5>

		<table class="centered striped z-depth-1">
			<thead>
				<tr>
					<th data-field="nombre">Nombre</th>
					<th data-field="escuela">Escuela</th>
					<th data-field="acciones">Acciones</th>
				</tr>
			</thead>

			<tbody>
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('asignaturas')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<td><?php echo $_smarty_tpl->getVariable('asignaturas')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('nombre');?>
</td>
					<td><?php echo $_smarty_tpl->getVariable('asignaturas')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('escuela');?>
</td>
					<td>
						<a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
editar_asignatura.php?id=<?php echo $_smarty_tpl->getVariable('asignaturas')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('id');?>
">
							<i class="material-icons center iconos-accion">create</i>
						</a>

						<a class="boton-eliminar-asig" href="#modal-eliminar-asig">
							<i class="material-icons center iconos-accion">delete</i>
							<form action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
eliminar_asignatura.php" method="POST">
								<input value="<?php echo $_smarty_tpl->getVariable('asignaturas')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('id');?>
" id="id" name="id" type="hidden">
							</form>
						</a>
					</td>
				</tr>
				<?php endfor; endif; ?>
			</tbody>
		</table>
		
		<a class="waves-effect waves-light green lighten-1 btn" href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
crear_asignatura.php">
			<i class="material-icons left">add</i>
			Crear Asignatura
		</a>

		<div id="modal-eliminar-asig" class="modal">
			<div class="modal-content">
				<h5>Eliminar Asignatura</h5>
				<p>¿Está seguro que desea eliminar esta asignatura?</p>
			</div>
			<div class="modal-footer">
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
				<a id="conf-eliminar-asig" class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">Sí</a>
			</div>
		</div>

		<input value=<?php echo $_smarty_tpl->getVariable('msj')->value;?>
 id="msj-index-asig" name="msj-index-asig" type="hidden">
	</div>
</main>