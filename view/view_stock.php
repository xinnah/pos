<?php require_once 'start.php'; ?>
	<?php include('config.php'); ?>
	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
	<link href="css/jquery-ui.min.css" rel="stylesheet">
<link href="css/datepicker.css" rel="stylesheet">
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<style type="text/css">
	tbody{font-size: 14px;}
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
					<h2>Stock</h2>
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
				
				<table id="example" class="table table-striped table-bordered"style="font-size:15px;">
				  <thead>
				    <tr style="background: #2BAEA8;">
				    	<th>Sl No.</th>
				    	<th>Product Code</th>
				    	<th>Barcode</th>
				    	<th>Product Name</th>
				    	<th>Category</th>
				    	<th>Brand</th>
				    	<th>Model</th>
				    	<th>Specification</th>
				    	<!-- <th>P.O.Ref.</th>
				    	<th>UOM</th>
				    	<th>Purchase Cost/Unit</th>
				    	<th>Sales Price/Unit</th>
				    	<th>Warehouse</th>
				    	<th>Shop</th>
				    	<th>Total</th>
				    	<th>Stock Value( Purchase Price)</th>
				    	<th>Stock Value( Sales Price)</th>
				    	<th>Product Added by</th> -->
				    	<th>Action</th>
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
				   ?> 
				    <tr>
				    	<td><?php echo $i; ?></td>
				    	<td><?php echo $row['product_code']; ?></td>
				    	<td><?php echo $row['barcode']; ?></td>
				    	<td><?php echo $row['product_name']; ?></td>
				    	<td><?php echo $row['category']; ?></td>
				    	<td><?php echo $row['brand']; ?></td>
				    	<td><?php echo $row['model']; ?></td>
				    	<td><?php echo $row['specification']; ?></td><!-- 
				    	<td><?php// echo $row['purchase_order_ref']; ?></td>
				    	<td><?php// echo $row['uom']; ?></td>
				    	<td><?php// echo $row['purchase_cost_per_unit']; ?></td>
				    	<td><?php// echo $row['sales_price_per_unit']; ?></td>
				    	<td><?php// echo $row['warehouse_stock']; ?></td>
				    	<td><?php// echo $row['shop_stock']; ?></td>
				    	<td><?php// echo $row['total_stock']; ?></td>
				    	<td><?php// echo $row['stock_value_on_purchase']; ?></td>
				    	<td><?php// echo $row['stock_value_on_sale']; ?></td>
				    	<td><?php// echo $row['added_by']; ?></td> -->
				    	<td>
				    		
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $row['sl_no']; ?>">
							  View
							</button>

							<!-- Modal -->
							<div class="modal fade" id="myModal<?php echo $row['sl_no']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">View Stock</h4>
							      </div>
							      <div class="modal-body">
							        <form class="form-horizontal">
							        	<div class="form-group">
							        		<label class="col-sm-5">Product Code :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['product_code']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">BarCode :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['barcode']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">Product Name :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['product_name']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">Category :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['category']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">Brand :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['brand']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">Model :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['model']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">Specification :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['specification']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">P.O.Ref. :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['purchase_order_ref']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">UOM :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['uom']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">Purchase Cost/Unit :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['purchase_cost_per_unit']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">Purchase Sales/Unit :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['sales_price_per_unit']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">Warehouse :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['warehouse_stock']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">Shop :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['shop_stock']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">Total Stock :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['total_stock']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">Stock Value (Purchase Cost Price) :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['stock_value_on_purchase']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">Stock Value (Purchase Sales Price) :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['stock_value_on_sale']; ?>"readonly>	
							        		</div>
							        	</div>
							        	<div class="form-group">
							        		<label class="col-sm-5">Product Added By :</label>
							        		<div class="col-sm-7">
							        			<input class="form-control" type="text" value="<?php echo $row['added_by']; ?>"readonly>	
							        		</div>
							        	</div>
							        </form>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
							        
							      </div>
							    </div>
							  </div>
							</div>
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
	
	
	
