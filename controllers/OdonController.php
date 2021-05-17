
<?php
// Autor @Carlos Orellano Rondan - Orellano428@gmail.com
// https://github.com/Cali99-droid 
//require_once("C:/wamp64/www/Proyectos/DBU/models/HistorialPsicologico.php");

//Controlador Odontologico
class OdonController {
	private $model;
   	//Constructor que instancia un historial odontologico
	public function __construct() {
		$this->model = new  HistorialOdontologico();
	}
    //Función que envía los datos del modelo a la vista de un historial odontologico
	//Parámetros: Conjunto de datos de un historial odontologico
	public function set( $odontologia_data = array() ) {
		return $this->model->set($odontologia_data);
	}
    //Función que obtiene los datos un historial odontologico desde la vista y los envía al modelo
	//Parámetros: ID de historial odontologico
	public function get( $odontologia_id = '' ) {
		return $this->model->get($odontologia_id);
	}
    //Funcion que busca y devuelve un historial por el DNI
	//Parametro DNI de persona
	public function getBuscar( $dni_per) {
		return $this->model->getBuscar($dni_per);
	}
	// funcion para eliminar un historial  odontologico atraves de su ID
	//parametro: id del historial odontologico
	public function del( $odontologia_id = '' ) {
		return $this->model->del($odontologia_id);
	}
    //Funcion para actualizar los datos enviados de la vista al modelo
	//Parametro Conjunto de datos para actualizar
	public function update( $odontologia_data = array() ) {
		return $this->model->update($odontologia_data);
	}
   //Funcion que busca y devuelve un historial por el id de paciente
   // Parametro id de paciente
	public function getHistorial( $idpaciente) {
		return $this->model->getHistorial($idpaciente);
	}
    //Funcion que busca y devuelve los datos bucales por el id de paciente
   // Parametro id de paciente
	public function getPre( $idodontologo = '' ) {
		return $this->model->getPre($idodontologo);
	}




}