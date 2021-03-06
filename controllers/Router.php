<?php 
// Autor @Carlos Orellano Rondan - Orellano428@gmail.com
// https://github.com/Cali99-droid

// clase Router - Ruta para controlar las vistas por POST o HREF
class Router {
	public $route;
    
	//Funcion Constructor de enrutador
	//PARAM: la ruta que se iniciara
	public function __construct($route) {
		
		//Opciones de session
		$session_options = array(
			'use_only_cookies' => 1,
			'auto_start' => 1,
			'read_and_close' => true
		);
        
		//Verifica que se haya iniciado session
		if( !isset($_SESSION) )  session_start($session_options);

		if( !isset($_SESSION['ok']) )  $_SESSION['ok'] = false;


		if($_SESSION['ok']) {
			//Aquí va toda la programación de nuestra webapp
          
				$this->route = isset($_GET['r']) ? $_GET['r'] : 'home';
				//$_SESSION['tit'] = "de Psicologia";
				
		
            //instancia un controllador de vista
			$controller = new ViewController();
             
			// swicth que evalua el las ruta segun la interaccion del usuario
			//
			switch ($this->route) {

				case 'home':
					$controller->load_view('home');
					break;

				case 'psicologia':
					if( !isset( $_POST['r'] ) )  $controller->load_view('psicologia/psicologia');
					else if( $_POST['r'] == 'psicologia-add' )  $controller->load_view('psicologia/psicologia-add');
					else if( $_POST['r'] == 'psicologia-edit' )  $controller->load_view('psicologia/psicologia-edit');
					else if( $_POST['r'] == 'psicologia-delete' )  $controller->load_view('psicologia/psicologia-delete');
					else if( $_POST['r'] == 'psicologia-buscar' )  $controller->load_view('psicologia/psicologia-buscar');
					else if( $_POST['r'] == 'psicologia-report' )  $controller->load_login('psicologia/psicologia-report');
					else if( $_POST['r'] == 'psicologia-estadis' )  $controller->load_view('psicologia/psicologia-estadis');
					break;

				case 'medicina':
					if( !isset( $_POST['r'] ) )  $controller->load_view('medico/medicina');
					else if( $_POST['r'] == 'medicina-add' )  $controller->load_view('medico/medicina-add');
					else if( $_POST['r'] == 'medicina-edit' )  $controller->load_view('medico/medicina-edit');
					else if( $_POST['r'] == 'medicina-delete' )  $controller->load_view('medico/medicina-delete');
					else if( $_POST['r'] == 'medico-report' )  $controller->load_login('medico/medico-report');
					else if( $_POST['r'] == 'medicina-buscar' )  $controller->load_view('medico/medicina-buscar');
					else if( $_POST['r'] == 'medicina-estadis' )  $controller->load_view('medico/medicina-estadis');
					break;

				case 'topico':
					if( !isset( $_POST['r'] ) )  $controller->load_view('topico/topico');
					else if( $_POST['r'] == 'topico-add' )  $controller->load_view('topico/topico-add');
					else if( $_POST['r'] == 'topico-delete' )  $controller->load_view('topico/topico-delete');
					else if( $_POST['r'] == 'historial-add' )  $controller->load_view('topico/historial-add');
					else if( $_POST['r'] == 'topico-edit' )  $controller->load_view('topico/topico-edit');
					else if( $_POST['r'] == 'topico-report' )  $controller->load_login('topico/topico-report');
					else if( $_POST['r'] == 'topico-buscar' )  $controller->load_view('topico/topico-buscar');
					else if( $_POST['r'] == 'topico-estadis' )  $controller->load_view('topico/topico-estadis');
					break;

				case 'odontologia':
					if( !isset( $_POST['r'] ) )  $controller->load_view('odontologia/odontologia');
					else if( $_POST['r'] == 'odontologia-add' )  $controller->load_view('odontologia/odontologia-add');
					else if( $_POST['r'] == 'odontologia-edit' )  $controller->load_view('odontologia/odontologia-edit');
					else if( $_POST['r'] == 'odontologia-delete' )  $controller->load_view('odontologia/odontologia-delete');
					else if( $_POST['r'] == 'odontologia-report' )  $controller->load_login('odontologia/odontologia-report');
					else if( $_POST['r'] == 'odontologia-buscar' )  $controller->load_view('odontologia/odontologia-buscar');
					else if( $_POST['r'] == 'odontologia-estadis' )  $controller->load_view('odontologia/odontologia-estadis');
					break;

				case 'usuarios':
					if( !isset( $_POST['r'] ) )  $controller->load_view('usuario/usuarios');
					else if( $_POST['r'] == 'usuarios-add' )  $controller->load_view('usuario/usuarios-add');
					else if( $_POST['r'] == 'usuario-edit' )  $controller->load_view('usuario/usuario-edit');
					else if( $_POST['r'] == 'cuenta-delete' )  $controller->load_view('usuario/cuenta-delete');
					else if( $_POST['r'] == 'cuenta-add' )  $controller->load_view('usuario/cuenta-add');
					else if( $_POST['r'] == 'usuarios-buscar' )  $controller->load_view('usuario/usuarios-buscar');
					break;

				case 'pacientes':
					if( !isset( $_POST['r'] ) )  $controller->load_view('paciente/pacientes');
					else if( $_POST['r'] == 'paciente-edit' )  $controller->load_view('paciente/paciente-edit');
					else if( $_POST['r'] == 'paciente-add' )  $controller->load_view('paciente/paciente-add');
					else if( $_POST['r'] == 'paciente-delete' )  $controller->load_view('paciente/paciente-delete');
					else if( $_POST['r'] == 'paciente-buscar' )  $controller->load_view('paciente/paciente-buscar');
					break;

				case 'analisis':
					if( !isset( $_POST['r'] ) )  $controller->load_view('analisis');
					else if( $_POST['r'] == 'topico-estadis' )  $controller->load_view('topico/topico-estadis');
					else if( $_POST['r'] == 'medicina-estadis' )  $controller->load_view('medico/medicina-estadis');
					else if( $_POST['r'] == 'psicologia-estadis' )  $controller->load_view('psicologia/psicologia-estadis');
					else if( $_POST['r'] == 'odontologia-estadis' )  $controller->load_view('odontologia/odontologia-estadis');
					
					break;
					
				case 'perfil':
					if( !isset( $_POST['r'] ) )  $controller->load_view('perfil');
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
			// si no se lleno el usuario y pass
			if( !isset($_POST['user']) && !isset($_POST['pass']) ) {
				//mostrar un formulario de autenticación
				$login_form = new ViewController();
				$login_form->load_login('login');
			}
			else {
				// si esta lleno el usuario y pass
				$user_session = new SessionController();
				//verifica session
				$session = $user_session->login($_POST['user'], $_POST['pass']);
                //si sesion es válida
				if( empty($session) ) {
					//echo 'El usuario y el password son incorrectos';
					$login_form = new ViewController();
					$login_form->load_login('login');
					header('Location: ./?error=El usuario ' . $_POST['user'] . ' y el password proporcionado no coinciden');
				} else {
					//echo 'El usuario y el password son correctos';
					//var_dump($session);
					
					$_SESSION['ok'] = true;
                    // llena arreglo con los datos del usuario que inicio session
					foreach ($session as $row) {
						$_SESSION['Paciente'] = $row['Paciente'];
						$_SESSION['ROL'] = $row['ROL'];
						$_SESSION['dni_per'] = $row['dni_per'];
						$_SESSION['fech_nac'] = $row['fech_nac'];
						$_SESSION['celular'] = $row['celular'];
						$_SESSION['USER'] = $row['USER'];
					//	$_SESSION['idrol'] = $row['idrol'];
					}
					header('Location: ./');
				}
			}
		}
	}


}