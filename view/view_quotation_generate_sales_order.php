	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<link rel="stylesheet" type="text/css" href="css/print.css">
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
				<div class="all_page">
					<div id="print">
						<div class="logo_section">
							<div class="logo_left">
								<h3>Korea IT</h3>
								<p style="margin-bottom:10px;">Nikunja-2 Khilkhet Dhaka</p>
							</div><hr>
							<div class="invoice_right">
								<div class="in_no">
									<p class="left">Order No:</p>
									<p class="right">KJDUF1254</p>
								</div>
								
								<div class="sa_or">
									<p class="left">Quotation Ref.:</p>
									<p class="right">5415321</p>
								</div>
							</div>
						</div>
						<div class="address_section">
							<h3 class="pull_center">Invoice</h3>
							<div class="left_section">
								<div class="cus_date">
									<p class="left">Date:</p>
									<p class="right">1-24-2016</p>
								</div>
								<div class="cus_name">
									<p class="left">Customer Name:</p>
									<p class="right">Md Ali Xinnah</p>
								</div>
								<div class="cus_phone">
									<p class="left">Customer Phone:</p>
									<p class="right">01832059065</p>
								</div>
								<div class="cus_address">
									<p class="left">Customer Adress:</p>
									<p class="right">Nikunja-2,Khilkhet Dhaka</p>
								</div>
								<div class="cus_code">
									<p class="left">Customer Code:</p>
									<p class="right">636522</p>
								</div>
								<div class="sales_agent">
									<p class="left">Sales Agent:</p>
									<p class="right">ASF EGY TG</p>
								</div>
							</div>
							<div class="right_section">
								<div class="notes">
									<p>Notes:</p>
									<p>Lorem Ipsum Dit amit</p>
								</div>
							</div>
						</div>
						<div class="table_section" id="table">
							
							<div class="panel panel-info no_margin"style="border:0;">
							  <div class="panel-body no_padding">
							    <div class="table-responsive">
								  <table class="table table-striped">
								    <tr class="first_row" style="background: #2BAEA8;">
								    	<th>Sl No.</th>
								    	<th>Product Description</th>
								    	<th>UOM</th>
								    	<th>Unit price</th>
								    	<th>Qty.</th>
								    	<th>Amount</th>
								    </tr>
								    <tr class="nts">
								    	<td>01</td>

								    	<td>Computer 2p</td>

								    	<td>542</td>


									    <td>20</td>
									    <td class="cart_quantity">
									        <div class="cart_quantity_button">
									            
									                2
									                
									          
									        </div>
									    </td>
									    <td>400</td>
									     
									  
								    </tr>
								    <tr>
								    	<td style="border:0 !important;"></td>

								    	<td style="border:0 !important;"></td>

								    	<td style="border:0 !important;"></td>


									    <td style="border:0 !important;"></td>
									    <td class="cart_quantity" style="border:0 !important;">
									        
									    </td>
									    <td style="border:0 !important;">&nbsp;</td>
									     
									  
								    </tr>
								    <tr>
								    	<td colspan="4"style="border: 0 !important;"></td>
								    	<td colspan="1">Vat(15%)</td>
								    	<td colspan="1">30</td>
								    </tr>
								    <tr>
								    	<td colspan="4"style="border: 0 !important;"></td>
								    	<td colspan="1">Delivery Charge</td>
								    	<td colspan="1">20</td>
								    </tr>
								    <tr>
								    	<td colspan="4"style="border: 0 !important;"></td>
								    	<td colspan="1">Total</td>
								    	<td>450</td>
								    </tr>
								    <tr>
								    	<td colspan="4"style="border: 0 !important;"></td>
								    	<td colspan="1">Paid</td>
								    	<td colspan="1">450</td>
								    </tr>
								    <tr>
								    	<td colspan="4"style="border: 0 !important;"></td>
								    	<td colspan="1">Due</td>
								    	<td>0</td>
								    </tr>
								  </table>
								</div><!--  -->
								<p>Total:</p>
								<p>BDT</p>
							  </div>									  
							</div>
							
						</div>
						<div class="condition_section">
							<h3>Terms & Condition:</h3>
							<p>1.In these terms and conditions, "Agreement" means these terms and conditions and the terms and</p>
							<p>2.In these terms and conditions, "Agreement" means these terms and conditions and the terms and conditions set out on the attached Buyer's Order Form</p>
						</div>
						<div class="signer_section">
							<div class="left_signer_customer pull_left">
								customer<br>(Sign & Date)
							</div>
							<div class="right_signer_sales pull_right">
								sales person<br>(Sign & Date)
							</div>
						</div>
					</div>	
						<div class="bottom_section">
							<a href="update_qutation_generate_sales_order.php"><input class="btn btn-info pull-left" type="submit" value="update" name=""></a>
							<button class="btn btn-success pull-right"name="confirm_invoice" onclick="printDiv('print')">Print
								<script>
					                function printDiv(divName) {
					                   var printContents = document.getElementById(divName).innerHTML;
					                   var originalContents = document.body.innerHTML;

					                   document.body.innerHTML = printContents;

					                   window.print();

					                   document.body.innerHTML = originalContents;
					                    //document.getElementById('print').innerHTML = inputBox.value;
					              }
					          </script>
							</button>
							
						</div>
				</div>
			</div>
		</div>
	</div>
</section>	

	<?php include('includes/footer.php'); ?>