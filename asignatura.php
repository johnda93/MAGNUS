<?php

require('configs/include.php');

class c_asignatura extends super_controller {

	public function ver_recursos()
	{
		$cod['asignatura']['id'] = $this->get->id;
		$options['asignatura']['lvl2'] = "one";

		$this->orm->connect();
		$this->orm->read_data(array("asignatura"), $options, $cod);
		$asignatura = $this->orm->get_objects("asignatura");
		$this->orm->close();

		$cod['recurso']['asignatura'] = $this->get->id;
		$options['recurso']['lvl2'] = "by_asignatura";
		$auxiliars['asignatura'] = array('nombre_usuario');

		$this->orm->connect();
		$this->orm->read_data(array("recurso"), $options, $cod);
		$recursos = $this->orm->get_objects("recurso");
		$this->orm->close();

		$this->engine->assign('titulo', "MAGNUS: " . $asignatura[0]->get('nombre')) . " - Recursos";
		$this->engine->assign('usuario', $_SESSION['usuario']['usuario']);
		$this->engine->assign('asignatura', $asignatura[0]);
		$this->engine->assign('recursos', $recursos);

		$this->engine->display('header.tpl');
		$this->engine->display('recursos.tpl');
		$this->engine->display('footer.tpl');
	}

	public function display()
	{
		if(!is_empty($_SESSION)){
			$this->engine->assign('session', "true");

			$cod['opinion_asignatura']['usuario'] = $_SESSION['usuario']['usuario'];
			$cod['opinion_asignatura']['asignatura'] = $this->get->id;
			$options['opinion_asignatura']['lvl2'] = "by_usuario_asignatura";
			
			$this->orm->connect();
			$this->orm->read_data(array("opinion_asignatura"), $options, $cod);
			$opinion = $this->orm->get_objects("opinion_asignatura");
			$this->orm->close();

			if(!is_empty($opinion)){
				$this->engine->assign('puede_opinar_asignatura', "false");				
			}
		}

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

		$cod['opinion_asignatura']['asignatura'] = $this->get->id;
		$options['opinion_asignatura']['lvl2'] = "by_asignatura";

		$this->orm->connect();
		$this->orm->read_data(array("opinion_asignatura"), $options, $cod);
		$opiniones = $this->orm->get_objects("opinion_asignatura");
		$this->orm->close();

		$this->engine->assign('titulo', "MAGNUS: " . $asignatura[0]->get('nombre'));
		$this->engine->assign('usuario', $_SESSION['usuario']['usuario']);
		$this->engine->assign('asignatura', $asignatura[0]);
		$this->engine->assign('horarios', $horarios);
		$this->engine->assign('grupos', $grupos);
		$this->engine->assign('opiniones', $opiniones);

		$this->engine->display('header.tpl');
		$this->engine->display('asignatura.tpl');
		$this->engine->display('footer.tpl');
	}
	
	public function run()
	{
		if (isset($this->get->option)) {
			$this->{$this->get->option}();
		} else {
			$this->display();
		}
	}
}

$call = new c_asignatura();
$call->run();

?>