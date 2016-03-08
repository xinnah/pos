<?php 
	require_once 'start.php';
	use App\Utility\Utility; 
	use App\Summary\Summary;

?>
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
	<?php include('includes/main_nav.php'); ?>
	
</header><!--  -->
<!-- nav start -->

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sales_manager_content">
					<div class="sales_point">
					<h2>inventory</h2>
				</div><!--  -->
					<div class="col-md-6">
						<div class="sales_manager_left">
							<ul>
								<li> <button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="add_items_to_inventory.php">add items to inventory</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="add_item_from_csv.php">Add Item From CSV</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="item_movements.php">item movements</a> </button></li>
								<br>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="receive_purchase_orders.php">receive purchase orders</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="view_stock.php">view stock</a> </button></li>
								
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="inventory_location_transfer.php">inventory location transfer</a> </button></li>
								<br>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="add_new_category.php">add new category</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="add_new_brand.php">add new brand</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="add_new_location.php">add new location</a> </button></li>
								
								<br>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="units_of_measurement.php">units of measurement</a> </button></li>
								
								<!-- <li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="update_price_list.php">update price list</a> </button></li> -->
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="price_list.php">price list</a> </button></li>
								
							</ul>
						</div>
					</div><!--  -->
					<div class="col-md-6">
						<div class="sales_manager_right">
							
							<div class="col-md-12">
								<div class="low_stock">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									  <div class="panel panel-info no_margin">
									    <div class="panel-heading" role="tab" id="headingOne">
									      <h4 class="panel-title">
									        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									          <h4 style="text-align:center">low stock</h4>
									        </a>
									      </h4>
									    </div>
									    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									      <div class="panel-body">
									        <div class="table-responsive">
											  <table class="table">
											    <tr style="background: #2BAEA8;">
											    	<th>sl no.</th>
											    	<th>product</th>
											    	<th>qty</th>
											    </tr>
											    <?php 
											    	$summary = new Summary;
											    	$low_stock = $summary->low_stock_summary();
											    	$sl=1;
											    	foreach ($low_stock as $stock) {
											    ?>
											    	<tr>
												    	<td><?php echo $sl++; ?></td>
												    	<td><?php echo $stock->product_name; ?></td>
												    	<td><?php echo $stock->total_stock." ".$stock->uom; ?></td>
												    </tr>
											    <?php
											    		# code...
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
					</div><!--  -->
				</div>
			</div>
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>
