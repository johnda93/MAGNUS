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
			$cod['grupo']['asignatura'] = $this->post->asignatura;
			$options['grupo']['lvl2'] = "by_asignatura";

			$this->orm->connect();
			$this->orm->read_data(array("grupo"), $options, $cod);
			$grupos = $this->orm->get_objects("grupo", $components);
			$this->orm->close();

			$cont = 1;

			if (!is_empty($grupos)) {
				$ids = array();

				foreach ($grupos as $grupo) {
					$arr = explode('-', trim($grupo->get('id')));
					$id = $arr[1] + 0;
					array_push($ids, $id);
				}

				if (!is_empty($ids)) {
					sort($ids);
				}

				foreach ($ids as $id) {
					if ($cont < $id) {
						break;
					} else {
						$cont++;
					}
				}
			}

			$id = $this->post->asignatura . "-" . $cont;

			$grupo = new grupo($this->post);
			$grupo->set('id', $id);

			$this->orm->connect();
			$this->orm->insert_data("normal", $grupo);
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