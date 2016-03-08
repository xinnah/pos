<?php include('config.php'); ?>


<?php 
if(isset($_POST['supplier_phone']) && $_POST['supplier_phone']!=""){
	$startement = $db->prepare("SELECT * FROM purchase_order join supplier ON purchase_order.supplier_id=supplier.supplier_id WHERE supplier_phone LIKE :supplier_phone");

	$startement->execute(array(
		'supplier_phone'=>'%'.$_POST['supplier_phone'].'%'
		));
	if($startement->rowCount()==0){
		echo '<h1 style="color:red;text-align:center;">no supplier was found !!</h1>';
	}else{
		while ($row=$startement->fetch()) {
			?>



	<div class="container" style="background:#fff;border-radius: 10px;margin-bottom:20px;">
		<div class="row">
			<div class="col-md-12 no_padding">
				<div class="all_page">
					<div id="print<?php echo $row['id']; ?>">
						<div class="logo_section">
							<div class="logo_left">
								<h3>Korea IT</h3>
								<p style="margin-bottom:10px;">Nikunja-2 Khilkhet Dhaka</p>
							</div><hr>
							
						</div>
						<div class="address_section">
							<h3 class="pull_center">Purchase</h3>
							<div class="left_section">
								<div class="cus_date">
									<p class="left">Date:</p>
									<p class="right"><?php echo $row['po_date']; ?></p>
								</div>
								<div class="cus_name">
									<p class="left">Supplier Name:</p>
									<p class="right"><?php echo $row['supplier_name']; ?></p>
								</div>
								<div class="cus_phone">
									<p class="left">Supplier Phone:</p>
									<p class="right"><?php echo $row['supplier_phone']; ?></p>
								</div>
								<div class="cus_address">
									<p class="left">Supplier Adress:</p>
									<p class="right"><?php echo $row['supplier_address']; ?></p>
								</div>
								<div class="cus_code">
									<p class="left">Supplier Code:</p>
									<p class="right"><?php echo $row['id']; ?></p>
								</div>
								<div class="sales_agent">
									<p class="left">Purchase Order Number :</p>
									<p class="right"><?php echo $row['purchase_order_no']; ?></p>
								</div>
								<div class="sales_agent">
									<p class="left">Vat:</p>
									<p class="right"><?php echo $row['vat']; ?></p>
								</div>
								<div class="sales_agent">
									<p class="left">Tax :</p>
									<p class="right"><?php echo $row['tax']; ?></p>
								</div>
								<div class="sales_agent">
									<p class="left">Delivery Charge :</p>
									<p class="right"><?php echo $row['delivery_charge']; ?></p>
								</div>
								<div class="sales_agent">
									<p class="left">Total :</p>
									<p class="right"><?php echo $row['total']; ?></p>
								</div>
								<div class="sales_agent">
									<p class="left">Paid :</p>
									<p class="right"><?php echo $row['paid']; ?></p>
								</div>
								<div class="sales_agent">
									<p class="left">Due :</p>
									<p class="right"><?php echo $row['due']; ?></p>
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
							<a href="update_purchase_order.php"><input class="btn btn-info pull-left" type="submit" value="update" name="update"></a>
							<button class="btn btn-success pull-right"name="confirm_invoice" onclick="printDiv('print<?php echo $row['id']; ?>')"style="margin-right: 30px;">Print
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

			<?php
		}
	}
}else{
	echo "";
}
	
 ?>

