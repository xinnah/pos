<?php require_once 'start.php'; ?>
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
					<h2>Add Attribute</h2>
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

	<div class="container" style="background:#fff;width:53%;float:left;margin-left:110px;">
		<div class="row">

			<div class="col-md-12 no_padding">

				<!-- start print option -->

					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Add New Attribute</h4></div>
					  	
					  		<div class="panel-body">
							<div class="view_top_date"  style="overflow:hidden;">
								<div class="view_date pull-left" style="width:50%;float:left;">
									<div class="form-group">
									    <label for="inputDate3" class="col-sm-3 no_padding control-label " style="width:20%;margin-left:10px;">Attribute Name:</label>
									    <div class="col-sm-9" style="width:75%;float:right">
									      <input name="attribute_name" type="text" class="form-control" id="inputDate3" placeholder="Attribute Name">
									    </div>
									 </div>
								</div>
							</div>	
							
						</div>
					</div><!-- end panel body -->
					  	
					<input class="btn btn-success btn-lg" type="submit" name="add" value="Add"style="margin: 15px auto;margin-left: 323px;">

			</div>
			
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>