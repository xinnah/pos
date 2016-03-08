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
					<h2>Earnings</h2>
				</div><!--  -->
				 <div class="container">
					<!-- 
					<?php 
					//include('includes/admin_navigationbar.php'); ?> 
				  -->
				  
				</div>
			</div>
		</div>
	</div>
	
</header><!--  -->
<section class="view_container_content" style="min-height:430px;">

	<div class="container" style="background:#fff;width:53%;float:left;margin-left:110px;">
		<div class="row">

			<div class="col-md-12 no_padding">

				<!-- start print option -->

					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Earnings</h4></div>
					  	
					  	<div class="panel-body">
							<div class="table-responsive">
							  <table class="table">
							    <tr style="background: #2BAEA8;">
							    	<th>Sl No.</th>
							    	<th>Date</th>
							    	<th>Customer Name</th>
							    	<th>Customer Phone</th>
							    	<th>Invoice No.</th>
							    	<th>Amount</th>
							    </tr>
							    <tr>
							    	<td>01</td>
							    	<td>1-7-2016</td>
							    	<td>NM Babor</td>
							    	<td>01811951215</td>
							    	<td>0255</td>
							    	<td>41</td>

							    </tr>
							  </table>
							</div><!--  -->	
							
						</div>
					</div><!-- end panel body -->
					  	
					<a href="accounts.php"><input class="btn btn-success btn-lg" type="submit" name="add" value="Ok"style="margin: 15px auto;margin-left: 323px;"></a>
			</div>
			
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>