<?php

require('configs/include.php');

class c_editar_asignatura extends super_controller {
	
	public function display()
	{
		$cod['asignatura']['id'] = $this->get->id;
		$options['asignatura']['lvl2'] = "one";

		$this->orm->connect();
		$this->orm->read_data(array("asignatura"), $options, $cod);
		$asignatura = $this->orm->get_objects("asignatura");
		$this->orm->close();

		$cod['grupo']['asignatura'] = $this->get->id;
		$options['grupo']['lvl2'] = "by_asignatura";
		$options['profesor']['lvl2'] = "all";

		$components['grupo']['profesor'] = array("p1_g", "p2_g");

		$this->orm->connect();
		$this->orm->read_data(array("profesor", "grupo"), $options, $cod);
		$grupos = $this->orm->get_objects("grupo", $components);
		$this->orm->close();
		
		$horarios = array();

		if (!is_empty($grupos)) {
			foreach ($grupos as $grupo) {
				$horario = json_decode($grupo->get('horario'));

				array_push($horarios, $horario);
			}
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$asignatura = new asignatura($this->post);
			
			$this->orm->connect();
			$this->orm->update_data("normal", $asignatura);
			$this->orm->close();

			session_start();
			$_SESSION['redirected'] = true;

			header("Location: " . $gvar['l_global'] . "index_asignatura.php?msj=exito-editar-asig");
			die();
		}

		$this->engine->assign('title', "MAGNUS: Administración - Asignaturas");
		$this->engine->assign('asignatura', $asignatura[0]);
		$this->engine->assign('grupos', $grupos);
		$this->engine->assign('horarios', $horarios);

		if ($_SESSION['redirected']) {
			$_SESSION['redirected'] = false;

			$this->engine->assign('msj', $this->get->msj);
		} else {
			if (isset($this->get->msj)) {
				$id_asig = $this->get->id;

				header("Location: " . $gvar['l_global'] . "editar_asignatura.php?id=$id_asig");
				die();
			}
		}
		
		$this->engine->display('admin_header.tpl');
		$this->engine->display('editar_asignatura.tpl');
		$this->engine->display('footer.tpl');
	}
	
	public function run()
	{
		$this->display();
	}
}

$call = new c_editar_asignatura();
$call->run();

?>