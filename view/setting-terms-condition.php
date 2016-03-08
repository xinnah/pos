<?php require_once 'start.php'; ?>
<?php include('config.php'); ?>

<?php 

	//if(!isset($_REQUEST['id'])){
	//	header("location: setting-terms-condition.php");
	//}else{
		//$id = $_REQUEST['id'];
	//}

 ?>

 <?php 

 	if(isset($_POST['update'])){
 		try {

 			if(empty($_POST['invoice'])){
 				throw new Exception("Field cannot be empty!");
 				
 			}
 			
 			$startement = $db->prepare("UPDATE terms_condition SET invoice=?WHERE id=1 ");
 			$startement->execute(array($_POST['invoice']));
 			$success = "Terms & Condition is Update successfully.";


 		} catch (Exception $e) {
 			$error_message = $e->getMessage();	
 		
 		}
 	}

  ?>

  <?php 

  	$startement = $db->prepare("SELECT * FROM terms_condition WHERE id=1");
  	$startement->execute();
  	$result = $startement->fetchAll(PDO::FETCH_ASSOC);
  	foreach ($result as $row) {
  		$invoice = $row['invoice'];
  		
  	}

   ?>
<!--  -->
<?php 

 	if(isset($_POST['update_quotation'])){
 		try {

 			if(empty($_POST['quotation'])){
 				throw new Exception("Field cannot be empty!");
 				
 			}
 			
 			$startement = $db->prepare("UPDATE terms_condition SET quotation=?WHERE id=1 ");
 			$startement->execute(array($_POST['quotation']));
 			$success = "Terms & Condition is Update successfully.";


 		} catch (Exception $e) {
 			$error_message = $e->getMessage();	
 		
 		}
 	}

  ?>

  <?php 

  	$startement = $db->prepare("SELECT * FROM terms_condition WHERE id=1");
  	$startement->execute();
  	$result = $startement->fetchAll(PDO::FETCH_ASSOC);
  	foreach ($result as $row) {
  		$quotation = $row['quotation'];
  		
  	}

   ?>
<!--  -->
<?php 

 	if(isset($_POST['update_sales'])){
 		try {

 			if(empty($_POST['sales'])){
 				throw new Exception("Field cannot be empty!");
 				
 			}
 			
 			$startement = $db->prepare("UPDATE terms_condition SET sales=?WHERE id=1 ");
 			$startement->execute(array($_POST['sales']));
 			$success = "Terms & Condition is Update successfully.";


 		} catch (Exception $e) {
 			$error_message = $e->getMessage();	
 		
 		}
 	}

  ?>

  <?php 

  	$startement = $db->prepare("SELECT * FROM terms_condition WHERE id=1");
  	$startement->execute();
  	$result = $startement->fetchAll(PDO::FETCH_ASSOC);
  	foreach ($result as $row) {
  		$sales = $row['sales'];
  		
  	}

   ?>

   <!--  -->
<?php 

 	if(isset($_POST['update_delivery_receipt'])){
 		try {

 			if(empty($_POST['delivery_receipt'])){
 				throw new Exception("Field cannot be empty!");
 				
 			}
 			
 			$startement = $db->prepare("UPDATE terms_condition SET delivery_receipt=?WHERE id=1 ");
 			$startement->execute(array($_POST['delivery_receipt']));
 			$success = "Terms & Condition is Update successfully.";


 		} catch (Exception $e) {
 			$error_message = $e->getMessage();	
 		
 		}
 	}

  ?>

  <?php 

  	$startement = $db->prepare("SELECT * FROM terms_condition WHERE id=1");
  	$startement->execute();
  	$result = $startement->fetchAll(PDO::FETCH_ASSOC);
  	foreach ($result as $row) {
  		$delivery_receipt = $row['delivery_receipt'];
  		
  	}

   ?>
<!--  -->
<style type="text/css">
	.error{text-transform: capitalize; overflow: hidden;color: red;text-align: center;font-weight: bold;}
	.success{text-transform: capitalize; overflow: hidden;color: green;text-align: center;font-weight: bold;}
</style>

 	<?php include('includes/setting_top_sidebar.php'); ?>

 	
			<div class="col-md-9 no_padding">
				<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Terms & Condition</h4></div>
					  		
					  	<div class="panel-body">
					  		
							<div>

							  <!-- Nav tabs -->
							  <ul class="nav nav-tabs" role="tablist">
							    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Update Invoice Terms & Condition</a></li>
							    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Update Quotation Terms & Condition</a></li>
							    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Update Sales Order Terms & Condition</a></li>
							    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Update Delivery Receipt Terms & Condition</a></li>
							    
							  </ul>

							  <!-- Tab panes -->
							  <div class="tab-content">
							    <div role="tabpanel" class="tab-pane active" id="home">
							    	<form class="form-horizontal" action="setting-terms-condition.php#home" method="POST">

							    		<div class="error"> <?php if(isset($error_message)){echo $error_message;} ?> </div>	
										<div class="success"> <?php if(isset($success)){echo $success;} ?> </div>

										<div class="form-group">
										    <label class="col-sm-12 control-label"style="text-align:center;font-size:15px;"><h3 class="no_margin">Terms & Condition</h3></label>
										    <div class="col-sm-12">
										    	
											    <textarea name="invoice"  required><?php echo $invoice; ?></textarea>
											    <script type="text/javascript">
													CKEDITOR.replace("invoice");</script>
											      
										    </div>
										 </div>
										 <div class="form-group">
										    <div class="col-sm-offset-5 col-sm-7">
										      <button name="update" type="submit" class="btn btn-success">Update</button>
										    </div>
										 </div>		   
									</form>
							    </div>
							    <div role="tabpanel" class="tab-pane" id="profile">
							    	<form class="form-horizontal" action="setting-terms-condition.php#profile" method="POST">

							    		<div class="error"> <?php if(isset($error_message)){echo $error_message;} ?> </div>	
										<div class="success"> <?php if(isset($success)){echo $success;} ?> </div>

										<div class="form-group">
										    <label class="col-sm-12 control-label"style="text-align:center;font-size:15px;"><h3 class="no_margin">Terms & Condition</h3></label>
										    <div class="col-sm-12">
										    	
											    <textarea name="quotation"  required><?php echo $quotation; ?></textarea>
											    <script type="text/javascript">
													CKEDITOR.replace("quotation");</script>
											      
										    </div>
										 </div>
										 <div class="form-group">
										    <div class="col-sm-offset-5 col-sm-7">
										      <button name="update_quotation" type="submit" class="btn btn-success">Update</button>
										    </div>
										 </div>		   
									</form>
							    </div>
							    <div role="tabpanel" class="tab-pane" id="messages">
							    	<form class="form-horizontal" action="setting-terms-condition.php#messages" method="POST">

							    		<div class="error"> <?php if(isset($error_message)){echo $error_message;} ?> </div>	
										<div class="success"> <?php if(isset($success)){echo $success;} ?> </div>

										<div class="form-group">
										    <label class="col-sm-12 control-label"style="text-align:center;font-size:15px;"><h3 class="no_margin">Terms & Condition</h3></label>
										    <div class="col-sm-12">
										    	
											    <textarea name="sales"  required><?php echo $sales; ?></textarea>
											    <script type="text/javascript">
													CKEDITOR.replace("sales");</script>
											      
										    </div>
										 </div>
										 <div class="form-group">
										    <div class="col-sm-offset-5 col-sm-7">
										      <button name="update_sales" type="submit" class="btn btn-success">Update</button>
										    </div>
										 </div>		   
									</form>
							    </div>
							    <div role="tabpanel" class="tab-pane" id="settings">
							    	<form class="form-horizontal" action="setting-terms-condition.php#settings" method="POST">

							    		<div class="error"> <?php if(isset($error_message)){echo $error_message;} ?> </div>	
										<div class="success"> <?php if(isset($success)){echo $success;} ?> </div>

										<div class="form-group">
										    <label class="col-sm-12 control-label"style="text-align:center;font-size:15px;"><h3 class="no_margin">Terms & Condition</h3></label>
										    <div class="col-sm-12">
										    	
											    <textarea name="delivery_receipt"  required><?php echo $delivery_receipt; ?></textarea>
											    <script type="text/javascript">
													CKEDITOR.replace("delivery_receipt");</script>
											      
										    </div>
										 </div>
										 <div class="form-group">
										    <div class="col-sm-offset-5 col-sm-7">
										      <button name="update_delivery_receipt" type="submit" class="btn btn-success">Update</button>
										    </div>
										 </div>		   
									</form>
							    </div>
							  

							</div>
							
						</div><!-- end panel body -->
					</div>
					  	
					
			</div>
			
		</div>                      
	</div>
</section>

<script type="text/javascript">
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  e.target // newly activated tab
  e.relatedTarget // previous active tab
})
</script>
	<?php include('includes/footer.php'); ?>