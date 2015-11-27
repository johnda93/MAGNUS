<?php

require('configs/include.php');

class c_index_carrera extends super_controller {

	public function display()
	{
		$cod['carrera']['id'] = $this->get->id;
		$options['carrera']['lvl2'] = "one";

		$this->orm->connect();
		$this->orm->read_data(array("carrera"), $options, $cod);
		$carrera = $this->orm->get_objects("carrera");
		$this->orm->close();

		$cod['asignatura']['carrera'] = $this->get->id;
		$options['asignatura']['lvl2'] = "by_carrera";
		$auxiliars['asignatura'] = array('obligatoria','componente');

		$this->orm->connect();
		$this->orm->read_data(array("asignatura"), $options, $cod);
		$asignaturas = $this->orm->get_objects("asignatura",NULL, $auxiliars);
		$this->orm->close();

		$this->engine->assign('titulo', "MAGNUS: " . $carrera[0]->get('nombre'));
		$this->engine->assign('usuario', $_SESSION['usuario']['usuario']);
		$this->engine->assign('carrera', $carrera[0]);
		$this->engine->assign('asignaturas', $asignaturas);
		
		$this->engine->display('header.tpl');
		$this->engine->display('index_carrera.tpl');
		$this->engine->display('footer.tpl');
	}
	
	public function run()
	{
		$this->display();
	}
}

$call = new c_index_carrera();
$call->run();

?>