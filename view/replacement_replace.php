<?php include('config.php'); ?>
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

  	$invoices = new Invoice;
  	$inventory = new Inventory;

  	
  

	if(!isset($_REQUEST['id'])){
		header('location:replacement.php');
	}
	else{
		$id = $_REQUEST['id'];
		$invoice = $invoices->show_single_invoice($id);
  		$customer = $invoices->show_customer($invoice->customer_id);
	}

	

 

?>

	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<style type="text/css">
	.form-inline .form-group {margin-bottom: 20px;float: right;font-size: 13px;}
	.form-inline .input-group {float: right;}
	.fa{font-size: 25px;}
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
					<h2>Replace Invoice</h2>
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
					
						<div class="panel panel-info no_margin">
						  <div class="panel-heading"><h4 style="text-align:center;">Replace Invoice</h4></div>
						  	
						  		<div class="panel-body">
						  		
								<div class="view_top_date"  style="overflow:hidden;">
									<div class="view_date pull-left" style="width:50%;float:left;">
										<div class="form-group">
										    <label for="inputDate3" class="col-sm-3 no_padding control-label " style="width:20%;margin-left:10px;">Date:</label>
										    <div class="col-sm-9" style="width:75%;float:right">
										      	<input name="invoice_date" type="text" class="form-control" id="inputDate3" value="<?php if(isset($invoice->invoice_date)){ echo $invoice->invoice_date;}; ?>" readonly>
										    	<input type="hidden" name="customer_id">
										    </div>
										 </div>
									</div>
									<div class="view_invoice" style="width:50%;float:right;">
										
										<div class="form-group">
										    <label for="inputInvoice3" class="col-sm-4 no_padding control-label"style="width:40%;margin-left:10px;">Invoice No. :</label>
										   
										    <div id="likes" class=""style="width:55%;float:right;">
										    	 <input type="text" class="form-control" name="invoice_no" value="<?php if(isset($invoice->invoice_no)){ echo $invoice->invoice_no;}; ?>" readonly />
											</div>
										</div>
										
									</div>
								</div><!--  -->
								<div class="view_address" style="overflow:hidden;">
									<div class="view_a_name"style="width:100%;float:left;">
										
										<div class="form-group">
										    <label for="inputCustomerName3" class="col-sm-3 no_padding control-label "style="    width: 30%;">Customer Name: </label>
										    <div class="col-sm-9 "style="width: 70%;float: right;padding: 0;padding-right: 15px;">
										      <input name="customer['customer_name']" type="text" class="form-control" id="inputCustomerName3" value="<?php if(isset($customer->customer_name)){ echo $customer->customer_name;} ?>"readonly>
										    </div>
										 </div>
									</div>
									<div class="view_a_phone"style="width:100%;float:left;">
										<div class="form-group">
										    <label for="inputCustomerphone3" class="col-sm-3 no_padding control-label" style="    width: 30%;">Phone : </label>
										    <div class="col-sm-9 "style="width: 70%;float: right;padding: 0;padding-right: 15px;">
										      <input name="customer['customer_phone']" type="tel" class="form-control" id="inputCustomerphone3" value="<?php if(isset($customer->customer_phone)){ echo $customer->customer_phone;} ?>"  readonly>
										      
										    </div>
										 </div>
									</div>
									<div class="view_a_address"style="width:100%;float:left;">
										<div class="form-group">
										    <label for="inputcustomerAddress3" class="col-sm-3 no_padding control-label"style=" width: 23%;">Customer Address: </label>
										    <div class="col-sm-9 pull-right no_padding">
										      <textarea name="customer['customer_address']" class="form-control" rows="3"style="    width: 88%;float: right;margin-right: 15px;"readonly><?php if(isset($customer->customer_address)){ echo $customer->customer_address;} ?></textarea>
										    </div>
										 </div>
									</div>
									
									
								</div><!--  -->
								<div class="notes"  style="overflow:hidden;">
									<div class="form-group">
									    <label for="inputcustomerNotes3" class="col-sm-3 no_padding control-label">Notes : </label>
									    <div class="col-sm-9 pull-right">
									      <textarea name="notes" class="form-control" rows="3" readonly><?php if(isset($invoice->notes)){ echo $invoice->notes;}; ?></textarea>
									    </div>
									 </div>
								</div>

								<!--  -->
								<div class="view_center_folwchart">
									<div class='row'>
							      		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
							      			<table class="table table-bordered table-hover" id="table_auto">
												<thead>
													<tr>
														<th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
														<th width="10%">Barcode</th>
														<th width="30%">Product Description</th>
														<th width="10%">uom</th>
														<th width="10%">Cost Per Unit</th>
														<th width="10%">price</th>
														<th width="10%">Quantity</th>
														<th width="10%">Total</th>
														<th width="8%">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
											    	if(isset($invoice->barcode)){
														$barcode = explode(",", $invoice->barcode);
													}
											    	if(isset($invoice->product_description)){
														$product_description = explode(",", $invoice->product_description);
													}
											    	if(isset($invoice->uom)){
														$uom = explode(",", $invoice->uom);
											    	}
											    	if(isset($invoice->cost_per_unit)){
														$cost_per_unit = explode(",", $invoice->cost_per_unit);
											    	}
											    	if(isset($invoice->price)){
														$price = explode(",", $invoice->price);
											    	}
											    	if(isset($invoice->quantity)){
														$quantity = explode(",", $invoice->quantity);
											    	}
											    	if(isset($invoice->amount)){
														$amount = explode(",", $invoice->amount);
											    	}
											    	if(isset($invoice->vat)){
														$vat =explode(",", $invoice->vat);
											    	}if(isset($invoice->delivery_charge)){
														$delivery_charge =explode(",", $invoice->delivery_charge);
											    	}
											    	if(isset($invoice->paid)){
														$paid =explode(",", $invoice->paid);
											    	}
											    	if(isset($invoice->due)){
														$due =explode(",", $invoice->due);
											    	}

											    	if(isset($product_description)){
											    		$item = count($product_description);
											    		$sl = 1;
											    		for ($i=0; $i < $item ; $i++) { 
											    	?>
<form action="single_replace_item.php" method="post">	
	<input type="hidden" value="<?php if(isset($customer->customer_id)){ echo $customer->customer_id;}; ?>" name="customer_id">
	<input type="hidden" value="<?php if(isset($invoice->invoice_no)){ echo $invoice->invoice_no;}; ?>" name="invoice_no">
	<tr>
		<td><input class="case" type="checkbox"/></td>
		<td><input type="text" data-type="barcode" name="barcode[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off" value="<?php if(isset($barcode[$i])){
	    			echo $barcode[$i];
    			}else{
    				echo " ";
				} ?>" readonly>
		</td>
		<td>
			<input type="text" data-type="productName" name="product_description[]" id="product_description_1" class="form-control autocomplete_txt" autocomplete="off" value="<?php echo $product_description[$i] ?>" readonly><?php if(isset($errors["product_description"])){echo $errors["product_description"]; } ?>
			
		</td>
		<td>
			<input type="text" data-type="productName" name="uom[]" id="uom_1" class="form-control autocomplete_txt" autocomplete="off" value="<?php echo $uom[$i] ?>" readonly><?php if(isset($errors["uom"])){echo $errors["uom"]; } ?>
		</td>
		
		<td><input type="text" data-type="productCost" name="cost_per_unit[]" id="cost_per_unit_1" class="form-control autocomplete_txt" autocomplete="off" value="<?php echo $cost_per_unit[$i] ?>" readonly></td>
		<td>
			<input type="text" name="price_per_unit[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $price[$i] ?>" readonly><?php if(isset($errors["price"])){echo $errors["price"]; } ?>
			
		</td>
		<td>
			<input type="text" name="quantity[]" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"  value="<?php echo $quantity[$i] ?>" readonly><?php if(isset($errors["quantity"])){echo $errors["quantity"]; } ?>
			
		</td>
		<td>
			<input type="text" name="amount[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $amount[$i] ?>"readonly>
		</td>
		<td><button class="btn btn-info" type="submit"><i class="fa fa-refresh"></i></button></td>
	</tr>
</form>		
											    	<?php
														}
													}
												?>					
												</tbody>
											</table>
							      		</div>
							      	</div>
							      	<div class='row'>
							      		<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
							      			<!-- <button class="btn btn-danger delete" type="button">- Delete</button>
							      			<button class="btn btn-success addmore" type="button">+ Add More</button> -->
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
														<input value="<?php if(isset($invoice->total)){ echo $invoice->total;} ?>" type="number" class="form-control" name="" id="subTotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"readonly>
													</div>
												</div>
											<div class="form-group">
												<label>Vat: &nbsp;</label>
												<div class="input-group">
													
													<input value="" type="number" class="form-control" name="" id="tax" placeholder="Vat" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"readonly><div class="input-group-addon">%</div>
												</div>
											</div>
											<div class="form-group">
												<label>Vat Amount: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon currency">৳</div>
													<input value="<?php if(isset($invoice->vat)){ echo $invoice->vat;} ?>" type="number" class="form-control" name="vat" id="taxAmount"onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
													
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
													<input value="<?php if(isset($invoice->delivery_charge)){ echo $invoice->delivery_charge;} ?>" type="number" class="form-control" name="delivery_charge" id="amountPaid1" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
												</div>
											</div>
											<div class="form-group">
												<label>Amount Paid: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon currency">৳</div>
													<input type="hidden" name="total">
													<input value="<?php if(isset($invoice->paid)){ echo $invoice->paid;} ?>" type="number" class="form-control" name="paid" id="amountPaid" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
												</div>
											</div>
											<div class="form-group">
												<label>Amount Due: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon currency">৳</div>
													<input value="<?php if(isset($invoice->due)){ echo $invoice->due;} ?>" type="text" class="form-control amountDue" name="due"  id="amountDue"  onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
													
													
												</div>
											</div>
											
										</span>
											
										</div>
							      	</div>

								</div>
							</div>
							<a href="view_invoice_pos.php"><button class="btn btn-success btn-lg" name=""style="margin: 15px auto;margin-left: 323px;">Confirm</button></a>
						</div><!-- end panel body -->
					  	
						

				</div>
				
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</section>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script src="js/script.js"></script>
	<?php include('includes/footer.php'); ?>

