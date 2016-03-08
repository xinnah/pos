<?php
  namespace App\Inventory;
  require_once '../vendor/autoload.php';

  use App\Model\Model;
  use App\Utility\Utility;
  use App\Connection\Connection;


class Inventory extends Model{
	public $table;
	public $id;
	public function __construct(){
		parent::__construct();
	}


###################################### 	Category Start	###########################################

	public function add_category($data = array()){

		if(is_array($data) && array_key_exists("category_name", $data)){
			if(!empty($data["category_name"])){
				$this->table = "product_category";
				if($this->insert($data)){
					Utility::message("Product Category Added successfully");
					Utility::redirect("add_new_category.php");
				}else{
					Utility::message("Product Category Addition Failed");
				}
			}else{
				Utility::message("Product Category Can't be Empty");
			}
		}
		
	}


	public function view_all_category(){

		$this->table = "product_category";
		$query = "SELECT * FROM {$this->table}";
        $result = mysqli_query($this->connection,$query);
        
        return $result;
	}

	public function delete_category($id = null){
		$this->table = "product_category";
		if($this->delete($id)){
			Utility::message("Category has Delete successfully");
			Utility::redirect("add_new_category.php");
		}else{
			Utility::message("Category Deletion Failed");
		}
	}


###################################### 	Brand Start	###########################################

	public function add_brand($data = array()){

		if(is_array($data) && array_key_exists("brand_name", $data)){
			if(!empty($data["brand_name"])){
				$this->table = "product_brand";
				if($this->insert($data)){
					Utility::message("Product Brand Added successfully");
					Utility::redirect("add_new_brand.php");
				}else{
					Utility::message("Product Brand Addition Failed");
				}
			}else{
				Utility::message("Product Brand Can't be Empty");
			}
		}
		
	}

	public function view_all_brand(){

		$this->table = "product_brand";
		$query = "SELECT * FROM {$this->table}";
        $result = mysqli_query($this->connection,$query);
        
        return $result;
	}

	public function delete_brand($id = null){
		$this->table = "product_brand";
		if($this->delete($id)){
			Utility::message("Product Brand Delete successfully");
			Utility::redirect("add_new_brand.php");
		}else{
			Utility::message("Product Brand Deletion Failed");
		}
	}



###################################### 	Location Start	###########################################

	public function add_location($data = array()){

		if(is_array($data) && array_key_exists("location_name", $data)){
			if(!empty($data["location_name"])){
				$this->table = "location";
				if($this->insert($data)){
					Utility::message("Location Added successfully");
					Utility::redirect("add_new_location.php");
				}else{
					Utility::message("Location Addition Failed");
				}
			}else{
				Utility::message("Location Can't be Empty");
			}
		}
		
	}

	public function view_all_location(){

		$this->table = "location";
		$query = "SELECT * FROM {$this->table}";
        $result = mysqli_query($this->connection,$query);
        
        return $result;
	}

	public function delete_location($id = null){
		$this->table = "location";
		if($this->delete($id)){
			Utility::message("Location Delete successfully");
			Utility::redirect("add_new_location.php");
		}else{
			Utility::message("Location Deletion Failed");
		}
	}

###################################### 	UOM Start	###########################################

	public function add_uom($data = array()){
		if(is_array($data) && array_key_exists("uom", $data)){
			if(!empty($data["uom"])){
				$this->table = "unit_of_measurement";
				if($this->insert($data)){
					Utility::message("Unit of Measurement Entry Added successfully");
					Utility::redirect("units_of_measurement.php");
				}else{
					Utility::message("Unit of Measurement Entry Addition Failed");
				}
			}else{
				Utility::message("Unit of Measurement Entry Can't be Empty");
			}
		}
	}

	public function view_all_uom(){

		$this->table = "unit_of_measurement";
		$query = "SELECT * FROM {$this->table}";
        $result = mysqli_query($this->connection,$query);
        
        return $result;
	}

	public function delete_uom($id = null){
		$this->table = "unit_of_measurement";
		if($this->delete($id)){
			Utility::message("Unit of Measurement Entry Delete successfully");
			Utility::redirect("units_of_measurement.php");
		}else{
			Utility::message("Unit of Measurement Entry Deletion Failed");
		}
	}


###################################### 	Inventory Start	###########################################


	public function add_items_to_inventory($data = array()){
		$this->table = "inventory";

		$purchase_cost_per_unit = $data['purchase_cost_per_unit'];
		$sales_price_per_unit = $data['sales_price_per_unit'];
		$total_stock = $data['total_stock'];
		$data['stock_value_on_purchase'] = $purchase_cost_per_unit * $total_stock;
		$data['stock_value_on_sale'] = $sales_price_per_unit * $total_stock;

        if($this->insert($data)){
          Utility::message("Inventory item has been created successfully");
          Utility::redirect("inventory.php");
        }else{
          Utility::message("Inventory item addition Failed");
        }
	}


	public function show_single_inventory_item($str = null){
		$this->table = "inventory";
		$query = "SELECT * FROM {$this->table} WHERE `product_name` = '{$str}'";
		// Utility::dd($query);
		$result = mysqli_query($this->connection,$query);
		$inventory_item_no_fetch = mysqli_fetch_object($result);
		return $inventory_item_no_fetch;
	}



################################################################################
	public function import_csv($data){

		$name = $data["name"];
        $type = explode(".", $name);
        $type = end($type);

        $allowed = array("csv");
        if(in_array($type,$allowed)){

            $file = fopen("{$name}", "r");
            $num = 1;
            while ($csv = fgetcsv($file)) {

            	if($num == 1){
            		$num++;
            		continue;
            	}else{
	                $csv_value = array_values($csv);
	                $csv_value = "'".implode("','", $csv_value)."'";

	                $query = "INSERT INTO `inventory` ( ";
	                $query .= "`barcode`, "; 
	                $query .= "`product_name`, "; 
	                $query .= "`category`, "; 
	                $query .= "`product_code`, "; 
	                $query .= "`brand`, "; 
	                $query .= "`model`, "; 
	                $query .= "`specification`, "; 
	                $query .= "`uom`, "; 
	                $query .= "`purchase_cost_per_unit`, "; 
	                $query .= "`sales_price_per_unit`, "; 
	                $query .= "`warehouse_stock`, "; 
	                $query .= "`shop_stock`, "; 
	                $query .= "`total_stock`, "; 
	                $query .= "`stock_value_on_purchase`, "; 
	                $query .= "`stock_value`, "; 
	                $query .= "`stock_value_on_sale`, "; 
	                $query .= "`purchase_order_ref`, "; 
	                $query .= "`added_by`";
	                $query .= " )VALUES( ";
	                $query .= $csv_value;
	                $query .= " )";

	                $result = mysqli_query($this->connection,$query);
	            }
            }

            if(mysqli_affected_rows($this->connection) >= 1){
            	Utility::message("CSV file has imported successfully");
            }
        }else{
            Utility::message("This is not CSV file");
        }

	}

#############################################################################################

	public function export_csv(){
		$fileName = "uploads/csv/".date("d_m_Y_H_i_s_ms",time()).".csv";
		$fileOpen = fopen($fileName, "w");

		

		$query = "SELECT * FROM `inventory` ORDER BY sl_no ASC";
		$result = mysqli_query($this->connection,$query);

		$columnsName = mysqli_fetch_assoc($result);
		array_shift($columnsName);
		$column = array_keys($columnsName);
		$column = '"'.implode('","', $column).'"';
		$column .= "\n";

		fwrite($fileOpen, $column);

		mysqli_data_seek($result,0);

		while($columnsName = mysqli_fetch_assoc($result)){
			array_shift($columnsName);
			$values = array_values($columnsName);
			$values = '"'.implode('","', $values).'"';
			$values .= "\n";
			fwrite($fileOpen, $values);
		}
		
		fclose($fileOpen);

		if($this->downloadFile($fileName) !== false){
			unlink($fileName);
		}
		
	}


	private function downloadFile($file = "") {
    if (file_exists($file)) {
        ob_clean();
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment;filename=' . basename($file));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
	    }
	}

}