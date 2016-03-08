<?php require_once 'start.php'; ?>
<?php 
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
					<h2>sales manager</h2>
				</div><!--  -->
					<div class="col-md-7">
						<div class="sales_manager_left">
							<ul>
								<li> <button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="welcome.php">go to pos</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="add_quotation.php">add new quotation</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="search_quotation.php">search quotation</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="search_invoice.php">search invoice</a> </button></li>
								<br>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="sales_order.php">add sales order</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="generate_invoice.php">generate invoice</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="delivery_against_order.php">delivery against orders</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="outstanding_orders.php">outstanding orders</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="search_sales_order.php">search sales orders</a> </button></li>
								<br>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="add_customer.php">add/manage customers</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="customer_payments.php">customer payments</a> </button></li>
								<br>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="replacement_history.php">Replacement History</a> </button></li>
								<br>
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
								          <h4>sales today</h4>
								        </a>
								      </h4>
								    </div>
								    <div id="collapseOne" class="panel-collapse collapsed" role="tabpanel" aria-labelledby="headingOne">
								      <div class="panel-body">
								      	<?php 
								      		$summary = new Summary;
								      	 ?>
								        <h4>bdt <?php echo array_sum($summary->sales_summary("today")); ?></h4>
								      </div>
								    </div>
								  </div><!-- end panel -->


								</div><!-- end sales today -->
							</div>
							<div class="col-md-12">
								<div class="sales_this_month">
									<!-- <h2>sales this month</h2>
									<h1>bdt 00000.00</h1> -->
									<div class="panel panel-info no_margin">
								    <div class="panel-heading" role="tab" id="headingTwo">
								      <h4 class="panel-title">
								        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								          <h4>sales this month</h4>
								        </a>
								      </h4>
								    </div>
								    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								      <div class="panel-body">
								        <h4>bdt <?php echo array_sum($summary->sales_summary("month")); ?></h4>
								      </div>
								    </div>
								  </div><!-- end panel -->
								</div>
							</div>
							<div class="col-md-12">
								<div class="sales_this_year">
									<!-- <h2>sales this year</h2>
									<h1>bdt 00000.00</h1> -->
									<div class="panel panel-info no_margin">
								    <div class="panel-heading" role="tab" id="headingThree">
								      <h4 class="panel-title">
								        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								          <h4>sales this year</h4>
								        </a>
								      </h4>
								    </div>
								    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
								      <div class="panel-body">
								        <h4>bdt <?php echo array_sum($summary->sales_summary("year")); ?></h4>
								      </div>
								    </div>
								  </div><!-- end panel -->
								</div>
							</div><!--  -->
							<div class="col-md-6">
								<div class="best_seller_month">
									<!-- <h2>best sellers(this month)</h2>
									<h3>1.</h3>
									<h3>2.</h3>
									<h3>3.</h3>
									<h3>4.</h3>
									<h3>5.</h3> -->

									<!-- <div class="panel panel-info no_margin">
								    <div class="panel-heading" role="tab" id="headingFour">
								      <h4 class="panel-title">
								        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								          <h4>best sellers<br>
								          	(this month)</h4>
								        </a>
								      </h4>
								    </div>
								    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
								      <div class="panel-body">
								        <h4>1.</h4>
								        <h4>2.</h4>
								        <h4>3.</h4>
								        <h4>4.</h4>
								        <h4>5.</h4>
								      </div>
								    </div>
								  </div> --><!-- end panel -->
								</div>
							</div>
							<div class="col-md-6">
								<!-- <div class="best_seller_year">
									<h2>best sellers(this year)</h2>
									<h3>1.</h3>
									<h3>2.</h3>
									<h3>3.</h3>
									<h3>4.</h3>
									<h3>5.</h3> -->

									<!-- <div class="panel panel-info no_margin">
								    <div class="panel-heading" role="tab" id="headingFive">
								      <h4 class="panel-title">
								        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
								          <h4>best sellers<br>
								          	(this year)</h4>
								        </a>
								      </h4>
								    </div>
								    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
								      <div class="panel-body">
								        <h4>1.</h4>
								        <h4>2.</h4>
								        <h4>3.</h4>
								        <h4>4.</h4>
								        <h4>5.</h4>
								      </div>
								    </div>
								  </div>
								</div> -->
							</div>
						</div>
					</div><!-- end -->
				</div>
			</div>
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>
