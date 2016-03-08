<?php

namespace App\Model;


use \App\Utility\Utility;
use \App\Connection\Connection;


abstract class Model{
    
    // public $table = "";
    // public $id = "";
    public $connection = "";
    public function __construct(){
        $this->connection = mysqli_connect("localhost","root","","pos");
        date_default_timezone_set("Asia/Dhaka");
    }

# ----------------------------------Insert--------------------------------------- #

    public function insert($data = array()){

        if(is_array($data) && count($data) > 0){

            $keys = "`".implode("`,`",array_keys($data))."`";
            $values = "'".implode("','",array_values($data))."'";

            $query = "INSERT INTO $this->table( ";
            $query .= $keys;
            $query .= " )VALUES( ";
            $query .= $values;
            $query .= " )";
            
            // echo $query;
            // Utility::dd($query);

            $result = mysqli_query($this->connection,$query);
            if($result){
                return true;
            }
        }
    }

# ----------------------------------Select--------------------------------------- #

    public function selectAll(){

        $query = "SELECT * FROM {$this->table}";
        $result = mysqli_query($this->connection,$query);
        
        $selectAll = array();

        if($result){
            while ($row = mysqli_fetch_object($result)) {
                $selectAll[] = $row;
            }
            return $result;
        }
    }

    public function selectSingle($id = null){

        if(!is_null($id) && !empty($id)){
            $this->id = $id;
            $query = "SELECT * FROM {$this->table} WHERE id = {$this->id}";
            $result = mysqli_query($this->connection,$query);
            if($result){
                $selectSingle = mysqli_fetch_object($result);
                return $selectSingle;
            }
        }
        
    }




# ----------------------------------Update--------------------------------------- #

    public function update($data = array()){

        if (is_array($data) && count($data) > 0) {
            $clasue = "";
            if(array_key_exists("id", $data) && !empty($data["id"])){
                $this->id = $data["id"];
                $clasue = "`id` = $this->id ";
            }elseif(array_key_exists("customer_id", $data) && !empty($data["customer_id"])){
                $this->id = $data["customer_id"];
                $clasue = "`customer_id` = $this->id ";
            }elseif(array_key_exists("supplier_id", $data) && !empty($data["supplier_id"])){
                $this->id = $data["supplier_id"];
                $clasue = "`supplier_id` = $this->id ";
            }

            $updateArray = array(); 
            foreach ($data as $key => $value) {
                $updateArray[] = "`$key` = '$value'";
            }

            $updateStr = implode(",", $updateArray);

            
            $query = "UPDATE $this->table SET ";
            $query .= $updateStr." ";
            $query .= "WHERE ".$clasue;

            // Utility::dd($query);
            $result = mysqli_query($this->connection,$query);
            
            if($result){
                return true;
            }else{
                return false;
            }

        }else{
            Utility::message("There is an error!");
        }
    }

# ----------------------------------Delete--------------------------------------- #

    public function delete($id = null){

        if(!is_null($id) && !empty($id)){

            $this->id = $id;
            $query = "DELETE FROM $this->table WHERE id = {$this->id}";
            $result = mysqli_query($this->connection,$query);

            if($result && mysqli_affected_rows($this->connection) == 1){
                return true;
            }else{
                return false;
            }

        }else{
            Utility::message("There is an error!");
        }
    }





}