<?php /* Smarty version Smarty-3.0.9, created on 2015-10-24 02:23:20
         compiled from "C:/xampp/htdocs/MAGNUS/templates\index_profesor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2334562acf78e05f27-92341673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48b75ebaebfa54e30524e593e388e17c30ed6443' => 
    array (
      0 => 'C:/xampp/htdocs/MAGNUS/templates\\index_profesor.tpl',
      1 => 1445645930,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2334562acf78e05f27-92341673',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
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
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->getVariable('profesores')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<td><?php echo $_smarty_tpl->getVariable('profesores')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('nombre');?>
</td>
					<td><?php echo $_smarty_tpl->getVariable('profesores')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('escuela');?>
</td>
					<td>
						<a href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
editar_profesor.php?id=<?php echo $_smarty_tpl->getVariable('profesores')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('id');?>
">
							<i class="material-icons center action-icons">create</i>
						</a>
						<a class="prof-delete-button" href="#modal-prof-delete">
							<i class="material-icons center action-icons">delete</i>
							<form action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
eliminar_profesor.php" method="POST">
								<input value="<?php echo $_smarty_tpl->getVariable('profesores')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]->get('id');?>
" id="id" name="id" type="hidden">
							</form>
						</a>
					</td>
				</tr>
				<?php endfor; endif; ?>
			</tbody>
		</table>

		<a style="margin-top: 20px;" class="waves-effect waves-light green lighten-1 btn" href="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
crear_profesor.php">
			<i class="material-icons left">add</i>
			Crear Profesor
		</a>

		<div id="modal-prof-delete" class="modal">
			<div class="modal-content">
				<h5>Eliminar Profesor</h5>
				<p>¿Está seguro que desea eliminar este profesor?</p>
			</div>
			<div class="modal-footer">
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">No</a>
				<a id="conf-prof-delete" class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">Sí</a>
			</div>
		</div>
	</div>
</main>