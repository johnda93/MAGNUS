<?php

require('configs/include.php');

class c_logout extends super_controller {
	
	public function logout(){
		session_destroy();
		unset($this->session);
	}

	public function display()
	{
	}
	
	public function run()
	{
		$this->logout();
		header("Location: " . $gvar['l_global'] . "index.php");	
	}
}

$call = new c_logout();
$call->run();

?>
