<?php require_once 'start.php'; ?>
<?php 
	use App\Utility\Utility;
	use App\PurchaseOrder\PurchaseOrder;

	$outstanding = new PurchaseOrder;

	$all_purchase_order = $outstanding->show_all_purchase_order($_POST);

 ?>

	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<link href="css/jquery-ui.min.css" rel="stylesheet">
<link href="css/datepicker.css" rel="stylesheet">
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />



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
					<h2>Out Standing Purchase Order</h2>
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
					  <div class="panel-heading"><h4 style="text-align:center;">Out Standing Purchase Order</h4></div>
					  	
					  	<div class="panel-body">
							  <table class="table">
							    <thead>
							    
							    <tr style="background: #2BAEA8;">
							    	<th>Sl No.</th>
							    	<th>Date</th>
							    	<th>Supplier</th>
							    	<th>Purchase Order</th>
							    	<th>Payment Due</th>
							    	<th>Status</th>
							    </tr>
							    </thead>
							    <tbody>
							    <?php
							    	$sl = 1; 
							    	foreach ($all_purchase_order as $purchase_order) {
							    		if($purchase_order->due <= 0){
							    			continue;
							    		}else{
							    ?>
							    <tr>
							    	<td><?php echo $sl++; ?></td>
							    	<td><?php echo $purchase_order->po_date; ?></td>
							    	<?php $supplier = $outstanding->show_supplier($purchase_order->supplier_id); ?>
							    	<td><?php echo $supplier->supplier_name; ?></td>
							    	<td><?php echo $purchase_order->purchase_order_no; ?></td>
							    	<td>
							    		<?php 
							    			$due = $purchase_order->due;
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
							    </tbody>
							  </table>
							
						</div>
					</div><!-- end panel body -->
					  	
					

			</div>
			
		</div>
	</div>
</section>
	<footer class="main_footer_section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-7">
							<p>Korea IT</p>
						</div>
						<div class="col-sm-2">
							<p>Binary Pos <span>v 1.0.0</span> </p>
						</div>
						<div class="col-sm-3">
							<p>Copyright &copy; 2015 <a href="www.binary-logic.net">Binary Logic</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>

    <script src="js/bootstrap-datepicker-search.js"></script>
    
	<script src="js/dataTables.bootstrap-search.min.js"></script>
	<script src="js/jquery.dataTables-search.min.js"></script>
	<script src="js/script-search.js"></script>

	<script>
		$('table').dataTable();
	</script>

</body>
</html>