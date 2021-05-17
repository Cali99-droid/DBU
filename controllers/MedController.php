<?php 
// Autor @Carlos Orellano Rondan - Orellano428@gmail.com
// https://github.com/Cali99-droid
//require_once("C:/wamp64/www/Proyectos/DBU/models/HistorialPsicologico.php");

// Controlador Medico
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
    //Funcion para actualizar los datos enviados de la vista al modelo
	//Parametro Conjunto de datos para actualizar
	public function update( $medico_data = array()){
        return $this->model->update($medico_data);
	}

   // funcion para eliminar un historial medico atraves de su ID
   //parametro: id del historial medico
	public function del( $medico_id = '' ) {
		return $this->model->del($medico_id);
	}
    //Funcion que busca y devuelve un historial por el DNI
	//Parametro DNI de persona

	public function getBuscar( $dni_per) {
		return $this->model->getBuscar($dni_per);
	}
   //Funcion que busca y devuelve un historial por el id de paciente
   // Parametro id de paciente
	public function getHistorial( $idpaciente) {
		return $this->model->getHistorial($idpaciente);
	}

}
