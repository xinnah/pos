<?php
  namespace App\Customer;
  require_once '../vendor/autoload.php';

  use App\Model\Model;
  use App\Utility\Utility;
  use App\Connection\Connection;


class Customer extends Model{
	public $table;
	public $id;
	public function __construct(){
		parent::__construct();
	}



###################################### 	Customer Start	###########################################


	public function add_customer($data = array()){
		$this->table = "customer";
		$customer_phone = isset($data["customer_phone"]) && !empty($data["customer_phone"]) ? $data["customer_phone"] : "";
		$query = "SELECT * FROM {$this->table} WHERE ";
		$query .= "customer_phone = '{$customer_phone}' ";
		$result = mysqli_query($this->connection,$query);
		$customer_fetch = mysqli_fetch_object($result);

		if($customer_fetch){
			Utility::message("This customer is already Exists");
		}else{

	        if($this->insert($data)){
	          Utility::message("Customer has been added successfully");
	          Utility::redirect("sales_manager.php");
	        }else{
	          Utility::message("Customer addition Failed");
	        }
	    }
	}


	public function view_invoice_by_customer($id){
		$this->table = "invoice";
		if(!empty($id)){
			$this->id = $id;
		}
		$invoice = array();
		$query = "SELECT * FROM {$this->table} WHERE customer_id = {$this->id}";
		// Utility::dd($query);
        $result = mysqli_query($this->connection,$query);
        
        while ($row = mysqli_fetch_object($result)) {
        	$invoice[] = $row;
        }
        return $invoice;

	}



	public function customer_payment($data = array()){
		$this->table = "customer";
		if(is_array($data) && count($data) > 0){
			$customer_payment = array(
		    	"customer_id" => isset($data["customer_id"]) ? $data["customer_id"] : "",
		    	"customer_payment_due" => isset($data["customer_payment_due"]) ? $data["customer_payment_due"] : ""
		    );
		}

			if($this->update($customer_payment)){
	          Utility::message("Payment has been completed successfully");
	        }else{
	          // Utility::message("Payment Processing Failed");
	        }
	}

	public function customer_payment_history($data = false){
		$this->table = "customer_payment";
		unset($data["customer_payment_due"]);
		$data["pay_time_date"] = date("Y-m-d H:i:s",time());
		if($this->insert($data)){
			Utility::redirect("customer_payments.php");
        }else{
          // Utility::message("Payment Processing Failed");
        }
	}


	public function show_customer($id = null){
			$this->table = "customer";
			$query = "SELECT * FROM {$this->table} WHERE `customer_id` = '{$id}'";
			$result = mysqli_query($this->connection,$query);
			$customer_no_fetch = mysqli_fetch_object($result);
			return $customer_no_fetch;
	}


	public function show_customer_payment_history($customer_id){
		$this->table = "customer_payment";
		$newArray = array();

		$query = "SELECT * FROM `{$this->table}` WHERE `customer_payment`.`customer_id`={$customer_id} ORDER BY `pay_time_date` DESC LIMIT 10";
		$result = mysqli_query($this->connection,$query);

		while($data = mysqli_fetch_object($result)){
			$newArray[] = $data;
		}

		return $newArray;
	}
	

	












}