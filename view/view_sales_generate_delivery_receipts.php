<?php require_once 'start.php'; ?>
<?php 
	use App\Utility\Utility;
	use App\Inventory\Inventory;
	use App\DeliveryReceipt\DeliveryReceipt;
  	$inventory = new Inventory;
  	$delivery_receipt = new DeliveryReceipt();
  	if(isset($_GET["id"])){
        $delivery_receipt_info = $delivery_receipt->show_single_delivery_receipt($_GET["id"]);
        if(isset($delivery_receipt_info->customer_id)){
            $customer = $delivery_receipt->show_customer($delivery_receipt_info->customer_id);
        }
        // Utility::dd($customer);
    }
?>

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
					<h2>Delivery Receipts</h2>
				</div><!--  -->
				 
			</div>
		</div>
	</div>
</header><!--  -->
<section class="view_container_content">
	
	<div class="row"style="overflow:hidden;">
		<div class="col-md-2"></div>
		<div class="col-md-8 no_padding"style="background:#fff;overflow:hidden;">
			
				<div class="all_page">
					<div id="print">
						<div class="logo_section">
							<div class="logo_left">
								<h3>Korea IT</h3>
								<p style="margin-bottom:10px;">Nikunja-2 Khilkhet Dhaka</p>
							</div><hr>
							
						</div>
						<div class="address_section">
							<h3 class="pull_center">Delivery Recipts</h3>
							<div class="left_section">
								<div class="cus_date">
									<p class="left">Date:</p>
									<p class="right"><?php echo date("m-d-Y", strtotime($delivery_receipt_info->date)); ?></p>
								</div>
								
								<div class="cus_name">
									<p class="left">Delivery Receipts NO:</p>
									<p class="right"><?php echo $delivery_receipt_info->delivery_receipts_no ?></p>
								</div>
								<div class="cus_name">
									<p class="left">Sales Order No :</p>
									<p class="right"><?php echo $delivery_receipt_info->sales_order_no ?></p>
								</div>
								<div class="cus_name">
									<p class="left">Customer Name:</p>
									<p class="right"><?php echo $customer->customer_name; ?></p>
								</div>
								<div class="cus_name">
									<p class="left">Customer Name:</p>
									<p class="right"><?php echo $customer->customer_address; ?></p>
								</div>
								<div class="cus_name">
									<p class="left">Customer Phone:</p>
									<p class="right"><?php echo $customer->customer_phone; ?></p>
								</div>
								
							</div>
							
						</div>
						<p>&nbsp;</p>
						<div class="table_section" id="table">
							
							<div class="panel panel-info no_margin"style="border:0;">
							  <div class="panel-body no_padding">
							    <div class="table-responsive">
								  <table class="table table-striped">
								    <tr class="first_row" style="background: #2BAEA8;">
								    	<th>Sl No.</th>
								    	<th>Product Description</th>
										<th>Ordered Quantity</th>
										<th>Quantity Delivered</th>
										<th>Remaining Quantity</th>
								    	
								    </tr>
								    <?php
								    	if(isset($delivery_receipt_info->product_description)){
											$product_description = explode(",", $delivery_receipt_info->product_description);
										}
										if(isset($delivery_receipt_info->uom)){
											$uom = explode(",", $delivery_receipt_info->uom);
										}
								    	if(isset($delivery_receipt_info->ordered_quantity)){
											$ordered_quantity = explode(",", $delivery_receipt_info->ordered_quantity);
								    	}
								    	if(isset($delivery_receipt_info->quantity_delivered)){
											$quantity_delivered = explode(",", $delivery_receipt_info->quantity_delivered);
								    	}
								    	if(isset($delivery_receipt_info->remaining_quantity)){
											$remaining_quantity = explode(",", $delivery_receipt_info->remaining_quantity);
								    	}
								    	
								    	if(isset($product_description)){
								    		$item = count($product_description);
								    		$sl = 1;
								    		for ($i=0; $i < $item ; $i++) { 
								    	?>
								    <tr>
								    	<td><?php echo $sl++; ?></td>
								    	<td><?php echo $product_description[$i]; ?></td>
								    	<td><?php echo $ordered_quantity[$i]; ?></td>
								    	<td><?php echo $quantity_delivered[$i]; ?></td>
								    	<td><?php echo $remaining_quantity[$i]; ?></td>
								    </tr>
								    <?php 
								    	}
								    }
								    ?>
								    
								  </table>
								</div>
							  </div>									  
							</div>
							
						</div>
						<!-- <div class="condition_section">
							<h3>Terms & Condition:</h3>
							
						</div> -->
						<div class="signer_section">
							<div class="left_signer_customer pull_left">
								Receive By<br>
							</div>
							<div class="right_signer_sales pull_right">
								Delivery By<br><?php echo $delivery_receipt_info->delivered_by; ?>
							</div>
						</div>
					</div>	
					<div class="bottom_section">
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
			<div class="col-md-2"></div>

		</div>
	
</section>	

	<?php include('includes/footer.php'); ?>