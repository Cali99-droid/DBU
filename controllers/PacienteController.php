<?php 
// Autor @Carlos Orellano Rondan - Orellano428@gmail.com
// https://github.com/Cali99-droid


/*
controlador Paciente
*/
class PacienteController {
	private $model;
	//Función que instacia un nuevo paciente
	public function __construct() {
		$this->model = new  PacienteModel();
	}
	//Función que envía los datos del modelo a la vista de un paciente
	//Parámetros: Conjuntos de datos de un paciente
	public function set( $pacientes_data = array() ) {
		return $this->model->set($pacientes_data);
	}
	//Función que obtiene los datos de un paciente desde su vista hasta el modelo
	//Parámetros: ID de paciente
	public function get( $idpaciente = '' ) {
		return $this->model->get($idpaciente);
	}

	//funcion que elimina un paciente
	//Parametro id de paciente
	public function del( $idpaciente = '' ) {
		return $this->model->del($idpaciente);
	}
	//Función que permite modificar datos de un paciente
	//Parámetros: Conjuntos de datos de un paciente
	public function update( $pacientes_data = array() ) {
		return $this->model->update($pacientes_data);
	}
    //funcion que busca un paciente por dni
	//Parametro dni de paciente
	public function getBuscar( $dni_per) {
		return $this->model->getBuscar($dni_per);
	}
// funcion que obtiene un paciente en especifico
// parametro id paciente
	public function getPaciente( $idpaciente = '' ) {
		return $this->model->getPaciente($idpaciente);
	}



}
