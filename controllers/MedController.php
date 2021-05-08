<?php 
//require_once("C:/wamp64/www/Proyectos/DBU/models/HistorialPsicologico.php");
class MedController {
	private $model;

	public function __construct() {
		$this->model = new  HistorialMedico();
	}

	public function set( $medico_data = array() ) {
		return $this->model->set($medico_data);
	}

	public function get( $medico_id = '' ) {
		return $this->model->get($medico_id);
	}

	public function getBuscar( $dni_per) {
		return $this->model->getBuscar($dni_per);
	}

	public function del( $medico_id = '' ) {
		return $this->model->del($medico_id);
	}

}