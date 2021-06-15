<?php

	class Database{
		
		private $servername = "localhost";
		private $username = "root";
		private $password = "";
		private $database = "examania";
		
		public $conn;


		public function connect(){
			
			$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

			if ($this->conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
		
			return $this->conn;
		}
		
	}

?>