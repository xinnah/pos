	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>


<header class="header_section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php include('includes/header_top.php'); ?>
				<div class="sales_point">
					<h2>sales point</h2>
				</div><!--  -->
				<?php include('includes/admin_navigationbar.php'); ?>
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
					  	<div class="panel-body">
							<div class="view_top_date">
								<div class="view_date">
									<div class="form-group">
									    <label for="inputDate3" class="col-sm-3 no_padding control-label">Date:</label>
									    <div class="col-sm-9">
									      <input name="quitation_date" type="Date" class="form-control" id="inputDate3" placeholder="Date">
									    </div>
									 </div>
								</div>
								<div class="view_invoice">
									
									<div class="form-group">
									    <label for="inputInvoice3" class="col-sm-3 no_padding control-label">Ref No. :</label>
									    <div class="col-sm-9">
									      <input name="invoiceNumber" type="text" class="form-control" id="inputInvoice3" placeholder="Invoice No.">
									    </div>
									 </div>
								</div>
							</div><!--  -->
							<div class="view_address">
								<div class="view_a_name">
									
									<div class="form-group">
									    <label for="inputCustomerName3" class="col-sm-3 no_padding control-label">Customer Name : </label>
									    <div class="col-sm-9">
									      <input name="customer_name" type="text" class="form-control" id="inputCustomerName3" placeholder="Customer Name ">
									    </div>
									 </div>
								</div>
								<div class="view_a_phone">
									<div class="form-group">
									    <label for="inputCustomerphone3" class="col-sm-3 no_padding control-label">Customer Phone : </label>
									    <div class="col-sm-9">
									      <input name="customer_phone" type="tel" class="form-control" id="inputCustomerphone3" placeholder="Phone ">
									    </div>
									 </div>
								</div>
								<div class="view_a_address">
									<div class="form-group">
									    <label for="inputcustomerAddress3" class="col-sm-3 no_padding control-label">Customer Address : </label>
									    <div class="col-sm-9">
									      <textarea name="customerAddress" class="form-control" rows="3"></textarea>
									    </div>
									 </div>
									 <div class="contact_person">
									 	<div class="form-group">
										    <label for="inputCustomerperson3" class="col-sm-3 no_padding control-label">Contact Person : </label>
										    <div class="col-sm-9">
										      <input name="Contact_Person" type="text" class="form-control" id="inputCustomerperson3" placeholder="Contact Person ">
										    </div>
										 </div>
									 </div>
									 <div class="person_no">
									 	<div class="form-group">
										    <label for="inputCustomerpersonN3" class="col-sm-3 no_padding control-label">Contact No : </label>
										    <div class="col-sm-9">
										      <input name="Person_no" type="tel" class="form-control" id="inputCustomerpersonN3" placeholder="Contact No. ">
										    </div>
										 </div>
									 </div>
									
								</div>
							</div><!--  -->
							<div class="notes">
								<div class="form-group">
								    <label for="inputcustomerNotes3" class="col-sm-3 no_padding control-label">Notes : </label>
								    <div class="col-sm-9">
								      <textarea name="customerAddress" class="form-control" rows="3"></textarea>
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
									    	<th>Product</th>
									    	<th>Uom</th>
									    	<th>Unit price</th>
									    	<th>qty.</th>
									    	<th>Total Amount</th>
									    </tr>
									    <tr>
									    	<td><input type="number" name="productSlNo" class="from-control"></td>
									    	<td><input type="text" name="ProductAddress" class="from-control"></td>
									    	<td><input type="number" name="uom" class="from-control"></td>
									    	<td><input type="text" name="unit_price" class="from-control"></td>
									    	<td><input type="number" id="change" name="change" value="0" min="1" max="20" class="form-control"></td>
									    	<td><input type="text" name="total Amount" class="from-control"></td>
									    </tr>
									    <tr>
									    	<td colspan="4"></td>
									    	<td colspan="1">Vat(0%)</td>
									    	<td colspan="1" name="vat"></td>
									    </tr>
									    <tr>
									    	<td colspan="4"></td>
									    	<td colspan="1">Delivery Charge</td>
									    	<td colspan="1" name="delivery_charge"></td>
									    </tr>
									    <tr>
									    	<td colspan="4"></td>
									    	<td colspan="1">Discount</td>
									    	<td colspan="1" name="paid"></td>
									    </tr>
									    <tr>
									    	<td colspan="4"></td>
									    	<td colspan="1">Total</td>
									    	<td colspan="1" name="total"></td>
									    </tr>
									    
									    
									  </table>
									</div><!--  -->
									<a href="#"><button class="btn btn-success btn-lg pull-right" name="confirm_invoice">Confirm & Print Invoice</button></a>
								  </div>									  
								</div>
							</div><!--  -->
						</div>
					</div>


			</div>
		</div>
	</div>
</section>	

	<?php include('includes/footer.php'); ?>