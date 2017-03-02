<?php include('config.php'); ?>
<?php require_once 'start.php'; ?>
<?php 
	use App\Utility\Utility;
	use App\Inventory\Inventory;

  	$inventory = new Inventory;
?>
<style type="text/css">
	.form-group{overflow: hidden;margin: 0;text-align: left;}
	.view_qutation{width: 100%;overflow: hidden;}
</style>
<?php include('config.php'); ?>


<?php 
if(isset($_POST['customer_phone']) && $_POST['customer_phone']!=""){
	$startement = $db->prepare("SELECT * FROM quotation join customer ON quotation.customer_id=customer.customer_id WHERE customer_phone LIKE :customer_phone");

	$startement->execute(array(
		'customer_phone'=>'%'.$_POST['customer_phone'].'%'
		));
	if($startement->rowCount()==0){
		echo '<h1 style="color:red;text-align:center;">No customer was found !!</h1>';
	}else{
		while ($row=$startement->fetch()) {
			?>
<div class="replacement_content_container"style="min-height:245px;">
	<div class="row">
		<div class="col-md-12">
			<div class="original_invoice">
				<div class="panel panel-info no_margin">
				  <div class="panel-heading"><h4>Quotation</h4></div>
				  <div class="panel-body">

				    <div class="view_center_folwchart">
						<div class="panel panel-info no_margin"style="border:0;">
						  <div class="panel-body no_padding">
						    <div class="table-responsive">
							  <table class="table">
							    <tr style="background: #2BAEA8;">
							    	<th style="width:62px;">Date :</th>
							    	<th style="width:145px;">Customer</th>
							    	<th style="width:145px;">Ref.</th>
							    	<th style="width:62px;">&nbsp;</th>
							    	<th style="width:62px;">&nbsp;</th>
							    	<th style="width:62px;">Generate Sales Order</th>
							    	<th style="width:62px;">Generate Invoice</th>
							    </tr>
							    <tr>
							    	<td><?php echo date('d-m-Y',strtotime($row['quotation_date'])); ?></td>
							    	<td><?php echo $row['customer_name']; ?></td>
							    	<td><?php echo $id = $row['id']; ?></td>
							    	
							    	<td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $id; ?>">View</a>

							    	<div class="modal fade" id="myModal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document"style="width:60%;">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Quotation</h4>
									      </div>
									      <div class="modal-body">

<div id="print<?php echo $row['id']; ?>"style="overflow:hidden;text-align:left;">
	<div class="logo_section">
		<div class="logo_left">
			<h3>Korea IT</h3>
			<p style="margin-bottom:10px;">Nikunja-2 Khilkhet Dhaka</p>
		</div><hr>
		<div class="invoice_right">
			<div class="in_no">
				<p class="left">Ref. No:</p>
				<p class="right">KJDUF-<?php echo $row['quotation_no']; ?></p>
			</div>
			
		</div>
	</div>
	<div class="address_section">
		
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
				<p class="right"><?php echo $row['customer_address']; ?></p><br>
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
			    	<td colspan="1">Total</td>
			    	<td colspan="1"><?php if(isset($row['total'])){ echo $row['total'];} ?></td>
			    </tr>
			    
			  </table>
			</div>
			<!-- <p>Dues:
				<script src="js/inWords.js"></script>
			BDT
				<b><script type="text/javascript">
					document.write(inWords(<?php// if(isset($sales_order->due)){ echo $sales_order->due;}?>));
				</script></b>
			</p> -->
			
		  </div>									  
		</div>
		
	</div>
	<div class="condition_section">
		<h3>Terms & Condition:</h3>
		<?php 

		  	$startement1 = $db->prepare("SELECT * FROM terms_condition WHERE id=1");
		  	$startement1->execute();
		  	$result1 = $startement1->fetchAll(PDO::FETCH_ASSOC);
		  	foreach ($result1 as $rows) 
		  		$quotation = $rows['quotation'];
		  		
		  	echo $quotation;

		   ?>
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

							    	


							    	<!-- <td><a href="delete_sales_order.php" class="btn btn-info">Delete</a></td> -->
							    	<td><button class="btn btn-success pull-right" name="confirm_invoice" onclick="printDiv('print<?php echo $row['id']; ?>')">Print
										<script>
				                            function printDiv(divName) {
				                               var printContents = document.getElementById(divName).innerHTML;
				                               var originalContents = document.body.innerHTML;

				                               document.body.innerHTML = printContents;

				                               window.print();

				                               document.body.innerHTML = originalContents;
				                               
					                        }
				                      	</script>
				                  		</button>
				                  	</td>
							    	<td><a href="quotation_generate_sales_order.php?id=<?php echo $id; ?>" class="btn btn-primary" >Generate Sales Order</a></td>
							    	<td><a href="qutation_generate_invoice.php?id=<?php echo $id; ?>" class="btn btn-primary" >Generale Invoice</a></td>
							    </tr>
							    
							  </table>
							</div><!--  -->
							
						  </div>									  
						</div>
					</div><!--  -->
				  </div>									  
				</div>
			</div>
		</div><!--  -->
		
	</div>
</div>
			
			<?php
		}
	}
}else{
	echo "";
}
	
 ?>

