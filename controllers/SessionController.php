<?php
class SessionController {
	private $session;
	//Función que instancia un nuevo modelo de usuario
	public function __construct() {
		$this->session = new UsersModel();
	}
	//Función que valida los datos de un usuario al logearse
	//Atributos: (String) Nombre de usuario, (String) Contraseña
	public function login($user, $pass) {
		return $this->session->validate_user($user, $pass);
	}
// Autor @Carlos Orellano Rondan - Orellano428@gmail.com
// https://github.com/Cali99-droid
	//Función que permite cerrar la sesión
	public function logout() {
		session_start();
		session_destroy();
		header('Location: ./');
	}
}
