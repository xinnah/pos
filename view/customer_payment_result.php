<?php require_once 'start.php'; ?>
<?php include('config.php'); ?>

<style type="text/css">
	.customer_payment_history{width: 100%;min-height: 100px;background: #fff;text-align: center;}
	.customer_payment_history p{padding: 50px;font-size: 20px;}
	th {text-align: left;font-weight: normal;font-size: 14px;font-family: monospace;}
	/*.single_customer_payment_history{position: relative; bottom: -203px;}*/

</style>
<?php 
	use App\Customer\Customer;
  	use App\Connection\Connection;
	use App\Utility\Utility;

	$customer = new Customer;
	if (strtolower($_SERVER["REQUEST_METHOD"]) == "post") {
		$customer->customer_payment($_POST);
		$customer->customer_payment_history($_POST);
	}
?>



<?php 
if(isset($_POST['customer_name']) && $_POST['customer_name']!=""){
	$startement = $db->prepare("SELECT * FROM customer WHERE customer_name LIKE :customer_name");

	$startement->execute(array(
		'customer_name'=>'%'.$_POST['customer_name'].'%'
		));
	if($startement->rowCount()==0){
		echo '<h1 style="color:red;text-align:center;">no customer was found !!</h1>';
	}else{
		while ($row=$startement->fetch()) {
			?>

			<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    	
<section class="view_container_content">
	<div class="container">
		<div class="row">
			<div class="col-md-6 no_padding">				
				<div class="panel panel-info no_margin">
				  <div class="panel-heading"><h4 style="text-align:center;">Customer Payment</h4></div>

				  		<div class="panel-body">
				  		<?php //echo Utility::message(); ?>
							<form class="form-horizontal" action="customer_payment_result.php" method="post">
							  <div class="customer_info">
								  <div class="form-group">
									    <label for="inputName3" class="col-sm-3 control-label">Customer Name:</label>
									    <div class="col-sm-9">
									      <input name="customer_name" type="text" class="form-control" id="inputName3" value="<?php echo $row['customer_name']; ?>" disabled>
									    </div>
								  </div>
								  <div class="form-group">
									    <label for="inputAddress3" class="col-sm-3 control-label">Customer Phone:</label>
									    <div class="col-sm-9">
									      <input name="customer_phone" type="text" class="form-control" id="inputAddress3" value="<?php echo $row['customer_phone']; ?>" disabled>
									    </div>
								  </div>
								  <div class="form-group">
									    <label for="inputCustomerAddress3" class="col-sm-3 control-label">Customer Address:</label>
									    <div class="col-sm-9">
									      <textarea name="customer_address" row="3" style="width:100%" disabled><?php echo$row['customer_address']; ?> </textarea>
									    </div>
								  </div>
								  <div class="form-group">
									    <label for="inputBalance3" class="col-sm-3 control-label">Customer Code:</label>
									    <div class="col-sm-9">
									      <input name="customer_code" type="text" class="form-control" id="inputBalance3" value="<?php echo $id = $row['customer_id']; ?>" disabled>
									    </div>
								  </div>
								  <input type="hidden" name="customer_id" value="<?php echo $id = $row['customer_id']; ?>">
								  <?php 
								  		$invoice_by_customer = $customer->view_invoice_by_customer($id);
								  		$total_invoice = count($invoice_by_customer);
								  		
								   ?>
								  <div class="form-group">
									    <label for="inputSalesOrder3" class="col-sm-3 control-label">Total Invoice(s):</label>
									    <div class="col-sm-9">
									      <input name="invoice_number" type="text" class="form-control" id="inputSalesOrder3" value="<?php echo $total_invoice; ?>" disabled>
									    </div>
								  </div>
						<?php if($row['customer_payment_due'] < 0): ?>
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
									    <label for="inputSalesPriceUnit3" class="col-sm-3 control-label">Deposit:</label>
									    <div class="col-sm-9">
									      <p class="cart_total_price" name="total_due"><b><input id="total" class="disabled" for="change" name="customer_payment_due" value="<?php echo $row['customer_payment_due']; ?>"></b></p>
									    </div>
								  </div>
								  <div class="form-group">
									    <label class="col-sm-3 control-label">Pay to Customer:</label>
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
									    <label for="inputSalesPriceUnit3" class="col-sm-3 control-label">Dues:</label>
									    <div class="col-sm-9">
									      <p class="cart_total_price" name="total_due"><b><input id="total" class="disabled" for="change" name="customer_payment_due" value="<?php echo $row['customer_payment_due']; ?>"></b></p>
									    </div>
								  </div>
								  <div class="form-group">
									    <label class="col-sm-3 control-label">Pay :</label>
									    <div class="col-sm-9">
									      <input type="number" min=0 id="change" name="pay_amount" value="0" class="form-control" step="0.1" onchange="calc()">
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
							  <button type="submit" class="btn btn-success btn-lg" style="margin: 15px auto;margin-left: 223px;">Submit</button>
						</form>
					</div>
				</div><!-- end panel body -->
				
			</div>

			<div class="col-md-6">

				<div class="customer_payment_history">
					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Customer Payment History</h4></div>
					  	<div class="panel-body">
					  		<form action="" method="post">
					  			<div class="table-responsive">
								  <table class="table" id="example">
								    <tr style="background: #2BAEA8;">
								    	<th>Date </th>
								    	<th>Time</th>
								    	<th>Amount</th>
								    	<th>Recevied By</th>
								    	<th>Notes</th>
								    </tr>
									<?php 
										$payment_history = $customer->show_customer_payment_history($row["customer_id"]);
										foreach ($payment_history as $payment) :
									 ?>
			
								    <tr>
								    	<th><?php echo date("d-m-Y",strtotime($payment->pay_time_date));  ?></th>
								    	<th><?php echo date("H:i a",strtotime($payment->pay_time_date));  ?></th>
								    	<th><?php echo ltrim($payment->pay_amount,"-");  ?></th>
								    	

								    	<th><?php echo $payment->received_by;  ?></th>
								    	<th title="<?php echo $payment->notes;  ?>"><?php echo substr($payment->notes, 0,15);  ?></th>
								    </tr>
									<?php endforeach; ?>
								  </table>
								</div><!--  -->
								
								<!-- Button trigger modal -->
					  		</form>
					  		<a class="single_customer_payment_history" href="customer_payment_history.php?customer_id=<?php echo $row['customer_id']; ?>"><button class="btn btn-success" >See More</button></a>
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


	