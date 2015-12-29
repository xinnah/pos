<?php
  require_once('../src/redirect.php');
  class AdminLogin{
    public $submit;
    public $fields = array();
    public $errors = array();
    public $username;
    public $password;

    public function checkInput($value){
      return isset($value);
    }

    public function setFieldsArray($array){
      $this->fields = $array;
    }

    public function hasPresence(){
      foreach($this->fields as $field){
        if (empty($_REQUEST[$field])) {
            $errors[$field] = ucfirst(Utility::removeUnderScore($field));
         }
      }
    }

    public function setUserPass($username,$password){
      $this->username = $username;
      $this->password = $password;
    }

    public function loginQuery(){
      $query = "SELECT * FROM admin WHERE ";
      $query = "username = '{$this->username}' "; 
      $query = "AND ";
      $query = "hashed_password = '{$this->password}'";
      $result = mysqli_query($connection,$query);
      return $result;
    }

    public function loginValidation(){
      $admin = mysqli_fetch_assoc($this->loginQuery());
      if ($this->checkInput($this->username) 
          && $this->checkInput($this->password) 
          && $this->username == $admin["username"] 
          && $this->password == $admin["hashed_password"]) {
                  $_SESSION["admin"] = $admin["username"];
                  Utility::redirect_to("proforma-invoice.php");
              }else{
                  return $message = "Username/Password Wrong!";
              }
            }else{
                return $message = "Login query failed!";
            }
      }

  }

    if (isset($_REQUEST["login"])) {
        $fields = array("user","pass");
        
        $errors = array();
        foreach($fields as $field){
            if (empty($_REQUEST[$field])) {
                $errors[$field] = "<p class=\"message\">* ".ucfirst(remove_under_score($field)." is empty</p>");
             }
        }
        if (empty($errors)) {
            $username = $_REQUEST["user"];
            $password = $_REQUEST["pass"];
            $query = "SELECT * FROM admin WHERE username = '{$username}' AND hashed_password = '{$password}'";
            $result = mysqli_query($connection,$query);
            
            if ($result) {
              $admin = mysqli_fetch_assoc($result);
              if (isset($_REQUEST["user"],$_REQUEST["pass"]) && $_REQUEST["user"] == $admin["username"] && $_REQUEST["pass"] == $admin["hashed_password"]) {
                  $_SESSION["admin"] = $admin["username"];
                  redirect_to("proforma-invoice.php");
              }else{
                  $message = "<p class=\"message\">Username/Password Wrong!</P>";
              }
            }else{
                $message = "<p class=\"message\">Login query failed!</P>";
            }
        }else{
            #else what will happen....
        }
    }else{
    }
 ?>