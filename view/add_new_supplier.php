<?php require_once 'start.php'; ?>
<?php 
	use App\Supplier\Supplier;
  	use App\Connection\Connection;
	use App\Utility\Utility;

	$supplier = new Supplier;

	if (strtolower($_SERVER["REQUEST_METHOD"]) == "post") {

		$errors = array();
		foreach ($_POST as $key => $value) {
			if($key == "supplier_name" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}elseif($key == "supplier_phone" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}elseif($key == "supplier_address" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}
		}

		if(empty($errors)){
			$supplier->add_supplier($_POST);
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
					<h2>Supplier</h2>
				</div><!--  -->
				 <div class="container">
					<!-- 
					<?php 
					//include('includes/admin_navigationbar.php'); ?> 
				  -->
				  
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

				<!-- start print option -->

					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Add New Supplier</h4></div>
					  	
					  		<div class="panel-body">
								<form class="form-horizontal" action="add_new_supplier.php" method="post">
								  <div class="customer_info">
									  	
									  <!-- <div class="form-group">
										    <label for="inputcode3" class="col-sm-3 control-label">Supplier Code :</label>
										    <div class="col-sm-9">
										      <input name="supplier_code" type="text" class="form-control" id="inputcode3" placeholder="Supplier Code">
										    </div>
									  </div> -->
									  <div class="form-group">
										    <label for="inputName3" class="col-sm-3 control-label">Supplier Name :</label>
										    <div class="col-sm-9">
										      <input name="supplier_name" type="text" class="form-control" id="inputName3" placeholder="Supplier Name" required>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputName3" class="col-sm-3 control-label">Supplier Phone :</label>
										    <div class="col-sm-9">
										      <input name="supplier_phone" type="text" class="form-control" id="inputName3" placeholder="Supplier Phone" required>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputAddress3" class="col-sm-3 control-label">Supplier Address :</label>
										    <div class="col-sm-9">
										      <textarea name="supplier_address" rows="3" style="width:100%"></textarea>
										    </div>
									  </div>
									  <input name="supplier_balance" type="hidden" />
									  <input name="due_to_supplier" type="hidden" />
									</div>
								  	<div class="confim_button">
								  		<button type="submit" class="btn btn-success btn-lg">Add Supplier</button>
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