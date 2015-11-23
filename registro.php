<?php

require('configs/include.php');
require('modules/m_phpass/PasswordHash.php');

class c_registro extends super_controller {

	private $mensaje = array(
		"nombre1" => true,
		"nombre2" => true,
		"contraseña1" => true,
		"contraseña2" => true,
		"contraseña3" => true,
	);

	public function validar_nombre() {

		if (is_empty($this->post->nombre_registro)) {
			$this->mensaje['nombre1'] = false;
		} else {
			$cod['usuario_registrado']['nombre'] = $this->post->nombre_registro;
			$options['usuario_registrado']['lvl2'] = "one";
			$this->orm->connect();
			$this->orm->read_data(array("usuario_registrado"), $options, $cod);
			$usuario_registrado = $this->orm->get_objects("usuario_registrado");
			$this->orm->close();
			if (!is_empty($usuario_registrado[0])) {
				$this->mensaje['nombre2'] = false;		

			}else{
				$cod['usuario_administrador']['nombre'] = $this->post->nombre_registro;
				$options['usuario_administrador']['lvl2'] = "one";
				$this->orm->connect();
				$this->orm->read_data(array("usuario_administrador"), $options, $cod);
				$usuario_administrador = $this->orm->get_objects("usuario_administrador");
				$this->orm->close();

				if (!is_empty($usuario_administrador[0])) {
					$this->mensaje['nombre2'] = false;
				}
			}
		}
		
		echo json_encode($this->mensaje);
	}

	public function registrar(){
		
		if (is_empty($this->post->nombre_registro)) {
			$this->mensaje['nombre1'] = false;
		}
		if (is_empty($this->post->contraseña_registro)) {
			$this->mensaje['contraseña1'] = false;
		}
		if (is_empty($this->post->contraseña2_registro)) {
			$this->mensaje['contraseña2'] = false;
		} else {
			if($this->mensaje['contraseña1']){
				if($this->post->contraseña2_registro != $this->post->contraseña_registro){
					$this->mensaje['contraseña3'] = false;
				}
			}

			if ($this->mensaje['nombre1'] && $this->mensaje['contraseña1'] && $this->mensaje['contraseña2'] && $this->mensaje['contraseña3']){
				$usuario_registrado = new usuario_registrado();
				$usuario_registrado->set('nombre', $this->post->nombre_registro);
				$usuario_registrado->set('contraseña', $this->post->contraseña_registro);
				$this->orm->connect();
				$this->orm->insert_data("normal", $usuario_registrado);
				$this->orm->close();
			}
		}
		echo json_encode($this->mensaje);
	}

	public function display()
	{
	}
	
	public function run()
	{
		try {
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				$this->{$this->get->option}();
			}
		} catch (Exception $e) {
			$mensaje_exc = $e->getMessage();
			$arr = explode(' ', trim($mensaje_exc));
			if ($arr[0] === "Duplicate") {
				$this->mensaje['nombre2'] = false;
			}
			echo json_encode($this->mensaje);
		}
	}
}


$call = new c_registro();
$call->run();

?>