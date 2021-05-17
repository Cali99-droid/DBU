<?php 

//Controlador Psicologia
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

    // funcion que elimina un historial psicologico
	// Parámetros: ID de historial psicológico
	public function del( $psicologia_id = '' ) {
		return $this->model->del($psicologia_id);
	}
	//Función que permite modificar datos de un historial psicológico 
	//Parámetros: Conjuntos de datos de un historial psicológico
	public function update( $psicologia_data = array() ) {
		return $this->model->update($psicologia_data);
	}
    //Función que permite buscar datos de un historial psicológico 
	//Parámetros: DNI persona
	public function getBuscar( $dni_per) {
		return $this->model->getBuscar($dni_per);
	}

    //Función que permite buscar datos de un historial psicológico 
	//Parámetros: DNI persona
	public function getHistorial( $idpaciente) {
		return $this->model->getHistorial($idpaciente);
	}




}
