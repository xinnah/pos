<?php
error_reporting(0);
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'pos'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
	if(!isset($_SESSION["username"])){
		header("Location: index.php");
	}

 ?>
<?php 
	use App\Utility\Utility;
	use App\Invoice\Invoice;
	use App\Inventory\Inventory;
  	use App\Connection\Connection;

	$invoice = new Invoice;

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
			$invoice->createInvoice($_POST);
		}
		
	}


 ?>

	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
	
		
<style type="text/css">
	.form-inline .form-group {margin-bottom: 20px;float: right;font-size: 13px;}
	.form-inline .input-group {float: right;}
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
		<div class="col-md-12">
			<div class="row">

				<div class="col-md-12 no_padding">

					<!-- start print option -->
					<form action="welcome.php" method="POST">
						<div class="panel panel-info no_margin">
						  <div class="panel-heading"><h4 style="text-align:center;">Add New Invoice</h4></div>
						  	
						  		<div class="panel-body">
						  		<?php echo Utility::message(); ?>
								<div class="view_top_date"  style="overflow:hidden;">
									<div class="view_date pull-left" style="width:50%;float:left;">
										<div class="form-group">
										    <label for="inputDate3" class="col-sm-3 no_padding control-label " style="width:20%;margin-left:10px;">Date:</label>
										    <div class="col-sm-9" style="width:73%;float:right">
										      	<input name="invoice_date" type="Date" class="form-control" id="inputDate3"required>
										    	<input type="hidden" name="customer_id">
										    </div>
										 </div>
									</div>
									<div class="view_invoice" style="width:50%;float:right;">
										
										<div class="form-group">
										    <label for="inputInvoice3" class="col-sm-4 no_padding control-label"style="width:40%;margin-left:10px;">Invoice No. :</label>
										   
										    <div id="likes" class=""style="width:55%;float:right;">
										    	 <input type="text" class="form-control" name="invoice_no" value="<?php echo $invoice->show_invoice_number(); ?>" readonly />
											</div>
										</div> 
									</div>
								</div><!--  -->
								<div class="view_address" style="overflow:hidden;">
									<div class="view_a_name"style="width:100%;float:left;">
										
										<div class="form-group">
										    <label for="inputCustomerName3" class="col-sm-3 no_padding control-label "style="    width: 30%;">Customer Name: </label>
										    <div class="col-sm-9 "style="width: 70%;float: right;padding: 0;padding-right: 15px;">
										      <input name="customer['customer_name']" type="text" class="form-control" id="inputCustomerName3" placeholder="Customer Name ">
										    </div>
										 </div>
									</div>
									<div class="view_a_phone"style="width:100%;float:left;">
										<div class="form-group">
										    <label for="inputCustomerphone3" class="col-sm-3 no_padding control-label" style="    width: 30%;">Phone : </label>
										    <div class="col-sm-9 "style="width: 70%;float: right;padding: 0;padding-right: 15px;">
										      <input name="customer['customer_phone']" type="tel" class="form-control" id="inputCustomerphone3" placeholder="Phone " required>
										      <?php if(isset($errors["customer_phone"])){echo $errors["customer_phone"]; } ?>
										    </div>
										 </div>
									</div>
									<div class="view_a_address"style="width:100%;float:left;">
										<div class="form-group">
										    <label for="inputcustomerAddress3" class="col-sm-3 no_padding control-label"style="width: 23%;">Customer Address : </label>
										    <div class="col-sm-9 pull-right no_padding">
										      <textarea name="customer['customer_address']" class="form-control" rows="3"style="width: 90%;float: right;margin-right: 15px;"></textarea>
										    </div>
										 </div>
									</div>
									<div class="view_a_phone"style="width:100%;float:left;">
										<div class="form-group">
										    <label for="inputCustomerpersonNa3" class="col-sm-3 no_padding control-label">Contact Person: </label>
										    <div class="col-sm-9">
										      <input name="customer['contact_person']" type="text" class="form-control" id="inputCustomerpersonNa3" placeholder="Contact Parson. ">
										    </div>
									    </div>
									</div>
									<div class="view_a_phone"style="width:100%;float:left;">
										<div class="form-group">
										    <label for="inputCustomerpersonN3" class="col-sm-3 no_padding control-label">Contact No : </label>
										    <div class="col-sm-9">
										      <input name="customer['contact_person_no']" type="tel" class="form-control" id="inputCustomerpersonN3" placeholder="Contact No. ">
										    </div>
										 </div>
									</div>
								</div><!--  -->
								<div class="notes"style="overflow:hidden;">
									<div class="form-group">
									    <label for="inputcustomerNotes3" class="col-sm-3 no_padding control-label">Notes : </label>
									    <div class="col-sm-9 pull-right no_padding">
									      <textarea name="notes" class="form-control" rows="3"></textarea>
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
														<th width="15%">Barcode</th>
														<th width="15%">Product Description</th>
														<th width="20%">uom</th>
														<th width="10%">Cost Per Unit</th>
														<th width="10%">price</th>
														<th width="9%">Avaliable Quantity</th>
														<th width="9%">Quantity</th>
														<th width="10%">Total</th>
														
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><input class="case" type="checkbox"/></td>
														<td><input type="text" data-type="barcode" name="barcode[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off"  onmouseover="focus();"></td>
														
														<td>
															<input type="text" data-type="product_name" name="product_description[]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off" required>
															<?php if(isset($errors["product_description"])){echo $errors["product_description"]; } ?>
														</td>
														<td>
															<input type="text" data-type="uom" name="uom[]" id="uom_1" class="form-control autocomplete_txt" autocomplete="off" required>
															<?php if(isset($errors["uom"])){echo $errors["uom"]; } ?>
														</td>
														<td>
															<input type="number" min="0" name="cost_per_unit[]" id="price1_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"readonly>
															<?php if(isset($errors["cost_per_unit"])){echo $errors["cost_per_unit"]; } ?>
														</td>
														<td>
															<input type="number" min="0" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" required>
															<?php if(isset($errors["price"])){echo $errors["price"]; } ?>
														</td>
														<td>
															<input type="number" min="0" name="" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" required readonly="readonly">
															
														</td>
														<td>
															<input type="number" min="0" name="quantity[]" id="quantity2_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
															<?php if(isset($errors["quantity"])){echo $errors["quantity"]; } ?>
														</td>
															<input type="hidden" name="cost_amount[]" id="cost_1" class="form-control" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
														<td>
															<input type="number" min="0" name="amount[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"readonly>
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
							      		<div class='col-xs-12 col-sm-8 col-md-8 col-lg-8'>
							      			
											
							      		</div>
							      		<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4' style="padding-left:0">
											<span class="form-inline">
											<div class="form-group">
													<label>Total: &nbsp;</label>
													<div class="input-group">
														<div class="input-group-addon currency">৳</div>
														<input value="" type="number" min="0" class="form-control" name="" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
													</div>
												</div>
											<div class="form-group">
												<label>Vat: &nbsp;</label>
												<div class="input-group">
													
													<input value="" type="number" min="0" step="0.1" class="form-control" name="" id="tax" placeholder="Vat" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"><div class="input-group-addon">%</div>
												</div>
											</div>
											<div class="form-group">
												<label>Vat Amount: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon currency">৳</div>
													<input value="" type="number" min="0" step="0.1" class="form-control" name="vat" id="taxAmount" placeholder="Vat" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
													
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
													<input value="" type="number" min="0" step="0.1" class="form-control" name="delivery_charge" id="amountPaid1" placeholder="Delivery Charge" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
											<div class="form-group">
												<label>Amount Paid: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon currency">৳</div>
													<input type="hidden" name="total">
													<input value="" type="number" min="0" step="0.1" class="form-control" name="paid" id="amountPaid" placeholder="Amount Paid" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
											<div class="form-group">
												<label>Amount Due: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon currency">৳</div>
													<input value="" type="number" step="0.1" class="form-control amountDue" name="due"  id="amountDue" placeholder="Amount Due" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
													
													
												</div>
											</div>
										</span>

										</div>
							      	</div>

								</div>
							</div>
							<a href="view_invoice_pos.php"><button class="btn btn-success btn-lg" name=""style="margin: 15px auto;margin-left: 323px;">Confirm</button></a>
						</div><!-- end panel body -->
					</form>	  	
						

				</div>
				
			</div>
		</div>
		
	</div>
</section>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script src="js/script_invoice.js"></script>
	<script>
	$('#quantity2_1').change(function(){
		var quantity1 = $('#quantity_1').val();
		var quantity2 = $('#quantity2_1').val();
		$('#quantity2_1').attr({'max':quantity1,'min':0});
	})

	$('#quantity2_1').focusout(function(){
		var quantity1 = $('#quantity_1').val();
		var quantity2 = $('#quantity2_1').val();

		if(parseInt(quantity1) < parseInt(quantity2)){
			alert("Your store doesn't have sufficient stock");
		}
	})
		
	</script>
	<?php include('includes/footer.php'); ?>