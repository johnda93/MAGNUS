<?php /* Smarty version Smarty-3.0.9, created on 2015-11-05 20:36:17
         compiled from "C:/xampp/htdocs/MAGNUS/templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7110563bafb1f2af15-03665627%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '101d4aae4fb8e2b4d80a4a59cc0dee847ce1ffc8' => 
    array (
      0 => 'C:/xampp/htdocs/MAGNUS/templates\\login.tpl',
      1 => 1446752092,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7110563bafb1f2af15-03665627',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<main>
	<div id="div-principal-login" class="white container principal z-depth-1">
		<h5 class="center-align">Iniciar Sesión</h5>

		<div class="row">
			<form class="col s6" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
login.php" method="POST">
				<div class="row">
					<div class="input-field col s12">
						<input id="nombre" name="nombre" type="text" class="validate">
          				<label for="nombre">Nombre de usuario</label>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s12">
						<input id="contraseña" name="contraseña" type="password" class="validate">
          				<label for="contraseña">Contraseña</label>
					</div>
				</div>
			</form>
		</div>
		<div class="row botones-inferiores">
				<div class="col s4">
					<div class="container">
						<a id="conf-login" class="waves-effect waves-light green lighten-1 btn" >
							<i class="material-icons left">vpn_key</i>
							Entrar
						</a>
					</div>
				</div>
			</div>
		</div>

		<input value=<?php echo $_smarty_tpl->getVariable('permisos')->value;?>
 id="permiso-login" name="permiso-login" type="hidden">
</main>