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
		<div class="col-md-8">
			<div class="row">

				<div class="col-md-12 no_padding">

					<!-- start print option -->
					<form action="" method="POST">
						<div class="panel panel-info no_margin">
						  <div class="panel-heading"><h4 style="text-align:center;">Update Invoice</h4></div>
						  	
						  		<div class="panel-body">
								<div class="view_top_date"  style="overflow:hidden;">
									<div class="view_date pull-left" style="width:50%;float:left;">
										<div class="form-group">
										    <label for="inputDate3" class="col-sm-3 no_padding control-label " style="width:20%;margin-left:10px;">Date:</label>
										    <div class="col-sm-9" style="width:75%;float:right">
										      	<p class="marquee">
												    <span id="dtText"></span>
												</p>
										 </div>
									</div>
									<div class="view_invoice" style="width:50%;float:right;">
										
										<div class="form-group">
										    <label for="inputInvoice3" class="col-sm-4 no_padding control-label"style="width:40%;margin-left:10px;">Invoice No. :</label>
										   
										    <div id="likes" class=""style="width:55%;float:right;">
										    	 <input type="text" name="invoice_no" value="KITV521">
											</div>
										</div> 
									</div>
								</div><!--  -->
								<div class="view_address" style="overflow:hidden;">
									<div class="view_a_name"style="width:100%;float:left;">
										
										<div class="form-group">
										    <label for="inputCustomerName3" class="col-sm-3 no_padding control-label "style="    width: 30%;">Customer Name: </label>
										    <div class="col-sm-9 "style="width: 70%;float: right;padding: 0;padding-right: 15px;">
										      <input name="customer_name" type="text" class="form-control" id="inputCustomerName3">
										    </div>
										 </div>
									</div>
									<div class="view_a_phone"style="width:100%;float:left;">
										<div class="form-group">
										    <label for="inputCustomerphone3" class="col-sm-3 no_padding control-label" style="    width: 30%;">Phone : </label>
										    <div class="col-sm-9 "style="width: 70%;float: right;padding: 0;padding-right: 15px;">
										      <input name="customer_phone" type="tel" class="form-control" id="inputCustomerphone3">
										    </div>
										 </div>
									</div>
									<div class="view_a_address"style="width:100%;float:left;">
										<div class="form-group">
										    <label for="inputcustomerAddress3" class="col-sm-3 no_padding control-label"style="    width: 23%;">Customer Address : </label>
										    <div class="col-sm-9 pull-right no_padding">
										      <textarea name="customer_address" class="form-control" rows="3"style="    width: 88%;float: right;margin-right: 15px;"></textarea>
										    </div>
										 </div>
										
									</div>
								</div><!--  -->
								<div class="notes"  style="overflow:hidden;">
									<div class="form-group">
									    <label for="inputcustomerNotes3" class="col-sm-3 no_padding control-label">Notes : </label>
									    <div class="col-sm-9 pull-right">
									      <textarea name="notes" class="form-control" rows="3"></textarea>
									    </div>
									 </div>
								</div><!--  -->
								<div class="view_center_folwchart">
									<div class='row'>
							      		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
							      			<table class="table table-bordered table-hover">
												<thead>
													<tr>
														<th width="2%"><input id="check_all" class="formcontrol" type="checkbox"/></th>
														<th width="7%">Sl No</th>
														<th width="31%">Product Description</th>
														<th width="10%">UOM</th>
														<th width="10%">Unit Cost</th>
														<th width="15%">Price</th>
														<th width="10%">Quantity</th>
														<th width="15%">Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><input class="case" type="checkbox"/></td>
														<td><input type="text" data-type="productName" name="sl_no[]" id="sl_no_1" class="form-control autocomplete_txt" autocomplete="off"></td>
														<td><input type="text" data-type="productName" name="product_description[]" id="product_description_1" class="form-control autocomplete_txt" autocomplete="off"></td>
														<td><input type="text" data-type="productName" name="uom[]" id="uom_1" class="form-control autocomplete_txt" autocomplete="off"></td>
														
														<td><input type="text" data-type="productCost" name="cost_per_unit[]" id="cost_per_unit_1" class="form-control autocomplete_txt" autocomplete="off"></td>
														<td><input type="number" name="price[]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
														<td><input type="number" name="quantity[]" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
														<td><input type="number" name="total[]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
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
							      		<div class='col-xs-12 col-sm-6 col-md-6 col-lg-6'>
											<span class="form-inline">
												<div class="form-group">
													<label>Subtotal: &nbsp;</label>
													<div class="input-group">
														<div class="input-group-addon currency">৳</div>
														<input value="" type="number" class="form-control" name="subTotal" id="subTotal"tal onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
													</div>
												</div>
												<div class="form-group">
													<label>Tax: &nbsp;</label>
													<div class="input-group">
														<div class="input-group-addon currency">৳</div>
														<input value="" type="number" class="form-control" name="tax" id="tax"onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
													</div>
												</div>
												<div class="form-group">
													<label>Tax Amount: &nbsp;</label>
													<div class="input-group">
														<input value="" type="number" class="form-control" name="taxAmount" id="taxAmount"onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
														<div class="input-group-addon">%</div>
													</div>
												</div>
												<div class="form-group">
													<label>Total: &nbsp;</label>
													<div class="input-group">
														<div class="input-group-addon currency">৳</div>
														<input value="" type="number" class="form-control" name="totalAftertax" id="totalAftertax" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
													</div>
												</div>
												<div class="form-group">
													<label>Amount Paid: &nbsp;</label>
													<div class="input-group">
														<div class="input-group-addon currency">৳</div>
														<input value="" type="number" class="form-control" name="amountPaid" id="amountPaid"t Paid onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
													</div>
												</div>
												<div class="form-group">
													<label>Amount Due:&nbsp;</label>
													<div class="input-group">
														<div class="input-group-addon currency">৳</div>
														<input value="" type="number" class="form-control amountDue" name="amountDue"  id="amountDue"t Due onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
													</div>
												</div>
											</span>

										</div>
							      	</div>

								</div>
							</div>
							<a href="view_invoice_pos.php"><button class="btn btn-success btn-lg" name="confirm_invoice"style="margin: 15px auto;margin-left: 323px;">Update</button></a>
						</div><!-- end panel body -->
					</form>	  	
						

				</div>
				
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>
</section>
	<script type="text/javascript" src="js/scriptanother.js"></script>
    <script src="js/ajax.js"></script>
<script>
    	$('.submit_btn').on('click', function(){
    		$(this).button('loading');
        });

        $(document).ready(function(){
			$('.currency').html( $('#currency').val() );
       	});
        
		$('#clientCompanyName').autocomplete({
    		source: function( request, response ) {
    			$.ajax({
    				url : 'ajax.php',
    				dataType: "json",
    				method: 'post',
    				data: {
    					name_startsWith: request.term,
    					type: 'customerName'
    				},
    				success: function( data ) {
    					response( $.map( data, function( item ) {
    						var code = item.split("|");
    							return {
    								label: code[1],
    								value: code[1],
    								data : item
    							}
    						}));
    					}
    				});
    		},
    		autoFocus: true,	      	
    		minLength: 1,
    		select: function( event, ui ) {
    			var names = ui.item.data.split("|");
    			$(this).val(names[1]);
    			getClientAddress(names[0]);
    		}		      	
    	});
    	function getClientAddress(id){
    		
    		 $.ajax({
        		 url: "ajax.php",
        		 method: 'post', 
        		 data:{id:id, type:'clientAddress'},
        		 success: function(result){
    		        $("#clientAddress").html(result);
    		    }
 		    });
       	}
       	/*start today time */

       	var today = new Date();
		document.getElementById('dtText').innerHTML=today;
       	
    	       
    </script>
	<?php include('includes/footer.php'); ?>