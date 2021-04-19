<?php 
//require_once("C:/wamp64/www/Proyectos/DBU/models/HistorialPsicologico.php");
class PsiController {
	private $model;

	public function __construct() {
		$this->model = new  HistorialPsicologico();
	}

	public function set( $psicologia_data = array() ) {
		return $this->model->set($psicologia_data);
	}

	public function get( $psicologia_id = '' ) {
		return $this->model->get($psicologia_id);
	}

	public function del( $psicologia_id = '' ) {
		return $this->model->del($psicologia_id);
	}

	public function update( $psicologia_data = array() ) {
		return $this->model->update($psicologia_data);
	}



}