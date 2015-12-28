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
					<h2>purchase</h2>
				</div><!--  -->
					<div class="col-md-7">
						<div class="sales_manager_left">
							<ul>
								<li> <button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">new purchase order</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">search purchase order</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">receive purchase order</a> </button></li>
								<br>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">payment to suppliers</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">out standing purchase order</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">supplier invoices</a> </button></li>
								
								<br>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">add new supplier</a> </button></li>
								
							</ul>
						</div>
					</div><!--  -->
					<div class="col-md-5">
						<div class="sales_manager_right">
							
							<div class="col-md-12">
								<div class="pending_purchase">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									  <div class="panel panel-info no_margin">
									    <div class="panel-heading" role="tab" id="headingOne">
									      <h4 class="panel-title">
									        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									          <h4>pending purchase</h4>
									        </a>
									      </h4>
									    </div>
									    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									      <div class="panel-body">
									        <h4>1.</h4>
											<h4>2.</h4>
											<h4>3.</h4>
											<h4>4.</h4>
											<h4>5.</h4>
									      </div>
									    </div>
									  </div>
									</div>  
								</div>	
								<div class="outstanding_orders">
								  <div class="panel panel-info no_margin">
								    <div class="panel-heading" role="tab" id="headingTwo">
								      <h4 class="panel-title">
								        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								          <h4>outstanding orders</h4>
								        </a>
								      </h4>
								    </div>
								    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								      <div class="panel-body">
								        <h4>1.</h4>
										<h4>2.</h4>
										<h4>3.</h4>
										<h4>4.</h4>
										<h4>5.</h4>
								      </div>
								    </div>
								  </div>
								  
								</div>



									<!-- <div class="panel panel-default no_margin">
									  <div class="panel-heading"><h4>pending purchase</h4></div>
									  <div class="panel-body">
									    <h4>1.</h4>
										<h4>2.</h4>
										<h4>3.</h4>
										<h4>4.</h4>
										<h4>5.</h4>
									  </div>
									  
									</div>
								</div>
								<div class="outstanding_orders">
									<div class="panel panel-default no_margin">
									  <div class="panel-heading"><h4>outstanding orders</h4></div>
									  <div class="panel-body">
									    <h4>1.</h4>
										<h4>2.</h4>
										<h4>3.</h4>
										<h4>4.</h4>
										<h4>5.</h4>
									  </div> 
									</div>
								</div> -->
							
							
						</div>
					</div><!--  -->
				</div>
			</div>
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>
