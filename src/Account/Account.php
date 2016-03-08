<?php
  namespace App\Account;
  require_once '../vendor/autoload.php';

  use App\Model\Model;
  use App\Utility\Utility;
  use App\Connection\Connection;


class Account extends Model{
	public $table;
	public $id;
	public function __construct(){
		parent::__construct();
	}


###################################### 	Category Start	###########################################

	public function all_overhead_cost($data = false){
    $this->table = "overhead_cost";
    $clause = "1=1 ";
    if($data && is_array($data)){
      if(array_key_exists("month", $data) && !empty($data["month"])){
        $month = $data["month"];
        $clause .= "AND MONTHNAME(date) = '{$month}' ";
      }
      if(array_key_exists("year", $data) && !empty($data["year"])){
        $year = $data["year"];
        $clause .= "AND YEAR(date) = '{$year}'";
      }
    }
    $query = "SELECT * FROM {$this->table} WHERE ".$clause." ORDER BY date DESC";
    // Utility::dd($query);
    $result = mysqli_query($this->connection,$query);
    
    $selectAll = array();

    if($result){
        while ($row = mysqli_fetch_object($result)) {
            $selectAll[] = $row;
        }
    }
    return $selectAll;
  }



  public function show_overhead_month(){
    $this->table = "overhead_cost";
    $query = "SELECT DISTINCT MONTHNAME(date) FROM {$this->table}";
    // Utility::dd($query);
    $result = mysqli_query($this->connection,$query);
    $selectAll = array();

    if($result){
        while ($row = mysqli_fetch_assoc($result)) {
            $selectAll[] = $row["MONTHNAME(date)"];
        }
    }
    return $selectAll;
  }

  public function show_overhead_year(){
    $this->table = "overhead_cost";
    $query = "SELECT DISTINCT YEAR(date) FROM {$this->table}";
    // Utility::dd($query);
    $result = mysqli_query($this->connection,$query);
    $selectAll = array();

    if($result){
        while ($row = mysqli_fetch_assoc($result)) {
            $selectAll[] = $row["YEAR(date)"];
        }
    }
    return $selectAll;
  }





  public function all_invoice_cost($data = false){
		$this->table = "invoice";
    $clause = "1=1 ";
    if($data && is_array($data)){
      if(array_key_exists("month", $data) && !empty($data["month"])){
        $month = $data["month"];
        $clause .= "AND MONTHNAME(invoice_date) = '{$month}' ";
      }
      if(array_key_exists("year", $data) && !empty($data["year"])){
        $year = $data["year"];
        $clause .= "AND YEAR(invoice_date) = '{$year}'";
      }
    }
		    $query = "SELECT * FROM {$this->table} WHERE ".$clause;
        // Utility::dd($query);
        $result = mysqli_query($this->connection,$query);
        
        $selectAll = array();

        if($result){
            while ($row = mysqli_fetch_object($result)) {
                $selectAll[] = $row;
            }
        }
        return $selectAll;
	}

  public function show_invoice_month(){
    $this->table = "invoice";
    $query = "SELECT DISTINCT MONTHNAME(invoice_date) FROM {$this->table}";
    // Utility::dd($query);
    $result = mysqli_query($this->connection,$query);
    $selectAll = array();

    if($result){
        while ($row = mysqli_fetch_assoc($result)) {
            $selectAll[] = $row["MONTHNAME(invoice_date)"];
        }
    }
    return $selectAll;
  }

  public function show_invoice_year(){
    $this->table = "invoice";
    $query = "SELECT DISTINCT YEAR(invoice_date) FROM {$this->table}";
    // Utility::dd($query);
    $result = mysqli_query($this->connection,$query);
    $selectAll = array();

    if($result){
        while ($row = mysqli_fetch_assoc($result)) {
            $selectAll[] = $row["YEAR(invoice_date)"];
        }
    }
    return $selectAll;
  }


  public function all_replacement($data = false){
    $this->table = "replacement";
    $clause = "1=1 ";
    if($data && is_array($data)){
      if(array_key_exists("month", $data) && !empty($data["month"])){
        $month = $data["month"];
        $clause .= "AND MONTHNAME(date) = '{$month}' ";
      }
      if(array_key_exists("year", $data) && !empty($data["year"])){
        $year = $data["year"];
        $clause .= "AND YEAR(date) = '{$year}'";
      }
    }
    $query = "SELECT * FROM {$this->table} WHERE ".$clause;
    // Utility::dd($query);
    $result = mysqli_query($this->connection,$query);
    
    $selectAll = array();

    if($result){
        while ($row = mysqli_fetch_object($result)) {
            $selectAll[] = $row;
        }
    }
    return $selectAll;
  }



  public function all_purchase_order_cost($data = false){
    $this->table = "purchase_order";
    $clause = "1=1 ";
    if($data && is_array($data)){
      if(array_key_exists("month", $data) && !empty($data["month"])){
        $month = $data["month"];
        $clause .= "AND MONTHNAME(po_date) = '{$month}' ";
      }
      if(array_key_exists("year", $data) && !empty($data["year"])){
        $year = $data["year"];
        $clause .= "AND YEAR(po_date) = '{$year}'";
      }
    }
        $query = "SELECT * FROM {$this->table} WHERE ".$clause;
        // Utility::dd($query);
        $result = mysqli_query($this->connection,$query);
        
        $selectAll = array();

        if($result){
            while ($row = mysqli_fetch_object($result)) {
                $selectAll[] = $row;
            }
        }
        return $selectAll;
  }

  public function show_purchase_order_month(){
    $this->table = "purchase_order";
    $query = "SELECT DISTINCT MONTHNAME(po_date) FROM {$this->table}";
    // Utility::dd($query);
    $result = mysqli_query($this->connection,$query);
    $selectAll = array();

    if($result){
        while ($row = mysqli_fetch_assoc($result)) {
            $selectAll[] = $row["MONTHNAME(po_date)"];
        }
    }
    return $selectAll;
  }

  public function show_purchase_order_year(){
    $this->table = "purchase_order";
    $query = "SELECT DISTINCT YEAR(po_date) FROM {$this->table}";
    // Utility::dd($query);
    $result = mysqli_query($this->connection,$query);
    $selectAll = array();

    if($result){
        while ($row = mysqli_fetch_assoc($result)) {
            $selectAll[] = $row["YEAR(po_date)"];
        }
    }
    return $selectAll;
  }

  public function all_sales_order_cost($data = false){
    $this->table = "sales_order";
    $clause = "1=1 ";
    if($data && is_array($data)){
      if(array_key_exists("month", $data) && !empty($data["month"])){
        $month = $data["month"];
        $clause .= "AND MONTHNAME(so_date) = '{$month}' ";
      }
      if(array_key_exists("year", $data) && !empty($data["year"])){
        $year = $data["year"];
        $clause .= "AND YEAR(so_date) = '{$year}'";
      }
    }
    $query = "SELECT * FROM {$this->table} WHERE ".$clause;
    // Utility::dd($query);
    $result = mysqli_query($this->connection,$query);
    
    $selectAll = array();

    if($result){
        while ($row = mysqli_fetch_object($result)) {
            $selectAll[] = $row;
        }
    }
    return $selectAll;
  }


  public function show_sales_order_month(){
    $this->table = "sales_order";
    $query = "SELECT DISTINCT MONTHNAME(so_date) FROM {$this->table}";
    // Utility::dd($query);
    $result = mysqli_query($this->connection,$query);
    $selectAll = array();

    if($result){
        while ($row = mysqli_fetch_assoc($result)) {
            $selectAll[] = $row["MONTHNAME(so_date)"];
        }
    }
    return $selectAll;
  }

  public function show_sales_order_year(){
    $this->table = "sales_order";
    $query = "SELECT DISTINCT YEAR(so_date) FROM {$this->table}";
    // Utility::dd($query);
    $result = mysqli_query($this->connection,$query);
    $selectAll = array();

    if($result){
        while ($row = mysqli_fetch_assoc($result)) {
            $selectAll[] = $row["YEAR(so_date)"];
        }
    }
    return $selectAll;
  }






}