<?php

require('configs/include.php');

class c_editar_profesor extends super_controller {
	
	public function display()
	{
		//------------Filtrar grupos por profesores---------------

		$cod['profesor']['id'] = $this->get->id;
		$options['profesor']['lvl2'] = "one";

		$cod['grupo']['profesor1'] = $this->get->id;
		$options['grupo']['lvl2'] = "by_profesor";

		$components['profesor']['grupo'] = array("p1_g", "p2_g");
		$auxiliars['grupo'] = array("nombre_asignatura");

		$this->orm->connect();
		$this->orm->read_data(array("profesor", "grupo"), $options, $cod);
		$profesor = $this->orm->get_objects("profesor", $components, $auxiliars);
		$this->orm->close();

		$horarios1 = array();

		if (!is_empty($profesor[0]->components['grupo']['p1_g'])) {
			foreach ($profesor[0]->components['grupo']['p1_g'] as $grupo) {
				$horario = json_decode($grupo->get('horario'));

				array_push($horarios1, $horario);
			}
		}

		$horarios2 = array();

		if (!is_empty($profesor[0]->components['grupo']['p2_g'])) {
			foreach ($profesor[0]->components['grupo']['p2_g'] as $grupo) {
				$horario = json_decode($grupo->get('horario'));

				array_push($horarios2, $horario);
			}
		}
		

		//--------------------------------------------------------

		$this->engine->assign('title', "MAGNUS: Administración - Profesores");
		$this->engine->assign('profesor', $profesor[0]);
		$this->engine->assign('horarios1', $horarios1);
		$this->engine->assign('horarios2', $horarios2);

		
		$this->engine->display('admin_header.tpl');
		$this->engine->display('editar_profesor.tpl');
		$this->engine->display('footer.tpl');
	}
	
	public function run()
	{
		$this->display();
	}
}

$call = new c_editar_profesor();
$call->run();

?>