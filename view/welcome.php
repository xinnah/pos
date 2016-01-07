	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
        	
		    $("#btn3").click(function(){var i=1;
		        $("#test3").val(var i++);
		    });
		});
    </script>


<header class="header_section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php include('includes/header_top.php'); ?>

				<div class="sales_point">
					<h2>sales point</h2>
				</div><!--  -->
				 <div class="container">
					<?php include('includes/admin_navigationbar.php'); ?>
				</div>
			</div>
		</div>
	</div>
</header><!--  -->
<section class="view_container_content">
	<div class="container" style="background:#fff;width:50%;float:left;margin-left:110px;">
		<div class="row">
			<div class="col-md-12 no_padding">
					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Add New Invoice</h4></div>
					  	<div class="panel-body">
							<div class="view_top_date">
								<div class="view_date">
									<div class="form-group">
									    <label for="inputDate3" class="col-sm-3 no_padding control-label">Date:</label>
									    <div class="col-sm-9">
									      <input name="invoice_date" type="Date" class="form-control" id="inputDate3" placeholder="Date">
									    </div>
									 </div>
								</div>
								<div class="view_invoice">
									
									<div class="form-group">
									    <label for="inputInvoice3" class="col-sm-3 no_padding control-label">Invoice No. :</label>
									    <div class="col-sm-9">
									      <input  id="test3" name="invoiceNumber" type="text" class="form-control" id="inputInvoice3" placeholder="Invoice No." >
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
									    <label for="inputCustomerphone3" class="col-sm-3 no_padding control-label">Phone : </label>
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
									    	<th style="width:62px;">Sl No.</th>
									    	<th style="width:145px;">Product Description</th>
									    	<th style="width:62px;">Uom</th>
									    	<th style="width:62px;">Unit Cost</th>
									    	<th style="width:62px;">Unit price</th>
									    	<th style="width:62px;">qty.</th>
									    	<th style="width:62px;">Total Amount</th>
									    </tr>
									    <tr>
									    	<td><input type="number" name="productSlNo" class="from-control"style="width:50px; height:34px;"></td>
									    	<td><textarea name="ProductAddress" class="form-control" rows="1"style="width:150px;padding:2px 1px; height:34px;margin: 0 auto;"></textarea></td>
									    	<td><input type="number" name="uom" class="from-control"style="width:50px; height:34px;"></td>
									    	<td><input type="text" name="cost_unit" class="from-control"style="width:50px; height:34px;"></td>
									    	<td><input type="text" name="unit_price" class="from-control"style="width:50px; height:34px;"></td>
									    	<td><input type="number" id="change" name="change" value="0" min="1" max="20" class="form-control"style="width:50px;"></td>
									    	<td><input type="text" name="total Amount" class="from-control"style="width:50px; height:34px;"></td>
									    </tr>
									    <tr>
									    	<td colspan="5"></td>
									    	<td colspan="1">Vat(0%)</td>
									    	<td colspan="1" name="vat"></td>
									    </tr>
									    <tr>
									    	<td colspan="5"></td>
									    	<td colspan="1">Delivery Charge</td>
									    	<td colspan="1" name="delivery_charge"></td>
									    </tr>
									    <tr>
									    	<td colspan="5"></td>
									    	<td colspan="1">Total</td>
									    	<td colspan="1" name="total"></td>
									    </tr>
									    <tr>
									    	<td colspan="5"></td>
									    	<td colspan="1">Paid</td>
									    	<td colspan="1" name="paid"></td>
									    </tr>
									    <tr>
									    	<td colspan="5"></td>
									    	<td colspan="1">Due</td>
									    	<td colspan="1" name="due"></td>
									    </tr>
									  </table>
									</div><!--  -->
									<a href="#"><button class="btn btn-success pull-right" name="confirm_invoice">Confirm & Print</button></a>
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