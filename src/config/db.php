<?php
	class db{

		
		private $dbhost = 'localhost';
		private $dbuser = 'root';
		private $dbpass = '';
		private $dbname = 'bedrock';

		public function connect(){
			$mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
			$dbConnection = new PDO($mysql_connect_str, $this->dbuser,$this->dbpass);
			$dbConnection->exec("SET NAMES 'utf8'");
			$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			return $dbConnection
		// ->withHeader('Access-Control-Allow-Origin', '*')
		// ->withHeader('Access-Control-Allow-Headers',' X-Requested-With, Content-Type, Origin, Authorization');
		// ->withHeader('Access-Control-Allow-Methods','POST, GET, DELETE, PUT, OPTIONS')
		}
	}