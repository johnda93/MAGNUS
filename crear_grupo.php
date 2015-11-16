<?php

require('configs/include.php');

class c_crear_grupo extends super_controller {
	
	private $mensaje = array(
    	"profesor" => true,
    	"horario" => true,
	);

	public function listar_profesores()
	{
		$options['profesor']['lvl2'] = "all";

		$this->orm->connect();
		$this->orm->read_data(array("profesor"), $options);
		$profesores = $this->orm->get_objects("profesor");
		$this->orm->close();

		echo json_encode($profesores, JSON_UNESCAPED_UNICODE);
	}

	public function crear()
	{
		if (is_empty($this->post->profesor1)) {
			$this->mensaje['profesor'] = false;
		}

		$horario = json_decode($this->post->horario);

		if (count($horario) < 2) {
			$this->mensaje['horario'] = false;
		}

		if ($this->mensaje['profesor'] && $this->mensaje['horario']) {
			$grupo = new grupo($this->post);

			$this->orm->connect();
			$this->orm->insert_data("normal", $grupo);
			$this->orm->close();
		}

		echo json_encode($this->mensaje);
	}

	public function display() {}
	
	public function run()
	{
		try {
			if($_SERVER['REQUEST_METHOD'] === 'POST'){
				$this->{$this->get->option}();
			}
		} catch (Exception $e) {
			$mensaje = $e->getMessage();
			$arr = explode(' ', trim($mensaje));

			if ($arr[0] === "Duplicate") {
				$this->mensaje['id1'] = false;
			} 

			echo json_encode($this->mensaje);
		}
	}
}

$call = new c_crear_grupo();
$call->run();

?>