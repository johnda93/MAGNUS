<?php

require('configs/include.php');

class c_editar_profesor extends super_controller {
	private $mensaje = array(
		"id1" => true,
		"id2" => true,
		"id3" => true,
		"id4" => true,
		"nombre" => true,
		"escuela" => true,
	);

	public function validar_id() {
		$profesor = new profesor();
		$profesor->set('id', $this->post->id);

		if (is_empty($this->post->id)) {
			$this->mensaje['id2'] = false;
		} else {
			if ($profesor->validar_id_numerico()) {
				if($this->post->id_viejo != $this->post->id){
					$cod['profesor']['id'] = $this->post->id;
					$options['profesor']['lvl2'] = "one";

					$this->orm->connect();
					$this->orm->read_data(array("profesor"), $options, $cod);
					$profesor = $this->orm->get_objects("profesor");
					$this->orm->close();

					if (!is_empty($profesor)) {
						$this->mensaje['id1'] = false;
					}
				}
			} else {
				$this->mensaje['id3'] = false;
			}	
		}
		
		echo json_encode($this->mensaje);
	}
	
	public function editar() {
		$profesor = new profesor();
		$profesor->set('id', $this->post->id);

		if (is_empty($this->post->nombre)) {
			$this->mensaje['nombre'] = false;
		}

		if (is_empty($this->post->escuela)) {
			$this->mensaje['escuela'] = false;
		}

		if (is_empty($this->post->id)) {
			$this->mensaje['id2'] = false;
		} else if (!$profesor->validar_id_numerico()) {
			$this->mensaje['id3'] = false;
		} else {
			if ($this->mensaje['nombre'] && $this->mensaje['escuela']) {
				$profesor = new profesor($this->post);
				$profesor->auxiliars['id_viejo']  = $this->post->id_viejo;

				$this->orm->connect();
				$this->orm->update_data("normal", $profesor);
				$this->orm->close();
			}
		}

		echo json_encode($this->mensaje);
	}

	public function display()
	{
		//------------Filtrar grupos por profesores---------------

		$cod['profesor']['id'] = $this->get->id;
		$options['profesor']['lvl2'] = "one";

		$cod['grupo']['profesor1'] = $this->get->id;
		$options['grupo']['lvl2'] = "by_profesor";

		$components['profesor']['grupo'] = array("p1_g", "p2_g");
		$auxiliars['grupo'] = array("nombre_asignatura");

		$this->orm->connect();
		$this->orm->read_data(array("profesor", "grupo"), $options, $cod);
		$profesor = $this->orm->get_objects("profesor", $components, $auxiliars);
		$this->orm->close();

		$horarios1 = array();

		if (!is_empty($profesor[0]->components['grupo']['p1_g'])) {
			foreach ($profesor[0]->components['grupo']['p1_g'] as $grupo) {
				$horario = json_decode($grupo->get('horario'));

				array_push($horarios1, $horario);
			}
		}

		$horarios2 = array();

		if (!is_empty($profesor[0]->components['grupo']['p2_g'])) {
			foreach ($profesor[0]->components['grupo']['p2_g'] as $grupo) {
				$horario = json_decode($grupo->get('horario'));

				array_push($horarios2, $horario);
			}
		}		

		//--------------------------------------------------------

		$this->engine->assign('title', "MAGNUS: Administración - Profesores");
		$this->engine->assign('profesor', $profesor[0]);
		$this->engine->assign('horarios1', $horarios1);
		$this->engine->assign('horarios2', $horarios2);

		
		$this->engine->display('admin_header.tpl');
		$this->engine->display('editar_profesor.tpl');
		$this->engine->display('footer.tpl');
	}
	
	public function run()
	{
		try {
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$this->{$this->get->option}();
			} else {
				$this->display();
			}
		} catch (Exception $e) {
			$mensaje_exc = $e->getMessage();
			$arr = explode(' ', trim($mensaje_exc));

			if ($arr[0] === "Duplicate") {
				$this->mensaje['id1'] = false;
			}
			if ($arr[0] === "Cannot") {
				$this->mensaje['id4'] = false;
			}

			echo json_encode($this->mensaje);
		}	

	}
}

$call = new c_editar_profesor();
$call->run();

?>