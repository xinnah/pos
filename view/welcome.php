<?php require_once '../vendor/autoload.php' ?>
<?php
	use App\Connection\Connection; 
	use App\Utility\Utility; 
	use App\Invoice\Invoice;  


	$dbConnect = new Connection;
	// Utility::dd($_POST);
	$message = isset($dbConnect->message) ? $dbConnect->message : "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$errors = array();
		$errors = Utility::validateInput($_POST);
		if(empty($errors)){
			$newInvoice = new Invoice($_POST);
			$message = $newInvoice->createInventory();
		}else{
			$message = "There was an error while creating invoice";
		}
	}

?>
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
   
            document.getElementById('total3').value= ev + e + tt;

            /*total price + vat(15%) + delivery charge*/
           
            d = parseInt(document.getElementById('total3').value);
 			w = parseInt(document.getElementById('change4').value);
                
            document.getElementById('total4').value= d - w;
            /*(total price + vat(15%) + delivery charge ) - discount*/

            a = parseInt(document.getElementById('total3').value);
 			m = parseInt(document.getElementById('change4').value);
                
            document.getElementById('total5').value= a - m;
            /*(total price + vat(15%) + delivery charge ) - discount and show admin nav bar*/
        }
        window.onload  = calc;
    </script>

<script type="text/javascript">
var clicks = 0; $("#like").click(function(){ clicks++; $('.figure').html(clicks);});
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
				<?php 
				include('includes/admin_navigationbar.php'); ?> 
				 
				  
				</div>
			</div>
		</div>
	</div>
</header><!--  -->

<section class="view_container_content">

	<div class="container" style="background:#fff;width:50%;float:left;margin-left:110px;"><div id="print">
		<div class="row">

			<div class="col-md-12 no_padding">

				<!-- start print option -->

					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Add New Invoice</h4></div>
					  	
					<div class="message message_error"><?php echo $message = isset($message) ? $message : "" ?></div>

					  		<div class="panel-body">
					  		<form action="welcome.php" method="POST">
							<div class="view_top_date"  style="overflow:hidden;">
								<div class="view_date pull-left" style="width:50%;float:left;">
									<div class="form-group">
									    <label for="inputDate3" class="col-sm-3 no_padding control-label " style="width:20%;margin-left:10px;">Date:</label>
									    <div class="col-sm-9" style="width:75%;float:right">
									      <input name="invoice_date" type="Date" class="form-control" id="inputDate3" placeholder="Date">
									    </div>
									 </div>
								</div>
								<div class="view_invoice" style="width:50%;float:right;">
									
									<div class="form-group">
									    <label for="inputInvoice3" class="col-sm-4 no_padding control-label"style="width:40%;margin-left:10px;">Invoice No. :</label>
									   
									    <div id="likes" class=""style="width:55%;float:right;">
									    KITV52<span class="figure"></span>
									    <!-- <input type="hidden" name="invoice_no">	 -->
										</div>

									     <script type="text/javascript">
										var clicks = 0; $("#like").click(function(){ clicks++; $('.figure').html(clicks);});
										</script>
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
									    	<th style="width:62px;">Amount</th>
									    </tr>
									    <tr>
									    	<td><input type="number" name="product_sl_no" class="from-control"style="width:50px; height:34px;"></td>

									    	<td><textarea name="product_address" class="form-control" rows="1"style="width:150px;padding:2px 1px; height:34px;margin: 0 auto;"></textarea></td>

									    	<td><input type="number" name="uom" class="from-control"style="width:50px; height:34px;"></td>

									    	<td><input type="text" name="cost_unit" class="from-control"style="width:80px; height:34px;"></td>

										    <td class="cart_quantity">
										        <div class="cart_quantity_button"><!-- 
										            <form class="form-inline" action="" method="post"> -->
										                <input type="number" id="price1" name="unit_price" value="0" class="form-control" onchange="calc()" style="width:100px;">
										                
										         <!--    </form> -->
										        </div>
										    </td>
										    <td class="cart_quantity">
										        <div class="cart_quantity_button"><!-- 
										            <form class="form-inline" action="" method="post"> -->
										                <input type="number" id="change" name="qty" value="0" min="1" class="form-control" onchange="calc()" style="width:100px;">
										                
										            <!-- </form> -->
										        </div>
										    </td>
										    <td class="cart_total">
										        <p class="cart_total_price" name="amount"><b> Tk. <output id="total" for="change">0</output></b></p>
												<!-- <input type="hidden" name="amount"> -->
										    </td>

									    	
									    </tr>
									    <tr>
									    	<td colspan="5"></td>
									    	<td colspan="1">Vat(15%)</td>
									    	<td colspan="1" name="vat">
									    		<p class="cart_total_price" name="spTotalPrice"><b> Tk. <output id="total1" for="change">0</output></b></p>
									    	</td>
									    	<!-- <input type="hidden" name="vat"> -->
									    </tr>
									    <tr>
									    	<td colspan="5"></td>
									    	<td colspan="1">Delivery Charge</td>
									    	<td colspan="1" name="delivery_charge">
									    		
											        <div class="cart_quantity_button">
											            <form class="form-inline" action="" method="post">
											                <input type="number" id="change1" name="delivery_charge" value="0" class="form-control" onchange="calc()" style="width:100px;" >
											                
											            </form>
											        </div>
									    	</td>
									    </tr>
									    <tr>
									    	<td colspan="5"></td>
									    	<td colspan="1">Total</td>
									    	<td class="cart_total">
										        <p class="cart_total_price" name="total"><b> Tk. <output id="total3" for="change">0</output></b></p>
												<!-- <input type="hidden" name="total"> -->
										    </td>
									    </tr>
									    <tr>
									    	<td colspan="5"></td>
									    	<td colspan="1">Paid</td>
									    	<td colspan="1" name="paid">
									    		 <div class="cart_quantity_button">
										            <form class="form-inline" action="" method="post">
										                <input type="number" id="change4" name="paid" value="0" class="form-control" onchange="calc()" style="width:100px;" >
										                
										            </form>
										        </div>
									    	</td>
									    </tr>
									    <tr>
									    	<td colspan="5"></td>
									    	<td colspan="1">Due</td>
									    	<td class="cart_total">
										        <p class="cart_total_price" name="due"><b> Tk. <output id="total4" for="change">0</output></b></p>
												<!-- <input type="hidden" name="due"> -->
										    </td>
									    </tr>
									  </table>
									</div><!--  -->
									
								  </div>									  
								</div>
							</div>
							<input type="submit" name="submit" value="Confirm" class="btn btn-success btn-lg" style="margin: 15px auto;margin-left: 240px;">
							</form><!--  -->
						</div>
					</div><!-- end panel body -->
					  	
					<button class="btn btn-success btn-lg" name="confirm_invoice" onclick="printDiv('print')" style="margin: 15px auto;margin-left: 240px;">Confirm & Print
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
</section>

	<?php include('includes/footer.php'); ?>