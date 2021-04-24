<?php 
//require_once("C:/wamp64/www/Proyectos/DBU/models/HistorialPsicologico.php");
class TopController {
	private $model;

	public function __construct() {
		$this->model = new  HistorialTopico();
	}

	public function set( $topico_data = array() ) {
		return $this->model->set($topico_data);
	}

	public function get( $topico_id = '' ) {
		return $this->model->get($topico_id);
	}

	public function del( $topico_id = '' ) {
		return $this->model->del($topico_id);
	}

	public function update( $topico_data = array() ) {
		return $this->model->update($topico_data);
	}



}