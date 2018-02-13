<?php
require "../vendor/autoload.php";

class Database{
	private $host = "localhost";
	private $database = "api_db";
	private $port = "27017";

	public $db;

	public function getDBClient() {
		$this->db = null;

		$this->db = (new MongoDB\Client('mongodb://' . $this->host . ':' . $this->port))->{$this->database};
        return $this->db;
	}
}

?>