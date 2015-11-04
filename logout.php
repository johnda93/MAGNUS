<?php

require('configs/include.php');

class c_logout extends super_controller {
	
	public function logout(){

		unset($_SESSION['usuario']['usuario']);
		unset($_SESSION['usuario']['tipo']);
		$this->session = $_SESSION;
	}

	public function display()
	{
	}
	
	public function run()
	{
		header("Location: " . $gvar['l_global'] . "login.php");
			
	}
}

$call = new c_logout();
$call->run();

?>
