<?php

require('configs/include.php');

class c_crear_asignatura extends super_controller {
	
	public function crear() {
		$options['asignatura']['lvl2'] = "all";

		$this->orm->connect();
		$this->orm->read_data(array("asignatura"), $options);
		$asignaturas = $this->orm->get_objects("asignatura");
		$this->orm->close();

		$this->engine->assign('asignaturas', json_encode($asignaturas, JSON_UNESCAPED_UNICODE));

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (is_empty($this->post->id) || is_empty($this->post->nombre) || is_empty($this->post->escuela)) {
				session_start();
				$_SESSION['redirected'] = true;

				header("Location: " . $gvar['l_global'] . "crear_asignatura.php?msj=error-crear-asig-campos");
				die();
			}

			$asignatura = new asignatura($this->post);
			
			$this->orm->connect();
			$this->orm->insert_data("normal", $asignatura);
			$this->orm->close();

			session_start();
			$_SESSION['redirected'] = true;

			header("Location: " . $gvar['l_global'] . "index_asignatura.php?msj=exito-crear-asig");
			die();
		}
	}

	public function display()
	{
		$this->engine->assign('title', "MAGNUS: Administración - Crear Asignatura");

		if ($_SESSION['redirected']) {
			$_SESSION['redirected'] = false;

			$this->engine->assign('msj', $this->get->msj);
		} else {
			if (isset($this->get->msj)) {
				header("Location: " . $gvar['l_global'] . "crear_asignatura.php");
				die();
			}
		}
			
		$this->engine->display('admin_header.tpl');
		$this->engine->display('crear_asignatura.tpl');
		$this->engine->display('footer.tpl');
	}	
	
	public function run()
	{
		try {
			$this->crear();
		} catch (Exception $e) {
			session_start();
			$_SESSION['redirected'] = true;

			header("Location: " . $gvar['l_global'] . "crear_asignatura.php?msj=error-crear-asig-id");
			die();
		}

		$this->display();
	}
}

$call = new c_crear_asignatura();
$call->run();

?>