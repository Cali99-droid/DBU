<?php 
//require_once("C:/wamp64/www/Proyectos/DBU/models/HistorialPsicologico.php");
class PsiController {
	private $model;
	//Función que instacia un nuevo historial psicológico
	public function __construct() {
		$this->model = new  HistorialPsicologico();
	}
	//Función que envía los datos del modelo a la vista de un historial psicológico
	//Parámetros: Conjuntos de datos de un historial psicológico
	public function set( $psicologia_data = array() ) {
		return $this->model->set($psicologia_data);
	}
	//Función que obtiene los datos de un historial psicológico desde su vista hasta el modelo
	//Parámetros: ID de historial psicológico
	public function get( $psicologia_id = '' ) {
		return $this->model->get($psicologia_id);
	}

	


	public function del( $psicologia_id = '' ) {
		return $this->model->del($psicologia_id);
	}
	//Función que permite modificar datos de un historial psicológico 
	//Parámetros: Conjuntos de datos de un historial psicológico
	public function update( $psicologia_data = array() ) {
		return $this->model->update($psicologia_data);
	}

	public function getBuscar( $dni_per) {
		return $this->model->getBuscar($dni_per);
	}



}
