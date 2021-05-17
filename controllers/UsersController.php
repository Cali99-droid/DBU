<?php 
/**
 * Controlador de Usuario
 */
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

	//funcion para asignar una cuenta a una persona
	//Parametro datos de asignacion
	public function asignarCuenta( $user_data = array() ) {
		return $this->model->asignarCuenta($user_data);
	}
    
	/**funcion que obtiene un usuario
	 * 
	 * param id de usuario
	*/
	public function get( $user_id = '' ) {
		return $this->model->get($user_id);
	}
	//Función que permite eliminar datos de un usuario
	//Parámetros: ID de usuario
	public function del( $user_id = '' ) {
		return $this->model->del($user_id);
	}

	/**funcion que buscar un usuario
	 * 
	 * param DNI usuario
	*/
	public function getBuscar( $dni_per) {
		return $this->model->getBuscar($dni_per);
	}
    /**funcion que actualiza un usuario
	 * 
	 * param DNI usuario
	*/
	public function update( $usuario_data = array() ) {
		return $this->model->update($usuario_data);
	}

    /**funcion que obtiene un usuario
	 * 
	 * param id de usuario
	*/
	public function getUsuario( $user = '' ) {
		return $this->model->getUsuario($user);
	}
}
