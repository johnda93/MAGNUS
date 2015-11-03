<?php

require('configs/include.php');

class c_login extends super_controller {
	
	public function login(){

		$options['usuario_registrado']['lvl2'] = "one_login_user";
		$cod['usuario_registrado']['nombre'] = $this->post->nombre;
		$cod['usuario_registrado']['contraseña'] = $this->post->contraseña;

		$options['usuario_administrador']['lvl2'] = "one_login_admin";
		$cod['usuario_administrador']['nombre'] = $this->post->nombre;
		$cod['usuario_administrador']['contraseña'] = $this->post->contraseña;

		$this->orm->connect();
		$this->orm->read_data(array("usuario_registrado", "usuario_administrador"), $options, $cod);
		$user = $this->orm->get_objects("usuario_registrado");
		$admin = $this->orm->get_objects("usuario_administrador");

		$this->orm->close();

		$mensaje = array();
		$mensaje['exito'] = "user";


		if(!is_empty($admin)){
			$mensaje['exito'] = "admin";
			$_SESSION['usuario']['usuario'] = $admin[0]->get('nombre');
			$_SESSION['usuario']['tipo'] = "admin";
			$this->session = $_SESSION;
		}elseif (!is_empty($user)) {
			$mensaje['exito'] = "user";
			$_SESSION['usuario']['usuario'] = $user[0]->get('nombre');
			$_SESSION['usuario']['tipo'] = "user";
			$this->session = $_SESSION;
		}else{
			$mensaje['exito'] = "false";
		}

		echo json_encode($mensaje);
	}

	public function display()
	{
		$this->engine->assign('title',$this->gvar['n_index']);
		
		$this->engine->display('admin_header.tpl');
		$this->engine->display('login.tpl');
		$this->engine->display('footer.tpl');
	}
	
	public function run()
	{
		try {
			if (isset($this->post->nombre)) {
				$this->login();
			} else {
				$this->display();
			}
		} catch (Exception $e) {
		}
		
	}
}

$call = new c_login();
$call->run();

?>
