<main>
	<div id="div-principal-login" class="white">
		<div class="row">
			<div class="col s3">
				<div class="login-item z-depth-1"> 
					<b>Iniciar Sesión</b> 
				
					<div class="row"> 
						<form class="col s12" action="{$gvar.l_global}login.php" method="POST"> 
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