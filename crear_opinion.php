<?php

require('configs/include.php');

class c_crear_opinion extends super_controller {

	public function crear_opinion_asignatura()
	{
		$opinion = new opinion_asignatura($this->post);

		$this->orm->connect();
		$this->orm->insert_data("normal", $opinion);
		$this->orm->close();
	}

	public function crear_opinion_profesor()
	{
		$opinion = new opinion_profesor($this->post);

		$this->orm->connect();
		$this->orm->insert_data("normal", $opinion);
		$this->orm->close();
	}

	public function display() {}
	
	public function run()
	{
		$this->{$this->get->option}();
	}
}

$call = new c_crear_opinion();
$call->run();

?>