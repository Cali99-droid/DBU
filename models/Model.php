<?php 
abstract class Model {
	private static $db_host = '127.0.0.1';
	private static $db_user = 'root';
	private static $db_pass = '1234';
	private static $db_name = 'BD_DBU';
	private static $db_charset = 'utf8';
	private $conn;
	protected $query;
	protected $rows = array();

	abstract protected function set();
	abstract protected function get();
	abstract protected function del();

	private function db_open() {
		$this->conn = new mysqli(
			self::$db_host,
			self::$db_user,
			self::$db_pass,
			self::$db_name
		);

		$this->conn->set_charset(self::$db_charset);
	}

	private function db_close() {
		$this->conn->close();
	}

	protected function set_query() {
		$this->db_open();
		$result = $this->conn->query($this->query);
		$row = $result->fetch_array(MYSQLI_NUM);
		$this->db_close();
		return $row;
	}

	protected function del_query() {
		$this->db_open();
		$result = $this->conn->query($this->query);
		$this->db_close();

	}

	protected function get_query() {
		$this->db_open();

		$result = $this->conn->query($this->query);
		while( $this->rows[] = $result->fetch_assoc() );
		$result->close();

		$this->db_close();

		return array_pop($this->rows);
	}
}