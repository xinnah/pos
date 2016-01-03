<?php
  namespace App\Login;
  require_once '../vendor/autoload.php';

  use App\Utility\Utility;
  use App\Connection\Connection;

class Login{
    public $fields = array();
    public $errors = array();
    public $username = "";
    public $password = "";

    public function __construct(array $data = array()){
      if(array_key_exists('username',$data) && array_key_exists('password',$data)){
        $this->username = $data['username'];
        $this->password = $data['password'];;
      }
    }


    public function loginQuery(){
      $dbConnect = new Connection();
      $query = "SELECT * FROM admin WHERE ";
      $query .= "username = '{$this->username}' "; 
      $query .= "AND ";
      $query .= "password = '{$this->password}'";
      $result = mysqli_query($dbConnect->connection,$query);
      if($result){
        return mysqli_fetch_assoc($result);
      }else{
        return false;
      }
    }
}
 ?>