<!-- ajax on click load function  -->

<!-- ajax on click load function end -->

<?php include('config.php'); ?>


<?php 
if(isset($_POST['customer_phone']) && $_POST['customer_phone']!=""){
	$startement = $db->prepare("SELECT * FROM invoice join customer ON invoice.customer_id=customer.customer_id WHERE customer_phone LIKE :customer_phone");

	$startement->execute(array(
		'customer_phone'=>'%'.$_POST['customer_phone'].'%'
		));
	if($startement->rowCount()==0){
		echo '<h1 style="color:red;text-align:center;">no Customer was found !!</h1>';
	}else{
		while ($row=$startement->fetch()) {
			?>

			<div class="original_invoice">
				<div class="panel panel-info no_margin">
				  <div class="panel-heading"><h4>original invoice:</h4></div>
				  <div class="panel-body">
				  	<form class="form-horizontal" action="replacement_replace.php?id=<?php echo $row['id']; ?>" method="POST">
					  <div class="form-group">
					    <label class="col-sm-5 control-label">Barcode:</label>
					    <div class="col-sm-7">
					      <?php echo $row['barcode']; ?>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-5 control-label">Invoice Date:</label>
					    <div class="col-sm-7">
					      <?php echo $row['invoice_date']; ?>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-5 control-label">Invoice No.:</label>
					    <div class="col-sm-7">
					      <?php echo $row['invoice_no']; ?>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-5 control-label">Customer Name:</label>
					    <div class="col-sm-7">
					      <?php echo $row['customer_name']; ?>
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="col-sm-5 control-label">Customer Phone:</label>
					    <div class="col-sm-7">
					      <?php echo $row['customer_phone']; ?>
					    </div>
					  </div>
					  
					  <div class="form-group">
					    <label class="col-sm-5 control-label"></label>
					    <div class="col-sm-7">
					      <a href="replacement_replace.php?id=<?php echo $row['id']; ?>"><input class="btn btn-info" type="submit" value="Replace" name="replace"></a>
					    </div>
					  </div>
					</form>
					
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


