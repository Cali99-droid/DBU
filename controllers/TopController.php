<?php 
//require_once("C:/wamp64/www/Proyectos/DBU/models/HistorialPsicologico.php");
class TopController {
	private $model;
	//Función que permite instanciar un nuesvo historial tópico
	public function __construct() {
		$this->model = new  HistorialTopico();
	}
	//Función que permite enviar los datos desde el modelo a la vista de historial tópico
	//Parámetros: Conjunto de datos específicos de un historial médico
	public function set( $topico_data = array() ) {
		return $this->model->set($topico_data);
	}
	//Función que permite obtener los datos de la vista y enviarlos al de modelo de historial tópico
	//Parámetros: ID de historial tópico
	public function get( $topico_id = '' ) {
		return $this->model->get($topico_id);
	}

	

	public function getEscuelas( $escuela_id = '' ) {
		return $this->model->getEscuelas($escuela_id);
	}
	//Función que permite eliminar un historial tópico
	//Parámetros: ID de historial tópico
	public function del( $topico_id = '' ) {
		return $this->model->del($topico_id);
	}
	//Función que permite actualizar datos de un historial tópico
	//Parámetros: Conjunto de datos específicos de un historial tópico
	public function update( $topico_data = array() ) {
		return $this->model->update($topico_data);
	}
	//Función que permite aperturar un nuevo historial tópico
	//Parámetros: Conjunto de datos específicos de un historial tópico
	public function setNuevoHistorial( $topico_data = array() ) {
		return $this->model->setNuevoHistorial($topico_data);
	}
	//Función que permite aperturar un nuevo exámen tópico
	//Parámetros: Conjunto de datos específicos obtenidos de un exámen tópico
	public function setNuevoExamen( $topico_data = array() ) {
		return $this->model->setNuevoExamen($topico_data);
	}

	public function getBuscar( $dni_per) {
		return $this->model->getBuscar($dni_per);
	}

}
