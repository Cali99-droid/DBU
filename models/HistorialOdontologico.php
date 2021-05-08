<?php 
require_once("Model.php");
class HistorialOdontologico extends Model {

	public function set( $odontologia_data = array() ) {
		foreach ($odontologia_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL INSERTAR_ODONTOLOGIA('$labios','$carrillos',  '$encias',
		'$paladar', '$piso_boca', '$zona_retromoral', '$oro_faringe',
		'$otros','$atm','$codigo',
		'$diagnostico','$tratamiento', '$fecha')";
/*
		$this->query = "REPLACE INTO psicologicos SET idpsicologia = '$idpsicologia', estado_psi = '$estado_psi',
		descripcion_psi='$descripcion_psi', fecha='$fecha', idpaciente = '$idpaciente', diagnostico='$diagnostico',
		tratamiento='$tratamiento'";
*/
        $row = $this->set_query();
		
		return $row;
	}

	public function get( $idodontologo = '' ) {
		$this->query = ($idodontologo != '')
			?"SELECT * FROM Vista_PacienteOdontologico WHERE idodontologo = $idodontologo"
			:"SELECT * FROM Vista_PacienteOdontologico;";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $idodontologia = '' ) {
		$this->query = "CALL ELIMINAR_ODONTOLOGIA('$idodontologia')";
		$this->del_query();
	}

	public function update( $odontologico_data = array() ) {
		foreach ($odontologico_data as $key => $value) {
			$$key = $value;
		}
		$this->query = "CALL ACTUALIZAR_ODONTOLOGIA('$labios','$carrillos','$encias',
		'$paladar', '$piso_boca', '$zona_retromoral', '$oro_faringe',
		'$otros','$atm','$codigo','$diagnostico','$tratamiento', '$fecha','$idodontologo')";
        $row = $this->set_query();
		
		return $row;
	}

	public function getBuscar($dni_per) {
		$this->query ="SELECT * FROM Vista_PacienteOdontologico where dni_per like '%$dni_per%'";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

}