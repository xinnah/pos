<?php 
	require_once 'start.php';
	use App\Utility\Utility; 
	use App\Summary\Summary;
	use App\Supplier\Supplier;

?>
	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<style type="text/css">
	.btn-default.active, .btn-default.focus, .btn-default:active, .btn-default:focus, .btn-default:hover, .open>.dropdown-toggle.btn-default {width: 100%}
	.btn-default{border:none;width: 100%;}
</style>
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

<section style="min-height:500px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sales_manager_content">
					<div class="sales_point">
					<h2>purchase</h2>
				</div><!--  -->
					<div class="col-md-7">
						<div class="sales_manager_left">
							<ul>
								<li> <button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="add_purchase_orders.php">new purchase order</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="search_purchase_orders.php">search purchase order</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="receive_purchase_orders.php">receive purchase order</a> </button></li>
								<br>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="payment_to_suppliers.php">payment to suppliers</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="out_standing_purchase_order.php">out standing purchase order</a> </button></li>
								
								
								<br>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="add_new_supplier.php">add new supplier</a> </button></li>
								
							</ul>
						</div>
					</div><!--  -->
					<div class="col-md-5">
						<div class="sales_manager_right">
							
							<div class="col-md-12">
								<div class="pending_purchase">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									  <div class="panel panel-info no_margin">
									    <div class="panel-heading" role="tab" id="headingOne">
									      <h4 class="panel-title">
									        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									          <h4>pending purchase</h4>
									        </a>
									      </h4>
									    </div>
									    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
									      <div class="panel-body">
									      <?php 
								      		$summary = new Summary;
								      		$pending_purchase = $summary->pending_purchase_order();
								      		
								      		$sl = 1;
								      		foreach ($pending_purchase as $purchase) {
								      	 ?>
									        <h4><?php echo $sl++; ?> . <?php echo $purchase->po_date." ".$purchase->product_description; ?></h4>
										<?php 
											}
										 ?>
									      </div>
									    </div>
									  </div>
									</div>  
								</div>	
								<div class="outstanding_orders">
								  <div class="panel panel-info no_margin">
								    <div class="panel-heading" role="tab" id="headingTwo">
								      <h4 class="panel-title">
								        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								          <h4>outstanding orders</h4>
								        </a>
								      </h4>
								    </div>
								    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								      <div class="panel-body">
								      <?php 
								      	$outstanding_summary = $summary->outstanding_order_summary();
								       	$sl = 1;
							      		foreach ($outstanding_summary as $outstanding) {
							      	   ?>
									        
									        <!-- Button trigger modal -->
											<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal<?php echo $outstanding->id; ?>">
											  <h4><?php echo $sl++; ?> . <?php echo $outstanding->po_date." ".$outstanding->product_description; ?></h4>
											</button>

											<!-- Modal -->
											<div class="modal fade" id="myModal<?php echo $outstanding->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
											  <div class="modal-dialog" role="document">
											    <div class="modal-content">
											      <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											        <h4 class="modal-title" id="myModalLabel">Outstanding Orders</h4>
											      </div>
											      <div class="modal-body">
										      		<form class="form-horizontal">
													  <div class="form-group">
													    <label class="col-sm-6 control-label">Date :</label>
													    <div class="col-sm-6">
													      <input type="text" class="form-control" value="<?php echo $outstanding->po_date; ?>" readonly>
													    </div>
													  </div>
													  <div class="form-group">
													    <label class="col-sm-6 control-label">Purchase Order No:</label>
													    <div class="col-sm-6">
													      <input type="text" class="form-control" value="<?php echo $outstanding->purchase_order_no; ?>" readonly>
													    </div>
													  </div>
													  <div class="form-group">
													    <label class="col-sm-6 control-label">Amount:</label>
													    <div class="col-sm-6">
													      <input type="text" class="form-control" value="<?php echo $outstanding->amount; ?>" readonly>
													    </div>
													  </div>
													  <div class="form-group">
													    <label class="col-sm-6 control-label">Vat:</label>
													    <div class="col-sm-6">
													      <input type="text" class="form-control" value="<?php echo $outstanding->vat; ?>" readonly>
													    </div>
													  </div>
													  <div class="form-group">
													    <label class="col-sm-6 control-label">Tax:</label>
													    <div class="col-sm-6">
													      <input type="text" class="form-control" value="<?php echo $outstanding->tax; ?>" readonly>
													    </div>
													  </div>
													  <div class="form-group">
													    <label class="col-sm-6 control-label">Delivery Charge:</label>
													    <div class="col-sm-6">
													      <input type="text" class="form-control" value="<?php echo $outstanding->delivery_charge; ?>" readonly>
													    </div>
													  </div>
													  <div class="form-group">
													    <label class="col-sm-6 control-label">Total Amount:</label>
													    <div class="col-sm-6">
													      <input type="text" class="form-control" value="<?php echo $outstanding->total; ?>" readonly>
													    </div>
													  </div>
													  <div class="form-group">
													    <label class="col-sm-6 control-label">Amount Paid:</label>
													    <div class="col-sm-6">
													      <input type="text" class="form-control" value="<?php echo $outstanding->paid; ?>" readonly>
													    </div>
													  </div>
													  <div class="form-group">
													    <label class="col-sm-6 control-label">Amount Due:</label>
													    <div class="col-sm-6">
													      <input type="text" class="form-control" value="<?php echo $outstanding->due; ?>" readonly>
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


										<?php 
										  	}
										 ?>
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
