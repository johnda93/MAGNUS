<?php

require('configs/include.php');

class c_eliminar_asignatura extends super_controller {
	
	private $mensaje = array(
		"exito" => true,
	);

	public function eliminar()
	{
		$cod['asignatura']['id'] = $this->post->id;
		$options['asignatura']['lvl2'] = "one";

		$this->orm->connect();
		$this->orm->read_data(array("asignatura"), $options, $cod);
		$asignatura = $this->orm->get_objects("asignatura");
		$this->orm->close();

		if (is_empty($asignatura)) {
			$mensaje['exito'] = false;
		} else {
			$asignatura = new asignatura($this->post);

			$this->orm->connect();
			$this->orm->delete_data("normal", $asignatura);
			$this->orm->close();
		}

		echo json_encode($this->mensaje);
	}

	public function display() {}
	
	public function run()
	{
		$this->eliminar();
	}
}

$call = new c_eliminar_asignatura();
$call->run();

?>