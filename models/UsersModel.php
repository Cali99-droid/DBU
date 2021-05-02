<?php 
class UsersModel extends Model {
	//Función que permite la creación de una nueva cuenta de usuario
	//Parámetros: Conjunto de datos específicos de un usuario
	public function set( $user_data = array() ) {
		foreach ($user_data as $key => $value) {
			$$key = $value;
		}

		$this->query = "REPLACE INTO cuentas (user, pass, idpersona, idrol) 
        VALUES ('$user', '$pass', '$idpersona', '$idrol')";
		$this->set_query();
	}
	//Función que muestra un usuario o todos dependiento de la existencia del parámentro en la base de datos
	//Parámetro: (String)Nombre de usuario
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
	//Función que permite la eliminación de un usuario
	//Parámetro: (String)Nombre de usuario
	public function del( $user = '' ) {
		$this->query = "DELETE FROM cuentas WHERE user = '$user'";
		$this->set_query();
	}
	//Función que permite la validación de un usuario comparando los datos del modelo con los de la base de datos
	//Parámetros: (String)Nombre de usuario y (String)contraseña
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


}
