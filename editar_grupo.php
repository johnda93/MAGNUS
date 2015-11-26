<?php

require('configs/include.php');

class c_crear_grupo extends super_controller {
	
	private $mensaje = array(
    	"profesor" => true,
    	"horario" => true,
	);

	public function listar()
	{
		$id_grupo = $this->get->id;

		$cod['grupo']['id'] = $id_grupo;
		$options['grupo']['lvl2'] = "one";

		$this->orm->connect();
		$this->orm->read_data(array("grupo"), $options, $cod);
		$grupo = $this->orm->get_objects("grupo");
		$this->orm->close();

		$options['profesor']['lvl2'] = "all";

		$this->orm->connect();
		$this->orm->read_data(array("profesor"), $options);
		$profesores = $this->orm->get_objects("profesor");
		$this->orm->close();

		$resultado = array(
			"profesores" => $profesores,
			"profesor1" => $grupo[0]->get('profesor1'),
			"profesor2" => $grupo[0]->get('profesor2'),
			"horario" => $grupo[0]->get('horario')
		);

		echo json_encode($resultado, JSON_UNESCAPED_UNICODE);
	}

	public function editar()
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
			$this->orm->update_data("normal", $grupo);
			$this->orm->close();
		}

		echo json_encode($this->mensaje);
	}

	public function display() {}
	
	public function run()
	{

		$this->comrpobar_permisos();
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