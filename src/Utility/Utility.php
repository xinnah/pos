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

		static public function p($str){
			echo "<pre>";
				print_r($str);
			echo "</pre>";
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


	    static public function message($message = null){
	        if(is_null($message)){
	            return self::getMessage();
	        }else{
	            return self::setMessage($message);
	        }

	    }

	    static private function getMessage(){
	    	if(isset($_SESSION["message"])){
	        	$message = $_SESSION["message"];
	        	$_SESSION["message"] = "";
	        	return $message;
	        }
	        return false;
	    }

	    static private function setMessage($message){
	         $_SESSION["message"] = $message;
	    }

	}


 ?>