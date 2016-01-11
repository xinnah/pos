<?php
  namespace App\Quotation;
  require_once '../vendor/autoload.php';

  use App\Utility\Utility;
  use App\Connection\Connection;

class Quotation{
		public $sl_no;
		public $customer_id;
		public $quotation_no;
		public $product_description;
		public $uom;
		public $cost_per_unit;
		public $price_per_unit;
		public $quantity;
		public $amount;
		public $vat;
		public $delivery_charge;
		public $total;
		public $paid;
		public $sales_order_no;
		public $invoice_no;
		public $delivery_receipt_no;

		// Customer info comes from costomer table
		public $customer_name; 
		public $customer_phone;
		public $customer_address;
		public $customer_balance;
		public $customer_payment_due;

	}


	public function createQuotation(){
		$dbConnect = new Connection();

		$query = "INSERT INTO quotation( ";
		$query .="`sl_no`, ";
		$query .="`customer_id`, ";
		$query .="`quotation_no`, ";
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
		$query .="`sales_order_no`, ";
		$query .="`invoice_no`, ";
		$query .="`delivery_receipt_no` ";
		$query .= ")VALUES( ";
		$query .="'{$this->sl_no}', ";
		$query .="'{$this->customer_id}', ";
		$query .="'{$this->quotation_no}', ";
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
		$query .="'{$this->sales_order_no}', ";
		$query .="'{$this->invoice_no}', ";
		$query .="'{$this->delivery_receipt_no}' ";
        $query .= ")";


		$customer_query = "";

        $createQuotation = mysqli_query($dbConnect->connection,$query);
        if($createQuotation){
          return "Invoice has created successfully";
        }else{
          return "Invoice Creation Failed";
        }
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

	public function update(){

		$dbConnect = new Connection();

		$query = "UPDATE `quotation` SET ";
		$query .="`sl_no`= ";
		$query .="'{$this->sl_no}', ";
		$query .="`customer_id`= ";
		$query .="'{$this->customer_id}', ";
		$query .="`quotation_no`= ";
		$query .="'{$this->quotation_no}', ";
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
		$query .="`sales_order_no`= ";
		$query .="'{$this->sales_order_no}', ";
		$query .="`invoice_no`= ";
		$query .="'{$this->invoice_no}', ";
		$query .="`delivery_receipt_no`= ";
		$query .="'{$this->delivery_receipt_no}' ";

        $updateQuotation = mysqli_query($dbConnect->connection,$query);
        if($updateQuotation){
          return "Quotation has updated successfully";
        }else{
          return "Quotation Updatation Failed";
        }

	}



	public function delete($id){

		$dbConnect = new Connection();
		if(is_null($id)){
            return "Select a quotation to Delete";
        }else{
        	$query = "DELETE FROM `quotation` WHERE `id` = ".$id;
        	$result = mysql_query($query);
        	if($result && mysqli_affected_rows($dbConnect->connection) == 1){
        		return "Quotation has deleted successfully";
        	}else{
        		return "Quotation deletation Failed";
        	}
        }
	}




}