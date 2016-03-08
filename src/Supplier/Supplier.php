<?php
  namespace App\Supplier;
  require_once '../vendor/autoload.php';

  use App\Model\Model;
  use App\Utility\Utility;
  use App\Connection\Connection;


class Supplier extends Model{
	public $table;
	public $id;
	public function __construct(){
		parent::__construct();
	}



###################################### 	Supplier Start	###########################################


	public function add_supplier($data = array()){
		$this->table = "supplier";
		$supplier_phone = isset($data["supplier_phone"]) && !empty($data["supplier_phone"]) ? $data["supplier_phone"] : "";
		$query = "SELECT * FROM {$this->table} WHERE ";
		$query .= "supplier_phone = '{$supplier_phone}' ";
		$result = mysqli_query($this->connection,$query);
		$supplier_fetch = mysqli_fetch_object($result);

		if($supplier_fetch){
			Utility::message("This supplier is already Exists");
		}else{

	        if($this->insert($data)){
	          Utility::message("Supplier has been added successfully");
	          Utility::redirect("purchase.php");
	        }else{
	          Utility::message("Supplier addition Failed");
	        }
	    }
	}

	
	public function view_purchase_order_by_supplier($id){
		$this->table = "purchase_order";
		if(!empty($id)){
			$this->id = $id;
		}
		$purchase_order = array();
		$query = "SELECT * FROM {$this->table} WHERE supplier_id = {$this->id}";
		// Utility::dd($query);
        $result = mysqli_query($this->connection,$query);
        
        while ($row = mysqli_fetch_object($result)) {
        	$purchase_order[] = $row;
        }
        return $purchase_order;

	}


	public function supplier_payment($data = array()){
		$this->table = "supplier";
		if(is_array($data) && count($data) > 0){
			$supplier_payment = array(
		    	"supplier_id" => isset($data["supplier_id"]) ? $data["supplier_id"] : "",
		    	"due_to_supplier" => isset($data["due_to_supplier"]) ? $data["due_to_supplier"] : ""
		    );
		}
		if($this->update($supplier_payment)){
          Utility::message("Payment has been completed successfully");
        }else{
          // Utility::message("Payment Processing Failed");
        }
	}

	public function supplier_payment_history($data = false){
		$this->table = "supplier_payment";
		unset($data["due_to_supplier"]);
		$data["pay_time_date"] = date("Y-m-d H:i:s",time());
		// Utility::dd($data);
		if($this->insert($data)){
			Utility::redirect("payment_to_suppliers.php");
        }else{
          // Utility::message("Payment Processing Failed");
        }
	}

	public function show_supplier($id = null){
			$this->table = "supplier";
			$query = "SELECT * FROM {$this->table} WHERE `supplier_id` = '{$id}'";
			$result = mysqli_query($this->connection,$query);
			$supplier_no_fetch = mysqli_fetch_object($result);
			return $supplier_no_fetch;
	}

	public function show_supplier_payment_history($supplier_id){
			$this->table = "supplier_payment";
			$newArray = array();

			$query = "SELECT * FROM `{$this->table}` WHERE `supplier_payment`.`supplier_id`={$supplier_id} ORDER BY `pay_time_date` DESC LIMIT 10";
			$result = mysqli_query($this->connection,$query);

			while($data = mysqli_fetch_object($result)){
				$newArray[] = $data;
			}

			return $newArray;
		}











}