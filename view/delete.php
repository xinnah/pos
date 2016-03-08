<?php require_once 'start.php'; ?>
<?php 
	use App\Inventory\Inventory;
  	use App\Connection\Connection;
	use App\Utility\Utility;


	$inventory = new Inventory;
	if(isset($_GET["brand_delete"])){
		$inventory->delete_brand($_GET["brand_delete"]);
	}elseif(isset($_GET["uom_delete"])){
		$inventory->delete_uom($_GET["uom_delete"]);
	}elseif(isset($_GET["category_delete"])){
		$inventory->delete_category($_GET["category_delete"]);
	}elseif(isset($_GET["location_delete"])){
		$inventory->delete_location($_GET["location_delete"]);
	}else{
		Utility::redirect("welcome.php");
	}
	


 ?>