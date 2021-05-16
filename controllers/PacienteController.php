<?php 
//require_once("C:/wamp64/www/Proyectos/DBU/models/HistorialPsicologico.php");
class PacienteController {
	private $model;
	//Función que instacia un nuevo historial psicológico
	public function __construct() {
		$this->model = new  PacienteModel();
	}
	//Función que envía los datos del modelo a la vista de un historial psicológico
	//Parámetros: Conjuntos de datos de un historial psicológico
	public function set( $pacientes_data = array() ) {
		return $this->model->set($pacientes_data);
	}
	//Función que obtiene los datos de un historial psicológico desde su vista hasta el modelo
	//Parámetros: ID de historial psicológico
	public function get( $idpaciente = '' ) {
		return $this->model->get($idpaciente);
	}

	


	public function del( $idpaciente = '' ) {
		return $this->model->del($idpaciente);
	}
	//Función que permite modificar datos de un historial psicológico 
	//Parámetros: Conjuntos de datos de un historial psicológico
	public function update( $pacientes_data = array() ) {
		return $this->model->update($pacientes_data);
	}

	public function getBuscar( $dni_per) {
		return $this->model->getBuscar($dni_per);
	}

	public function getPaciente( $idpaciente = '' ) {
		return $this->model->getPaciente($idpaciente);
	}



}
