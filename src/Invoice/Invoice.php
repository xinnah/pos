<?php
  namespace App\Invoice;

  use App\Model\Model;
  use App\Utility\Utility;
  use App\Connection\Connection;

class Invoice extends Model{

  public $table;

  public function __construct(){
    parent::__construct();
  }



  public function show_invoice_number(){
    $this->table = "invoice";
    $query = "SELECT * FROM {$this->table} ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($this->connection,$query);
    $invoice_no_fetch = mysqli_fetch_object($result);
    $invoice_no = $invoice_no_fetch->invoice_no+1;
    return $invoice_no;
  }


  public function createInvoice($data = array()){

    $invoice_data = array();
    $customer_data = array();
    foreach ($data as $key => $value) {
        if($key == "customer"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $customer_key = str_replace("'", "", $customer_key);
            $customer_data[$customer_key] = $customer_value;
          }
        }elseif($key == "barcode"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $invoice_data[$key] = implode(" , ", $_REQUEST[$key]);;
          }
        }elseif($key == "product_description"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $invoice_data[$key] = implode(" , ", $_REQUEST[$key]);;
          }
        }elseif($key == "uom"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $invoice_data[$key] = implode(" , ", $_REQUEST[$key]);;
          }
        }elseif($key == "cost_per_unit"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $invoice_data[$key] = implode(" , ", $_REQUEST[$key]);;
          }
        }elseif($key == "price"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $invoice_data[$key] = implode(" , ", $_REQUEST[$key]);;
          }
        }elseif($key == "quantity"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $invoice_data[$key] = implode(" , ", $_REQUEST[$key]);;
          }
        }elseif($key == "cost_amount"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $invoice_data[$key] = implode(" , ", $_REQUEST[$key]);;
          }
        }elseif($key == "amount"){
          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
            $invoice_data[$key] = implode(" , ", $_REQUEST[$key]);;
          }
        }else{
          $invoice_data[$key] = $value;
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
  
    if(count($invoice_data) > 0){

      if($customer_id){
        $this->table = "customer";
        if(array_key_exists("due", $invoice_data)){
          $due = $invoice_data["due"];
          $query = "UPDATE {$this->table} SET `customer_payment_due` = `customer_payment_due`+{$due} ";
          $query .= "WHERE `customer_id` = {$customer_id}";
          $due_query = mysqli_query($this->connection,$query);
        }
        $invoice_data["customer_id"] = $customer_id;
      }

     
      $invoice_data["invoice_date"] = date("Y-m-d", strtotime($invoice_data["invoice_date"]));
      
      $sell_item = trim(strtolower($invoice_data["product_description"]));
      $sell_item_quantity = (int) trim($invoice_data["quantity"]);

      if(!empty($sell_item) && $sell_item_quantity >=1){
        $this->table = "inventory";
        $query = "UPDATE {$this->table} SET ";
        $query .= "`shop_stock` = `shop_stock`-'{$sell_item_quantity}',";
        $query .= "`total_stock` = `total_stock`-'{$sell_item_quantity}' ";
        $query .= "WHERE LOWER(`product_name`)='{$sell_item}'";
        mysqli_query($this->connection,$query);
      }

      $this->table = "invoice";
      if($this->insert($invoice_data)){
        $last_insert_id = mysqli_insert_id($this->connection);
        Utility::redirect("view_invoice_pos.php?id=$last_insert_id");
      }else{
        Utility::message("Invoice Creation Failed");
      }
    }
  }

  public function show_single_invoice($id = null){

      $this->table = "invoice";
      $query = "SELECT * FROM {$this->table} WHERE id = {$id}";
      $result = mysqli_query($this->connection,$query);
      $invoice_no_fetch = mysqli_fetch_object($result);
      return $invoice_no_fetch;
  }

  public function show_customer($id = null){
      $this->table = "customer";
      $query = "SELECT * FROM {$this->table} WHERE `customer_id` = '{$id}'";
      $result = mysqli_query($this->connection,$query);
      $customer_no_fetch = mysqli_fetch_object($result);
      return $customer_no_fetch;
  }

  public function show_all_invoice(){

    $invoice = array();

    $query = "SELECT * FROM `invoice` ORDER BY id DESC";
        $result = mysqli_query($this->connection,$query);
        
        while($row = mysqli_fetch_object($result)){
            $invoice[] = $row;
        }
        return $invoice;

  }

  public function updates(){
        if($updateinvoice){
          return "invoice has updated successfully";
        }else{
          return "invoice Updatation Failed";
        }

  }



  public function deletes($id){
          if($result && mysqli_affected_rows($dbConnect->connection) == 1){
            return "Invoice has deleted successfully";
          }else{
            return "Invoice deletation Failed";
          }
  }




}