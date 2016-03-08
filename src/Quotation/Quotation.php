<?php
  namespace App\Quotation;

  use App\Model\Model;
  use App\Utility\Utility;
  use App\Connection\Connection;

class Quotation extends Model{

	public $table;

	public function __construct(){
		parent::__construct();
	}



	public function show_quotation_number(){
		$this->table = "quotation";
		$query = "SELECT * FROM {$this->table} ORDER BY id DESC LIMIT 1";
		$result = mysqli_query($this->connection,$query);
		$quotation_no_fetch = mysqli_fetch_object($result);
		$quotation_no = $quotation_no_fetch->quotation_no+1;
		return $quotation_no;
	}


	public function createQuotation($data = array()){

		$quotation_data = array();
		$customer_data = array();
		foreach ($data as $key => $value) {
		  	if($key == "customer"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$customer_key = str_replace("'", "", $customer_key);
		  			$customer_data[$customer_key] = $customer_value;
		  		}
		  	}elseif($key == "barcode"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$quotation_data[$key] = implode(" , ", $_REQUEST[$key]);;
		  		}
		  	}elseif($key == "product_description"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$quotation_data[$key] = implode(" , ", $_REQUEST[$key]);;
		  		}
		  	}elseif($key == "uom"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$quotation_data[$key] = implode(" , ", $_REQUEST[$key]);;
		  		}
		  	}elseif($key == "cost_per_unit"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$quotation_data[$key] = implode(" , ", $_REQUEST[$key]);;
		  		}
		  	}elseif($key == "price"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$quotation_data[$key] = implode(" , ", $_REQUEST[$key]);;
		  		}
		  	}elseif($key == "quantity"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$quotation_data[$key] = implode(" , ", $_REQUEST[$key]);;
		  		}
		  	}elseif($key == "amount"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$quotation_data[$key] = implode(" , ", $_REQUEST[$key]);;
		  		}
		  	}else{
		  		$quotation_data[$key] = $value;
		  	}
		}

		
		
		$this->table ="customer";
		$customer_phone = isset($customer_data["customer_phone"]) && !empty($customer_data["customer_phone"]) ? $customer_data["customer_phone"] : "";
		
		$query = "SELECT * FROM {$this->table} WHERE ";
		$query .= "customer_phone = '{$customer_phone}' ";
		$result = mysqli_query($this->connection,$query);
		$customer_fetch = mysqli_fetch_object($result);

		
		if($customer_fetch){
			$customer_id = $customer_fetch->customer_id;
		}elseif($customer = $this->insert($customer_data)){
			$customer_id = mysqli_insert_id($this->connection);
		}else{
			$customer_id = false;
		}
	
		if(count($quotation_data) > 0){
			$this->table = "quotation";
			if($customer_id){
				$quotation_data["customer_id"] = $customer_id;
			}
			$quotation_data["quotation_date"] = date("Y-m-d", strtotime($quotation_data["quotation_date"]));
	        if($this->insert($quotation_data)){
	        	$last_insert_id = mysqli_insert_id($this->connection);
	        	Utility::redirect("view_quotation.php?id=$last_insert_id");
	        }else{
	        	Utility::message("Quotation Creation Failed");
	        }
    	}
	}

	public function show_single_quotation($id = null){

			$this->table = "quotation";
			$query = "SELECT * FROM {$this->table} WHERE id = {$id}";
			$result = mysqli_query($this->connection,$query);
			$quotation_no_fetch = mysqli_fetch_object($result);
			return $quotation_no_fetch;
	}

	public function show_customer($id = null){
			$this->table = "customer";
			$query = "SELECT * FROM {$this->table} WHERE `customer_id` = '{$id}'";
			$result = mysqli_query($this->connection,$query);
			$customer_no_fetch = mysqli_fetch_object($result);
			return $customer_no_fetch;
	}

	public function view(){

		$dbConnect = new Connection();
		$quotation = array();

		$query = "SELECT * FROM `quotation`";
        $result = mysql_query($query);
        
        while($row = mysql_fetch_object($result)){
            $quotation[] = $row;
        }
        return $quotation;

	}

	public function updates(){
        if($updateQuotation){
          return "Quotation has updated successfully";
        }else{
          return "Quotation Updatation Failed";
        }

	}



	public function deletes($id){
        	if($result && mysqli_affected_rows($dbConnect->connection) == 1){
        		return "Quotation has deleted successfully";
        	}else{
        		return "Quotation deletation Failed";
        	}
	}




}