<?php 
class UsersController {
	private $model;

	public function __construct() {
		$this->model = new UsersModel();
	}

	public function set( $user_data = array() ) {
		return $this->model->set($user_data);
	}

	public function asignarCuenta( $user_data = array() ) {
		return $this->model->asignarCuenta($user_data);
	}

	public function getBuscar( $dni_per) {
		return $this->model->getBuscar($dni_per);
	}

	public function get( $user_id = '' ) {
		return $this->model->get($user_id);
	}

	public function del( $user_id = '' ) {
		return $this->model->del($user_id);
	}

}