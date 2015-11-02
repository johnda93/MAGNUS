<?php

require('configs/include.php');

class c_index_asignatura extends super_controller {
	
	public function display()
	{
		$options['asignatura']['lvl2'] = "all";

		$this->orm->connect();
		$this->orm->read_data(array("asignatura"), $options);
		$asignaturas = $this->orm->get_objects("asignatura");
		$this->orm->close();

		$this->engine->assign('titulo', "MAGNUS: Administración - Asignaturas");

		if ($_SESSION['redirected']) {
			$_SESSION['redirected'] = false;

			$this->engine->assign('msj', $this->get->msj);
		} else {
			if (isset($this->get->msj)) {
				header("Location: " . $gvar['l_global'] . "index_asignatura.php");
				die();
			}
		}

		$this->engine->assign('asignaturas', $asignaturas);
		
		$this->engine->display('admin_header.tpl');
		$this->engine->display('index_asignatura.tpl');
		$this->engine->display('footer.tpl');
	}
	
	public function run()
	{
		$this->display();
	}
}

$call = new c_index_asignatura();
$call->run();

?>