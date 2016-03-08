<?php
  namespace App\OverheadCost;
  require_once '../vendor/autoload.php';

  use App\Model\Model;
  use App\Utility\Utility;
  use App\Connection\Connection;


class OverheadCost extends Model{
	public $table;
	public $id;
	public function __construct(){
		parent::__construct();
	}




###################################### 	Add Cost Start	###########################################




	public function createCost($data = array()){

	if(is_array($data) && array_key_exists("cost_label", $data)){
			if(!empty($data["cost_label"])){
				$this->table = "overhead_cost";
				if($this->insert($data)){
					Utility::message("<p style='color:green'>cost Added successfully</p>");
					Utility::redirect("add_cost.php");
				}else{
					Utility::message("<p style='color:red'>cost Addition Failed</p>");
				}
			}else{
				Utility::message("<p style='color:red'>cost Can't be Empty</p>");
			}
		}	
		
	}


###################################### 	Add Pay Houserent Start	###########################################




	public function createPayHouserent($data = array()){

	if(is_array($data) && array_key_exists("cost_label", $data)){
			if(!empty($data["cost_label"])){
				$this->table = "overhead_cost";
				if($this->insert($data)){
					Utility::message("<p style='color:green'>Pay Houserent Added successfully</p>");
					Utility::redirect("pay_houserent.php");
				}else{
					Utility::message("<p style='color:red'>Pay Houserent Addition Failed</p>");
				}
			}else{
				Utility::message("<p style='color:red'>Pay Houserent Can't be Empty</p>");
			}
		}	
		
	}

###################################### 	Add Pay Salary Start	###########################################




	public function createPaySalary($data = array()){

	if(is_array($data) && array_key_exists("cost_label", $data)){
			if(!empty($data["cost_label"])){
				$this->table = "overhead_cost";
				if($this->insert($data)){
					Utility::message("<p style='color:green'>Pay Salary Added successfully</p>");
					Utility::redirect("pay_salary.php");
				}else{
					Utility::message("<p style='color:red'>Pay Salary Addition Failed</p>");
				}
			}else{
				Utility::message("<p style='color:red'>Pay Salary Can't be Empty</p>");
			}
		}	
		
	}

###################################### 	Add Food Bill Start	###########################################




	public function createFoodBill($data = array()){

	if(is_array($data) && array_key_exists("cost_label", $data)){
			if(!empty($data["cost_label"])){
				$this->table = "overhead_cost";
				if($this->insert($data)){
					Utility::message("<p style='color:green'>Food Bill Added successfully</p>");
					Utility::redirect("food_bill.php");
				}else{
					Utility::message("<p style='color:red'>Food Bill Addition Failed</p>");
				}
			}else{
				Utility::message("<p style='color:red'>Food Bill Can't be Empty</p>");
			}
		}	
		
	}


###################################### 	Add Entertainment Bill Start	###########################################




	public function createEntertainmentBill($data = array()){

	if(is_array($data) && array_key_exists("cost_label", $data)){
			if(!empty($data["cost_label"])){
				$this->table = "overhead_cost";
				if($this->insert($data)){
					Utility::message("<p style='color:green'>Entertainment Bill Added successfully</p>");
					Utility::redirect("entertainment_bill.php");
				}else{
					Utility::message("<p style='color:red'>Entertainment Bill Addition Failed</p>");
				}
			}else{
				Utility::message("<p style='color:red'>Entertainment Bill Can't be Empty</p>");
			}
		}	
		
	}



###################################### 	Add Inernet Bill Start	###########################################




	public function createInernetBill($data = array()){

	if(is_array($data) && array_key_exists("cost_label", $data)){
			if(!empty($data["cost_label"])){
				$this->table = "overhead_cost";
				if($this->insert($data)){
					Utility::message("<p style='color:green'>Inernet Bill Added successfully</p>");
					Utility::redirect("internet_bill.php");
				}else{
					Utility::message("<p style='color:red'>Inernet Bill Addition Failed</p>");
				}
			}else{
				Utility::message("<p style='color:red'>Inernet Bill Can't be Empty</p>");
			}
		}	
		
	}
	###################################### 	Add Electricity bill Start	###########################################




	public function createElectricityBill($data = array()){

	if(is_array($data) && array_key_exists("cost_label", $data)){
			if(!empty($data["cost_label"])){
				$this->table = "overhead_cost";
				if($this->insert($data)){
					Utility::message("<p style='color:green'>Electricity Bill Added successfully</p>");
					Utility::redirect("electricity_bill.php");
				}else{
					Utility::message("<p style='color:red'>Electricity Bill Addition Failed</p>");
				}
			}else{
				Utility::message("<p style='color:red'>Electricity Bill Can't be Empty</p>");
			}
		}	
		
	}


}