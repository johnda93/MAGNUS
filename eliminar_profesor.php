<?php

require('configs/include.php');

class c_eliminar_profesor extends super_controller {
	
	public function eliminar()
	{
		$cod['profesor']['id'] = $this->post->id;
		$options['profesor']['lvl2'] = "one";

		$this->orm->connect();
		$this->orm->read_data(array("profesor"), $options, $cod);
		$profesor = $this->orm->get_objects("profesor");
		$this->orm->close();

		$mensaje['exito'] = true;

		if (is_empty($profesor)) {
			$mensaje['exito'] = false;
		} else {
			$profesor = new profesor($this->post);
		
			$this->orm->connect();
			$this->orm->delete_data("normal", $profesor);
			$this->orm->close();
		}

		echo json_encode($mensaje);
	}

	public function display() {}
	
	public function run()
	{
		$this->eliminar();
	}
}

$call = new c_eliminar_profesor();
$call->run();

?>