<?php /* Smarty version Smarty-3.0.9, created on 2015-11-23 16:27:12
         compiled from "C:/xampp/htdocs/MAGNUS/templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2952656533050edf2e7-97217417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58988c011802d67e3718843c62365fd1ea7f07ff' => 
    array (
      0 => 'C:/xampp/htdocs/MAGNUS/templates\\index.tpl',
      1 => 1448292400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2952656533050edf2e7-97217417',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<main>
	<div id="div-principal-login" class="white">
		<div class="row">
			<div class="col s3">
				<div class="login-item z-depth-1"> 
					<b>Iniciar Sesión</b> 
				
					<div class="row"> 
						<form class="col s12" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
login.php" method="POST"> 
							<div class="row"> 
								<div class="input-field col s12"> 
									<i class="mdi-action-account-circle prefix"></i> 
									<input id="nombre" name="nombre" type="text" class="validate"> 
									<label for="nombre">Nombre de usuario</label> 
								</div> 
								<div class="input-field col s12"> 
									<i class="mdi-action-https prefix"></i> 
									<input id="contraseña" name="contraseña" type="password" class="validate"> 
									<label for="contraseña">Contraseña</label> 
								</div> 
							</div> 
						</form> 

						<div class="row botones-inferiores-login">
							<div class="col s12">
								<div class="container">
									<a id="conf-login" class="waves-effect waves-light green lighten-1 btn" >
													<i class="material-icons left">vpn_key</i>
													Entrar
												</a>
								</div>
							</div>

							<div class="col s12">
								<div class="container">
									<a id="conf-registrarse" class="waves-effect waves-light green lighten-1 btn boton-registrarse" href="#modal-registrarse">
													<i class="material-icons left">person_add</i>
													Registrarse
												</a>
								</div>
							</div>
						</div>
					</div> 
				</div>

      		</div>

      		<div style="padding-top: 324px"class="col s9 z-depth-1 login-item">
       			<label for="contraseña">MAGNUS</label>  		
      		</div>
		</div>

		<div id="modal-registrarse" class="modal" style="width: 45%;">
			<div class="modal-content">
				<h5>Registro</h5>
				<form class="col s12" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
registro.php" method="POST"> 
							<div class="row"> 
								<div class="input-field col s12"> 
									<i class="mdi-action-account-circle prefix"></i> 
									<input id="nombre_registro" name="nombre_registro" type="text" class="validate"> 
									<label for="nombre_registro">Nombre de usuario</label> 
								</div> 
								<div class="input-field col s12"> 
									<i class="mdi-action-https prefix"></i> 
									<input id="contraseña_registro" name="contraseña_registro" type="password" class="validate"> 
									<label for="contraseña_registro">Contraseña</label> 
								</div> 
								<div class="input-field col s12"> 
									<i class="mdi-action-https prefix"></i> 
									<input id="contraseña2_registro" name="contraseña2_registro" type="password" class="validate"> 
									<label for="contraseña2_registro">Repita la Contraseña</label> 
								</div> 
							</div> 
						</form> 
			</div>
			<div class="modal-footer">
				<a id="conf-registro" class="modal-action waves-effect waves-green btn-flat" href="#!">Registrarse</a>
				<a class="modal-action modal-close waves-effect waves-green btn-flat" href="#!">Cancelar</a>
			</div>
		</div>

	</div>
</main>