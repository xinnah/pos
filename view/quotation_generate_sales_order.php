<?php require_once 'start.php'; ?>
<?php 
	use App\Utility\Utility;
	use App\SalesOrder\SalesOrder;
	use App\Inventory\Inventory;
	use App\Quotation\Quotation;
  	use App\Connection\Connection;

	$sales_order = new SalesOrder;
	$inventory = new Inventory;
	$quotations = new Quotation;
	if(isset($_GET["id"])){
  		$id = $_GET["id"];
  		$quotation = $quotations->show_single_quotation($id);
  		$customer = $quotations->show_customer($quotation->customer_id);
  	}

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
			$sales_order->create_sales_order($_POST);
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
					<h2>Quotation Generate Sales Order</h2>
				</div><!--  -->
				 <div class="container">
				<div class="navbar navbar-default" role="navigation">
				  <div class="container-fluid">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse no_padding" id="bs-example-navbar-collapse-1">
				    	
				      <ul class="nav navbar-nav">
				      	
				        <li class=""><a href="sales_order.php" data-toggle="tooltip" data-placement="bottom" title="Add"><img src="img/icon/add.png"> </a></li>
				        <li class=""><a href="#" data-toggle="tooltip" data-placement="bottom" title="Delete"><img src="img/icon/Files-Delete-File-icon.png"></a></li>
				        <li class=""><a href="replacement.php" data-toggle="tooltip" data-placement="bottom" title="Replacement"><img src="img/icon/refresh-icon.png"></a></li>
				        <li><h3 class="bdt_price">BDT <output class="form-control amountDue disabled top_total" value="0" id="amountDue" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">.00</h3></li>
				      </ul>
				      
				      <ul class="nav navbar-nav navbar-right">

				        <!-- <li class=""><a href="#" data-toggle="tooltip" data-placement="bottom" title="Barcode"><img src="img/icon/barcode-scanner_318-47243.png"></a></li> -->
				        <li>
				            <img src="img/icon/barcode-scanner_318-47243.png" class="barcode fa fa-search barcode-btn">
				            <div class="barcode-open" style="display:none;" >
				              <div class="input-group animated fadeInDown" >
				                <input type="text" class="form-control" placeholder="Search" style="border-radius: 5px;width:195px;padding-right: 39px;">
				                <span class="input-group-btn">
				                  <button class="btn-u" type="button"style="border-color: #6899B2;">Go</button>
				                </span>
				              </div>
				            </div>    
				        </li>
				        <li class=""><a href="#" data-toggle="tooltip" data-placement="bottom" title="View"><img src="img/icon/86-Folder-512.png"></a></li>
				        <li>
				            <img src="img/icon/search.png" class="search fa fa-search search-btn">
				            <div class="search-open" style="display:none;" >
				              <div class="input-group animated fadeInDown" >
				                <input type="text" class="form-control" placeholder="Search" style="border-radius: 5px;width:195px;padding-right: 39px;">
				                <span class="input-group-btn">
				                  <button class="btn-u" type="button"style="border-color: #6899B2;">Go</button>
				                </span>
				              </div>
				            </div>    
				        </li>
				        
				        
				      </ul>
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</div>
				 
				  
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
					<div class="panel panel-info no_margin">
						<div class="panel-heading"><h4 style="text-align:center;">Add New Sales Order</h4></div>
						  	<form class="form-horizontal" action="quotation_generate_sales_order.php" method="POST">
						  		<div class="panel-body">
						  			<div class="row">
						  				<div class="col-md-6 col-sm-6">
						  					<div class="form-group">
											    <label class="col-sm-4 control-label ">Date:</label>
											    <div class="col-sm-8">
											      <input name="so_date" type="date" class="form-control" placeholder="Date" required>
											      <input type="hidden" name="customer_id">
											    </div>
											</div>
											<div class="form-group">
											    <label class="col-sm-4 control-label ">Customer Name : </label>
											    <div class="col-sm-8 ">
											      <input name="customer['customer_name']" type="text" class="form-control" value="<?php if(isset($customer->customer_name)){ echo $customer->customer_name;} ?>" readonly>
											    </div>
											 </div>
											<div class="form-group">
											    <label class="col-sm-4 control-label">Customer Phone : </label>
											    <div class="col-sm-8">
											      <input name="customer['customer_phone']" type="tel" class="form-control" value="<?php if(isset($customer->customer_phone)){ echo $customer->customer_phone;} ?>" readonly>
											      <?php if(isset($errors["customer_phone"])){echo $errors["customer_phone"]; } ?>
											    </div>
											</div>
											<div class="form-group">
											    <label class="col-sm-4 control-label">Customer Address : </label>
											    <div class="col-sm-8">
											      <textarea name="customer['customer_address']" class="form-control" rows="3"><?php if(isset($customer->customer_address)){ echo $customer->customer_address;} ?></textarea>
											    </div>
											</div>
											<div class="form-group">
											    <label class="col-sm-4 control-label">Contact Person : </label>
											    <div class="col-sm-8">
											      <input name="customer['contact_person']" type="text" class="form-control" value="<?php if(isset($customer->contact_person)){ echo $customer->contact_person;} ?>">
											    </div>
										    </div>
						  				</div>
						  				<div class="col-md-6 col-sm-6">
						  					<div class="form-group">
											    <label class="col-sm-4 control-label">Sales Order No. :</label>
											    <div id="likes" class="col-sm-8">
											    	 <input type="text" class="form-control" name="sales_order_no" value="<?php echo $sales_order->show_sales_order_number(); ?>"readonly>
												</div>
											</div>
											<div class="form-group">
											    <label class="col-sm-4 control-label">Qutotaion Ref :</label>
											    <div class="col-sm-8">
											    	 <input type="text" class="form-control" name="quotation_no" value="<?php if(isset($quotation->quotation_no)){ echo $quotation->quotation_no;}; ?>"readonly>
												</div>
											</div>
											<div class="form-group">
											    <label class="col-sm-4 control-label">Invoice Ref :</label>
											    <div class="col-sm-8">
											    	 <input type="text" class="form-control" name="invoice_no" value="<?php if(isset($quotation->quotation_no)){ echo $quotation->quotation_no;}; ?>"readonly>
												</div>
											</div>
											<div class="form-group">
											    <label class="col-sm-4 control-label">Notes : </label>
											    <div class="col-sm-8">
											      <textarea name="notes" class="form-control" rows="3"><?php if(isset($quotation->notes)){ echo $quotation->notes;} ?></textarea>
											    </div>
											 </div>
											<div class="form-group">
											    <label class="col-sm-4 control-label">Contact No : </label>
											    <div class="col-sm-8">
											      <input name="customer['contact_person_no']" type="tel" class="form-control"value="<?php if(isset($customer->contact_person_no)){ echo $customer->contact_person_no;} ?>">
											    </div>
											 </div>
						  				</div>
						  			</div>
								
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
													<?php
												    	if(isset($quotation->barcode)){
															$barcode = explode(",", $quotation->barcode);
														}
														if(isset($quotation->product_description)){
															$product_description = explode(",", $quotation->product_description);
														}
												    	if(isset($quotation->uom)){
															$uom = explode(",", $quotation->uom);
												    	}
												    	if(isset($quotation->cost_per_unit)){
															$cost_per_unit = explode(",", $quotation->cost_per_unit);
												    	}
												    	if(isset($quotation->price)){
															$price = explode(",", $quotation->price);
												    	}
												    	
												    	if(isset($quotation->quantity)){
															$quantity = explode(",", $quotation->quantity);
												    	}
												    	if(isset($quotation->amount)){
															$amount = explode(",", $quotation->amount);
												    	}
												    	if(isset($product_description)){
												    		$item = count($product_description);
												    		$sl = 1;
												    		for ($i=0; $i < $item ; $i++) { 
												    	?>
													    	<tr>
																<td><input class="case" type="checkbox"/></td>
																<td><input type="text" data-type="barcode" name="barcode[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off" value="<?php if(isset($barcode[$i])){
														    			echo $barcode[$i];
													    			}else{
													    				echo " ";
				    												} ?>">
				    											</td>
																<td>
																	<input type="text" data-type="productName" name="product_description[]" id="product_description_1" class="form-control autocomplete_txt" autocomplete="off" value="<?php echo $product_description[$i] ?>" required>
																	<?php if(isset($errors["product_description"])){echo $errors["product_description"]; } ?>
																</td>
																<td>
																	<input type="text" data-type="productName" name="uom[]" id="uom_1" class="form-control autocomplete_txt" autocomplete="off" value="<?php echo $uom[$i] ?>">
																	<?php if(isset($errors["uom"])){echo $errors["uom"]; } ?>
																</td>
																
																<td><input type="text" data-type="productCost" name="cost_per_unit[]" id="cost_per_unit_1" class="form-control autocomplete_txt" autocomplete="off" value="<?php echo $cost_per_unit[$i] ?>"readonly></td>
																<td>
																	<input type="text" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $price[$i] ?>">
																	<?php if(isset($errors["price"])){echo $errors["price"]; } ?>
																</td>
																<?php 
																	$avaliable = $inventory->show_single_inventory_item($product_description[$i]);
																 ?>
																<td>
																	<input type="text" name="" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"  value="<?php echo $avaliable->total_stock; ?>" readonly>
																</td>
																<td>
																	<input type="text" name="quantity[]" id="quantity2_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"  value="<?php echo $quantity[$i] ?>">
																	<?php if(isset($errors["quantity"])){echo $errors["quantity"]; } ?>
																</td>
																<td>
																	<input type="text" name="amount[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php echo $amount[$i] ?>"readonly>
																</td>
															</tr>
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
															<input value="<?php //if(isset($quotation->total)){ echo $quotation->total;}; ?>" type="text" class="form-control" name="" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
														</div>
													</div>
												<div class="form-group">
													<label>Vat: &nbsp;</label>
													<div class="input-group">
														
														<input value="" type="number"min="0" class="form-control" name="" id="tax" placeholder="Vat" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"><div class="input-group-addon">%</div>
													</div>
												</div>
												<div class="form-group">
													<label>Vat Amount: &nbsp;</label>
													<div class="input-group">
														<div class="input-group-addon currency">৳</div>
														<input value="" type="number"min="0" class="form-control" name="vat" id="taxAmount" placeholder="Vat" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
														
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
														<input value="" type="number"min="0" class="form-control" name="delivery_charge" id="amountPaid1" placeholder="Delivery Charge" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
														<input type="hidden" name="total">
													</div>
												</div>
												<div class="form-group">
													<label>Amount Paid: &nbsp;</label>
													<div class="input-group">
														<div class="input-group-addon currency">৳</div>
														<input value="" type="number"min="0" class="form-control" name="paid" id="amountPaid" placeholder="Amount Paid" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
													</div>
												</div>
												<div class="form-group">
													<label>Amount Due: &nbsp;</label>
													<div class="input-group">
														<div class="input-group-addon currency">৳</div>
														<input value="" type="number" class="form-control amountDue" name="due"  id="amountDue" placeholder="Amount Due" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
													</div>
												</div>
											</span>

											</div>
								      	</div>

									</div>
									<div class="confim_button">
										<a href="view_sales_order.php"><button class="btn btn-success btn-lg" name="">Confirm</button></a>
									</div>	
								</div><!-- end panel body -->
							</form>	
							
						</div>
						  	
						

				</div>
				
			</div>
		</div>
	</div>
</section>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script src="js/script.js"></script>
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