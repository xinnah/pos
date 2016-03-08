	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript">
        function calc(){
            q = parseInt(document.getElementById('change').value);
            
            p = parseInt(document.getElementById('price1').value);

                
            document.getElementById('total').value= q * p;
            /* total price*/
            r = parseInt(document.getElementById('change').value);
            
            v = parseInt(document.getElementById('price1').value);

                
            document.getElementById('total1').value= 15/100*(r * v);
            /*total price + vat(15%)*/
           
           ev = parseInt(document.getElementById('total1').value);
             e = parseInt(document.getElementById('change1').value);
            tt = parseInt(document.getElementById('total').value) ;
   
            document.getElementById('total4').value= ev + e + tt;

            /*total price + vat(15%) + delivery charge*/
           
            d = parseInt(document.getElementById('total4').value);
 			w = parseInt(document.getElementById('change4').value);
                
            document.getElementById('total4').value= d - w;
            /*(total price + vat(15%) + delivery charge ) - Discount*/
			d = parseInt(document.getElementById('total4').value);
                
            document.getElementById('total5').value= d;
            /*(total price + vat(15%) + delivery charge ) - paid and show admin nav bar*/
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
					<h2>Supplier order</h2>
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
				        <li><h3 class="bdt_price">BDT <p class="navbar_total_price" name="spTotalPrice"><b><output id="total5" for="change">0</output></b></p>.00</h3></li>
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
				        <!-- <li class=""><a href="#" data-toggle="tooltip" data-placement="bottom" title="Search"><img src="img/icon/search.png"></a></li> -->
				        <!-- <li class=""><a href="#" data-toggle="tooltip" data-placement="bottom" title="Edit"><img src="img/icon/file-edit white.png"></a></li> -->
				        
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
					  <div class="panel-heading"><h4 style="text-align:center;">Update Supplier</h4></div>
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
									    <label for="inputInvoice3" class="col-sm-3 no_padding control-label">Supplier No. :</label>
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
									
								</div>
								<div class="contact_parson">
									<div class="form-group">
									    <label for="inputCustomerpersonNa3" class="col-sm-3 no_padding control-label">Contact Person : </label>
									    <div class="col-sm-9">
									      <input name="Person_name" type="text" class="form-control" id="inputCustomerpersonNa3" placeholder="Contact Parson. ">
									    </div>
								    </div>
								</div>
								<div class="contact_no">
									<div class="form-group">
									    <label for="inputCustomerpersonN3" class="col-sm-3 no_padding control-label">Contact No : </label>
									    <div class="col-sm-9">
									      <input name="Person_no" type="tel" class="form-control" id="inputCustomerpersonN3" placeholder="Contact No. ">
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
									    	<th>Unit Cost</th>
									    	<th>Unit Price</th>
									    	<th>qty.</th>
									    	<th>Amount</th>
									    </tr>
									    <tr>
									    	<td><input type="number" name="productSlNo" class="from-control"></td>
									    	<td><input type="text" name="ProductAddress" class="from-control"></td>
									    	<td><input type="number" name="uom" class="from-control"></td>
									    	<td><input type="text" name="cost_unit" class="from-control"></td>
									    	<td>
									    		<div class="cart_quantity_button">
										            
										                <input type="number" id="price1" name="unit_price" value="0" class="form-control" onchange="calc()" style="width:100px;">
										                
										            
										        </div>
									    	</td>
									    	<td>
									    		<div class="cart_quantity_button">
										            
										                <input type="number" id="change" name="qty" value="0" min="1" class="form-control" onchange="calc()" style="width:100px;">
										           
										        </div>
									    	</td>
									    	<td class="cart_total">
										        <p class="cart_total_price" name="amount"><b> Tk. <input id="total" for="change" class="disabled" name="amount" value="0"></b></p>

										    </td>
									    </tr>
									    <tr>
									    	<td colspan="5"></td>
									    	<td colspan="1">Vat(15%)</td>
									    	<td colspan="1" name="vat">
									    		<p class="cart_total_price" name="spTotalPrice"><b> Tk. <input id="total1" for="change" class="disabled" name="vat" value="0"></b></p>
									    	</td>
									    </tr>
									    <tr>
									    	<td colspan="5"></td>
									    	<td colspan="1">Delivery Charge</td>
									    	<td colspan="1" name="delivery_charge">
									    		
											        <div class="cart_quantity_button">
											            
											                <input type="number" id="change1" name="delivery_charge" value="0" class="form-control" onchange="calc()" style="width:100px;" >
											                
											            
											        </div>
									    	</td>
									    </tr>
									    <tr>
									    	<td colspan="5"></td>
									    	<td colspan="1">Discount</td>
									    	<td colspan="1" name="paid">
									    		 <div class="cart_quantity_button">
										            
										                <input type="number" id="change4" name="paid" value="0" class="form-control" onchange="calc()" style="width:100px;" >
										                
										            
										        </div>
									    	</td>
									    </tr>
									    <tr>
									    	<td colspan="5"></td>
									    	<td colspan="1">Total</td>
									    	<td class="cart_total">
										        <p class="cart_total_price" name="discount"><b> Tk. <input id="total4" for="change" class="disabled" name="total" value="0"></b></p>

										    </td>
									    </tr>
									    
									    
									  </table>
									</div><!--  -->
									<a href="view_supplier_invoices.php"><button class="btn btn-success btn-lg pull-right" name="confirm_invoice">Update</button></a>
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