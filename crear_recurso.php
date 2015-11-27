<?php

require('configs/include.php');

class c_crear_recurso extends super_controller {

	public function crear()
	{
		$directorio = $gvar['l_global'] . "files/";
		$archivo = $directorio . basename($_FILES["archivo"]["name"]);

		move_uploaded_file($_FILES["archivo"]["tmp_name"], $archivo);

		$recurso = new recurso($this->post);

		$this->orm->connect();
		$this->orm->insert_data("normal", $recurso);
		$this->orm->close();

		header("Location: " . $gvar['l_global'] . "asignatura.php?id=" . $this->post->asignatura . "&option=ver_recursos");
	}

	public function display() {}
	
	public function run()
	{
		$this->crear();
	}
}

$call = new c_crear_recurso();
$call->run();

?>