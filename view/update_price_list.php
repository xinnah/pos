<?php include('config.php'); ?>
<?php require_once 'start.php'; ?>
<?php 
	use App\Utility\Utility;
	use App\Invoice\Invoice;
	use App\SalesOrder\SalesOrder;
  	use App\Connection\Connection;
  	?>
<?php 
	
	if(!isset($_REQUEST['sl_no'])){
		header("price_list.php");
	}else{
		$id = $_REQUEST['sl_no'];
	}

 ?>	
<?php 
 	$startement = $db->prepare("SELECT * FROM inventory WHERE sl_no=?");
 	$startement->execute(array($id));
 	$result = $startement->fetchAll(PDO::FETCH_ASSOC);
 		foreach ($result as $row) 
 			$barcode = $row['barcode'];
 			$product_name = $row['product_name'];
 			$purchase_cost_per_unit = $row['purchase_cost_per_unit'];
 			$sales_price_per_unit = $row['sales_price_per_unit'];
 			$total_stock = $row['total_stock'];

  ?>
<?php 
	if(isset($_POST['update'])){
		try {
			$purchase_cost_per_unit = $data['purchase_cost_per_unit'];
			$sales_price_per_unit = $data['sales_price_per_unit'];
			$total_stock = $data['total_stock'];
			$data['stock_value_on_purchase'] = $_POST['purchase_cost_per_unit'] * $row['total_stock'];
			$data['stock_value_on_sale'] = $_POST['sales_price_per_unit'] * $row['total_stock'];
			$stock_value_on_purchase = $data['stock_value_on_purchase'];
			$stock_value_on_sale = $data['stock_value_on_sale'];

			$startement = $db->prepare("UPDATE  inventory SET purchase_cost_per_unit=?, sales_price_per_unit=?, stock_value_on_purchase=?, stock_value_on_sale=? WHERE sl_no=?");
			$startement->execute(array($_POST['purchase_cost_per_unit'],$_POST['sales_price_per_unit'],$stock_value_on_purchase,$stock_value_on_sale,$id));
			
			$success = 'successfull';
			header('location:price_list.php');
				
		
		} catch (Exception $e) {
			$error_message = $e->getMessage();
		}
	}

 ?>

 <?php 
 	$startement = $db->prepare("SELECT * FROM inventory WHERE sl_no=?");
 	$startement->execute(array($id));
 	$result = $startement->fetchAll(PDO::FETCH_ASSOC);
 		foreach ($result as $row) 
 			$barcode = $row['barcode'];
 			$product_name = $row['product_name'];
 			$purchase_cost_per_unit = $row['purchase_cost_per_unit'];
 			$sales_price_per_unit = $row['sales_price_per_unit'];
 			$total_stock = $row['total_stock'];

  ?>


	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>

<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
    function calc(){
        
        /* total price*/
        r = parseInt(document.getElementById('change').value);

            
        document.getElementById('total').value= r + (20/100*r);
        /*total price + vat(15%)*/
    }
    window.onload  = calc;
</script>    




<header class="header_section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php include('includes/header_top.php'); ?>
			</div>	
		</div>		
	</div>
	<?php include('includes/main_nav.php'); ?>
	<div class="conainer">
		<div class="row">
			<div class="col-md-12">
				<div class="sales_point">
					<h2>Price List</h2>
				</div><!--  -->
				 
			</div>
		</div>
	</div>
	
</header><!--  -->
<section style="min-height:503px;">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title"><h4 class="modal-title" style="text-align:center">Update Price List</h4></h3>
				  </div>
				  <div class="panel-header">
				  	<a href="price_list.php"><button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Go To Back</button></a>
				  </div>
				  <div class="panel-body">
				  
				    <form class="form-horizontal" action="" method="POST">
				    	<div class="error"style="color:red;text-align:center;"> <?php if(isset($error_message)){echo $error_message;} ?> </div>	
						<div class="success"> <?php if(isset($success)){echo $success;} ?> </div>

					  <div class="form-group">
					    <label for="inputBarcode3" class="col-sm-4 control-label">Barcode:</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="inputBarcode3" value="<?php echo $barcode; ?>" disabled>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputProductName3" class="col-sm-4 control-label">Product Name:</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="inputProductName3" value="<?php echo $product_name; ?>" disabled>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputProductTotalQty3" class="col-sm-4 control-label">Cost Price / Unit:</label>
					    <div class="col-sm-8">
					      <input type="number" id="change" name="purchase_cost_per_unit" value="<?php echo $purchase_cost_per_unit; ?>" class="form-control" onchange="calc()">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputQty3" class="col-sm-4 control-label">Sales Price / Unit:</label>
					    <div class="col-sm-8">

					      <p class="cart_total_price"><b><input id="total"class="form-control" for="change" name="sales_price_per_unit" value="<?php echo $sales_price_per_unit; ?>"></b></p>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputTotalStock3" class="col-sm-4 control-label">Total Stock:</label>
					    <div class="col-sm-8">
					      <input name="total_stock" type="text" class="form-control" id="inputTotalStock3" value="<?php echo $total_stock; ?>" disabled>
					    </div>
					  </div>
					  <div class="form-group"style="width:30%;float:left;text-align:center;">
						    <input type="hidden" name="stock_value_on_purchase" value="">
						    <input type="hidden" name="stock_value" value="">
						    <input type="hidden" name="stock_value_on_sale" value=" ">
						</div>
					  
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-8">
					      <button class="btn btn-success" type="submit" name="update" >Update</button>
					    </div>
					  </div>
					</form>
				  </div>
				  
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>