<?php require_once 'start.php'; ?>
<?php 
	use App\Utility\Utility;
	use App\Invoice\Invoice;

	$outstanding = new Invoice;

	$all_invoice = $outstanding->show_all_invoice($_POST);

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
					<h2>Out Standing Invoice</h2>
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

	<div class="container">
		<div class="row">

			<div class="col-md-12 no_padding">

				<!-- start print option -->

					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Out Standing Invoice</h4></div>
					  	
					  	<div class="panel-body">
							<div class="table-responsive">
							  <table class="table">
							    <tr style="background: #2BAEA8;">
							    	<th>Sl No.</th>
							    	<th>Date</th>
							    	<th>Customer</th>
							    	<th>Invoice</th>
							    	<th>Payment Due</th>
							    	<th>Status</th>
							    </tr>
							    <?php
							    	$sl = 1; 
							    	foreach ($all_invoice as $invoice) {
							    		if($invoice->due <= 0){
							    			continue;
							    		}else{
							    ?>
							    <tr>
							    	<td><?php echo $sl++; ?></td>
							    	<td><?php echo $invoice->invoice_date; ?></td>
							    	<?php $customer = $outstanding->show_customer($invoice->customer_id); ?>
							    	<td><?php echo $customer->customer_name; ?></td>
							    	<td><?php echo $invoice->invoice_no; ?></td>
							    	<td>
							    		<?php 
							    			$due = $invoice->due;
							    			if($due <= 0){
									    		echo 0;
									    	}else{
									    		echo $due;
									    	}
							    	 	?>
							    	 </td>
							    	<td>
							    		<?php 
									    	if($due <= 0){
									    		echo "Paid";
									    	}else{
									    		echo "Due";
									    	}
							    	 	?>
							    	</td>
							    </tr>

							    <?php
							    		}
							    	}
							     ?>
							    
							  </table>
							</div><!--  -->	
							
						</div>
						<a href="sales_manager.php"><input class="btn btn-success btn-lg" type="submit" name="add" value="Ok"style="margin: 15px auto;margin-left: 523px;"></a>
					</div><!-- end panel body -->
					  	
					

			</div>
			
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>