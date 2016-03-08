<?php
/*
Site : http:www.smarttutorials.net
Author :muni
*/
require_once 'configauto.php';
if(!empty($_POST['type'])){
	$type = $_POST['type'];
	$name = $_POST['name_startsWith'];
	$query = "SELECT barcode, product_name, uom, purchase_cost_per_unit, sales_price_per_unit, total_stock FROM inventory where  UPPER($type) LIKE '".strtoupper($name)."%'";
	$result = mysqli_query($con, $query);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$name = $row['barcode'].'|'.$row['product_name'].'|'.$row['purchase_cost_per_unit'].'|'.$row['sales_price_per_unit'].'|'.$row['uom'].'|'.$row['total_stock'];
		array_push($data, $name);
	}	
	echo json_encode($data);exit;
}


