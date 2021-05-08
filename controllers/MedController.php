<?php 
//require_once("C:/wamp64/www/Proyectos/DBU/models/HistorialPsicologico.php");
class MedController {
	private $model;
	//Función que intancia un historial médico
	public function __construct() {
		$this->model = new  HistorialMedico();
	}
	//Función que envía los datos del modelo a la vista de un historial médico
	//Parámetros: Conjunto de datos de un historial médico
	public function set( $medico_data = array() ) {
		return $this->model->set($medico_data);
	}
	//Función que obtiene los datos un historial médico desde la vista y los envía al modelo
	//Parámetros: ID de historial médico
	public function get( $medico_id = '' ) {
		return $this->model->get($medico_id);
	}



	public function del( $medico_id = '' ) {
		return $this->model->del($medico_id);
	}

	public function getBuscar( $dni_per) {
		return $this->model->getBuscar($dni_per);
	}

}
