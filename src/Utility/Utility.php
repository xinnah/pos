<?php
	namespace App\Utility;
	class Utility{
		static public function redirect($link){
			header("Location: ".$link);
			exit();
		}

		static public function removeUnderScore($str){
			return str_replace("_", " ", $str);
		}

		static public function mysql_prep($string){
			global $connection;
			return mysqli_real_escape_string($connection,$string);
		}

		static public function d($str){
			var_dump($str);
		}

		static public function dd($str){
			var_dump($str);
			die();
		}

		static public function validateInput($data = false){
		    $errors = array();
			foreach ($data as $key => $value) {
				if(empty($_REQUEST[$key])){
					if($key == "name"){
						continue;
					}else{
						$errors[$key] = str_replace("_", " ",$key)." can't be empty";
						return $errors;
					}
				}
			}
	    }

	}


 ?>