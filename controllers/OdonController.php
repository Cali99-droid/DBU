
<?php
// Autor @Carlos Orellano Rondan - Orellano428@gmail.com
// https://github.com/Cali99-droid 
//require_once("C:/wamp64/www/Proyectos/DBU/models/HistorialPsicologico.php");
class OdonController {
	private $model;

	public function __construct() {
		$this->model = new  HistorialOdontologico();
	}

	public function set( $odontologia_data = array() ) {
		return $this->model->set($odontologia_data);
	}

	public function get( $odontologia_id = '' ) {
		return $this->model->get($odontologia_id);
	}

	public function getBuscar( $dni_per) {
		return $this->model->getBuscar($dni_per);
	}

	public function del( $odontologia_id = '' ) {
		return $this->model->del($odontologia_id);
	}

	public function update( $odontologia_data = array() ) {
		return $this->model->update($odontologia_data);
	}

	public function getHistorial( $idpaciente) {
		return $this->model->getHistorial($idpaciente);
	}

	public function getPre( $idodontologo = '' ) {
		return $this->model->getPre($idodontologo);
	}




}