<?php
  namespace App\Summary;
  require_once '../vendor/autoload.php';

  use App\Model\Model;
  use App\Utility\Utility;


class Summary extends Model{
	public $table;
	public $id;
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Dhaka");
	}

	function sales_summary($status){
		$this->table = "invoice";
    if($status == "today"){
      $today = date("Y-m-d", strtotime("Today"));
      $query = "SELECT `amount` FROM {$this->table} WHERE `invoice_date` = '{$today}' ";
    }elseif($status == "month"){
      $month = date("F", strtotime("Today"));
      $query = "SELECT `amount` FROM {$this->table} WHERE MONTHNAME(`invoice_date`) = '{$month}' ";
    }elseif($status == "year"){
      $year = date("Y", strtotime("Today"));
   		$query = "SELECT `amount` FROM {$this->table} WHERE YEAR(`invoice_date`) = '{$year}' ";
    }
   		// Utility::dd($query);
        $result = mysqli_query($this->connection,$query);
        
        $selectAll = array();

        if($result){
            while ($row = mysqli_fetch_object($result)) {
                $selectAll[] = array_sum(explode(",", $row->amount));
            }
        }
        // Utility::dd($selectAll);
        return $selectAll;
	}


  public function pending_purchase_order(){
    $this->table = "purchase_order";
    $query = "SELECT * FROM {$this->table} WHERE `po_status` = 'Received' ORDER BY `id` DESC";
    $result = mysqli_query($this->connection,$query);
        
        $selectAll = array();

        if($result){
            while ($row = mysqli_fetch_object($result)) {
                $selectAll[] = $row;
            }
        }
        return $selectAll;
  }

  public function outstanding_order_summary(){
    $purchase_order = array();

    $query = "SELECT * FROM `purchase_order` ORDER BY id DESC LIMIT 5";
        $result = mysqli_query($this->connection,$query);
        
        while($row = mysqli_fetch_object($result)){
            $purchase_order[] = $row;
        }
        return $purchase_order;
  }


  public function low_stock_summary(){
    $low_stock = array();

    $query = "SELECT * FROM `inventory` ORDER BY `total_stock` ASC LIMIT 5";
        $result = mysqli_query($this->connection,$query);
        
        while($row = mysqli_fetch_object($result)){
            $low_stock[] = $row;
        }
        return $low_stock;
  }

  public function salary_summary(){
    $low_stock = array();

    $query = "SELECT * FROM `overhead_cost` WHERE `cost_label` = 'Pay Salary' ORDER BY `id` DESC LIMIT 5";
        $result = mysqli_query($this->connection,$query);
        
        while($row = mysqli_fetch_object($result)){
            $low_stock[] = $row;
        }
        return $low_stock;
  }


  function overhead_summary($status = false){
    $this->table = "overhead_cost";
    if($status){
      $month = date("F", strtotime("Today"));
      $query = "SELECT * FROM {$this->table} WHERE MONTHNAME(`date`) = '{$month}' ";
    }else{
      $query = "SELECT * FROM {$this->table} ";
    }
    
      // Utility::dd($query);
        $result = mysqli_query($this->connection,$query);
        
        $selectAll = array();

        if($result){
            while ($row = mysqli_fetch_object($result)) {
                $selectAll[] = $row->total_cost;
            }
        }
        return $selectAll;
  }




}