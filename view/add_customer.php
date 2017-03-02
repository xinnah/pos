<?php require_once 'start.php'; ?>
<?php 
	use App\Customer\Customer;
  	use App\Connection\Connection;
	use App\Utility\Utility;

	$customer = new Customer;

	if (strtolower($_SERVER["REQUEST_METHOD"]) == "post") {

		$errors = array();
		foreach ($_POST as $key => $value) {
			if($key == "customer_name" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}elseif($key == "customer_phone" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}elseif($key == "customer_address" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}
		}

		if(empty($errors)){
			$customer->add_customer($_POST);
		}
		
	}
	


 ?>
	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>




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
					<h2>Customer</h2>
				</div><!--  -->
				 <div class="container">
					
				<!-- 	<?php 
					//include('includes/admin_navigationbar.php'); ?>   -->
				 
				  
				</div>
			</div>
		</div>
	</div>
	
</header><!--  -->
<section class="view_container_content">

	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 no_padding">
				<div class="panel panel-info no_margin">
				  	<div class="panel-heading"><h4 style="text-align:center;">Add New Customer</h4></div>
				  		<div class="panel-body">
				  			<?php echo Utility::message(); ?>
							<form class="form-horizontal" action="add_customer.php" method="post">
							  <div class="customer_info">
								  <div class="form-group">
									    <label for="inputName3" class="col-sm-4 control-label">Customer Name :</label>
									    <div class="col-sm-8">
									      <input name="customer_name" type="text" class="form-control" id="inputName3" placeholder="Customer Name" required>
									      <?php if(isset($errors["customer_name"])){echo $errors["customer_name"]; } ?>
									    </div>
								  </div>

								  <div class="form-group">
									    <label for="inputPhone3" class="col-sm-4 control-label">Customer Phone :</label>
									    <div class="col-sm-8">
									      <input name="customer_phone" type="tel" class="form-control" id="inputPhone3" placeholder="Phone" required>
									      <?php if(isset($errors["customer_phone"])){echo $errors["customer_phone"]; } ?>
									    </div>
								  </div>

								  <div class="form-group">
									    <label for="inputAddress3" class="col-sm-4 control-label">Customer Address :</label>
									    <div class="col-sm-8">
									      <input name="customer_address" type="text" class="form-control" id="inputAddress3" placeholder="Customer Address" required>
									      <?php if(isset($errors["customer_address"])){echo $errors["customer_address"]; } ?>
									    </div>
								  </div>
								  

								  	<div class="form-group">
									    <label for="inputslno3" class="col-sm-4 control-label">Contact Person :</label>
									    <div class="col-sm-8">
									      <input type="text" name="contact_person" class="form-control" id="inputslno3" placeholder="">
									    </div>
								  </div>
								  <div class="form-group">
									    <label for="inputcode3" class="col-sm-4 control-label">Contact Person Number :</label>
									    <div class="col-sm-8">
									      <input name="contact_person_no" type="text" class="form-control" id="inputcode3" placeholder="">
									    </div>
									    <input type="hidden" name="customer_balance">
									    <input type="hidden" name="customer_payment_due">
								  </div>
								  
									
								</div>
								<div class="confim_button">
							  		<button class="btn btn-success btn-lg">Add Customer</button>
							  	</div>
							</form>
						
						
						
					</div>
				</div><!-- end panel body -->
				
			</div>
			<div class="col-md-2"></div>
			
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>