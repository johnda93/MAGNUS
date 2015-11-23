<?php

require('configs/include.php');

class c_eliminar_grupo extends super_controller {
	
	private $mensaje = array(
		"exito" => true,
	);

	public function eliminar()
	{
		$cod['grupo']['id'] = $this->post->id;
		$options['grupo']['lvl2'] = "one";

		$this->orm->connect();
		$this->orm->read_data(array("grupo"), $options, $cod);
		$grupo = $this->orm->get_objects("grupo");
		$this->orm->close();

		if (is_empty($grupo)) {
			$mensaje['exito'] = false;
		} else {
			$grupo = new grupo($this->post);

			$this->orm->connect();
			$this->orm->delete_data("normal", $grupo);
			$this->orm->close();
		}

		echo json_encode($this->mensaje);
	}

	public function display() {}
	
	public function run()
	{
		$this->comrpobar_permisos();
		$this->eliminar();
	}
}

$call = new c_eliminar_grupo();
$call->run();

?>