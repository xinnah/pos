<?php
  namespace App\LoginRegistration;
  require_once '../vendor/autoload.php';

  use App\Utility\Utility;
  use App\Connection\Connection;

class LoginRegistration{
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
      $result = mysqli_query($dbConnect->connection,$query);
      if($result){
        return mysqli_fetch_assoc($result);
      }else{
        return false;
      }
    }

    public function registrationQuery(){
      $dbConnect = new Connection();
      $this->password = password_hash($this->password,PASSWORD_BCRYPT);
      $query = "SELECT * FROM admin WHERE ";
      $query .= "username = '{$this->username}' ";
      $result = mysqli_query($dbConnect->connection,$query);
      if($result && mysqli_affected_rows($dbConnect->connection) == 1){
        return "This user is alredy Exist!";
      }elseif(mysqli_affected_rows($dbConnect->connection) == 0){
        $query = "INSERT INTO admin(username,password ";
        $query .= ")VALUES( ";
        $query .= "'{$this->username}','{$this->password}'";
        $query .= ")";
        $addUser = mysqli_query($dbConnect->connection,$query);
        if($addUser){
          return "Registration Succeded";
        }else{
          return "Registration Failed";
        }
      }else{
        return "Ther is an Error!";
      }
    }



}
 ?>