<?php 
class UsersModel extends Model {
	//Función que permite la creación de una nueva cuenta de usuario
	//Parámetros: Conjunto de datos específicos de un usuario
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
	//Función que muestra un usuario o todos dependiento de la existencia del parámentro en la base de datos
	//Parámetro: (String)Nombre de usuario
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
	//Función que permite la eliminación de un usuario
	//Parámetro: (String)Nombre de usuario
	public function del( $user = '' ) {
		$this->query = "DELETE FROM cuentas WHERE user = '$user'";
		$this->del_query();
	}
	//Función que permite la validación de un usuario comparando los datos del modelo con los de la base de datos
	//Parámetros: (String)Nombre de usuario y (String)contraseña
	public function validate_user($user, $pass) {
		$this->query = "SELECT  * FROM  Vista_CUENTAS
		 WHERE USER = '$user' AND PASS = md5('$pass')";
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

	public function update( $usuario_data = array() ) {
		foreach ($usuario_data as $key => $value) {
			$$key = $value;
		}
		$this->query = "CALL EDITAR_CUENTA('$nom_per', '$ape_pat','$ape_mat_per',
		'$codigo', '$sexo_per', '$celular', '$fech_nac', '', '$escuela',
		'$user', '$pass', '$rol', '$idcargo')";
        $row = $this->set_query();
		
		return $row;
	}


	public function getUsuario( $user = '' ) {
		$this->query = ($user != '')
			?"SELECT * FROM Vista_CUENTAS_uno WHERE IDCARGO = '$user'"
			:"SELECT * FROM Vista_CUENTAS_uno";
		
		$this->get_query();

		$num_rows = count($this->rows);

		$data = array();

		foreach ($this->rows as $key => $value) {
			array_push($data, $value);
		}

		return $data;
	}


}
