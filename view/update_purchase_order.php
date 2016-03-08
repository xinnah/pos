	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>




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
					<h2>Purchase Order</h2>
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

	<div class="container" style="background:#fff;width:55%;float:left;margin-left:110px;">
		<div class="row">

			<div class="col-md-12 no_padding">

				<!-- start print option -->

					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Update Purchase Order</h4></div>
					  	
					  		<div class="panel-body">
								<form class="form-horizontal" action="" method="post">
								  <div class="customer_info">
									  	<div class="form-group">
										    <label for="inputsupplierName3" class="col-sm-4 control-label">Supplier Name :</label>
										    <div class="col-sm-8">
										      <input name="supplier_name" type="text" class="form-control" id="inputsupplierName4">
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputsupplierPhone4" class="col-sm-4 control-label">Supplier Phone :</label>
										    <div class="col-sm-8">
										      <input name="supplier_phone" type="text" class="form-control" id="inputsupplierPhone4">
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputPORefNo4" class="col-sm-4 control-label">Supplier Code:</label>
										    <div class="col-sm-8">
										      <input name="supplier_code" type="text" class="form-control" id="inputPORefNo4">
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputBar4" class="col-sm-4 control-label">Supplier Address :</label>
										    <div class="col-sm-8">
										      <input name="supplier_address" type="text" class="form-control" id="inputBar4">
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputName4" class="col-sm-4 control-label">Purchase Order Number :</label>
										    <div class="col-sm-8">
										      <input name="purchase_order_no" type="text" class="form-control" id="inputName4">
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputAddress4" class="col-sm-4 control-label">Purchase Order Value(In BDT) :</label>
										    <div class="col-sm-8">
										      <input name="" type="text" class="form-control" id="inputAddress4">
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputPhone4" class="col-sm-4 control-label">Vat :</label>
										    <div class="col-sm-8">
										      <input name="vat" type="tel" class="form-control" id="inputPhone4">
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputBalance4" class="col-sm-4 control-label">Tax :</label>
										    <div class="col-sm-8">
										      <input name="tax" type="text" class="form-control" id="inputBalance4">
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputPaymentDue4" class="col-sm-4 control-label">Delivery Charge :</label>
										    <div class="col-sm-8">
										      <input name="	delivery_charge" type="text" class="form-control" id="inputPaymentDue4">
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputUom4" class="col-sm-4 control-label">Total :</label>
										    <div class="col-sm-8">
										      <input name="total" type="text" class="form-control" id="inputUom4">
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputCostUnit4" class="col-sm-4 control-label">Paid :</label>
										    <div class="col-sm-8">
										      <input name="paid" type="text" class="form-control" id="inputCostUnit4">
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputSalesPriceUnit4" class="col-sm-4 control-label">Due :</label>
										    <div class="col-sm-8">
										      <input name="due" type="text" class="form-control" id="inputSalesPriceUnit4">
										    </div>
									  </div>
									  	
									</div>
								  <a href="view_purchase_orders.php"><button class="btn btn-success btn-lg" name="confirm"style="margin: 15px auto;margin-left: 323px;">Update</button></a>

								</form>
							
							
							
						</div>
					</div><!-- end panel body -->
					  	
					

			</div>
			
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>