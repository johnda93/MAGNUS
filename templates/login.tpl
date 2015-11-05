<main>
	<div id="div-principal-login" class="white container principal z-depth-1">
		<h5 class="center-align">Iniciar Sesión</h5>

		<div class="row">
			<form class="col s6" action="{$gvar.l_global}login.php" method="POST">
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

		<input value={$permisos} id="permiso-login" name="permiso-login" type="hidden">
</main>