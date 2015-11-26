<?php

require('configs/include.php');
require('modules/m_phpass/PasswordHash.php');

class c_index extends super_controller {

	public function display()
	{
		$options['carrera']['lvl2'] = "all";

		$this->orm->connect();
		$this->orm->read_data(array("carrera"), $options);
		$carreras = $this->orm->get_objects("carrera");
		$this->orm->close();

		$this->engine->assign('titulo', "MAGNUS: Inicio");
		$this->engine->assign('carreras', $carreras);
		
		$this->engine->display('header.tpl');
		$this->engine->display('index.tpl');
		$this->engine->display('footer.tpl');
	}
	
	public function run()
	{
		$this->display();
	}
}

$call = new c_index();
$call->run();

?>