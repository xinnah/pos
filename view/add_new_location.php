<?php require_once 'start.php'; ?>
<?php 
	use App\Utility\Utility;
	use App\Inventory\Inventory;
  	use App\Connection\Connection;

	$inventory = new Inventory;
	$inventory->add_location($_POST);


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
					<h2>location</h2>
				</div><!--  -->
				 <div class="container">
					
				<!-- 	<?php 
					//include('includes/admin_navigationbar.php'); ?>  -->
				 
				  
				</div>
			</div>
		</div>
	</div>
	
</header><!--  -->
<section class="view_container_content"style="min-height:405px;">

	<div class="container">
		<div class="col-md-7">
			<div class="row">

				<div class="col-md-12 no_padding">

					<!-- start print option -->

					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Add New Location</h4></div>
					  	
				  		<div class="panel-body">
				  		<?php echo Utility::message(); ?>
							<form class="form-horizontal" action="add_new_location.php" method="post">
							  <div class="add_item">
							  	<div class="form-group">
								    <label for="inputlocation3" class="col-sm-3 control-label">Location:</label>
								    <div class="col-sm-9">
								      <input name="location_name" type="text" class="form-control" id="inputBrand3" placeholder="Brand Name">
								    </div>
							  </div>
							  </div>
								<button type="submit" class="btn btn-success" name=""style="margin: 15px auto;margin-left: 323px;">Add Brand</button></a>
							</form>
						</div>
					</div><!-- end panel body -->
					  	
					

				</div>
				
			</div>
		</div><!--  -->
		<div class="col-md-5">
			<div class="low_stock">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-info no_margin">
			    <div class="panel-heading" role="tab" id="headingOne">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			          <h4 style="text-align:center">Location</h4>
			        </a>
			      </h4>
			    </div>
			    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			      <div class="panel-body">
			        <div class="table-responsive">
					  <table class="table">
					    <tr style="background: #2BAEA8;">
					    	<th>Location</th>
					    	<th>Action</th>
					    </tr>
					    	<?php  ?>
					    	

					    	<?php
					    		$result = $inventory->view_all_location(); 
					    		while ($location = mysqli_fetch_object($result)) {
					    	?>

					    	<tr>
					    		<td><?php echo $location->location_name; ?></td>
					    		<td><a href="delete.php?location_delete=<?php echo $location->id; ?>" onClick="return confirm ('Are you sure?')"><i class="fa fa-trash-o" style="font-size:20px;"></i></a></td>
					    	</tr>
					    	<?php
					    		}
					    	 ?>
					  </table>
					</div>     	
			      </div>
			    </div>
			  </div>
			</div>  
		</div>
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>