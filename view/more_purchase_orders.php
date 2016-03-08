<?php require_once 'start.php'; ?>
<?php 
	use App\Utility\Utility;
	use App\PurchaseOrder\PurchaseOrder;
	use App\Inventory\Inventory;
  	use App\Connection\Connection;

	$purchase_order = new PurchaseOrder;
	$inventory = new Inventory;
	if (strtolower($_SERVER["REQUEST_METHOD"]) == "post") {

		$errors = array();
		foreach ($_POST as $key => $value) {
			if($key == "product_description"){
				$values = array_values($_POST[$key]);
				if(count(array_filter($values)) < 1){
					$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
				}
			}elseif($key == "uom"){
				$values = array_values($_POST[$key]);
				if(count(array_filter($values)) < 1){
					$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
				}
			}elseif($key == "price"){
				$values = array_values($_POST[$key]);
				if(count(array_filter($values)) < 1){
					$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
				}
			}elseif($key == "quantity"){
				$values = array_values($_POST[$key]);
				if(count(array_filter($values)) < 1){
					$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
				}
			}elseif($key == "customer"){
				if(empty($_POST["customer"]["'customer_phone'"])){
					$errors["customer_phone"] = ucfirst(Utility::removeUnderScore("customer_phone"))." can't empty"; 
				}
			}
		}

		// Utility::dd($errors);

		if(empty($errors)){
			$purchase_order->create_purchase_order($_POST);
		}
		
	}


 ?>

	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
	
		
<style type="text/css">
	.form-inline .form-group {margin-bottom: 20px;float: right;font-size: 13px;}
	.form-inline .input-group {float: right;}
</style>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript">
        function calc(){
            

            a = parseInt(document.getElementById('amountDue').value);
                
            document.getElementById('total5').value= a;
            /*(total price + vat(15%) + delivery charge ) - discount and show admin nav bar*/
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
					<h2>sales point</h2>
				</div><!--  -->
				 <div class="container">
					<?php 
					include('includes/admin_navigationbar.php'); ?> 
				 
				  
				</div>
			</div>
		</div>
	</div>
	
</header><!--  -->
<section class="view_container_content">

	<div class="container">
		<div class="col-md-10">
			<div class="row">

				<div class="col-md-12 no_padding">

					<!-- start print option -->
					<form action="add_purchase_orders.php" method="POST">
						<div class="panel panel-info no_margin">
						  <div class="panel-heading"><h4 style="text-align:center;">Add New Purchase Order</h4></div>
						  	
						  		<div class="panel-body">
						  		<?php echo Utility::message(); ?>
								<div class="view_top_date"  style="overflow:hidden;">
									<div class="view_date pull-left" style="width:50%;float:left;">
										<div class="form-group">
										    <label for="inputDate3" class="col-sm-3 no_padding control-label " style="width:20%;margin-left:10px;">Date:</label>
										    <div class="col-sm-9" style="width:75%;float:right">
										      	<input name="po_date" type="date" class="form-control" id="inputDate3" placeholder="Date" required>
										    	<input type="hidden" name="supplier_id">
										    </div>
										 </div>
									</div>
									<div class="view_invoice" style="width:50%;float:right;">
										
										<div class="form-group">
										    <label for="inputInvoice3" class="col-sm-4 no_padding control-label"style="width:40%;margin-left:10px;">Purchase Order No. :</label>
										   
										    <div id="likes" class=""style="width:55%;float:right;">
										    	 <input type="text" name="purchase_order_no" value="<?php echo $purchase_order->show_purchase_order_number(); ?>" />
											</div>
										</div> 
									</div>
								</div><!--  -->
								<div class="view_address" style="overflow:hidden;">
									<div class="view_a_name"style="width:100%;float:left;">
										
										<div class="form-group">
										    <label for="inputCustomerName3" class="col-sm-3 no_padding control-label "style="    width: 30%;">Supplier Name: </label>
										    <div class="col-sm-9 "style="width: 70%;float: right;padding: 0;padding-right: 15px;">
										      <input name="supplier['supplier_name']" type="text" class="form-control" id="inputCustomerName3" placeholder="Supplier Name ">
										    </div>
										 </div>
									</div>
									<div class="view_a_phone"style="width:100%;float:left;">
										<div class="form-group">
										    <label for="inputCustomerphone3" class="col-sm-3 no_padding control-label" style="    width: 30%;">Phone : </label>
										    <div class="col-sm-9 "style="width: 70%;float: right;padding: 0;padding-right: 15px;">
										      <input name="supplier['supplier_phone']" type="tel" class="form-control" id="inputCustomerphone3" placeholder="Phone " required>
										      <?php if(isset($errors["supplier_phone"])){echo $errors["supplier_phone"]; } ?>
										    </div>
										 </div>
									</div>
									<div class="view_a_address"style="width:100%;float:left;">
										<div class="form-group">
										    <label for="inputcustomerAddress3" class="col-sm-3 no_padding control-label"style="width: 23%;">Supplier Address : </label>
										    <div class="col-sm-9 pull-right no_padding">
										      <textarea name="supplier['supplier_address']" class="form-control" rows="3"style="width: 88%;float: right;margin-right: 15px;"></textarea>
										    </div>
										 </div>
									</div>
									
									
								</div><!--  -->
								
								<div class="view_center_folwchart">
									<div class='row'>
							      		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
							      			<table class="table table-bordered table-hover" id="table_auto">
												<thead>
													<tr>
														<th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
														
														<th width="43%">Product Description</th>
														<th width="15%">uom</th>
														<th width="15%">Cost Per Unit</th>
														
														<th width="10%">Quantity</th>
														<th width="15%">Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><input class="case" type="checkbox"/></td>
														
														
														<td>
															<input type="text" data-type="product_name" name="product_description[]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off">
															<?php if(isset($errors["product_description"])){echo $errors["product_description"]; } ?>
														</td>
														<td>
															<input type="text" data-type="uom" name="uom[]" id="uom_1" class="form-control autocomplete_txt" autocomplete="off">
															<?php if(isset($errors["uom"])){echo $errors["uom"]; } ?>
														</td>
														
														<td>
															<input type="number" name="cost_per_unit[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
															<?php if(isset($errors["cost_per_unit"])){echo $errors["cost_per_unit"]; } ?>
														</td>
														<td>
															<input type="number" name="quantity[]" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
															<?php if(isset($errors["quantity"])){echo $errors["quantity"]; } ?>
														</td>
														<td>
															<input type="number" name="amount[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
															<?php if(isset($errors["amount"])){echo $errors["amount"]; } ?>
														</td>
													</tr>
												</tbody>
											</table>
							      		</div>
							      	</div>
							      	<div class='row'>
							      		<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
							      			<button class="btn btn-danger delete" type="button">- Delete</button>
							      			<button class="btn btn-success addmore" type="button">+ Add More</button>
							      		</div>
							      	</div>
							      	<div class='row'>	
							      		<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
							      			
											
							      		</div>
							      		<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6' style="padding-left:0">
											<span class="form-inline">
											<div class="form-group">
													<label>Total: &nbsp;</label>
													<div class="input-group">
														<div class="input-group-addon currency">৳</div>
														<input value="" type="number" class="form-control" name="" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
													</div>
												</div>
											<div class="form-group">
												<label>Vat: &nbsp;</label>
												<div class="input-group">
													
													<input value="" type="number" step="0.1" class="form-control" name="" id="tax" placeholder="Vat" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"><div class="input-group-addon">%</div>
												</div>
											</div>
											<div class="form-group">
												<label>Vat Amount: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon currency">৳</div>
													<input value="" type="number" step="0.1" class="form-control" name="vat" id="taxAmount" placeholder="Vat" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
													
												</div>
											</div>
											<div class="form-group">
												<label><!-- Sub Total: &nbsp; --></label>
												<div class="input-group">
													<!-- <div class="input-group-addon currency">৳</div> -->
													<input value="" type="hidden" class="form-control" name="" id="totalAftertax" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
											<div class="form-group">
												<label>Delivery Charge: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon currency">৳</div>
													<input value="" type="number" step="0.1" class="form-control" name="delivery_charge" id="amountPaid1" placeholder="Delivery Charge" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
											<div class="form-group">
												<label>Amount Paid: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon currency">৳</div>
													<input type="hidden" name="total">
													<input value="" type="number" step="0.1" class="form-control" name="paid" id="amountPaid" placeholder="Amount Paid" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
											<div class="form-group">
												<label>Amount Due: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon currency">৳</div>
													<input value="" type="number" step="0.1" class="form-control amountDue" name="due"  id="amountDue" placeholder="Amount Due" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
													
													
												</div>
											</div>
										</span>

										</div>
							      	</div>

								</div>
							</div>
							<button type="submit" class="btn btn-success btn-lg" name=""style="margin: 15px auto;margin-left: 323px;">Confirm</button>
						</div><!-- end panel body -->
					</form>	  	
						

				</div>
				
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</section>
	<script type="text/javascript" src="js/scriptpurchase.js"></script>
	<?php include('includes/footer.php'); ?>