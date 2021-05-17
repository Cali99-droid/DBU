<?php 
require_once("Model.php");
// Autor @Carlos Orellano Rondan - Orellano428@gmail.com
// https://github.com/Cali99-droid
class PacienteModel extends Model {
	//Función que permite la inserción de datos desde el modelo a la vista de historial psicológico
	//Parámetros: Conjunto de datos psicológicos específicos
	public function set( $paciente_data = array() ) {
		foreach ($paciente_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL APERTURAR_HISTORIAL('$nom_per', '$ape_pat','$ape_mat_per',
		'$codigo', '$sexo_per', '$celular', '$fech_nac', '$cod', '$escuela',
		'$tipo_paciente')";
/*
		$this->query = "REPLACE INTO psicologicos SET idpsicologia = '$idpsicologia', estado_psi = '$estado_psi',
		descripcion_psi='$descripcion_psi', fecha='$fecha', idpaciente = '$idpaciente', diagnostico='$diagnostico',
		tratamiento='$tratamiento'";
*/
        $row = $this->set_query();
		
		return $row;
	}
	
	//Función que permite la obtención de datos desde la vista al modelo de historial psicológico
	//Parámetros: ID del historial psicológico
	public function get( $idpaciente = '' ) {
		$this->query = ($idpaciente != '')
			?"SELECT * FROM vista_pacientes WHERE idpaciente = $idpaciente"
			:"SELECT * FROM vista_pacientes";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}
	//Función que permite la eliminación de un historial psicológico
	//Parámetros: ID del historial psicológico
	public function del( $idpaciente = '' ) {
		$this->query = "CALL ELIMINAR_PACIENTE($idpaciente)";
		$row = $this->set_query();
		return $row;
	}
	//Función que permite la actualización de un historial psicológico
	//Parámetros: Conjunto de datos psicológicos específicos
	public function update( $pacientes_data = array() ) {
		foreach ($pacientes_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL ACTUALIZAR_PACIENTE('$nom_per', '$ape_pat','$ape_mat_per',
		'$codigo', '$sexo_per', '$celular', '$fech_nac', '$cod', '$escuela',
		'$tipo_paciente', '$idpaciente')";
        $row = $this->set_query();
		
		return $row;
	}


	public function getBuscar($dni_per) {
		$this->query ="SELECT * FROM vista_pacientes where dni_per like '%$dni_per%'";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}



	public function getPaciente( $idpaciente = '' ) {
		$this->query = ($idpaciente != '')
			?"SELECT * FROM Vista_PACIENTE_uno WHERE idpaciente = $idpaciente"
			:"SELECT * FROM Vista_PACIENTE_uno";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}






}
