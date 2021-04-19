<?php 
require_once("Model.php");
class HistorialMedico extends Model {

	public function set( $medico_data = array() ) {
		foreach ($medico_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL INSERTAR_MEDICO('$estado_psi', '$descripcion_psi', '$fecha', $codigo,
		'$diagnostico','$tratamiento')";
/*
		$this->query = "REPLACE INTO psicologicos SET idpsicologia = '$idpsicologia', estado_psi = '$estado_psi',
		descripcion_psi='$descripcion_psi', fecha='$fecha', idpaciente = '$idpaciente', diagnostico='$diagnostico',
		tratamiento='$tratamiento'";
*/
        $row = $this->set_query();
		
		return $row;
	}

	public function get( $idmedico = '' ) {
		$this->query = ($idmedico != '')
			?"SELECT * FROM medicos WHERE idmedico = $idmedico"
			:"SELECT * FROM medicos";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $idmedico = '' ) {
		$this->query = "DELETE FROM  medicos WHERE idmedico = $idmedico";
		$this->del_query();
	}

	public function update( $medico_data = array() ) {
		foreach ($medico_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL ACTUALIZAR_MEDICOS('$estado_psi', '$descripcion_psi', '$fecha', $codigo,
		'$diagnostico','$tratamiento', '$idpsicologia')";
        $row = $this->set_query();
		
		return $row;
	}

}