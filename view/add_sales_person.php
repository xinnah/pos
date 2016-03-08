<?php require_once 'start.php'; ?>
<?php 
	use App\SalesPerson\SalesPerson;
  	use App\Connection\Connection;
	use App\Utility\Utility;

	$sales_person = new SalesPerson;

	if (strtolower($_SERVER["REQUEST_METHOD"]) == "post") {

		$errors = array();
		foreach ($_POST as $key => $value) {
			if($key == "sales_person_name" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}elseif($key == "sales_person_phone" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}elseif($key == "sales_person_address" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}
		}

		if(empty($errors)){
			$sales_person->add_sales_person($_POST);
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
					<h2>Sales Person</h2>
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

	<div class="container" style="background:#fff;width:55%;float:left;margin-left:110px;">
		<div class="row">

			<div class="col-md-12 no_padding">

				<!-- start print option -->

					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Add New Sales Person</h4></div>
					  	
					  		<div class="panel-body">
					  			<?php echo Utility::message(); ?>
								<form class="form-horizontal" action="add_sales_person.php" method="post">
								  <div class="customer_info">
									  <div class="form-group">
										    <label for="inputName3" class="col-sm-3 control-label">Customer Name :</label>
										    <div class="col-sm-9">
										      <input name="sales_person_name" type="text" class="form-control" id="inputName3" placeholder="Sales Person Name" required>
										      <?php if(isset($errors["sales_person_name"])){echo $errors["sales_person_name"]; } ?>
										    </div>
									  </div>

									  <div class="form-group">
										    <label for="inputPhone3" class="col-sm-3 control-label">Phone :</label>
										    <div class="col-sm-9">
										      <input name="sales_person_phone" type="tel" class="form-control" id="inputPhone3" placeholder="Phone" required>
										      <?php if(isset($errors["sales_person_phone"])){echo $errors["sales_person_phone"]; } ?>
										    </div>
									  </div>

									  <div class="form-group">
										    <label for="inputAddress3" class="col-sm-3 control-label">Sales Person Address :</label>
										    <div class="col-sm-9">
										      <textarea name="sales_person_address" id="" cols="67" rows="5" required></textarea>
										      <?php if(isset($errors["sales_person_address"])){echo $errors["sales_person_address"]; } ?>
										    </div>
									  </div>
									  
										
									</div>
								  <button class="btn btn-success btn-lg" style="margin: 15px auto;margin-left: 323px;">Add Sales Person</button>

								</form>
							
							
							
						</div>
					</div><!-- end panel body -->
					  	
					

			</div>
			
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>