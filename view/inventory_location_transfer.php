
<?php require_once 'start.php'; ?>	
	<?php include('config.php'); ?>
	<!-- link include -->
	



	<?php include('includes/all_link_body.php'); ?>
	<link href="css/jquery-ui.min.css" rel="stylesheet">
<link href="css/datepicker.css" rel="stylesheet">
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />

<style type="text/css">
	thead{font-size: 15px;}
	tbody{font-size: 15px;}
	table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting { padding-right: 20px;}
	.disabled{padding: 7px;margin: 5px;background: #2BAEA8;}
	div.dataTables_wrapper div.dataTables_filter input {border-radius: 5px;padding: 3px;border: 1px solid #3A9692;outline: 0;}
	div.dataTables_wrapper div.dataTables_paginate {margin: 10px;}
	.fa{font-size: 20px;}
	.modal{top:190px;}
</style>



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
					<h2>inventory Location Transfer</h2>
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
<section class="view_container_content" style="min-height:430px; background:#E6E6E6; color:#000;">

	<div class="container-fulid content">
		
		<div class="row"style="padding:5px;">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
				<div class="clearfix"></div>
				<br /><br />
				
				<table id="example" class="table table-striped table-bordered"style="font-size:11px;">
				<div class="error"> <?php if(isset($error_message)){echo $error_message;} ?> </div>	
							<div class="success"> <?php if(isset($success)){echo $success;} ?> </div>
				  <thead>
				    <tr style="background: #2BAEA8;">
				    	<th>Sl No.</th>
				    	<th>Product description</th>
				    	<th>Warehouse</th>
				    	<th>Shop</th>
				    	<th>Total</th>
				    	<th>Move to Shop</th>
				    	<th>Move to Warehouse</th>
				    	
				    </tr>
				  </thead>
				  
				  <tbody> 
				  <?php 
				  	$i=0;
				  	$startement = $db->prepare("SELECT * FROM inventory ORDER BY sl_no DESC");
			            $startement->execute();
			            $result = $startement->fetchAll(PDO::FETCH_ASSOC);
			            foreach ($result as $row) {
			            	$i++;
			            	$warehouse_stock = $row['warehouse_stock'];
				   ?>

				    <tr>
				    	<td><?php echo $i; ?></td>
				    	
				    	<td><?php echo $row['product_name']; ?></td>
				    	
				    	<td><?php echo $warehouse_stock; ?></td>
				    	<td><?php echo $row['shop_stock']; ?></td>
				    	<td><?php echo $row['total_stock']; ?></td>
				    	<td>
				    		<button type="button" class="btn btn-info">
							  <a href="move-shop-modal.php?sl_no=<?php echo $row['sl_no']; ?>"><i class="fa fa-cloud-upload"> Move to Shop</i></a>
							</button>
							

				    	</td>
				    	<td>
				    		<!-- Button trigger modal -->
							<button type="button" class="btn btn-info">
							  <a href="move-warehouse-modal.php?sl_no=<?php echo $row['sl_no']; ?>"><i class="fa fa-cloud-upload"> Move to Warehouse</i></a>
							</button>

				    	</td>
				    	
				    	

				    </tr>
				    <?php 
				    	}
				   	?>
				    
				  </tbody>  
			            
				</table>
			
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

</body>
</html>
	
	
	
