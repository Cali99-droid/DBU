<?php 
class UsersController {
	private $model;
	
	//Función que permite instanciar un nuevo modelo de usuario
	public function __construct() {
		$this->model = new UsersModel();
	}
	//Función que permite ingresar datos de un usuario desde el modelo a la vista
	//Parámetros: Conjunto de datos específicos de un usuario
	public function set( $user_data = array() ) {
		return $this->model->set($user_data);
	}



	public function asignarCuenta( $user_data = array() ) {
		return $this->model->asignarCuenta($user_data);
	}

	

	public function get( $user_id = '' ) {
		return $this->model->get($user_id);
	}
	//Función que permite eliminar datos de un usuario
	//Parámetros: ID de usuario
	public function del( $user_id = '' ) {
		return $this->model->del($user_id);
	}
	public function getBuscar( $dni_per) {
		return $this->model->getBuscar($dni_per);
	}
}
