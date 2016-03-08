<?php
  namespace App\SalesPerson;
  require_once '../vendor/autoload.php';

  use App\Model\Model;
  use App\Utility\Utility;
  use App\Connection\Connection;


class SalesPerson extends Model{
	public $table;
	public $id;
	public function __construct(){
		parent::__construct();
	}



###################################### 	SalesPerson Start	###########################################


	public function add_sales_person($data = array()){
		$this->table = "sales_person";
		$sales_person_phone = isset($data["sales_person_phone"]) && !empty($data["sales_person_phone"]) ? $data["sales_person_phone"] : "";
		$query = "SELECT * FROM {$this->table} WHERE ";
		$query .= "sales_person_phone = '{$sales_person_phone}' ";
		$result = mysqli_query($this->connection,$query);
		$sales_person_fetch = mysqli_fetch_object($result);

		if($sales_person_fetch){
			Utility::message("This sales person is already Exists");
		}else{

	        if($this->insert($data)){
	          Utility::message("Sales Person has been added successfully");
	        }else{
	          Utility::message("Sales Person addition Failed");
	        }
	    }
	}

	












}