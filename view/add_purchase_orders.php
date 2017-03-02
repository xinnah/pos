<?php require_once 'start.php'; ?>
<?php 
	use App\PurchaseOrder\PurchaseOrder;
  	use App\Connection\Connection;
	use App\Utility\Utility;

	$purchase_order = new PurchaseOrder;

	if (strtolower($_SERVER["REQUEST_METHOD"]) == "post") {
		$purchase_order->create_purchase_order($_POST);
	}
	


 ?>
	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript">
        function calc(){
            
            p = parseInt(document.getElementById('price1').value);

                
            document.getElementById('total').value= p;
            document.getElementById('due').value= p;
            /* total price*/
            r = parseInt(document.getElementById('change').value);
            
            v = parseInt(document.getElementById('price1').value);

                
            document.getElementById('vat').value= r/100*v;
            document.getElementById('total').value= (r/100*v) + v;
            document.getElementById('due').value= (r/100*v) + v;
            /*total price + vat(%)*/
           
            ev = parseInt(document.getElementById('tax').value);
             e = parseInt(document.getElementById('total').value);
   
            document.getElementById('total').value= ev + e;
            document.getElementById('due').value= ev + e;

            /*total price + vat(15%) + tex charge*/
           
            d = parseInt(document.getElementById('delieryCharge').value);
 			w = parseInt(document.getElementById('total').value);
                
            document.getElementById('total').value= d + w;
            document.getElementById('due').value= d + w;
            /*(total price + vat(15%) +tax + delivery charge )*/

            a = parseInt(document.getElementById('paid').value);
 			m = parseInt(document.getElementById('due').value);
                
            document.getElementById('due').value=m - a;
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
					<h2>New Purchase Order</h2>
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

	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 no_padding">

				<!-- start print option -->

					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Add New Purchase Order</h4></div>
					  	
					  		<div class="panel-body">
					  		<?php echo Utility::message(); ?>
								<form class="form-horizontal" action="add_purchase_orders.php" method="post">
								  <div class="customer_info">
									  <div class="form-group">
										    <label for="inputsupplierName3" class="col-sm-4 control-label">Date :</label>
										    <div class="col-sm-8">

										      <input name="supplier_id" type="hidden">
										      <input name="po_date" type="date" class="form-control" id="inputsupplierName4" placeholder="Supplier Name" required>
										      
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputsupplierName3" class="col-sm-4 control-label">Supplier Name :</label>
										    <div class="col-sm-8">
										      <input name="supplier['supplier_name']" type="text" class="form-control" id="inputsupplierName4" placeholder="Supplier Name">
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputsupplierPhone4" class="col-sm-4 control-label">Supplier Phone :</label>
										    <div class="col-sm-8">
										      <input name="supplier['supplier_phone']" type="text" class="form-control" id="inputsupplierPhone4" placeholder="Supplier Phone" required>
										    </div>
									  </div><!-- 
									  <div class="form-group">
										    <label for="inputPORefNo4" class="col-sm-4 control-label">Supplier Code:</label>
										    <div class="col-sm-8">
										      <input name="supplier['supplier_code']" type="text" class="form-control" id="inputPORefNo4" placeholder="Supplier Code" required>
										    </div>
									  </div> -->
									  <div class="form-group">
										    <label for="inputBar4" class="col-sm-4 control-label">Supplier Address :</label>
										    <div class="col-sm-8">
										      <input name="supplier['supplier_address']" type="text" class="form-control" id="inputBar4" placeholder="Supplier Address">
										      <input type="hidden" name="supplier['supplier_balance']" />
										      <input type="hidden" name="supplier['due_to_supplier']" />
										    
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputName4" class="col-sm-4 control-label">Purchase Order Number :</label>
										    <div class="col-sm-8">
										      <input name="purchase_order_no" type="text" class="form-control" id="inputName4" placeholder="Purchase Order Number">
										    </div>
									  </div>
									  
										      <input type="hidden" name="product_description" class="form-control" id="inputAddress4" placeholder="" required>
										      
										      <input type="hidden" name="uom" class="form-control" id="inputAddress4" placeholder="" required>
										   
										      <input type="hidden" name="cost_per_unit" class="form-control" id="inputAddress4" placeholder="" required>
										 
										      <input type="hidden" name="quantity" class="form-control" id="inputAddress4" placeholder="" required>
										   
									  <div class="form-group">
										    <label for="inputAddress4" class="col-sm-4 control-label">Amount:</label>
										    <div class="col-sm-8">
										      <input type="number" min="0" name="amount" class="form-control" id="price1" value="0" onchange="calc()">
										      
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputPhone4" class="col-sm-4 control-label">Vat :</label>

										    <div class="col-sm-8">
										      <div class="input-group"style="width:45%;float:left;margin-left:0">
										      
										      	  <input type="number" min="0" id="change" name="" value="0" class="form-control" onchange="calc()" class="form-control"><div class="input-group-addon currency">%</div>
										      	  
										      </div>
										      <div class="input-group"style="width:45%;float:right;margin:0"><div class="input-group-addon currency">৳</div>
										      	   <input name="vat" step="0.1" type="tel" class="form-control" for="change" id="vat" value="0" readonly="readonly">
										      	   
										      </div>
										    </div>
									  </div>

									  <div class="form-group">
										    <label for="inputBalance4" class="col-sm-4 control-label">Tax :</label>
										    <div class="col-sm-8">
										      <input name="tax" type="number" min="0"   class="form-control" value="0" id="tax" onchange="calc()" >
										      
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputPaymentDue4" class="col-sm-4 control-label">Delivery Charge :</label>
										    <div class="col-sm-8">
										      <input name="delivery_charge"type="number" min="0" class="form-control" value="0" id="delieryCharge" onchange="calc()">
										      
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputUom4" class="col-sm-4 control-label">Total :</label>
										    <div class="col-sm-8">
										      <input class="disabled" name="total" id="total"  for="change"  type="text" class="form-control"value="0">
										      
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputCostUnit4" class="col-sm-4 control-label">Paid :</label>
										    <div class="col-sm-8">
										      <input name="paid" type="number" min="0" class="form-control" for="change" value="0" id="paid" onchange="calc()">
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputSalesPriceUnit4" class="col-sm-4 control-label">Due :</label>
										    <div class="col-sm-8">
										      <input name="due" id="due"  for="change"  type="text" class="form-control"value="0" readonly="readonly">
										    </div>
									  </div>
									  	<input type="hidden" name="po_status" value="Pending">
									</div>
									<button type="submit" class="btn btn-success btn-lg" name=""style="margin: 15px auto;margin-left: 323px;">Add</button>

								</form>
							
							
							
						</div>
					</div><!-- end panel body -->
					  	
					

			</div>
			<div class="col-md-2"></div>
			
		</div>
	</div>
</section>

	
	<script type="text/javascript">
	$(document).ready(function(){
		$("#price1").keyup(function(){
			var price_value = $(this).val();
			if(price_value < 0){
				$(this).val('0');
			}			
		});
		$("#change").keyup(function(){
			var vat_value = $(this).val();
			if(vat_value < 0){
				$(this).val('0');
			}			
		});
		$("#tax").keyup(function(){
			var tax_value = $(this).val();
			if(tax_value < 0){
				$(this).val('0');
			}			
		});
		$("#delieryCharge").keyup(function(){
			var delieryCharge_value = $(this).val();
			if(delieryCharge_value < 0){
				$(this).val('0');
			}
		});
		$("#paid").keyup(function(){
			var paid_value = $(this).val();
			if(paid_value < 0){
				$(this).val('0');
			}
		});		
	});
</script>
	<?php include('includes/footer.php'); ?>