<?php
/*Segundo parametro false faz com que não substitua os site anterios*/
header('Access-Control-Allow-Origin: http://localhost', false);
header('Access-Control-Allow-Origin: http://example.com', false);
header('Access-Control-Allow-Origin: https://www.mysite2.com', false);

header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods:OPTIONS, DELETE, POST, PUT, GET");
// header("Access-Control-Allow-Origin: *");

// header("Access-Control-Allow-Origin: *");
// header("Access-Control-Allow-Headers: *");
// header("Access-Control-Allow-Methods:OPTIONS, DELETE, POST, PUT, GET");
// header("Access-Control-Request-Method: *");
// header("Cache-Control: no-cache");
// header("Access-Control-Allow-Origin:*");
// header("Access-Control-Allow-Credentials:*");
// header("Access-Control-Expose-Headers:*");
// header("Access-Control-Max-Age:*");
// header("Access-Control-Request-Headers:*");

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
			
			return $dbConnection;
		}
	}