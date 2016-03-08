<?php require_once 'start.php'; ?>
<?php 
    use App\Utility\Utility;
    use App\SalesOrder\SalesOrder;
    use App\DeliveryReceipt\DeliveryReceipt;
    use App\Customer\Customer;
    $sales_order = new SalesOrder();
    $deliveryReceipt = new DeliveryReceipt();
?>

<?php 

    if(isset($_GET["id"])){
        $sales_order_info = $sales_order->show_single_sales_order($_GET["id"]);
        if(isset($sales_order_info->customer_id)){
            $customer = $sales_order->show_customer($sales_order_info->customer_id);
        }
        // Utility::dd($customer);
    }
    if(strtolower($_SERVER["REQUEST_METHOD"]) == "post"){
        $deliveryReceipt->create_delivery_receipts($_REQUEST);
    }

 ?>


	<?php include('includes/all_link_body.php'); ?>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
    function calc(){
        q = parseInt(document.getElementById('change').value);
        
        p = parseInt(document.getElementById('change1').value);

            
        document.getElementById('total').value= q - p;
        
    }
    window.onload  = calc;
</script>
<style type="text/css">
	.fa{font-size: 15px;}
	p{color: red;text-align: center;}
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
					<h2>Delivery Recipts</h2>
				</div><!--  -->
				 <div class="container">
					<!-- 
					<?php 
					//include('includes/admin_navigationbar.php'); ?> 
				  -->
				  
				</div>
			</div>
		</div>
	</div>
	
</header><!--  -->
							  

<section style="min-height:503px;">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-info">
				  <div class="panel-heading">
				    <h3 class="panel-title"><h4 class="modal-title" style="text-align:center">Delivery Recipts</h4></h3>
				  </div>
				  <div class="panel-body">
				  
				    <form class="form-horizontal" action="sales_generate_delivery_receipts.php" method="post">
					  <div class="form-group">
					    <label for="inputProductName3" class="col-sm-4 control-label">Date:</label>
					    <div class="col-sm-8">
					      <input type="date" name="date" class="form-control" id="inputProductName3" value="" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputProductTotalQty3" class="col-sm-4 control-label">Delivery Receipts:</label>
					    <div class="col-sm-8">
					      <input name="delivery_receipts_no" type="number" id="" for="change" class="form-control" value="<?php echo $deliveryReceipt->show_delivery_receipts_number();
					      	?>"readonly>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputInvoice3" class="col-sm-4 control-label">Invoice No :</label>
					    <div class="col-sm-8">

					      <input type="text" name="sales_order_no" class="form-control" value="<?php if(isset($sales_order_info->sales_order_no)){echo $sales_order_info->sales_order_no;} ?>" readonly>
					    </div>
					  </div>
					  
					  <div class="form-group">
					    <label for="inputCustomer3" class="col-sm-4 control-label">Customer Id:</label>
					    <div class="col-sm-8">

					      <input type="text" name="customer_id" class="form-control"  value="<?php if(isset($sales_order_info->customer_id)){echo $sales_order_info->customer_id;} ?>"readonly>
					    </div>
					  </div>
					  <div class="form-group">
					  	<table class="table table-bordered table-hover" >
							<thead>
								<tr style="background: #2BAEA8;">
									<th>sl_no</th>
									<th>Product Description</th>
									<th>Ordered Quantity</th>
									<th>Quantity Delivered</th>
									<th>Remaining Quantity</th>
								</tr>
							</thead>
							<?php
						    	
						    	if(isset($sales_order_info->product_description)){
									$product_description = explode(",", $sales_order_info->product_description);
								}
						    	if(isset($sales_order_info->uom)){
									$uom = explode(",", $sales_order_info->uom);
						    	}
						    	
						    	if(isset($sales_order_info->quantity)){
									$quantity = explode(",", $sales_order_info->quantity);
						    	}
							?>
							<tbody>
							<?php 
								if(isset($product_description)){
								    		$item = count($product_description);
								    		$sl = 1;
								    		for ($i=0; $i < $item ; $i++) { 

							 ?>
								<tr>
									<td><?php echo $sl++; ?></td>
									<td>
									<?php echo ucwords(strtolower($product_description[$i])); ?>
									<input type="hidden" name="product_description[]" value="<?php echo ucfirst(trim($product_description[$i])); ?>">
									<input type="hidden" name="uom[]" value="<?php echo trim($uom[$i]); ?>">
									</td>
									<td><?php echo ucwords(strtolower($quantity[$i]."   ".$uom[$i])); ?>
									<input type="hidden" id="change" name="ordered_quantity[]" onchange="calc()" value="<?php echo trim($quantity[$i]); ?>">
									</td>
									<td><input type="number" min="0" max="<?php echo trim($quantity[$i]); ?>" name="quantity_delivered[]" id="change1" class="form-control" onchange="calc()" value="">

									</td>
									<td>
										<input id="total" type="text" for="change" class="form-control" value="0" name="remaining_quantity[]">	
									<input type="hidden" name="delivered_by">
									</td>
								</tr>

							<?php 
						    		}
						    	}


							?>
							</tbody>
						</table>
					  </div>
					  
					  
					  <div class="form-group">
					    <div class="col-sm-offset-4 col-sm-8">
					      <button class="btn btn-success" type="submit">Confirm</button>
					    </div>
					  </div>
					</form>
				  </div>
				  
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</section>
   <script type="text/javascript">
	$(document).ready(function(){
		$("#change1").keyup(function(){
			var replace_max_value = $(this).attr('max');
			var replace_quantity_value = $(this).val();
			if(replace_quantity_value < 0){
				$(this).val('0');
			}
			else if(replace_quantity_value > replace_max_value){
				$(this).val(replace_max_value);
			}
		});
		
	});
</script>
   <?php include('includes/footer.php'); ?>
