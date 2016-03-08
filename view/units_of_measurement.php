<?php require_once 'start.php'; ?>
<?php 
	use App\Inventory\Inventory;
  	use App\Connection\Connection;
	use App\Utility\Utility;
	$inventory = new Inventory;
	$inventory->add_uom($_POST);


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
					<h2>UOM</h2>
				</div><!--  -->
				 <div class="container">
<!-- 					<?php 
					//include('includes/admin_navigationbar.php'); ?> 
				  -->
				  
				</div>
			</div>
		</div>
	</div>
	
</header><!--  -->
<section class="view_container_content"style="min-height:405px;">

	<div class="container" style="background:#fff;width:43%;float:left;margin-left:110px;">
		<div class="row">

			<div class="col-md-12 no_padding">

				<!-- start print option -->
				<form action="units_of_measurement.php" method="post">
					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Unit of Measurement</h4></div>
					  	
					  		<div class="panel-body">
					  		<?php echo Utility::message(); ?>
							<div class="view_top_date"  style="overflow:hidden;">
								<div class="view_date pull-left" style="width:100%;float:left;">
									<div class="form-group">
									    <label for="inputuom3" class="col-sm-3 no_padding control-label ">New UOM:</label>
									    <div class="col-sm-8" style="width:75%;float:right">
									      <input name="uom" type="text" class="form-control" id="inputuom3" placeholder="New unit of measurement">
									    </div>
									 </div>
								</div>
							</div>	
							
						</div>
					</div><!-- end panel body -->
					  	
					<button class="btn btn-success btn-lg" type="submit" style="margin: 15px auto;margin-left: 223px;">ADD</button>
				</form>
			</div>
			
		</div>
	</div><!--  -->
	<div class="uom_list" style="background:#fff;width:30%;float:right;margin-right:100px;">
		<div class="low_stock">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			  <div class="panel panel-info no_margin">
			    <div class="panel-heading" role="tab" id="headingOne">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			          <h4 style="text-align:center">UOM LIST</h4>
			        </a>
			      </h4>
			    </div>
			    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			      <div class="panel-body">
			        <div class="table-responsive">
					  <table class="table">
					    <tr style="background: #2BAEA8;">
					    	<th>Brand Name</th>
					    	<th>Action</th>
					    </tr>
					    	<?php  ?>
					    	

					    	<?php
					    		$result = $inventory->view_all_uom(); 
					    		while ($uom = mysqli_fetch_object($result)) {
					    	?>

					    	<tr>
					    		<td><?php echo $uom->uom; ?></td>
					    		<td><a href="delete.php?uom_delete=<?php echo $uom->id; ?>" onClick="return confirm ('Are you sure?')"><i class="fa fa-trash-o" style="font-size:20px;"></i></a></td>
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
</section>

	<?php include('includes/footer.php'); ?>