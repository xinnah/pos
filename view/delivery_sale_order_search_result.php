<?php include('config.php'); ?>
<?php require_once 'start.php'; ?>
<?php 
	use App\Utility\Utility;
	use App\Inventory\Inventory;
  	$inventory = new Inventory;
?>

<?php 
if(isset($_POST['customer_name']) && $_POST['customer_name']!=""){
	$startement = $db->prepare("SELECT * FROM sales_order join customer ON sales_order.customer_id=customer.customer_id WHERE customer_name LIKE :customer_name");

	$startement->execute(array(
		'customer_name'=>'%'.$_POST['customer_name'].'%'
		));
	if($startement->rowCount()==0){
		echo '<h1 style="color:red;text-align:center;">no customer was found !!</h1>';
	}else{
		while ($row=$startement->fetch()) {
			?>

			<div class="original_invoice" style="margin:10px 0;">
				<div class="panel panel-info no_margin">
				  <div class="panel-heading"><h4>Sales Orders</h4></div>
				  <div class="panel-body" style="padding:5px;">

				    <div class="view_center_folwchart">
						<div class="panel panel-info no_margin"style="border:0;">
						  <div class="panel-body no_padding">
						    <div class="table-responsive">
							  <table class="table">
							    <tr style="background: #2BAEA8;">
							    	<th style="width:62px;">Date</th>
							    	<th style="width:145px;">Order No</th>
							    	<th style="width:62px;">Customer</th>
							    	<th style="width:62px;">Address</th>
							    	<th style="width:62px;">&nbsp;</th>
							    	<th style="width:62px;">&nbsp;</th>
							    	<th style="width:62px;">&nbsp;</th>
							    </tr>
							    <tr>
							    	<td><?php echo $row['so_date']; ?></td>
							    	<td><?php echo $row['sales_order_no']; ?></td>
							    	<td><?php echo $row['customer_name']; ?></td>
							    	<td><?php echo $row['customer_address']; ?></td>
							    	<td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">View</a>

							    	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document"style="width:60%;">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Sales Order</h4>
									      </div>
									      <div class="modal-body">

<div id="print"style="overflow:hidden;text-align:left;">
	<div class="logo_section">
		<div class="logo_left">
			<h3>Korea IT</h3>
			<p style="margin-bottom:10px;">Nikunja-2 Khilkhet Dhaka</p>
		</div><hr>
		<div class="invoice_right">
			<div class="in_no">
				<p class="left">Ref. No:</p>
				<p class="right">KJDUF- <?php echo $row['id']; ?></p>
			</div>
			
		</div>
	</div>
	<div class="address_section">
		<h3 class="pull_center">Invoice</h3>
		<div class="left_section">
			<div class="cus_name">
				<p class="left">Customer Name:</p>
				<p class="right"><?php echo $row['customer_name']; ?></p>
			</div>
			<div class="cus_phone">
				<p class="left">Customer Phone:</p>
				<p class="right"><?php echo $row['customer_phone']; ?></p>
			</div>
			<div class="cus_address">
				<p class="left">Customer Adress:</p>
				<p class="right"><?php echo $row['customer_address']; ?></p>
			</div>
			<div class="cus_code">
				<p class="left">Customer Code:</p>
				<p class="right"><?php echo $row['customer_id']; ?></p>
			</div>
			<!-- <div class="sales_agent">
				<p class="left">Sales Agent:</p>
				<p class="right">ASF EGY TG</p>
			</div> -->
		</div>
		<div class="right_section">
			<div class="notes">
				<p>Notes:</p>
				<p><?php echo $row['notes']; ?></p>
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
			    	<th>Barcode</th>
			    	<th>Product Description</th>
			    	<th>UOM</th>
			    	<th>Unit price</th>
			    	<th>Qty.</th>
			    	<th>Amount</th>
			    </tr>
			    <?php
			    	if(isset($row['barcode'])){
						$barcode = explode(",", $row['barcode']);
					}
					if(isset($row['product_description'])){
						$product_description = explode(",", $row['product_description']);
					}
			    	if(isset($row['uom'])){
						$uom = explode(",", $row['uom']);
			    	}
			    	if(isset($row['price'])){
						$price = explode(",", $row['price']);
			    	}
			    	if(isset($row['quantity'])){
						$quantity = explode(",", $row['quantity']);
			    	}
			    	if(isset($row['amount'])){
						$amount = explode(",", $row['amount']);
			    	}
			    	if(isset($product_description)){
			    		$item = count($product_description);
			    		$sl = 1;
			    		for ($i=0; $i < $item ; $i++) { 

						    echo"<tr class=\"nts\">";
						    echo"<td>".$sl++."</td>";
			    			if(isset($barcode[$i])){
				    			echo "<td>".$barcode[$i]."</td>";
			    			}else{
			    				echo "<td>"." "."</td>";
			    			}
			    			$str = trim($product_description[$i]);
				    		$inventory_item = $inventory->show_single_inventory_item($str);

			    			$output = "<td>".$product_description[$i]." <br>";
			    			if(!empty($inventory_item->brand)){
			    				$output .= $inventory_item->brand;
			    			}
			    			if(!empty($inventory_item->model)){
			    				$output .= " , ".$inventory_item->model;
			    			}
			    			if(!empty($inventory_item->specification)){
			    				$output .= " , ".$inventory_item->specification;
			    			}
			    			$output .= "</td>";
			    			echo $output;
			    			echo "<td>".$uom[$i]."</td>";
			    			echo "<td>".$price[$i]."</td>";
			    			echo "<td>".$quantity[$i]."</td>";
			    			echo "<td>".$amount[$i]."</td>";
			    			echo "</tr>";
			    		}
			    	}


			    	 ?>
			    <tr>
			    	<td colspan="5"style="border: 0 !important;"></td>
			    	<td colspan="1">Vat(15%)</td>
			    	<td colspan="1"><?php if(isset($row['vat'])){ echo $row['vat'];}; ?></td>
			    </tr>
			    <tr>
			    	<td colspan="5"style="border: 0 !important;"></td>
			    	<td colspan="1">Delivery Charge</td>
			    	<td colspan="1"><?php if(isset($row['delivery_charge'])){ echo $row['delivery_charge'];} ?></td>
			    </tr>
			    <!-- <tr>
			    	<td colspan="5"style="border: 0 !important;"></td>
			    	<td colspan="1">Total</td>
			    	<td><?php //if(isset($row['total'])){ echo $row['total'];} ?></td>
			    </tr> -->
			    <tr>
			    	<td colspan="5"style="border: 0 !important;"></td>
			    	<td colspan="1">Paid</td>
			    	<td colspan="1"><?php if(isset($row['paid'])){ echo $row['paid'];} ?></td>
			    </tr>
			    <tr>
			    	<td colspan="5"style="border: 0 !important;"></td>
			    	<td colspan="1">Due: </td>
			    	<td><?php if(isset($row['due'])){ echo $row['due'];} ?></td>
			    </tr>
			  </table>
			</div><!--  -->
			<!-- <p>Total:</p>
			<p>BDT</p> -->
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

									      </div><!-- end modal body -->
									      <div class="modal-footer">
									        <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
									        
									      </div>
									    </div>
									  </div>
									</div><!--  -->

							    	</td>

							    	


							    	<td><a href="sales_generate_delivery_receipts.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Generate Delivery Receipt</a></td>
							    	<td><a href="#" class="btn btn-primary">Delivery</a></td>
							    </tr>
							    
							  </table>
							</div><!--  -->
							
						  </div>									  
						</div>
					</div><!--  -->
				  </div>									  
				</div>
			</div>


						
			<?php
		}
	}
}else{
	echo "";
}
	
 ?>

