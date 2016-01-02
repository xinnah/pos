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
						<h2>search quotation</h2>
					</div><!--  -->
					
					<div class="search_invoice">
						<form class="navbar-form" role="search">
					        <div class="form-group">
					        	<label>Search For Quotation :</label>
					          <input type="text" class="form-control" placeholder="Search"><i class="fa fa-search"></i>
					        </div>
					        
					    </form>
					</div><!--  -->
					
				</div><!--  -->

				<div class="replacement_content_container"style="min-height:245px;">
					<div class="row">
						<div class="col-md-12">
							<div class="original_invoice">
								<div class="panel panel-info no_margin">
								  <div class="panel-heading"><h4>Quotation</h4></div>
								  <div class="panel-body">

								    <div class="view_center_folwchart">
										<div class="panel panel-info no_margin"style="border:0;">
										  <div class="panel-body no_padding">
										    <div class="table-responsive">
											  <table class="table">
											    <tr style="background: #2BAEA8;">
											    	<th style="width:62px;">Date :</th>
											    	<th style="width:145px;">Customer</th>
											    	<th style="width:145px;">Ref.</th>
											    	<th style="width:62px;">Generate Sales Order</th>
											    	<th style="width:62px;">Generale Invoice</th>
											    	<th style="width:62px;">&nbsp;</th>
											    	<th style="width:62px;">&nbsp;</th>
											    	<th style="width:62px;">&nbsp;</th>
											    </tr>
											    <tr>
											    	<td>1-1-15</td>
											    	<td>Ashik</td>
											    	<td>204245</td>
											    	<td><a href="#" class="btn btn-primary" >Generate Sales Order</a></td>
											    	<td><a href="#" class="btn btn-primary" >Generale Invoice</a></td>
											    	<td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">View</a>

											    	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
													  <div class="modal-dialog" role="document">
													    <div class="modal-content">
													      <div class="modal-header">
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													        <h4 class="modal-title" id="myModalLabel">Quotation</h4>
													      </div>
													      <div class="modal-body">
													        ...
													      </div>
													      <div class="modal-footer">
													        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													        <button type="button" class="btn btn-primary">Save changes</button>
													      </div>
													    </div>
													  </div>
													</div><!--  -->

											    	</td>

											    	


											    	<td><a href="#" class="btn btn-info">Update</a></td>
											    	<td><a href="#" class="btn btn-success">Print</a></td>
											    </tr>
											    
											  </table>
											</div><!--  -->
											
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
