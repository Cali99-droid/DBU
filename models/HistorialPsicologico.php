<?php 
require_once("Model.php");
class HistorialPsicologico extends Model {
	//Función que permite la inserción de datos desde el modelo a la vista de historial psicológico
	//Parámetros: Conjunto de datos psicológicos específicos
	public function set( $psicologico_data = array() ) {
		foreach ($psicologico_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL INSERTAR_PSICOLOGIA('$estado_psi', '$descripcion_psi', '$fecha', $codigo,
		'$diagnostico','$tratamiento')";
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
	public function get( $idpsicologia = '' ) {
		$this->query = ($idpsicologia != '')
			?"SELECT * FROM Vista_PacientePsicologico WHERE idpsicologia = $idpsicologia"
			:"SELECT * FROM Vista_PacientePsicologico;";
		
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
	public function del( $idpsicologia = '' ) {
		$this->query = "DELETE FROM  psicologicos WHERE idpsicologia = $idpsicologia";
		$this->del_query();
	}
	//Función que permite la actualización de un historial psicológico
	//Parámetros: Conjunto de datos psicológicos específicos
	public function update( $psicologico_data = array() ) {
		foreach ($psicologico_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL ACTUALIZAR_PSICOLOGIA('$estado_psi', '$descripcion_psi', '$fecha', $codigo,
		'$diagnostico','$tratamiento', '$idpsicologia')";
        $row = $this->set_query();
		
		return $row;
	}


	public function getBuscar($dni_per) {
		$this->query ="SELECT * FROM Vista_PacientePsicologico where dni_per like '%$dni_per%'";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

}
