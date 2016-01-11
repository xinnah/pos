<?php
  namespace App\PurchaseOrders;
  require_once '../vendor/autoload.php';

  use App\Utility\Utility;
  use App\Connection\Connection;

class PurchaseOrders{
		public $id;
		public $supplier_id;
		public $purchase_order_no;
		public $date;
		public $product_description;
		public $uom;
		public $cost_per_unit;
		public $quantity;
		public $amount;
		public $vat;
		public $taxes;
		public $delivery_charge;
		public $total;
		public $paid;
		public $due;

		// Supplier info comes from supplier table
		public $supplier_name;
		public $supplier_phone;
		public $supplier_address;
		public $supplier_balance;
		public $due_to_supplier;

	}


	public function createPurchaseOrders(){
		$dbConnect = new Connection();

		$query = "INSERT INTO purchase_orders( ";
		$query .="`id`, ";
		$query .="`supplier_id`, ";
		$query .="`purchase_order_no`, ";
		$query .="`date`, ";
		$query .="`product_description`, ";
		$query .="`uom`, ";
		$query .="`cost_per_unit`, ";
		$query .="`quantity`, ";
		$query .="`amount`, ";
		$query .="`vat`, ";
		$query .="`taxes`, ";
		$query .="`delivery_charge`, ";
		$query .="`total`, ";
		$query .="`paid`, ";
		$query .="`due` ";
		$query .= ")VALUES( ";
		$query .="'{$this->id}', ";
		$query .="'{$this->supplier_id}', ";
		$query .="'{$this->purchase_order_no}', ";
		$query .="'{$this->date}', ";
		$query .="'{$this->product_description}', ";
		$query .="'{$this->uom}', ";
		$query .="'{$this->cost_per_unit}', ";
		$query .="'{$this->quantity}', ";
		$query .="'{$this->amount}', ";
		$query .="'{$this->vat}', ";
		$query .="'{$this->taxes}', ";
		$query .="'{$this->delivery_charge}', ";
		$query .="'{$this->total}', ";
		$query .="'{$this->paid}', ";
		$query .="'{$this->due}' ";
        $query .= ")";


		$customer_query = "";

        $createPurchaseOrder = mysqli_query($dbConnect->connection,$query);
        if($createPurchaseOrder){
          return "Purchase Order has created successfully";
        }else{
          return "Purchase Order Creation Failed";
        }
	}


	public function view(){

		$dbConnect = new Connection();
		$purchaseOrders = array();

		$query = "SELECT * FROM `purchase_orders`";
        $result = mysql_query($query);
        
        while($row = mysql_fetch_object($result)){
            $purchaseOrders[] = $row;
        }
        return $purchaseOrders;

	}

	public function update(){

		$dbConnect = new Connection();

		$query = "UPDATE `purchase_orders` SET ";
		$query .="`id`= ";
		$query .="'{$this->id}', ";
		$query .="`supplier_id`= ";
		$query .="'{$this->supplier_id}', ";
		$query .="`purchase_order_no`= ";
		$query .="'{$this->purchase_order_no}', ";
		$query .="`date`= ";
		$query .="'{$this->date}', ";
		$query .="`product_description`= ";
		$query .="'{$this->product_description}', ";
		$query .="`uom`= ";
		$query .="'{$this->uom}', ";
		$query .="`cost_per_unit`= ";
		$query .="'{$this->cost_per_unit}', ";
		$query .="`quantity`= ";
		$query .="'{$this->quantity}', ";
		$query .="`amount`= ";
		$query .="'{$this->amount}', ";
		$query .="`vat`= ";
		$query .="'{$this->vat}', ";
		$query .="`taxes`= ";
		$query .="'{$this->taxes}', ";
		$query .="`delivery_charge`= ";
		$query .="'{$this->delivery_charge}', ";
		$query .="`total`= ";
		$query .="'{$this->total}', ";
		$query .="`paid`= ";
		$query .="'{$this->paid}', ";
		$query .="`due`= ";
		$query .="'{$this->due}' ";

        $updatePurchaseOrder = mysqli_query($dbConnect->connection,$query);
        if($updatePurchaseOrder){
          return "Purchase Order has updated successfully";
        }else{
          return "Purchase Order Updatation Failed";
        }

	}



	public function delete($id){

		$dbConnect = new Connection();
		if(is_null($id)){
            return "Select a Purchase Order to Delete";
        }else{
        	$query = "DELETE FROM `purchase_orders` WHERE `id` = ".$id;
        	$result = mysql_query($query);
        	if($result && mysqli_affected_rows($dbConnect->connection) == 1){
        		return "Purchase Order has deleted successfully";
        	}else{
        		return "Purchase Order deletation Failed";
        	}
        }
	}




}