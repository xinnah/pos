	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<style type="text/css">
	.form-group{overflow: hidden;}
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
					<h2>generate Delivery Receipts</h2>
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
		<div class="row">

			<div class="col-md-12 no_padding">

				<form action="" method="post">

					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Generate Delivery Receipts</h4></div>
					  	
					  		<div class="panel-body">
							<div class="view_top_date"  style="overflow:hidden;">
								<div class="view_date pull-left" style="width:50%;float:left;">
									<div class="form-group">
									    <label for="inputDate3" class="col-sm-3 no_padding control-label " style="width:20%;margin-left:10px;">Date:</label>
									    <div class="col-sm-9" style="width:75%;float:right">
									      <input name="date" type="Date" class="form-control" id="inputDate3">
									    </div>
									 </div>
								</div>
								<div class="view_invoice" style="width:50%;float:right;">
									
									<div class="form-group">
									    <label for="inputInvoice3" class="col-sm-4 no_padding control-label"style="width:40%;margin-left:10px;">Delivery Receipts:</label>
									   
									    <div id="likes" class=""style="width:55%;float:right;">
									    	 <input type="text" name="	delivery_receipts_no" value="KITV521">
										</div>
									</div> 
								</div>
							</div><!--  -->
							<div class="view_address" style="overflow:hidden;">
								<div class="view_a_name"style="width:100%;float:left;">
									
									<div class="form-group">
									    <label for="inputCustomerName3" class="col-sm-3 no_padding control-label "style="    width: 30%;">Customer Name : </label>
									    <div class="col-sm-9 "style="width: 70%;float: right;padding: 0;padding-right: 15px;">
									      <input name="customer_name" type="text" class="form-control" id="inputCustomerName3" placeholder="Customer Name ">
									    </div>
									 </div>
								</div>
								<div class="view_a_phone"style="width:100%;float:left;">
									<div class="form-group">
									    <label for="inputCustomerphone3" class="col-sm-3 no_padding control-label" style="    width: 30%;">Phone : </label>
									    <div class="col-sm-9 "style="width: 70%;float: right;padding: 0;padding-right: 15px;">
									      <input name="customer_phone" type="tel" class="form-control" id="inputCustomerphone3" placeholder="Phone ">
									    </div>
									 </div>
								</div>
								<div class="view_a_address"style="width:100%;float:left;">
									<div class="form-group">
									    <label for="inputcustomerAddress3" class="col-sm-3 no_padding control-label"style="width: 23%;">Customer Address: </label>
									    <div class="col-sm-9 pull-right no_padding">
									      <textarea name="customer_address" class="form-control" rows="3"style="    width: 88%;float: right;margin-right: 15px;"></textarea>
									    </div>
									 </div>
									
								</div>
							</div><!--  -->
							<div class="notes"  style="overflow:hidden;">
								<div class="form-group">
								    <label for="inputS3" class="col-sm-4 no_padding control-label"style="width:40%;margin-left:10px;">Invoice No :</label>
								   
								    <div class=""style="width:55%;float:right;">
								    	 <input type="text" name="invoice_no" value="KITV521">
									</div>
								</div>
								 <div class="form-group">
								    <label for="inputq3" class="col-sm-4 no_padding control-label"style="width:40%;margin-left:10px;">Sales order:</label>
								   
								    <div class=""style="width:55%;float:right;">
								    	 <input type="text" name="sales_order_no" value="KITV521">
									</div>
								</div>
								<div class="form-group">
								    <label for="inputR3" class="col-sm-4 no_padding control-label"style="width:40%;margin-left:10px;">Quotation Ref:</label>
								   
								    <div class=""style="width:55%;float:right;">
								    	 <input type="text" name="quotation_reference" value="KITV521">
									</div>
								</div>
								<div class="form-group">
								    <label for="inputcustomerNotes3" class="col-sm-3 no_padding control-label"style="margin-left:10px;">Notes : </label>
								    <div class="col-sm-9 no_padding"style="width:55%;float:right;">
								      <textarea name="notes" class="form-control" rows="3"></textarea>
								    </div>
								 </div>
							</div><!--  -->
							<div class="view_center_folwchart">
								<div class="panel panel-info no_margin"style="border:0;">
								  <div class="panel-body no_padding">
								    <div class="table-responsive">
									  <table class="table">
									    <tr style="background: #2BAEA8;">
									    	<th>Sl No.</th>
									    	<th>Product Description</th>
									    	<th>qty.</th>
									    </tr>
									    <tr>
									    	<td>1</td>

									    	<td>Computer</td>

									    	<td>5</td>

									    	
									    </tr>
									  </table>
									</div><!--  -->
									
								  </div>									  
								</div>
								<a href="#"><button class="btn btn-success btn-lg pull-right" name="confirm_invoice">Update</button></a>
							</div><!--  -->
						</div>
					</div><!-- end panel body -->
					  	
				</form>	

			
			</div>
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>