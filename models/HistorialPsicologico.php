<?php 
require_once("Model.php");
class HistorialPsicologico extends Model {

	public function set( $psicologico_data = array() ) {
		foreach ($psicologico_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL INSERTAR_PSICOLOGIA('$estado_psi', '$descripcion_psi', '$fecha', $idpaciente,
		'$diagnostico','$tratamiento')";
/*
		$this->query = "REPLACE INTO psicologicos SET idpsicologia = '$idpsicologia', estado_psi = '$estado_psi',
		descripcion_psi='$descripcion_psi', fecha='$fecha', idpaciente = '$idpaciente', diagnostico='$diagnostico',
		tratamiento='$tratamiento'";
*/
        $mensaje = $this->set_query();
		
		return $mensaje;
	}

	public function get( $idpsicologia = '' ) {
		$this->query = ($idpsicologia != '')
			?"SELECT * FROM psicologicos WHERE idpsicologia = $idpsicologia"
			:"SELECT * FROM psicologicos";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $idpsicologia = '' ) {
		$this->query = "DELETE FROM  psicologicos WHERE idpsicologia = $idpsicologia";
		$this->set_query();
	}

}