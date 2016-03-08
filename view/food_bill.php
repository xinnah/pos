<?php require_once 'start.php'; ?>
<?php 
	use App\Utility\Utility;
	use App\Quotation\Quotation;
	use App\OverheadCost\OverheadCost;
  	use App\Connection\Connection;

	
	$OverheadCost = new OverheadCost;

	if (strtolower($_SERVER["REQUEST_METHOD"]) == "post") {

		$errors = array();
		foreach ($_POST as $key => $value) {
			if($key == "date" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}elseif($key == "cost_label" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}elseif($key == "notes" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}elseif($key == "total_cost" && empty($_POST[$key])){
				$errors[$key] = ucfirst(Utility::removeUnderScore($key))." can't empty"; 
			}
		}

		if(empty($errors)){
			$OverheadCost->createFoodBill($_POST);
		}
		
	}


 ?>

	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<style type="text/css">
	.form-group{overflow: hidden;}
	.sales_point{margin-bottom: 78px;}
</style>

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
					<h2>Add Internet Bill</h2>
				</div><!--  -->
				 <div class="container">
					
				  
				</div>
			</div>
		</div>
	</div>
	
</header><!--  -->
<section class="view_container_content">

	<div class="container" style="background:#fff;width:53%;float:left;margin-left:110px;">
		<div class="row">

			<div class="col-md-12 no_padding">

				<!-- start print option -->
				<form action="food_bill.php" method="post">
					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Add Food Bill</h4></div>
					  	<?php echo Utility::message(); ?>
					  		<div class="panel-body">
							<div class="view_top_date"  style="overflow:hidden;">
								<div class="view_date pull-left" style="width:50%;float:left;">
									<div class="form-group">
									    <label for="inputDate3" class="col-sm-2 control-label">Date :</label>
									    <div class="col-sm-10">
									      <input name="date" type="Date" class="form-control" id="inputDate3" placeholder="Date">
									    </div>
									</div>
									<div class="form-group">
									    <label for="inputMonth3" class="col-sm-2 control-label">Notes :</label>
									    <div class="col-sm-10">
									      <input name="notes" type="text" class="form-control" id="inputMonth3" placeholder="Notes">
									      <?php if(isset($errors["notes"])){echo $errors["notes"]; } ?>
									    </div>
									</div>
									<div class="form-group">
									    <label for="inputAmount3" class="col-sm-2 control-label">Amount:</label>
									    <div class="col-sm-10">
									      <input name="total_cost" type="text" class="form-control" id="inputAmount3" placeholder="Amount">
									      <?php if(isset($errors["total_cost"])){echo $errors["total_cost"]; } ?>
									    </div>
									</div>
									<input type="hidden" name="cost_label" value="Food Bill">
									 
								</div>
							</div>	
							<input class="btn btn-success btn-lg" type="submit" name="" value="Add"style="margin: 15px auto;margin-left: 323px;">
						</div><!-- end panel body -->
					</div>
				</form>	

			</div>
			
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>