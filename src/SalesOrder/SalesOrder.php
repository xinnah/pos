<?php
  namespace App\SalesOrder;

  use App\Model\Model;
  use App\Utility\Utility;
  use App\Connection\Connection;

class SalesOrder extends Model{

	public $table;

	public function __construct(){
		parent::__construct();
	}



	public function show_sales_order_number(){
		$this->table = "sales_order";
		$query = "SELECT * FROM {$this->table} ORDER BY id DESC LIMIT 1";
		$result = mysqli_query($this->connection,$query);
		$sales_order_no_fetch = mysqli_fetch_object($result);
		$sales_order_no = $sales_order_no_fetch->sales_order_no+1;
		return $sales_order_no;
	}


	public function create_sales_order($data = array()){

		$sales_order_data = array();
		$customer_data = array();
		foreach ($data as $key => $value) {
		  	if($key == "customer"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$customer_key = str_replace("'", "", $customer_key);
		  			$customer_data[$customer_key] = $customer_value;
		  		}
		  	}elseif($key == "barcode"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$sales_order_data[$key] = implode(" , ", $_REQUEST[$key]);;
		  		}
		  	}elseif($key == "product_description"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$sales_order_data[$key] = implode(" , ", $_REQUEST[$key]);;
		  		}
		  	}elseif($key == "uom"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$sales_order_data[$key] = implode(" , ", $_REQUEST[$key]);;
		  		}
		  	}elseif($key == "cost_per_unit"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$sales_order_data[$key] = implode(" , ", $_REQUEST[$key]);;
		  		}
		  	}elseif($key == "price"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$sales_order_data[$key] = implode(" , ", $_REQUEST[$key]);;
		  		}
		  	}elseif($key == "quantity"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$sales_order_data[$key] = implode(" , ", $_REQUEST[$key]);;
		  		}
		  	}elseif($key == "amount"){
		  		foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
		  			$sales_order_data[$key] = implode(" , ", $_REQUEST[$key]);;
		  		}
		  	}else{
		  		$sales_order_data[$key] = $value;
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
	
		if(count($sales_order_data) > 0){
			$this->table = "sales_order";
			if($customer_id){
				$sales_order_data["customer_id"] = $customer_id;
			}
			$sales_order_data["so_date"] = date("Y-m-d", strtotime($sales_order_data["so_date"]));
	        if($this->insert($sales_order_data)){
	        	$last_insert_id = mysqli_insert_id($this->connection);
	        	Utility::redirect("view_sales_order.php?id=$last_insert_id");
	        }else{
	        	Utility::message("Sales Order Creation Failed");
	        }
    	}
	}

	public function show_single_sales_order($id = null){

			$this->table = "sales_order";
			$query = "SELECT * FROM {$this->table} WHERE id = {$id}";
			$result = mysqli_query($this->connection,$query);
			$sales_order_no_fetch = mysqli_fetch_object($result);
			return $sales_order_no_fetch;
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
		$sales_order = array();

		$query = "SELECT * FROM `sales_order`";
        $result = mysql_query($query);
        
        while($row = mysql_fetch_object($result)){
            $sales_order[] = $row;
        }
        return $sales_order;

	}

	public function updates(){
        if($updatesales_order){
          return "sales_order has updated successfully";
        }else{
          return "sales_order Updatation Failed";
        }

	}



	public function deletes($id){
        	if($result && mysqli_affected_rows($dbConnect->connection) == 1){
        		return "sales_order has deleted successfully";
        	}else{
        		return "sales_order deletation Failed";
        	}
	}




}