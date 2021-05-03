<?php //TOD00000
require_once("Model.php");
class HistorialTopico extends Model {
	
	//Función que permite la inserción de datos desde el modelo a la vista de historial tópico
	//Parámetros: Conjunto de datos específicos del área de tópico 

	public function set( $topico_data = array() ) {
		foreach ($topico_data as $key => $value) {
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
	//Función que permite la obtención de datos desde la vista al modelo de historial tópico
	//Parámetros: ID del historial tópico
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
	//Función que permite la eliminación de historial tópico
	//Parámetros: ID del historial tópico
	public function del( $idtopico = '' ) {
		$this->query = "DELETE FROM  topicos WHERE idtopico = $idtopico";
		$this->del_query();
	}
	//Función que permite la actualización de datos de un historial tópico
	//Parámetros: Conjunto de datos específicos del área de tópico 
	public function update( $topico_data = array() ) {
		foreach ($topico_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL ACTUALIZAR_TOPICO('$codigo','$tipo_sangre',
		 '$pa_pas', '$pl_pas', 
		'$fc_pas', '$peso_pas', '$talla_pas', 
		 '$obser_top','$fecha','$idtopico')";
        $row = $this->set_query();
		
		return $row;
	}

	//Función que permite la inserción de datos desde el modelo a la vista y apertura de un historial tópico
	//Parámetros: Conjunto de datos personales del paciente así como datos específicos del área de tópico 
	public function setNuevoHistorial( $topico_data = array() ) {
		foreach ($topico_data as $key => $value) {
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
	//Función que permite la apertura de un nuevo examen tópico
	//Parámetros: Conjunto de datos  específicos de un exámen tópico 
	public function setNuevoExamen( $topico_data = array() ) {
		foreach ($topico_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL NUEVO_EXAMEN('$codigo','$tipo_sangre', '$pa_pas','$pl_pas',
		'$fc_pas', '$peso_pas', '$talla_pas', '$obser_top', '$fecha'
		)";
/*
		$this->query = "REPLACE INTO psicologicos SET idpsicologia = '$idpsicologia', estado_psi = '$estado_psi',
		descripcion_psi='$descripcion_psi', fecha='$fecha', idpaciente = '$idpaciente', diagnostico='$diagnostico',
		tratamiento='$tratamiento'";
*/
        $row = $this->set_query();
		
		return $row;
	}
	
	//Función que permite obtener una escuela o todas las escuelas dependiendo de la existencia del id dentro de la vista
	//ID de escuela profesional
	public function getEscuelas( $idescuela = '' ) {
		$this->query = ($idescuela != '')
			?"SELECT * FROM escuelas WHERE idescuela = $idescuela"
			:"SELECT * FROM escuelas;";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

}
