<?php 
class UsersModel extends Model {
	
	public function set( $user_data = array() ) {
		foreach ($user_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL CREAR_CUENTA('$nom_per', '$ape_pat','$ape_mat_per',
		'$codigo', '$sexo_per', '$celular', '$fech_nac', '$cod', '$escuela',
		'$user', '$pass', '$rol')";
	    $row = $this->set_query();
		
		return $row;
	}

	public function get( $user = '' ) {
		$this->query = ($user != '')
			?"SELECT * FROM Vista_CUENTAS WHERE user = '$user'"
			:"SELECT * FROM Vista_CUENTAS";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}

	public function del( $user = '' ) {
		$this->query = "DELETE FROM cuentas WHERE user = '$user'";
		$this->del_query();
	}

	public function validate_user($user, $pass) {
		$this->query = "SELECT CONCAT(p.nom_per, '  ', p.ape_pat) nombre, r.rol 
		FROM cuentas c INNER JOIN personas p on c.idpersona = p.idpersona
	                   INNER JOIN roles r on c.idrol = r.idrol
		 WHERE user = '$user' AND pass = '$pass'";
		$this->get_query();

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}


	public function asignarCuenta( $user_data = array() ) {
		foreach ($user_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "CALL ASIGNAR_CUENTA('$codigo', '$rol', '$user', 
		'$pass')";
	    $row = $this->set_query();
		
		return $row;
	}

	public function getBuscar($dni_per) {
		$this->query ="SELECT * FROM Vista_CUENTAS where dni_per like '%$dni_per%'";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}


}