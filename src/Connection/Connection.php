<?php
	namespace App\Connection;
	class Connection{
		public $message = "";
		public $connection = "";
		function __construct(){
				$this->connection = mysqli_connect("localhost","root","","pos");
				if(!mysqli_connect_errno($this->connection)){
					$this->message = "";
					return true;
				}else{
					$this->message = "Databse connection failed";
					return false;
				}
		}

	}


 ?>