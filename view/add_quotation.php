<?php require_once 'start.php'; ?>
<?php 
	use App\Utility\Utility;
	use App\Quotation\Quotation;
	use App\Inventory\Inventory;
  	use App\Connection\Connection;

	$quotation = new Quotation;
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
			$quotation->createQuotation($_POST);
		}
		
	}


 ?>


	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
	<style type="text/css">
	.form-inline .form-group {margin-bottom: 20px;float: right;}
	.form-inline .form-group label{font-size: 13px;}
	.input-group{float: right;}
	
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
					<h2>Quotation</h2>
				</div><!--  -->
				<div class="navbar navbar-default" role="navigation">
				  <div class="container">
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
				      	
				        <li class=""><a href="add_quotation.php" data-toggle="tooltip" data-placement="bottom" title="Add"><img src="img/icon/add.png"> </a></li>
				        <li class=""><a href="#" data-toggle="tooltip" data-placement="bottom" title="Delete"><img src="img/icon/Files-Delete-File-icon.png"></a></li>
				        <li class=""><a href="replacement.php" data-toggle="tooltip" data-placement="bottom" title="Replacement"><img src="img/icon/refresh-icon.png"></a></li>
				        <li><h3 class="bdt_price">BDT <output class="form-control amountDue disabled top_total" value="0" id="amountDue" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">.00</h3></li>
				      </ul>
				      
				      <ul class="nav navbar-nav navbar-right">

				        
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
</header><!--  -->
<section class="view_container_content">
	<div class="container" style="background:#fff;border-radius: 10px;">
		<div class="row">
			<div class="col-md-12 no_padding">
				<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Add New Quotation</h4></div>

					<form class="form-horizontal" action="add_quotation.php" method="POST">

					  	<div class="panel-body">
					  		<?php echo Utility::message(); ?>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
									    <label class="col-sm-4 control-label">Date:</label>
									    <div class="col-sm-8">
									      <input name="quotation_date" type="date" class="form-control"  placeholder="Date" required>
									      <input type="hidden" name="customer_id">
									    </div>
									 </div>
									 <div class="form-group">
									    <label class="col-sm-4 control-label">Customer Name : </label>
									    <div class="col-sm-8">
									      <input name="customer['customer_name']" type="text" class="form-control" placeholder="Customer Name ">
									    </div>
									 </div>
									 <div class="form-group">
									    <label class="col-sm-4 control-label">Customer Phone : </label>
									    <div class="col-sm-8">
									      <input name="customer['customer_phone']" type="tel" class="form-control" placeholder="Phone " required>
									      <?php if(isset($errors["customer_phone"])){echo $errors["customer_phone"]; } ?>
									    </div>
									 </div>
									 <div class="form-group">
									    <label class="col-sm-4 control-label">Customer Address : </label>
									    <div class="col-sm-8">
									      <textarea name="customer['customer_address']" class="form-control" rows="3"></textarea>
									    </div>
									 </div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
									    <label class="col-sm-4 control-label">Ref No. :</label>
									    <div class="col-sm-8">
									      <input name="quotation_no" type="text" class="form-control"value="<?php echo $quotation->show_quotation_number(); ?>"readonly>
									    </div>
									</div>
									<div class="form-group">
									    <label class="col-sm-4 control-label">Contact Person : </label>
									    <div class="col-sm-8">
									      <input name="customer['contact_person']" type="text" class="form-control" placeholder="Contact Parson. ">
									    </div>
								    </div>
									<div class="form-group">
									    <label class="col-sm-4 control-label">Contact No : </label>
									    <div class="col-sm-8">
									      <input name="customer['contact_person_no']" type="tel" class="form-control" placeholder="Contact No. ">
									    </div>
									</div>
									<div class="form-group">
									    <label class="col-sm-4 control-label">Notes : </label>
									    <div class="col-sm-8">
									      <textarea name="notes" class="form-control" rows="3"></textarea>
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
													<th width="10%">Barcode</th>
													<th width="23%">Product Description</th>
													<th width="15%">uom</th>
													<th width="10%">Cost Per Unit</th>
													<th width="10%">price</th>
													<th width="10%">Available</th>
													<th width="10%">Quantity</th>
													<th width="10%">Total</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><input class="case" type="checkbox"/></td>
													<td><input type="text" data-type="barcode" name="barcode[]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off"></td>
													
													<td>
														<input type="text" data-type="product_name" name="product_description[]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off">
														<?php if(isset($errors["product_description"])){echo $errors["product_description"]; } ?>
													</td>
													<td>
														<input type="text" data-type="uom" name="uom[]" id="uom_1" class="form-control autocomplete_txt" autocomplete="off" readonly>
														<?php if(isset($errors["uom"])){echo $errors["uom"]; } ?>
													</td>
													<td>
														<input type="number" min="0" name="cost_per_unit[]" id="price1_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
														<?php if(isset($errors["cost_per_unit"])){echo $errors["cost_per_unit"]; } ?>
													</td>
													<td>
														<input type="number" min="0" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
														<?php if(isset($errors["price"])){echo $errors["price"]; } ?>
													</td>
													<td>
														<input type="number" min="0" name="" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly="readonly">
														<?php if(isset($errors["quantity"])){echo $errors["quantity"]; } ?>
													</td>
													<td>
														<input type="number" min="0" name="quantity[]" id="quantity2_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
														<?php if(isset($errors["quantity"])){echo $errors["quantity"]; } ?>
													</td>
													<td>
														<input type="number" min="0" name="amount[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
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
						      		<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>
										<span class="form-inline">
											<div class="form-group">
													<label>Total: &nbsp;</label>
													<div class="input-group">
														<div class="input-group-addon currency">৳</div>
														<input value="" type="number" min="0" step="0.01" class="form-control" name="" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
													</div>
												</div>
											<div class="form-group">
												<label>Vat: &nbsp;</label>
												<div class="input-group">
													
													<input value="" type="number" min="0" step="0.01" class="form-control" name="" id="tax" placeholder="Vat" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"><div class="input-group-addon">%</div>
												</div>
											</div>
											<div class="form-group">
												<label>Vat Amount: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon currency">৳</div>
													<input value="" type="number" min="0" step="0.01" class="form-control" name="vat" id="taxAmount" placeholder="Vat" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
													
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
													<input value="" type="number" min="0" step="0.01" class="form-control" name="delivery_charge" id="amountPaid1" placeholder="Delivery Charge" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
											<div class="form-group">
												<label>Discount: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon currency">৳</div>
													<input value="" type="number" min="0" step="0.01" class="form-control" name="discount" id="amountPaid" placeholder="Discount" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
											<div class="form-group">
												<label>Total Amount: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon currency">৳</div>
													<input value="" type="number" min="0" step="0.01" class="form-control amountDue" name="total"  id="amountDue" placeholder="Total Amount" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
												</div>
											</div>
										</span>

									</div>
						      	</div>

							</div>
							<div class="confim_button">	
								<a href="view_quotation.php"><button class="btn btn-success btn-lg" name="">Confirm</button></a>
							</div>	
						</div>
					</form>	
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