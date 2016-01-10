<?php
  namespace App\Invoice;
  require_once '../vendor/autoload.php';

  use App\Utility\Utility;
  use App\Connection\Connection;

class Invoice{
		public $sl_no = "";
		public $customer_id = "";
		public $invoice_no = "";
		public $product_description = "";
		public $uom = "";
		public $cost_per_unit = "";
		public $price_per_unit = "";
		public $quantity = "";
		public $amount = "";
		public $vat = "";
		public $delivery_charge = "";
		public $total = "";
		public $paid = "";
		public $due = "";
		public $notes = "";

		// Customer info comes from costomer table
		public $customer_name; 
		public $customer_phone;
		public $customer_address;
		public $customer_balance;
		public $customer_payment_due;

	}


	public function createInvoice(){
		$dbConnect = new Connection();

		$query = "INSERT INTO invoice( ";
		$query .="`sl_no`, ";
		$query .="`customer_id`, ";
		$query .="`invoice_no`, ";
		$query .="`product_description`, ";
		$query .="`uom`, ";
		$query .="`cost_per_unit`, ";
		$query .="`price_per_unit`, ";
		$query .="`quantity`, ";
		$query .="`amount`, ";
		$query .="`vat`, ";
		$query .="`delivery_charge`, ";
		$query .="`total`, ";
		$query .="`paid`, ";
		$query .="`due`, ";
		$query .="`notes` ";
		$query .= ")VALUES( ";
		$query .="'{$this->sl_no}', ";
		$query .="'{$this->customer_id}', ";
		$query .="'{$this->invoice_no}', ";
		$query .="'{$this->product_description}', ";
		$query .="'{$this->uom}', ";
		$query .="'{$this->cost_per_unit}', ";
		$query .="'{$this->price_per_unit}', ";
		$query .="'{$this->quantity}', ";
		$query .="'{$this->amount}', ";
		$query .="'{$this->vat}', ";
		$query .="'{$this->delivery_charge}', ";
		$query .="'{$this->total}', ";
		$query .="'{$this->paid}', ";
		$query .="'{$this->due}', ";
		$query .="'{$this->notes}' ";
        $query .= ")";


		$customer_query = "";

        $createInvoice = mysqli_query($dbConnect->connection,$query);
        if($createInvoice){
          return "Invoice has created successfully";
        }else{
          return "Invoice Creation Failed";
        }
	}


	public function view(){

		$dbConnect = new Connection();
		$invoice = array();

		$query = "SELECT * FROM `invoice`";
        $result = mysql_query($query);
        
        while($row = mysql_fetch_object($result)){
            $invoice[] = $row;
        }
        return $invoice;

	}

	public function update(){

		$dbConnect = new Connection();

		$query = "UPDATE `invoice` SET ";
		$query .="`sl_no`= ";
		$query .="'{$this->sl_no}', ";
		$query .="`customer_id`= ";
		$query .="'{$this->customer_id}', ";
		$query .="`invoice_no`= ";
		$query .="'{$this->invoice_no}', ";
		$query .="`product_description`= ";
		$query .="'{$this->product_description}', ";
		$query .="`uom`= ";
		$query .="'{$this->uom}', ";
		$query .="`cost_per_unit`= ";
		$query .="'{$this->cost_per_unit}', ";
		$query .="`price_per_unit`= ";
		$query .="'{$this->price_per_unit}', ";
		$query .="`quantity`= ";
		$query .="'{$this->quantity}', ";
		$query .="`amount`= ";
		$query .="'{$this->amount}', ";
		$query .="`vat`= ";
		$query .="'{$this->vat}', ";
		$query .="`delivery_charge`= ";
		$query .="'{$this->delivery_charge}', ";
		$query .="`total`= ";
		$query .="'{$this->total}', ";
		$query .="`paid`= ";
		$query .="'{$this->paid}', ";
		$query .="`due`= ";
		$query .="'{$this->due}', ";
		$query .="`notes`= ";
		$query .="'{$this->notes}' ";

        $updateInvoice = mysqli_query($dbConnect->connection,$query);
        if($updateInvoice){
          return "Invoice has updated successfully";
        }else{
          return "Invoice Updatation Failed";
        }

	}



	public function update($id){

		$dbConnect = new Connection();
		if(is_null($id)){
            return "Select a invoice to Delete";
        }else{
        	$query = "DELETE FROM `invoice` WHERE `id` = ".$id;
        	$result = mysql_query($query);
        	if($result && mysqli_affected_rows($dbConnect->connection) == 1){
        		return "Invoice has deleted successfully";
        	}else{
        		return "Invoice deletation Failed";
        	}
        }
	}




}