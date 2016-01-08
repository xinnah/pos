<?php
  namespace App\Inventory;
  require_once '../vendor/autoload.php';

  use App\Utility\Utility;
  use App\Connection\Connection;

class Inventory{
	public $sl_no = "";
	public $product_code = "";
	public $barcode = "";
	public $product_name = "";
	public $catagory = "";
	public $band = "";
	public $model = "";
	public $specification = "";
	public $uom = "";
	public $purchase_order_ref = "";
	public $purchase_cost_per_unit = "";
	public $sales_price_per_unit = "";
	public $warehouse_stock = "";
	public $shop_stock = "";
	public $total_stock = "";
	public $stock_value_on_purchase = "";
	public $stock_value = "";
	public $stock_value_on_sale = "";
	public $added_by = "";


	public function __construct($data = false){
		$sl_no = $data['name'];
		$product_code = $data['name'];
		$barcode = $data['name'];
		$product_name = $data['name'];
		$catagory = $data['name'];
		$band = $data['name'];
		$model = $data['name'];
		$specification = $data['name'];
		$uom = $data['name'];
		$purchase_order_ref = $data['name'];
		$purchase_cost_per_unit = $data['name'];
		$sales_price_per_unit = $data['name'];
		$warehouse_stock = $data['name'];
		$shop_stock = $data['name'];
		$total_stock = $data['name'];
		$stock_value_on_purchase = $data['name'];
		$stock_value = $data['name'];
		$stock_value_on_sale = $data['name'];
		$added_by = $data['name'];
	}


	public function createInventory(){
		$dbConnect = new Connection();

		$query = "INSERT INTO inventory( ";
		$query .="sl_no, ";
		$query .="product_code, ";
		$query .="barcode, ";
		$query .="product_name, ";
		$query .="catagory, ";
		$query .="band, ";
		$query .="model, ";
		$query .="specification, ";
		$query .="uom, ";
		$query .="purchase_order_ref, ";
		$query .="purchase_cost_per_unit, ";
		$query .="sales_price_per_unit, ";
		$query .="warehouse_stock, ";
		$query .="shop_stock, ";
		$query .="total_stock, ";
		$query .="stock_value_on_purchase, ";
		$query .="stock_value, ";
		$query .="stock_value_on_sale, ";
		$query .="added_by ";
		$query .= ")VALUES( ";
		$query .="'{$this->sl_no}', ";
		$query .="'{$this->product_code}', ";
		$query .="'{$this->barcode}', ";
		$query .="'{$this->product_name}', ";
		$query .="'{$this->catagory}', ";
		$query .="'{$this->band}', ";
		$query .="'{$this->model}', ";
		$query .="'{$this->specification}', ";
		$query .="'{$this->uom}', ";
		$query .="'{$this->purchase_order_ref}', ";
		$query .="'{$this->purchase_cost_per_unit}', ";
		$query .="'{$this->sales_price_per_unit}', ";
		$query .="'{$this->warehouse_stock}', ";
		$query .="'{$this->shop_stock}', ";
		$query .="'{$this->total_stock}', ";
		$query .="'{$this->stock_value_on_purchase}', ";
		$query .="'{$this->stock_value}', ";
		$query .="'{$this->stock_value_on_sale}', ";
		$query .="'{$this->added_by}' ";
        $query .= ")";

        $createInventory = mysqli_query($dbConnect->connection,$query);
        if($createInventory){
          return "Inventory has created successfully";
        }else{
          return "Inventory Creation Failed";
        }
	}












}