<?php 
class UsersModel extends Model {
	
	public function set( $user_data = array() ) {
		foreach ($user_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO cuentas (user, pass, idpersona, idrol) 
        VALUES ('$user', '$pass', '$idpersona', '$idrol')";
		$this->set_query();
	}

	public function get( $user = '' ) {
		$this->query = ($user != '')
			?"SELECT * FROM cuentas WHERE user = '$user'"
			:"SELECT * FROM cuentas";
		
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
		$this->set_query();
	}

	public function validate_user($user, $pass) {
		$this->query = "SELECT * FROM cuentas WHERE user = '$user' AND pass = '$pass'";
		$this->get_query();

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}


}