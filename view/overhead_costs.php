<?php 
	require_once 'start.php';
	use App\Utility\Utility; 
	use App\Summary\Summary;

?>
	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>

<header class="header_section">
	<!-- top header -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php include('includes/header_top.php'); ?>
				
			</div>
		</div>
	</div><!--  -->
	<!-- main_nav -->
	<?php include('includes/main_nav.php'); ?>
	
</header><!--  -->
<!-- nav start -->

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sales_manager_content">
					<div class="sales_point">
					<h2>overhead costs</h2>
					
				</div><!--  -->
					<div class="col-md-7">
						<div class="sales_manager_left">
							<ul>

								<li> <button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="add_cost.php">add cost</a> </button></li>
								<!-- <li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="add_new_attribute.php">add new attribute</a> </button></li> -->
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="pay_houserent.php">pay houserent</a> </button></li>
								<br>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="pay_salary.php">pay salary</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="food_bill.php">food bill</a> </button></li>
								<br>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="entertainment_bill.php">entertainment bill</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="internet_bill.php">internet bill</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="electricity_bill.php">electricity bill</a> </button></li>
								
							</ul>
						</div>
					</div><!--  -->
					<div class="col-md-5">
						<div class="sales_manager_right">
							<div class="col-md-12">
								<div class="sales_today">
									<!-- <h2>sales today</h2>
									<h1>bdt 00000.00</h1> -->

									<div class="panel panel-info no_margin">
								    <div class="panel-heading" role="tab" id="headingOne">
								      <h4 class="panel-title">
								        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
								          <h4>overhead costs<br>
								          	  (this month)</h4>
								        </a>
								      </h4>
								    </div>
								    <div id="collapseOne" class="panel-collapse collapsed" role="tabpanel" aria-labelledby="headingOne">
								      <div class="panel-body">
								      <?php 
								      		$summary = new Summary;
								      	 ?>
								        <h4>bdt <?php echo array_sum($summary->overhead_summary(true)); ?></h4>
								      </div>
								    </div>
								  </div><!-- end panel -->


								</div><!-- end sales today -->
							</div>
							<div class="col-md-12">
								<div class="employee_salary">
									<!-- <h2>sales this month</h2>
									<h1>bdt 00000.00</h1> -->
									<div class="panel panel-info no_margin">
								    <div class="panel-heading" role="tab" id="headingTwo">
								      <h4 class="panel-title">
								        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								          <h4>employee salary<br>
								          		(this month)</h4>
								        </a>
								      </h4>
								    </div>
								    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								      <div class="panel-body">
								        <?php 
								      		$salary_summary = $summary->salary_summary();
								      		
								      		$sl = 1;
								      		foreach ($salary_summary as $salary) {
								      	 ?>
									        <h4><?php echo $sl++; ?> . <?php echo $salary->notes." ".$salary->total_cost; ?></h4>
										<?php 
											}
										 ?>
								      </div>
								    </div>
								  </div><!-- end panel -->
								</div>
							</div>
							<div class="col-md-12">
								<div class="total_overheads">
									<!-- <h2>sales this year</h2>
									<h1>bdt 00000.00</h1> -->
									<div class="panel panel-info no_margin">
								    <div class="panel-heading" role="tab" id="headingThree">
								      <h4 class="panel-title">
								        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								          <h4>total overheads<br>
								          		(life time)</h4>
								        </a>
								      </h4>
								    </div>
								    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
								      <div class="panel-body">
								        <h4>BDT <?php echo array_sum($summary->overhead_summary()); ?></h4>
								        <!-- <h4>2.</h4>
								        <h4>3.</h4>
								        <h4>4.</h4>
								        <h4>5.</h4> -->
								      </div>
								    </div>
								  </div><!-- end panel -->
								</div>
							</div><!--  -->
							
						
						</div>
					</div><!-- end -->
				</div>
			</div>
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>
