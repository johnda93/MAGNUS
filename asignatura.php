<?php

require('configs/include.php');

class c_asignatura extends super_controller {

	public function display()
	{
		$cod['asignatura']['id'] = $this->get->id;
		$options['asignatura']['lvl2'] = "one";

		$cod['grupo']['asignatura'] = $this->get->id;
		$options['grupo']['lvl2'] = "by_asignatura";
		$options['profesor']['lvl2'] = "all";
		$components['grupo']['profesor'] = array("p1_g", "p2_g");
		$this->orm->connect();
		$this->orm->read_data(array("profesor", "grupo"), $options, $cod);
		$grupos = $this->orm->get_objects("grupo", $components);
		
		$this->orm->read_data(array("asignatura"), $options, $cod);
		$asignatura = $this->orm->get_objects("asignatura");
		$this->orm->close();
		$horarios = array();
		if (!is_empty($grupos)) {
			foreach ($grupos as $grupo) {
				$horario = json_decode($grupo->get('horario'));
				array_push($horarios, $horario);
			}
		}

		$this->engine->assign('titulo', "MAGNUS: " . $asignatura[0]->get('nombre'));
		$this->engine->assign('asignatura', $asignatura[0]);
		$this->engine->assign('horarios', $horarios);
		$this->engine->assign('grupos', $grupos);
		$this->engine->display('header.tpl');
		$this->engine->display('asignatura.tpl');
		$this->engine->display('footer.tpl');
	}
	
	public function run()
	{
		$this->display();
	}
}

$call = new c_asignatura();
$call->run();

?>