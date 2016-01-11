<?php
  namespace App\SalesOrder;
  require_once '../vendor/autoload.php';

  use App\Utility\Utility;
  use App\Connection\Connection;

class SalesOrder{
		public $id;
		public $customer_id;
		public $quotation_id;
		public $date;
		public $total;
		public $paid;
		public $due;
		public $notes;

		// Customer info comes from costomer table
		public $customer_name; 
		public $customer_phone;
		public $customer_address;
		public $customer_balance;
		public $customer_payment_due;

	}


	public function createSalesOrder(){
		$dbConnect = new Connection();

		$query = "INSERT INTO purchase_orders( ";
		$query .="`id`, ";
		$query .="`customer_id`, ";
		$query .="`quotation_id`, ";
		$query .="`date`, ";
		$query .="`total`, ";
		$query .="`paid`, ";
		$query .="`due`, ";
		$query .="`notes` ";
		$query .= ")VALUES( ";
		$query .="'{$this->id}', ";
		$query .="'{$this->customer_id}', ";
		$query .="'{$this->quotation_id}', ";
		$query .="'{$this->date}', ";
		$query .="'{$this->total}', ";
		$query .="'{$this->paid}', ";
		$query .="'{$this->due}', ";
		$query .="'{$this->notes}' ";
        $query .= ")";


		$customer_query = "";

        $createSalesOrder = mysqli_query($dbConnect->connection,$query);
        if($createSalesOrder){
          return "Sales Order has created successfully";
        }else{
          return "Sales Order Creation Failed";
        }
	}


	public function view(){

		$dbConnect = new Connection();
		$salesOrder = array();

		$query = "SELECT * FROM `purchase_orders`";
        $result = mysql_query($query);
        
        while($row = mysql_fetch_object($result)){
            $salesOrder[] = $row;
        }
        return $salesOrder;

	}

	public function update(){

		$dbConnect = new Connection();

		$query = "UPDATE `purchase_orders` SET ";
		$query .="`id`= ";
		$query .="'{$this->id}', ";
		$query .="`customer_id`= ";
		$query .="'{$this->customer_id}', ";
		$query .="`quotation_id`= ";
		$query .="'{$this->quotation_id}', ";
		$query .="`date`= ";
		$query .="'{$this->date}', ";
		$query .="`total`= ";
		$query .="'{$this->total}', ";
		$query .="`paid`= ";
		$query .="'{$this->paid}', ";
		$query .="`due`= ";
		$query .="'{$this->due}', ";
		$query .="`notes`= ";
		$query .="'{$this->notes}' ";

        $updateSalesOrder = mysqli_query($dbConnect->connection,$query);
        if($updateSalesOrder){
          return "Sales Order has updated successfully";
        }else{
          return "Sales Order Updatation Failed";
        }

	}



	public function delete($id){

		$dbConnect = new Connection();
		if(is_null($id)){
            return "Select a Sales Order to Delete";
        }else{
        	$query = "DELETE FROM `purchase_orders` WHERE `id` = ".$id;
        	$result = mysql_query($query);
        	if($result && mysqli_affected_rows($dbConnect->connection) == 1){
        		return "Sales Order has deleted successfully";
        	}else{
        		return "Sales Order deletation Failed";
        	}
        }
	}




}