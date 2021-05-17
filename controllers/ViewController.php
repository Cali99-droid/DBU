<?php
// Autor @Carlos Orellano Rondan - Orellano428@gmail.com
// https://github.com/Cali99-droid 

/**
 * controlador de vistas
 */
class ViewController {
	private static $view_path = './views/';
	//Función que permite cargar las distintas vistas
	//Parámetro: Nombre de la vista
	public function load_view($view) {
		require_once( self::$view_path . 'header.php' );
		require_once( self::$view_path . $view . '.php' );
		//require_once( self::$view_path . 'footer.php' );
	}
	//Función que permite cargar la vista del Login
	//Parámetro: Nombre de la vista
	public function load_login($view) {
		//require_once( self::$view_path . 'header.php' );
		require_once( self::$view_path . $view . '.php' );
		//require_once( self::$view_path . 'footer.php' );
	}





}
