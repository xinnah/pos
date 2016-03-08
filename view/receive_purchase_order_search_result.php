<?php require_once 'start.php'; ?>
<?php include('config.php'); ?>
<?php 
	use App\PurchaseOrder\PurchaseOrder;
  	use App\Connection\Connection;
	use App\Utility\Utility;

	$purchase_order = new PurchaseOrder;
	if (strtolower($_SERVER["REQUEST_METHOD"]) == "post") {
		$purchase_order->purchase_order_status($_POST);
	}
?>
<style type="text/css">
	.form-group{overflow: hidden;margin: 0;text-align: left;}
	.view_qutation{width: 100%;overflow: hidden;}
	.btn-warning {width: 12%;margin-right: 15px;}
	.form-control{width:20%;}
</style>


<?php 
if(isset($_POST['supplier_name']) && $_POST['supplier_name']!=""){
	$startement = $db->prepare("SELECT * FROM purchase_order join supplier ON purchase_order.supplier_id=supplier.supplier_id WHERE supplier_name LIKE :supplier_name");

	$startement->execute(array(
		'supplier_name'=>'%'.$_POST['supplier_name'].'%'
		));
	if($startement->rowCount()==0){
		echo '<h1 style="color:red;text-align:center;">no supplier was found !!</h1>';
	}else{
		while ($row=$startement->fetch()) {
			?>


	<div class="container"style="margin-bottom:20px;">
		<div class="row">

			<div class="col-md-12 no_padding">

				<!-- start print option -->

					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Receive Purchase Order</h4></div>
					  	<form class="form-horizontal" action="receive_purchase_order_search_result.php" method="POST">
					  		<div class="panel-body">
								
								  <div class="customer_info">
									  	<div class="form-group">
										    <label for="inputsupplierName3" class="col-sm-4 control-label">Supplier Name :</label>
										    <div class="col-sm-8">
										     <?php echo $row["supplier_name"]; ?>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputsupplierPhone4" class="col-sm-4 control-label">Supplier Phone :</label>
										    <div class="col-sm-8">
										      <?php echo $row['supplier_phone']; ?>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputPORefNo4" class="col-sm-4 control-label">Supplier Code:</label>
										    <div class="col-sm-8">
										      <?php echo $row['id']; ?>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputBar4" class="col-sm-4 control-label">Supplier Address :</label>
										    <div class="col-sm-8">
										      <?php echo $row['supplier_address']; ?>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputName4" class="col-sm-4 control-label">Purchase Order Number :</label>
										    <div class="col-sm-8">
										      <?php echo $row['purchase_order_no']; ?>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputAddress4" class="col-sm-4 control-label">Purchase Order Value(In BDT) :</label>
										    <div class="col-sm-8">
										      <?php echo $row['amount']; ?>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputPhone4" class="col-sm-4 control-label">Vat :</label>
										    <div class="col-sm-8">
										      <?php echo $row['vat']; ?>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputBalance4" class="col-sm-4 control-label">Tax :</label>
										    <div class="col-sm-8">
										      <?php echo $row['tax']; ?>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputPaymentDue4" class="col-sm-4 control-label">Delivery Change :</label>
										    <div class="col-sm-8">
										      <?php echo $row['delivery_charge']; ?>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputUom4" class="col-sm-4 control-label">Total :</label>
										    <div class="col-sm-8">
										      <?php echo $row['total']; ?>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputCostUnit4" class="col-sm-4 control-label">Paid :</label>
										    <div class="col-sm-8">
										      <?php echo $row['paid']; ?>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputSalesPriceUnit4" class="col-sm-4 control-label">Due :</label>
										    <div class="col-sm-8">
										      <?php echo $row["due"]; ?>
										    </div>
									  </div>
									  <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
									  <div class="form-group">
										    <label for="inputSalesPriceUnit4" class="col-sm-4 control-label">Status :</label>
										    <div class="col-sm-8">
										      
										      <select name="po_status" class="form-control">
												  <option <?php if($row["po_status"] == "Pending"){echo " selected";}?> value="Pending">Pending</option>
												  <option <?php if($row["po_status"] == "Received"){ echo " selected";}?> value="Received">Received</option>
												</select>

										    </div>
									  </div>
									  	
									</div>
								  

							</div><!-- end panel body -->

							<div class="panel-footer">
								<button type="submit" class="btn btn-success" style="margin-left:400px;">Update</button>
							</div>
						</form>
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

