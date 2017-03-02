<?php require_once 'start.php'; ?>
<!-- Button trigger modal -->
<?php include('config.php') ?>

<?php 
	if(!isset($_REQUEST['sl_no'])){
		header("location:inventory_location_transfer.php");
	}else{
		$id= $_REQUEST['sl_no'];
	}
 ?>
 <?php 
	
	$startement = $db->prepare("SELECT * FROM inventory WHERE sl_no=?");
	$startement->execute(array($id));
	$result = $startement->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) 
		
?>
<?php 
	
	if(isset($_POST['add'])){
		try {
			if($_POST['shop_stock'] >= $_POST['tr_warehouse_qty']){
				$shop_stock = ($_POST['shop_stock'] - $_POST['tr_warehouse_qty']);
				$warehouse_stock = ($row['warehouse_stock'] + $_POST['tr_warehouse_qty']);
				$total_stock = $shop_stock + $warehouse_stock;

				$startement = $db->prepare("UPDATE  inventory SET  shop_stock=?,warehouse_stock=?, total_stock=? WHERE sl_no=?");
				$startement->execute(array($shop_stock,$warehouse_stock,$total_stock,$id));
				
				$success = 'successfull';
				header('location:inventory_location_transfer.php');
				}else{
					$error = "<p>This Product isn't Available in your Shop!</p>";
				}
		
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
		$shop_stock = $row['shop_stock'];
		$product_name = $row['product_name'];
?>


	<!-- link include -->
	




	<?php include('includes/all_link_body.php'); ?>

<style type="text/css">
	.fa{font-size: 15px;}
	p{color: red;text-align: center;}
</style>

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
					<h2>inventory Location Transfer</h2>
				</div><!--  -->
				 <div class="container">
					<!-- 
					<?php 
					//include('includes/admin_navigationbar.php'); ?> 
				  -->
				  
				</div>
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
				    <h3 class="panel-title"><h4 class="modal-title" style="text-align:center">Move to Warehouse</h4></h3>
				  </div>
				  <div class="panel-body">
				  <?php if(isset($error)){echo $error;} ?>
				    <form class="form-horizontal" action="" method="POST">
					  <div class="form-group">
					    <label for="inputProductName3" class="col-sm-4 control-label">Product Name:</label>
					    <div class="col-sm-8">
					      <input type="text" class="form-control" id="inputProductName3" value="<?php echo $product_name; ?>" disabled>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputProductTotalQty3" class="col-sm-4 control-label">Total Shop Qty:</label>
					    <div class="col-sm-8">
					      <input name="shop_stock" type="number" id="wqty" for="change" class="form-control" value="<?php echo $shop_stock; ?>">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputQty3" class="col-sm-4 control-label">Transfer Qty:</label>
					    <div class="col-sm-8">

					      <input type="number" min="0" max="<?php echo $shop_stock;?>" name="tr_warehouse_qty" class="form-control"  id="shopmove" >
					    </div>
					  </div>
					  
					  
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-8">
					      <button class="btn btn-success" type="submit" name="add" >Confirm</button>
					    </div>
					  </div>
					</form>
				  </div>
				  <div class="panel-footer">
				  	<a href="inventory_location_transfer.php"><button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-arrow-circle-left"></i> Go To Back</button></a>
				  </div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</section>
  <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
   
	<script>
		$('#shopmove').keyup(function(){
			var quantity1 = $('#wqty').val();
			var quantity2 = $('#shopmove').val();

			if(parseInt(quantity1) < parseInt(quantity2)){
				alert("Your store doesn't have sufficient stock");
				$('#shopmove').val(quantity1);
			}else if(parseInt(quantity2) < 0){
				alert("Your store doesn't have sufficient stock");
				$('#shopmove').val('0');
			}
		});
		
	</script> 
   <?php include('includes/footer.php'); ?>
