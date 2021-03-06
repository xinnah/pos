<?php require_once 'start.php'; ?>
	<?php include('config.php'); ?>
	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
	<link href="css/jquery-ui.min.css" rel="stylesheet">
<link href="css/datepicker.css" rel="stylesheet">
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<style type="text/css">
	tbody{font-size: 10px;}
	table.dataTable thead>tr>th.sorting_asc, table.dataTable thead>tr>th.sorting_desc, table.dataTable thead>tr>th.sorting, table.dataTable thead>tr>td.sorting_asc, table.dataTable thead>tr>td.sorting_desc, table.dataTable thead>tr>td.sorting { padding-right: 20px;}
	.disabled{padding: 7px;margin: 5px;background: #2BAEA8;}
	div.dataTables_wrapper div.dataTables_filter input {border-radius: 5px;padding: 3px;border: 1px solid #3A9692;outline: 0;}
	div.dataTables_wrapper div.dataTables_paginate {margin: 10px;}
	.fa{font-size: 20px;}
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
					<h2>Price List</h2>
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
				<div class="row">
					<div class="col-md-4 col-sm-4"></div>
					<div class="col-md-4 col-sm-4">
						<div class="view">
				         	<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
							  view
							</button>

							<!-- Modal -->
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document"style="width:90%;">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Price List</h4>
							      </div>
							      <div class="modal-body">
							      	<div id="print">
								        <table class="table table-striped table-bordered"style="font-size:14px;">
								        	<tr style="background: #2BAEA8;">
										    	<th>Sl No.</th>
										    	<th>Product Code</th>
										    	<th>Barcode</th>
										    	<th>Product Name</th>
										    	<th>Category</th>
										    	<th>Brand</th>
										    	<th>Model</th>
										    	<th>UOM</th>
										    	<th>Purchase Cost/Unit</th>
										    	<th>Sales Price/Unit</th>
										    	<!-- <th>Warehouse</th>
										    	<th>Shop</th>
										    	<th>Total</th>
										    	<th>Stock Value( Purchase Price)</th>
										    	<th>Stock Value( Sales Price)</th> -->
										    	
										    	
										    </tr>
								        	<?php 
											  	$i=0;
											  	$startement = $db->prepare("SELECT * FROM inventory ORDER BY sl_no DESC");
										            $startement->execute();
										            $result = $startement->fetchAll(PDO::FETCH_ASSOC);
										            foreach ($result as $row) {
										            	$i++;
											   ?> 
											    <tr>
											    	<td><?php echo $i; ?></td>
											    	<td><?php echo $row['product_code']; ?></td>
											    	<td><?php echo $row['barcode']; ?></td>
											    	<td><?php echo $row['product_name']; ?></td>
											    	<td><?php echo $row['category']; ?></td>
											    	<td><?php echo $row['brand']; ?></td>
											    	<td><?php echo $row['model']; ?></td>
											    	<td><?php echo $row['uom']; ?></td>
											    	<td><?php echo $row['purchase_cost_per_unit']; ?></td>
											    	<td><?php echo $row['sales_price_per_unit']; ?></td>
											    	<!-- <td><?php //echo $row['warehouse_stock']; ?></td>
											    	<td><?php //echo $row['shop_stock']; ?></td>
											    	<td><?php //echo $row['total_stock']; ?></td>
											    	<td><?php //echo $row['stock_value_on_purchase']; ?></td> -->
											    	<!-- <td><?php //echo $row['stock_value']; ?></td> -->
											    	<!-- <td><?php// echo $row['stock_value_on_sale']; ?></td> -->
											    	
											    	

											    </tr>
											    <?php 
											    	}
											   	?>
											    
								        </table>
							        </div>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
							        
							      </div>
							    </div>
							  </div>
							</div>


				         	<button class="btn btn-success pull-right"name="" onclick="printDiv('print')">Print
								<script>
					                function printDiv(divName) {
					                   var printContents = document.getElementById(divName).innerHTML;
					                   var originalContents = document.body.innerHTML;

					                   document.body.innerHTML = printContents;

					                   window.print();

					                   document.body.innerHTML = originalContents;
					                    //document.getElementById('print').innerHTML = inputBox.value;
					              }
					          </script>
							</button>
				         </div>
					</div>
					<div class="col-md-4 col-sm-4"></div>
				</div>
				<table id="example" class="table table-striped table-bordered"style="font-size:11px;">
				  <thead>
				    <tr style="background: #2BAEA8;">
				    	<th>Sl No.</th>
				    	<th>Product Code</th>
				    	<th>Barcode</th>
				    	<th>Product Name</th>
				    	<th>Category</th>
				    	<th>Brand</th>
				    	<th>Model</th>
				    	<th>UOM</th>
				    	<th>Purchase Cost/Unit</th>
				    	<th>Sales Price/Unit</th>
				    	<!-- <th>Warehouse</th>
				    	<th>Shop</th>
				    	<th>Total</th>
				    	<th>Stock Value( Purchase Price)</th>
				    	<th>Stock Value( Sales Price)</th> -->
				    	<th>Action</th>
				    	
				    </tr>
				  </thead>
				  
				  <tbody> 
				  <?php 
				  	$i=0;
				  	
			            foreach ($result as $row) {
			            	$i++;
				   ?> 
				    <tr>
				    	<td><?php echo $i; ?></td>
				    	<td><?php echo $row['product_code']; ?></td>
				    	<td><?php echo $row['barcode']; ?></td>
				    	<td><?php echo $row['product_name']; ?></td>
				    	<td><?php echo $row['category']; ?></td>
				    	<td><?php echo $row['brand']; ?></td>
				    	<td><?php echo $row['model']; ?></td>
				    	<td><?php echo $row['uom']; ?></td>
				    	<td><?php echo $row['purchase_cost_per_unit']; ?></td>
				    	<td><?php echo $row['sales_price_per_unit']; ?></td>
				    	<!-- <td><?php echo $row['warehouse_stock']; ?></td>
				    	<td><?php //echo $row['shop_stock']; ?></td>
				    	<td><?php //echo $row['total_stock']; ?></td>
				    	<td><?php //echo $row['stock_value_on_purchase']; ?></td>
				    	<td><?php //echo $row['stock_value_on_sale']; ?></td> -->
				    	<td><a href="update_price_list.php?sl_no=<?php echo $row['sl_no']; ?>"><i class="fa fa-edit"style="color:green;"></i></a> &nbsp; <a href="delete_inventory_item.php?sl_no=<?php echo $row['sl_no']; ?>" onclick="return confirmDelete();"><i class="fa fa-trash"style="color:red;"></i></a></td>
				    	

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
<script type='text/javascript'>
	function confirmDelete()
	{
		return confirm("Do you sure want to delete inventory item?");
	}
</script>
</body>
</html>
	
	
	
