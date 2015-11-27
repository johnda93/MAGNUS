<?php

require('configs/include.php');

class c_index_profesor extends super_controller {
	
	public function display()
	{
		$options['profesor']['lvl2'] = "all";

		$this->orm->connect();
		$this->orm->read_data(array("profesor"), $options);
		$profesores = $this->orm->get_objects("profesor");
		$this->orm->close();

		$this->engine->assign('title', "MAGNUS: Administración - Profesores");
		$this->engine->assign('profesores', $profesores);
		
		$this->engine->display('admin_header.tpl');
		$this->engine->display('index_profesor.tpl');
		$this->engine->display('footer.tpl');
	}
	
	public function run()
	{
		$this->display();
	}
}

$call = new c_index_profesor();
$call->run();

?>