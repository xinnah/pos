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
	<div class="container">
		<?php include('includes/admin_navigationbar.php'); ?>
	</div>
	
</header><!--  -->
<!-- nav start -->

<section style="width:100%;overflow:hidden;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sales_manager_content">
					<div class="sales_point">
						<h2>Generale Invoice</h2>
					</div><!--  -->
					
					<div class="search_invoice">
						<form class="navbar-form" role="search">
					        <div class="form-group">
					        	<label>Search Sales Order :</label>
					          <input type="text" class="form-control" placeholder="Search"><i class="fa fa-search"></i>
					        </div>
					        
					    </form>
					</div><!--  -->
					
				</div><!--  -->

				<div class="replacement_content_container">
					<div class="row">
						<div class="col-md-12">
							<div class="original_invoice">
								<div class="panel panel-info no_margin">
								  <div class="panel-heading"><h4>Generale Invoice</h4></div>
								  <div class="panel-body">

								    <div class="view_center_folwchart">
										<div class="panel panel-info no_margin"style="border:0;">
										  <div class="panel-body no_padding">
										    <div class="table-responsive">
											  <table class="table">
											    <tr style="background: #2BAEA8;">
											    	<th style="width:62px;">Sl No.</th>
											    	<th style="width:145px;">Product Description</th>
											    	<th style="width:62px;">Unit Cost</th>
											    	<th style="width:62px;">Unit price</th>
											    	<th style="width:62px;">Total Amount</th>
											    	<th style="width:62px;">&nbsp;</th>
											    </tr>
											    <tr>
											    	<td>1</td>
											    	<td>Hard Drive, Samsung , 16 GB</td>
											    	<td>20</td>
											    	<td>12</td>
											    	<td>22</td>
											    	<td><i class="fa fa-refresh btn btn-info"></i></td>
											    </tr>
											    <tr>
											    	<td colspan="3"></td>
											    	<td colspan="1">Vat(0%)</td>
											    	<td colspan="1" name="vat"></td>
											    	<td colspan="1"></td>
											    </tr>
											    <tr>
											    	<td colspan="3"></td>
											    	<td colspan="1">Delivery Charge</td>
											    	<td colspan="1" name="vat"></td>
											    	<td colspan="1"></td>
											    </tr>
											    <tr>
											    	<td colspan="3"></td>
											    	<td colspan="1">Total</td>
											    	<td colspan="1" name="vat"></td>
											    	<td colspan="1"></td>
											    </tr>
											    <tr>
											    	<td colspan="3"></td>
											    	<td colspan="1">Paid</td>
											    	<td colspan="1" name="vat"></td>
											    	<td colspan="1"></td>
											    </tr>
											    <tr>
											    	<td colspan="3"></td>
											    	<td colspan="1">Due</td>
											    	<td colspan="1" name="vat"></td>
											    	<td colspan="1"></td>
											    </tr>
											  </table>
											</div><!--  -->
											<a href="#"><button class="btn btn-success pull-right" name="confirm_invoice">Confirm & Print</button></a>

										  </div>									  
										</div>
									</div><!--  -->
								  </div>									  
								</div>
							</div>
						</div><!--  -->
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>
