<?php
  namespace App\PurchaseOrder;

  use App\Model\Model;
  use App\Utility\Utility;
  use App\Connection\Connection;

class PurchaseOrder extends Model{

	public $table;

	public function __construct(){
		parent::__construct();
	}



	public function show_purchase_order_number(){
		$this->table = "purchase_order";
		$query = "SELECT * FROM {$this->table} ORDER BY id DESC LIMIT 1";
		$result = mysqli_query($this->connection,$query);
		$purchase_order_no_fetch = mysqli_fetch_object($result);
		$purchase_order_no = $purchase_order_no_fetch->id+1;
		return $purchase_order_no;
	}


	public function create_purchase_order($data = array()){

		$purchase_order_data = array();
		$supplier_data = array();
		foreach ($data as $key => $value) {
		  	if($key == "supplier"){
		  		foreach ($_REQUEST[$key] as $supplier_key => $supplier_value) {
		  			$supplier_key = str_replace("'", "", $supplier_key);
		  			$supplier_data[$supplier_key] = $supplier_value;
		  		}
		  	}else{
		  		$purchase_order_data[$key] = $value;
		  	}
		}

		
		
		$this->table ="supplier";
		$supplier_phone = isset($supplier_data["supplier_phone"]) && !empty($supplier_data["supplier_phone"]) ? $supplier_data["supplier_phone"] : "";
		
		$query = "SELECT * FROM {$this->table} WHERE ";
		$query .= "supplier_phone = '{$supplier_phone}' ";
		$result = mysqli_query($this->connection,$query);
		$supplier_fetch = mysqli_fetch_object($result);

		
		if($supplier_fetch){
			$supplier_id = $supplier_fetch->supplier_id;
		}elseif($supplier = $this->insert($supplier_data)){
			$supplier_id = mysqli_insert_id($this->connection);
		}else{
			$supplier_id = false;
		}
	
		if(count($purchase_order_data) > 0){
			if($supplier_id){
				$this->table = "supplier";
		        if(array_key_exists("due", $purchase_order_data)){
		          $due = $purchase_order_data["due"];
		          $query = "UPDATE {$this->table} SET `due_to_supplier` = `due_to_supplier`+{$due} ";
		          $query .= "WHERE `supplier_id` = {$supplier_id}";
		          $due_query = mysqli_query($this->connection,$query);
		        }
				$purchase_order_data["supplier_id"] = $supplier_id;
			}

			$this->table = "purchase_order";
			$purchase_order_data["po_date"] = date("Y-m-d", strtotime($purchase_order_data["po_date"]));
	        if($this->insert($purchase_order_data)){
	        	$last_insert_id = mysqli_insert_id($this->connection);
	        	Utility::message("Purchase order is created successfully");
	        	Utility::redirect("add_purchase_orders.php");
	        }else{
	        	Utility::message("Purchase order Creation Failed");
	        }
    	}
	}

	public function show_single_purchase_order($id = null){

			$this->table = "purchase_order";
			$query = "SELECT * FROM {$this->table} WHERE id = {$id}";
			$result = mysqli_query($this->connection,$query);
			$purchase_order_no_fetch = mysqli_fetch_object($result);
			return $purchase_order_no_fetch;
	}

	public function show_supplier($id = null){
			$this->table = "supplier";
			$query = "SELECT * FROM {$this->table} WHERE `supplier_id` = '{$id}'";
			$result = mysqli_query($this->connection,$query);
			$supplier_no_fetch = mysqli_fetch_object($result);
			return $supplier_no_fetch;
	}

	public function show_all_purchase_order(){

    $purchase_order = array();

    $query = "SELECT * FROM `purchase_order` ORDER BY id DESC";
        $result = mysqli_query($this->connection,$query);
        
        while($row = mysqli_fetch_object($result)){
            $purchase_order[] = $row;
        }
        return $purchase_order;

  }

	public function purchase_order_status($data = array()){
		$this->table = "purchase_order";
		if($this->update($data)){
          Utility::message("Purchase Order has been received successfully");
          Utility::redirect("receive_purchase_orders.php");
        }else{
          Utility::message("Purchase Order Receive Failed");
        }
	}




}