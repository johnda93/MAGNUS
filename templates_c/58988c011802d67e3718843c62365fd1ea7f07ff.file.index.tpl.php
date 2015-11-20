<?php /* Smarty version Smarty-3.0.9, created on 2015-11-20 23:55:28
         compiled from "C:/xampp/htdocs/MAGNUS/templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10801564fa4e067b454-23600141%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58988c011802d67e3718843c62365fd1ea7f07ff' => 
    array (
      0 => 'C:/xampp/htdocs/MAGNUS/templates\\index.tpl',
      1 => 1448060127,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10801564fa4e067b454-23600141',
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
									<a id="conf-login" class="waves-effect waves-light green lighten-1 btn" >
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

	</div>
</main>