<?php require_once 'start.php'; ?>
<?php 
	use App\Inventory\Inventory;
  	use App\Connection\Connection;
	use App\Utility\Utility;

	$inventory = new Inventory;

	if (strtolower($_SERVER["REQUEST_METHOD"]) == "post") {

		$errors = array();
		foreach ($_POST as $key => $value) {
			if($key == "product_name" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}elseif($key == "barcode" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}elseif($key == "uom" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}elseif($key == "purchase_cost_per_unit" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}
		}

		if(empty($errors)){
			$inventory->add_items_to_inventory($_POST);
		}
		
	}
	


 ?>
	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>

<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
    function calc(){
        q = parseInt(document.getElementById('change').value);
        
        p = parseInt(document.getElementById('change1').value);

            
        document.getElementById('total').value= p + q;
        /* total price*/
        r = parseInt(document.getElementById('change2').value);

            
        document.getElementById('total1').value= r + (20/100*r);
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
					<h2>Item</h2>
				</div><!--  -->
				 <div class="container">
					
					<!-- 	<?php 
					//include('includes/admin_navigationbar.php'); ?> 
				 
				   -->
				  
				</div>
			</div>
		</div>
	</div>
	
</header><!--  -->
<section class="view_container_content">

<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 no_padding">

			<!-- start print option -->

				<div class="panel panel-info no_margin">
				  <div class="panel-heading"><h4 style="text-align:center;">Add New Item To Inventory</h4></div>
				  		<div class="panel-body">
				  		<?php echo Utility::message(); ?>
							<form class="form-horizontal" action="add_items_to_inventory.php" method="post">
							  <div class="customer_info">

								  <div class="form-group">
									    <label for="inputBar3" class="col-sm-3 control-label">BarCode :</label>
									    <div class="col-sm-9">
									      <input name="barcode" type="text" class="form-control" id="inputBar3" value="<?php if(isset($_POST["barcode"])){echo $_POST["barcode"]; } ?>">
									      <?php if(isset($errors["barcode"])){echo $errors["barcode"]; } ?>
									    </div>
								  </div>

								  <div class="form-group">
									    <label for="inputName3" class="col-sm-3 control-label">Product Name :</label>
									    <div class="col-sm-9">
									      <input name="product_name" type="text" class="form-control" id="inputName3" placeholder="Product Name" value="<?php if(isset($_POST["product_name"])){echo $_POST["product_name"]; } ?>">
									      <?php if(isset($errors["product_name"])){echo $errors["product_name"]; } ?>
									    </div>
								  </div>

								  <div class="form-group">
									  <label for="sel1" class="col-sm-3">Product Category:</label>
									  <div class="col-sm-9">
										  <select class="form-control" name="category" id="sel1">
									    	<?php
									    		$result = $inventory->view_all_category(); 
									    		while ($category = mysqli_fetch_object($result)) {
									    	?>
									    		<option value="<?php echo $category->category_name; ?>"><?php echo $category->category_name; ?></option>										    		
									    	<?php
									    		}
									    	 ?>
										  </select>
									  </div>
								  </div>

								  <div class="form-group">
									    <label for="inputcode3" class="col-sm-3 control-label">Product Code :</label>
									    <div class="col-sm-9">
									      <input name="product_code" type="text" class="form-control" id="inputcode3" placeholder="Product Code" value="<?php if(isset($_POST["product_code"])){echo $_POST["product_code"]; } ?>">
									    </div>
								  </div>
								  
								  
								  <div class="form-group">
									  <label for="sel1" class="col-sm-3">Brand:</label>
									  <div class="col-sm-9">
										  <select name="brand" class="form-control" id="sel1">
										    <?php
									    		$result = $inventory->view_all_brand(); 
									    		while ($brand = mysqli_fetch_object($result)) {
									    	?>
									    		<option value="<?php echo $brand->brand_name; ?>"><?php echo $brand->brand_name; ?></option>										    		
									    	<?php
									    		}
									    	 ?>
										  </select>
									  </div>
								    </div>
								  <div class="form-group">
									    <label for="inputBalance3" class="col-sm-3 control-label">Model :</label>
									    <div class="col-sm-9">
									      <input name="model" type="text" class="form-control" id="inputBalance3" placeholder="Model" value="<?php if(isset($_POST["model"])){echo $_POST["model"]; } ?>">
									    </div>
								  </div>
								  <div class="form-group">
									    <label for="inputPaymentDue3" class="col-sm-3 control-label">Specifications :</label>
									    <div class="col-sm-9">
									      <input name="specification" type="text" class="form-control" id="inputPaymentDue3" placeholder="Specifications" value="<?php if(isset($_POST["specification"])){echo $_POST["specification"]; } ?>">
									    </div>
								  </div>
								  <div class="form-group">
									  <label for="sel1" class="col-sm-3">Unit of Measurement:</label>
									  <div class="col-sm-9">
										  <select class="form-control" name="uom" id="sel1">
										    <?php
									    		$result = $inventory->view_all_uom(); 
									    		while ($uom = mysqli_fetch_object($result)) {
									    	?>
									    		<option value="<?php echo $uom->uom; ?>"><?php echo $uom->uom; ?></option>										    		
									    	<?php
									    		}
									    	 ?>
										  </select>
										  <?php if(isset($errors["uom"])){echo $errors["uom"]; } ?>
									  </div>
								  </div>
								  <div class="form-group">
									    <label for="inputCostUnit3" class="col-sm-3 control-label">Cost/Unit :</label>
									    <div class="col-sm-9">
									      <input type="number" min="0"id="change2" name="purchase_cost_per_unit" value="<?php if(isset($_POST["purchase_cost_per_unit"])){echo $_POST["purchase_cost_per_unit"]; }else{ echo "0";} ?>" class="form-control" onchange="calc()">
									      <?php if(isset($errors["purchase_cost_per_unit"])){echo $errors["purchase_cost_per_unit"]; } ?>
										  </div>
									</div>
								</div>
								  <div class="form-group">
									    <label for="inputSalesPriceUnit3" class="col-sm-3 control-label">Sales Price/Unit :</label>
									    <div class="col-sm-9">
									      <p class="cart_total_price"><b><input id="total1"class="form-control" for="change" name="sales_price_per_unit" value="<?php if(isset($_POST["sales_price_per_unit"])){echo $_POST["sales_price_per_unit"]; }else{ echo "0";} ?>"></b></p>
									    </div>
								  </div>
								  <div class="form-group">
									    <label for="inputStockQty3" class="col-sm-3 control-label">Stock Qty :</label>
									    <div class="col-sm-9">
										  <div class="form-group"style="width:30%;float:left;margin-right:5%;text-align:center;">
										    <label for="exampleInputWarehouse1">Warehouse</label>
										    <input type="number" min="0"id="change" name="warehouse_stock" class="form-control" onchange="calc()" value="<?php if(isset($_POST["warehouse_stock"])){echo $_POST["warehouse_stock"]; }else{ echo "0";} ?>">
										  </div>
										  <div class="form-group"style="width:30%;float:left;margin-right:5%;text-align:center;">
										    <label for="exampleInputShop1">Shop</label>
										    <input type="number" min="0"id="change1" name="shop_stock" class="form-control" onchange="calc()" value="<?php if(isset($_POST["shop_stock"])){echo $_POST["shop_stock"]; }else{ echo "0";} ?>">
										  </div>
										  <div class="form-group"style="width:30%;float:left;text-align:center;">
										    <label for="exampleInputTotal1">Total</label>
										    <p class="cart_total_price"><b><input id="total" class="disabled" for="change" name="total_stock" value="0"></b></p>
										    <input type="hidden" name="stock_value_on_purchase" value="">
										    <input type="hidden" name="stock_value" value="">
										    <input type="hidden" name="stock_value_on_sale" value=" ">
										  </div>
									    </div>

								  </div>
								  <div class="form-group">
									    <label for="inputPORefNo3" class="col-sm-3 control-label">P.O.Ref No:</label>
									    <div class="col-sm-9">
									      <input name="purchase_order_ref" type="text" class="form-control" id="inputPORefNo3" placeholder="P.O.Ref No" value="<?php if(isset($_POST["shop_stock"])){echo $_POST["shop_stock"];} ?>">
									    </div>
								  </div>
								  <div class="form-group">
									    <!-- <label for="inputSalesProduct3" class="col-sm-3 control-label">Product Added By :</label> -->
									    <div class="col-sm-9">
									      <input type="hidden" name="added_by" value="<?php if(isset($_SESSION["username"])){echo $_SESSION["username"];} ?>">
									    </div>
								  </div>	
						<div class="confim_button">	
							<button class="btn btn-success btn-lg" name="">Add Item</button>
						</div>	
					</form>
				</div><!-- end panel body -->
				  	
				
		</div>
		
	</div>
	<div class="col-md-2"></div>
</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$("#change2").keyup(function(){
			var cost_price_value = $(this).val();
			if(cost_price_value < 0){
				$(this).val('0');
			}			
		});
		$("#total1").keyup(function(){
			var sales_price_value = $(this).val();
			if(sales_price_value < 0){
				$(this).val('0');
			}			
		});
		$("#change").keyup(function(){
			var warehouse_value = $(this).val();
			if(warehouse_value < 0){
				$(this).val('0');
			}			
		});
		$("#change1").keyup(function(){
			var shop_value = $(this).val();
			if(shop_value < 0){
				$(this).val('0');
			}
		});
		$("#paid").keyup(function(){
			var paid_value = $(this).val();
			if(paid_value < 0){
				$(this).val('0');
			}
		});		
	});
</script>
	<?php include('includes/footer.php'); ?>