<?php 
class Router {
	public $route;

	public function __construct($route) {
		//http://php.net/manual/es/function.session-start.php
		//http://php.net/manual/es/session.configuration.php
		//buscar opciones en el PHP.INI
		$session_options = array(
			'use_only_cookies' => 1,
			'auto_start' => 1,
			'read_and_close' => true
		);

		if( !isset($_SESSION) )  session_start($session_options);

		if( !isset($_SESSION['ok']) )  $_SESSION['ok'] = false;


		if($_SESSION['ok']) {
			//Aquí va toda la programación de nuestra webapp

				$this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
				//$_SESSION['tit'] = "de Psicologia";
		

			$controller = new ViewController();

			switch ($this->route) {
				case 'home':
					$controller->load_view('home');
					break;

				case 'psicologia':
					if( !isset( $_POST['r'] ) )  $controller->load_view('psicologia/psicologia');
					else if( $_POST['r'] == 'psicologia-add' )  $controller->load_view('psicologia/psicologia-add');
					else if( $_POST['r'] == 'psicologia-edit' )  $controller->load_view('psicologia/psicologia-edit');
					else if( $_POST['r'] == 'psicologia-delete' )  $controller->load_view('psicologia/psicologia-delete');
					else if( $_POST['r'] == 'psicologia-report' )  $controller->load_login('psicologia/psicologia-report');
					break;

				case 'medicina':
					if( !isset( $_POST['r'] ) )  $controller->load_view('medico/medicina');
					else if( $_POST['r'] == 'medicina-add' )  $controller->load_view('medico/medicina-add');
					else if( $_POST['r'] == 'medicina-edit' )  $controller->load_view('medico/medicina-edit');
					else if( $_POST['r'] == 'medicina-delete' )  $controller->load_view('medico/medicina-delete');
					else if( $_POST['r'] == 'medico-report' )  $controller->load_login('medico/medico-report');
					break;

				case 'topico':
					if( !isset( $_POST['r'] ) )  $controller->load_view('topico/topico');
					else if( $_POST['r'] == 'topico-add' )  $controller->load_view('topico/topico-add');
					else if( $_POST['r'] == 'historial-add' )  $controller->load_view('topico/historial-add');
					else if( $_POST['r'] == 'topico-report' )  $controller->load_login('topico/topico-report');
					break;

				case 'salir':
					$user_session = new SessionController();
					$user_session->logout();
					break;
				
				default:
					$controller->load_view('error404');
				//	$user_session = new SessionController();
				//	$user_session->logout();
					break;
			}
		} else {
			if( !isset($_POST['user']) && !isset($_POST['pass']) ) {
				//mostrar un formulario de autenticación
				$login_form = new ViewController();
				$login_form->load_login('login');
			}
			else {
				$user_session = new SessionController();
				$session = $user_session->login($_POST['user'], $_POST['pass']);

				if( empty($session) ) {
					//echo 'El usuario y el password son incorrectos';
					$login_form = new ViewController();
					$login_form->load_login('login');
					header('Location: ./?error=El usuario ' . $_POST['user'] . ' y el password proporcionado no coinciden');
				} else {
					//echo 'El usuario y el password son correctos';
					//var_dump($session);
					
					$_SESSION['ok'] = true;

					foreach ($session as $row) {
						$_SESSION['nombre'] = $row['nombre'];
						$_SESSION['rol'] = $row['rol'];
					//	$_SESSION['idrol'] = $row['idrol'];
					}
					header('Location: ./');
				}
			}
		}
	}


}