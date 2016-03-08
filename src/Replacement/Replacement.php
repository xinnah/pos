<?php
  namespace App\Replacement;

  use App\Model\Model;
  use App\Utility\Utility;
  use App\Connection\Connection;

class Replacement extends Model{

	public $table;

	public function __construct(){
		parent::__construct();
	}



  public function create_replacement($data = array()){
    $replacement_data = array();
    $customer_id = "";
    $due = "";
    foreach ($data as $key => $value) {

        if($key == "previous_item"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $replacement_data[$key] =serialize($_REQUEST[$key]);
          }
        }elseif($key == "replaced_item"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $replacement_data[$key] =serialize($_REQUEST[$key]);
          }
        }elseif($key == "customer_id"){
            $customer_id = $_REQUEST[$key];
            $replacement_data[$key] = $value;
        }elseif($key == "due"){
            $due = $_REQUEST[$key];
        }else{
          $replacement_data[$key] = $value;
        }
    }

      $replacement_data["replace_by"] = isset($_SESSION["username"]) ? $_SESSION["username"] : "";
      $replacement_data["cost_adjusted"] = "";
      $replacement_data["amount_to_be_adjusted"] = "";
      if(count($replacement_data["previous_item"]) > 0){
        $previous_items = unserialize($replacement_data["previous_item"]);
        $previous_item = trim($previous_items["product_description"]);
        $previous_item_quantity = $previous_items["quantity"];
        $previous_cost_per_unit = trim($previous_items["cost_per_unit"]);
        $replacement_data["cost_adjusted"] .= ($previous_cost_per_unit * $previous_item_quantity);
        $previous_amount = trim($previous_items["amount"]);
        $replacement_data["amount_to_be_adjusted"] .= $previous_amount;

        $this->table = "inventory";
        $query = "UPDATE {$this->table} SET ";
        $query .= "`shop_stock` = `shop_stock`+'{$previous_item_quantity}',";
        $query .= "`total_stock` = `total_stock`+'{$previous_item_quantity}' ";
        $query .= "WHERE `product_name`='{$previous_item}'";
        mysqli_query($this->connection,$query);
        // Utility::d($query);
      }

      if(count($replacement_data["replaced_item"]) > 0){
        $replaced_items = unserialize($replacement_data["replaced_item"]);
        $replaced_item = trim($replaced_items["product_description"]);
        $replaced_item_quantity = $replaced_items["quantity"];
        $replaced_cost_per_unit = trim($replaced_items["cost_per_unit"]);
        $replacement_data["cost_adjusted"] -= ($replaced_cost_per_unit * $replaced_item_quantity);
        $replaced_item_amount = trim($replaced_items["amount"]);
        $replacement_data["amount_to_be_adjusted"] -= $replaced_item_amount;

        $this->table = "inventory";
        $query = "UPDATE {$this->table} SET ";
        $query .= "`shop_stock` = `shop_stock`-'{$replaced_item_quantity}',";
        $query .= "`total_stock` = `total_stock`-'{$replaced_item_quantity}' ";
        $query .= "WHERE `product_name`='{$replaced_item}'";
        mysqli_query($this->connection,$query);
        // Utility::d($query);
      }
      

      if(!empty($due) && !empty($customer_id)){
        $this->table = "customer";
        $query = "UPDATE {$this->table} SET `customer_payment_due` = `customer_payment_due`+{$due} ";
          $query .= "WHERE `customer_id` = {$customer_id}";
          $due_query = mysqli_query($this->connection,$query);
           // Utility::d($query);
      }
      
      // Utility::dd($replacement_data);

      $this->table = "replacement";
      if($this->insert($replacement_data)){
        Utility::message("Item Replacement Process Successful");
        Utility::redirect("replacement.php");
      }else{
        Utility::message("Item Replacement Process Failed");
      }
  }
	

  public function show_replcement_history(){
    $this->table = "replacement";

    $newArray = array();

    $query = "SELECT * FROM {$this->table} ORDER BY `date` DESC";
    $result = mysqli_query($this->connection,$query);


    while($replacement = mysqli_fetch_object($result)) {
      $newArray[] = $replacement;
    }
    return $newArray;
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