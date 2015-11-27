<?php

require('configs/include.php');

class c_eliminar_asignatura extends super_controller {
	
	public function display()
	{
		$cod['asignatura']['id'] = $this->post->id;
		$options['asignatura']['lvl2'] = "one";

		$this->orm->connect();
		$this->orm->read_data(array("asignatura"), $options, $cod);
		$asignatura = $this->orm->get_objects("asignatura");
		$this->orm->close();

		session_start();
		$_SESSION['redirected'] = true;

		if (is_empty($asignatura)) {
			header("Location: " . $gvar['l_global'] . "index_asignatura.php?msj=error-eliminar-asig");
		} else {
			$asignatura = new asignatura($this->post);
		
			$this->orm->connect();
			$this->orm->delete_data("normal", $asignatura);
			$this->orm->close();

			header("Location: " . $gvar['l_global'] . "index_asignatura.php?msj=exito-eliminar-asig");
		}
		
		die();
		
	}
	
	public function run()
	{
		$this->display();
	}
}

$call = new c_eliminar_asignatura();
$call->run();

?>