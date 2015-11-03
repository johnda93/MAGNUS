<?php

require('configs/include.php');

class c_crear_profesor extends super_controller { 

	private $mensaje = array(
		"id1" => true,
		"id2" => true,
		"nombre" => true,
		"escuela" => true,
	);

	public function crear() {
		if (is_empty($this->post->id)) {
			$this->mensaje['id2'] = false;
		} 

		if (is_empty($this->post->nombre)) {
			$this->mensaje['nombre'] = false;
		}

		if (is_empty($this->post->escuela)) {
			$this->mensaje['escuela'] = false;
		}

		if($this->mensaje['id2'] AND $this->mensaje['nombre'] AND $this->mensaje['escuela']) {
			$profesor = new profesor($this->post);

			$this->orm->connect();
			$this->orm->insert_data("normal", $profesor);
			$this->orm->close();
		}
		
	}
	
	public function display()
	{
		$this->engine->assign('titulo', "MAGNUS: Administración - Crear Profesor");
			
		$this->engine->display('admin_header.tpl');
		$this->engine->display('crear_profesor.tpl');
		$this->engine->display('footer.tpl');
	}	
	
	public function run()
	{
		try {
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$this->crear();
			} else {
				$this->display();
			}
		} catch (Exception $e) {
			$mensaje_exc = $e->getMessage();
			$arr = explode(' ', trim($mensaje_exc));

			if ($arr[0] === "Duplicate") {
				$this->mensaje['id1'] = false;
			}
		}

		echo json_encode($this->mensaje);
	}
}

$call = new c_crear_profesor();
$call->run();

?>