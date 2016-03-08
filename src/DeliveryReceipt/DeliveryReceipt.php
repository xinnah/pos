<?php
  namespace App\DeliveryReceipt;

  use App\Model\Model;
  use App\Utility\Utility;
  use App\Connection\Connection;

class DeliveryReceipt extends Model{

	public $table;

	public function __construct(){
		parent::__construct();
	}

public function show_delivery_receipts_number(){
    $this->table = "delivery_receipts";
    $query = "SELECT * FROM {$this->table} ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($this->connection,$query);
    $delivery_receipts_no_fetch = mysqli_fetch_object($result);
    $delivery_receipts_no = $delivery_receipts_no_fetch->delivery_receipts_no+1;
    return $delivery_receipts_no;
  }



  public function create_delivery_receipts($data = array()){
    $this->table = "delivery_receipts";
    $delivery_receipt_data = array();
    foreach ($data as $key => $value) {

        if($key == "product_description"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $delivery_receipt_data[$key] = implode(" , ", $_REQUEST[$key]);
          }
        }elseif($key == "uom"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $delivery_receipt_data[$key] = implode(" , ", $_REQUEST[$key]);
          }
        }elseif($key == "ordered_quantity"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $delivery_receipt_data[$key] = implode(" , ", $_REQUEST[$key]);
          }
        }elseif($key == "quantity_delivered"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $delivery_receipt_data[$key] = implode(" , ", $_REQUEST[$key]);
          }
        }elseif($key == "remaining_quantity"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $delivery_receipt_data[$key] = implode(" , ", $_REQUEST[$key]);
          }
        }else{
          $delivery_receipt_data[$key] = $value;
        }
    }

      $delivery_receipt_data["delivered_by"] = isset($_SESSION["username"]) ? $_SESSION["username"] : "";
          if($this->insert($delivery_receipt_data)){
            $last_insert_id = mysqli_insert_id($this->connection);
            Utility::redirect("view_sales_generate_delivery_receipts.php?id=$last_insert_id");
          }else{
            Utility::message("Delivery Receipt Creation Failed");
          }
  }
	


	

	public function show_single_delivery_receipt($id = null){

			$this->table = "delivery_receipts";
			$query = "SELECT * FROM {$this->table} WHERE id = {$id}";
			$result = mysqli_query($this->connection,$query);
			$delivery_receipts_fetch = mysqli_fetch_object($result);
			return $delivery_receipts_fetch;
	}

	public function show_customer($id = null){
			$this->table = "customer";
			$query = "SELECT * FROM {$this->table} WHERE `customer_id` = '{$id}'";
			$result = mysqli_query($this->connection,$query);
			$customer_no_fetch = mysqli_fetch_object($result);
			return $customer_no_fetch;
	}

	




}