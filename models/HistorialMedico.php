<?php 
// Autor @Carlos Orellano Rondan - Orellano428@gmail.com
// https://github.com/Cali99-droid
require_once("Model.php");
class HistorialMedico extends Model {
	//Función que permite la inserción de datos desde el modelo a la vista de historial médico
	//Parámetros: Conjunto de datos médicos específicos
	public function set( $medico_data = array() ) {
		foreach ($medico_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL INSERTAR_MEDICO('', '',  '','$ant_medicos',
		'$ant_quirurgicos', '', '$hozpitalizaciones',
		'$habitos_nocivos', '$otros', '$tipo_enfermedad',
		'$forma_inicio','$sintomas','$fecha', '$codigo','$diagnostico','$tratamiento')";
/*
		$this->query = "REPLACE INTO psicologicos SET idpsicologia = '$idpsicologia', estado_psi = '$estado_psi',
		descripcion_psi='$descripcion_psi', fecha='$fecha', idpaciente = '$idpaciente', diagnostico='$diagnostico',
		tratamiento='$tratamiento'";
*/
        $row = $this->set_query();
		
		return $row;
	}
	//Función que permite la ontención de datos desde la vista al modelo de historial médico
	//Parámetros: ID del histoial médico
	public function get( $idmedico = '' ) {
		$this->query = ($idmedico != '')
			?"SELECT * FROM Vista_PacienteMedico WHERE idmedico = $idmedico"
			:"SELECT * FROM Vista_PacienteMedico";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}
	//Función que permite la eliminación de un historial médico
	//Parámetros: ID del histoial médico
	public function del( $idmedico = '' ) {
		$this->query = "DELETE FROM  medicos WHERE idmedico = $idmedico";
		$this->del_query();
	}
	//Función que permite la actualización de un historial médico
	//Parámetros: Conjunto de datos médicos específicos
	public function update( $medico_data = array() ) {
		foreach ($medico_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL ACTUALIZAR_MEDICO('', '',  '','$ant_medicos',
		'$ant_quirurgicos', '', '$hozpitalizaciones',
		'$habitos_nocivos', '$otros', '$tipo_enfermedad',
		'$forma_inicio','$sintomas','$fecha', '$codigo','$diagnostico','$tratamiento',
		'$idmedico')";
        $row = $this->set_query();
		
		return $row;
	}

	public function getBuscar($dni_per) {
		$this->query ="SELECT * FROM Vista_PacienteMedico where dni_per like '%$dni_per%'";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function getHistorial( $idpaciente = '' ) {
		$this->query = ($idpaciente != '')
			?"SELECT * FROM Vista_PacienteMedico WHERE dni_per = $idpaciente"
			:"SELECT * FROM Vista_PacienteMedico;";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

}
