<?php require_once 'start.php'; ?>
<?php include('config.php'); ?>
<style>
	
	th {text-align: left;font-weight: normal;font-size: 14px;font-family: monospace;}
</style>
<?php 
	use App\Supplier\Supplier;
  	use App\Connection\Connection;
	use App\Utility\Utility;

	$supplier = new Supplier;
	if (strtolower($_SERVER["REQUEST_METHOD"]) == "post") {
		$supplier->supplier_payment($_POST);
		$supplier->supplier_payment_history($_POST);
	}
?>
<?php 
if(isset($_POST['supplier_name']) && $_POST['supplier_name']!=""){
	$startement = $db->prepare("SELECT * FROM supplier WHERE supplier_name LIKE :supplier_name");

	$startement->execute(array(
		'supplier_name'=>'%'.$_POST['supplier_name'].'%'
		));
	if($startement->rowCount()==0){
		echo '<h1 style="color:red;text-align:center;">no supplier was found !!</h1>';
	}else{
		while ($row=$startement->fetch()) {
			?>


			<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
		    


<section class="view_container_content">

	<div class="container">
		<div class="row">

			<div class="col-md-6 no_padding">

				<!-- start print option -->

					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Supplier Payment</h4></div>
					  		<div class="panel-body">

								<form class="form-horizontal" action="payment_to_suppliers_result.php" method="post">

								  <div class="customer_info">
									  <div class="form-group">
										    <label for="inputName3" class="col-sm-3 control-label">Supplier Name :</label>
										    <div class="col-sm-9">
										      <input type="text" class="form-control" id="inputName3" placeholder="Supplier Name" value="<?php echo $row['supplier_name']; ?> " disabled>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputAddress3" class="col-sm-3 control-label">Supplier Phone :</label>
										    <div class="col-sm-9">
										      <input type="text" class="form-control" id="inputAddress3" placeholder="Supplier Phone" value="<?php echo $row['supplier_phone']; ?>" disabled>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputCustomerAddress3" class="col-sm-3 control-label">Supplier Address:</label>
										    <div class="col-sm-9">
										      <input type="tel" class="form-control" id="inputCustomerAddress3"value="<?php echo $row['supplier_address']; ?>" disabled>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputBalance3" class="col-sm-3 control-label">Code :</label>
										    <div class="col-sm-9">
										      <input type="text" class="form-control" id="inputBalance3" value="<?php echo $row['supplier_id']; ?>" disabled>
										    </div>
									  </div>
									  <input type="hidden" name="supplier_id" value="<?php echo $id = $row['supplier_id']; ?>">
									  <?php 
									  		$purchase_order_by_supplier = $supplier->view_purchase_order_by_supplier($id);
									  		$total_purchase_order = count($purchase_order_by_supplier);
									  		
									   ?>
									  <div class="form-group">
										    <label for="inputSalesOrder3" class="col-sm-3 control-label">Total Purchase Order :</label>
										    <div class="col-sm-9">
										      <input type="text" class="form-control" id="inputSalesOrder3" value="<?php echo $total_purchase_order; ?>">
										    </div>
									  </div>
									  
						<?php if($row['due_to_supplier'] < 0): ?>
							<script type="text/javascript">
						        function calc(){
						        	q = "-";
						            q += parseInt(document.getElementById('change').value);
						            
						            p = parseInt(document.getElementById('total').value);

						                
						            document.getElementById('total').value= p - q;
						            /* total price*/
						            
						        }
						        window.onload  = calc;
						    </script>
									  <div class="form-group">
										    <label for="inputSalesPriceUnit3" class="col-sm-3 control-label">Supplier Dues:</label>
										    <div class="col-sm-9">
										      <p class="cart_total_price"><b><input id="total" class="disabled" for="change" name="due_to_supplier" value="<?php echo $row['due_to_supplier']; ?>"></b></p>
										    </div>
									  </div>
									  <div class="form-group">
										    <label class="col-sm-3 control-label">Pay :</label>
										    <div class="col-sm-9">
										      <input type="number" id="change" name="pay_amount" value="0" class="form-control" step="0.1" onchange="calc()">
										    </div>
									  </div>
						<?php else : ?>

									<script type="text/javascript">
								        function calc(){
								            q = parseInt(document.getElementById('change').value);
								            
								            p = parseInt(document.getElementById('total').value);

								                
								            document.getElementById('total').value= p - q;
								            /* total price*/
								            
								        }
								        window.onload  = calc;
								    </script>
									<div class="form-group">
										    <label for="inputSalesPriceUnit3" class="col-sm-3 control-label">Dues to Supplier:</label>
										    <div class="col-sm-9">
										      <p class="cart_total_price"><b><input id="total" class="disabled" for="change" name="due_to_supplier" value="<?php echo $row['due_to_supplier']; ?>"></b></p>
										    </div>
									  </div>
									  <div class="form-group">
										    <label class="col-sm-3 control-label">Pay :</label>
										    <div class="col-sm-9">
										      <input type="number" id="change" name="pay_amount" value="0" class="form-control" step="0.1" onchange="calc()">
										    </div>
									  </div>
						<?php endif; ?>
									<div class="form-group">
									<label class="col-sm-3 control-label">Notes :</label>
									<div class="col-sm-9">
										<textarea class="form-control" name="notes"></textarea>
									</div>
								</div>
									  <input type="hidden" name="pay_time_date" value="" />

									  <input type="hidden" name="received_by" value="<?php if(isset($_SESSION["username"])){echo $_SESSION["username"];} ?>" />
									  	
									</div>
									<button type="submit" class="btn btn-success btn-lg" name="" style="margin: 15px auto;margin-left: 200px;">Submit</button>


								</form>
							
							
							
						</div>
					</div><!-- end panel body -->
					  	
					
			</div><!--  -->
			<div class="col-md-6">
				<div class="customer_payment_history">
					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Suupplier Payment History</h4></div>
					  	<div class="panel-body">
					  		<form action="" method="post">
					  			<div class="table-responsive">
								  <table class="table" id="example">
								    <tr style="background: #2BAEA8;">
								    	<th>Date </th>
								    	<th>At</th>
								    	<th>Amount</th>
								    	<th>Recevied By</th>
								    	<th>Notes</th>
								    </tr>
			<?php 
				$payment_history = $supplier->show_supplier_payment_history($row["supplier_id"]);
				foreach ($payment_history as $payment) :
			 ?>
			
								    <tr>
								    	<th><?php echo date("d-m-Y",strtotime($payment->pay_time_date));  ?></th>
								    	<th><?php echo date("H:i a",strtotime($payment->pay_time_date));  ?></th>
								    	<th><?php echo ltrim($payment->pay_amount,"-");  ?></th>
								    	<th><?php echo $payment->received_by;  ?></th>
								    	<th><?php echo $payment->notes;  ?></th>
								    </tr>
			<?php endforeach; ?>
								  </table>
								</div><!--  -->
								
								<!-- Button trigger modal -->
					  		</form>
					  		<a class="single_customer_payment_history" href="supplier_payment_history.php?supplier_id=<?php echo $row['supplier_id']; ?>"><button class="btn btn-success" >See More</button></a>
						</div><!-- end panel body -->
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>
			<?php
		}
	}
}else{
	echo "";
}
	
 ?>


	