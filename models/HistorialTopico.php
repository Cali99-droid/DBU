<?php //TOD00000
require_once("Model.php");
class HistorialTopico extends Model {

	public function set( $psicologico_data = array() ) {
		foreach ($psicologico_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL INSERTAR_TOPICO('$tipo_sangre', '$pa_pas','$pl_pas',
		 '$fc_pas', '$peso_pas', '$talla_pas', '$obser_top', '$fecha', 
		 '$codigo') ";
/*
		$this->query = "REPLACE INTO psicologicos SET idpsicologia = '$idpsicologia', estado_psi = '$estado_psi',
		descripcion_psi='$descripcion_psi', fecha='$fecha', idpaciente = '$idpaciente', diagnostico='$diagnostico',
		tratamiento='$tratamiento'";
*/
        $row = $this->set_query();
		
		return $row;
	}

	public function get( $idtopico = '' ) {
		$this->query = ($idtopico != '')
			?"SELECT * FROM vista_PacienteTopico WHERE idtopico = $idtopico"
			:"SELECT * FROM vista_PacienteTopico;";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $idtopico = '' ) {
		$this->query = "DELETE FROM  topicos WHERE idtopico = $idtopico";
		$this->del_query();
	}

	public function update( $topico_data = array() ) {
		foreach ($topico_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL ACTUALIZAR_PSICOLOGIA('$estado_psi', '$descripcion_psi', '$fecha', $codigo,
		'$diagnostico','$tratamiento', '$idpsicologia')";
        $row = $this->set_query();
		
		return $row;
	}

}