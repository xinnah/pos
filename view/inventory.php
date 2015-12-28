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
					<h2>inventory</h2>
				</div><!--  -->
					<div class="col-md-7">
						<div class="sales_manager_left">
							<ul>
								<li> <button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">add items to inventory</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">item movements</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">receive purchase orders</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">view stock</a> </button></li>
								<br>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">add new catagory</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">add new brand</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">add new location</a> </button></li>
								
								<br>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">units of measurement</a> </button></li>
								<br>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">update price list</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="#">view / print price list</a> </button></li>
								
							</ul>
						</div>
					</div><!--  -->
					<div class="col-md-5">
						<div class="sales_manager_right">
							
							<div class="col-md-12">
								<div class="low_stock">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									  <div class="panel panel-info no_margin">
									    <div class="panel-heading" role="tab" id="headingOne">
									      <h4 class="panel-title">
									        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									          <h4>low stock</h4>
									        </a>
									      </h4>
									    </div>
									    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									      <div class="panel-body">
									        <div class="table-responsive">
											  <table class="table">
											    <tr style="background: #2BAEA8;">
											    	<th>sl no.</th>
											    	<th>product</th>
											    	<th>qty</th>
											    </tr>
											    <tr>
											    	<td>1</td>
											    	<td>computer</td>
											    	<td>666</td>
											    </tr>
											    <tr>
											    	<td>2</td>
											    	<td>laptop</td>
											    	<td>6</td>
											    </tr>
											  </table>
											</div>
									      </div>
									    </div>
									  </div>
									</div>  
								</div>	
								
						</div>
					</div><!--  -->
				</div>
			</div>
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>
