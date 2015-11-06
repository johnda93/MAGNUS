<?php

require('configs/include.php');

class c_crear_asignatura extends super_controller {
	
	private $mensaje = array(
		"id1" => true,
		"id2" => true,
		"id3" => true,
		"nombre" => true,
		"escuela" => true,
		"creditos1" => true,
		"creditos2" => true,
		);

	public function validar_id_creditos(){
		$asignatura = new asignatura();
		$asignatura->set('id', $this->post->id);
		$asignatura->set('creditos', $this->post->creditos);
		
		if (is_empty($this->post->creditos)) {
			$this->mensaje['creditos1'] = false;
		} else {
			if(!$asignatura->validar_creditos_numerico()){
				$this->mensaje['creditos2'] = false;	
			}
		}

		if (is_empty($this->post->id)) {
			$this->mensaje['id2'] = false;
		} else {
			if($asignatura->validar_id_numerico()){

				$cod['asignatura']['id'] = $this->post->id;
				$options['asignatura']['lvl2'] = "one";

				$this->orm->connect();
				$this->orm->read_data(array("asignatura"), $options, $cod);
				$asignatura = $this->orm->get_objects("asignatura");
				$this->orm->close();
				
				if (!is_empty($asignatura)) {
					$this->mensaje['id1'] = false;
				}
			} else {
				$this->mensaje['id3'] = false;
			}	
		}

		echo json_encode($this->mensaje);
	}

	public function crear() {
		$asignatura = new asignatura();
		$asignatura->set('id', $this->post->id);
		$asignatura->set('creditos', $this->post->creditos);

		if (is_empty($this->post->nombre)) {
			$this->mensaje['nombre'] = false;
		}

		if (is_empty($this->post->escuela)) {
			$this->mensaje['escuela'] = false;
		}

		if (is_empty($this->post->creditos)) {
			$this->mensaje['creditos1'] = false;
		} else if (!$asignatura->validar_creditos_numerico()){
			$this->mensaje['creditos2'] = false;
		}

		if (is_empty($this->post->id)) {
			$this->mensaje['id2'] = false;
		} else if (!$asignatura->validar_id_numerico()) {
			$this->mensaje['id3'] = false;
		} else {
			if ($this->mensaje['nombre'] && $this->mensaje['escuela'] && $this->mensaje['creditos1'] && $this->mensaje['creditos2'] ) {
				$asignatura = new asignatura($this->post);

				$this->orm->connect();
				$this->orm->insert_data("normal", $asignatura);
				$this->orm->close();
			}
		}

		echo json_encode($this->mensaje);
	}

	public function display()
	{
		$this->engine->assign('titulo', "MAGNUS: Administración - Crear Asignatura");
		
		$this->engine->display('admin_header.tpl');
		$this->engine->display('crear_asignatura.tpl');
		$this->engine->display('footer.tpl');
	}	
	
	public function run()
	{
		try {
			if($_SERVER['REQUEST_METHOD'] === 'POST'){
				$this->{$this->get->option}();
			} else {
				$this->display();
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

$call = new c_crear_asignatura();
$call->run();

?>