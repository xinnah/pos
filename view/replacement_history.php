<?php require_once 'start.php'; ?>
<?php 
	use App\Utility\Utility;
	use App\Replacement\Replacement;
?>
	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<link href="css/jquery-ui.min.css" rel="stylesheet">
<link href="css/datepicker.css" rel="stylesheet">
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
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
	<?php 

		$replacement = new Replacement;
		$replaces = $replacement->show_replcement_history();
	 ?>
	<div class="sales_point">
		<h2>Replacement History</h2>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="replacement_history">
				<table class="table table-bordered">
					<thead>
					<tr>
					  <th>SL.</th>
					  <th>Invoice ID</th>
					  <th>Date</th>
					  <th>Previous Item</th>
					  <th>Replaced Item</th>
					  <th>Action</th>
					</tr>
					</thead>
					<tbody>
		<?php $sl =1; ?>
		<?php foreach ($replaces as $replace) : ?>
					<tr>
					  <td><?php echo $sl++; ?></td>
					  <td><?php echo $replace->invoice_no; ?></td>
					  <td><?php echo date("d-m-Y",strtotime($replace->date)); ?></td>
					  <td><?php 
					  	$previous_item = unserialize($replace->previous_item);
					  	echo $previous_item["product_description"]." ".$previous_item["quantity"]." ".$previous_item["uom"]." ";
					   ?></td>
					  <td><?php 
					  	$replaced_item = unserialize($replace->replaced_item);
					  	echo $replaced_item["product_description"]." ".$replaced_item["quantity"]." ".$replaced_item["uom"]." ";
					   ?></td>
					  <td><button class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $replace->id; ?>"><i class="fa fa-edit"></i></button></td>
					</tr>


					<!-- Modal -->
				<div id="myModal<?php echo $replace->id; ?>" class="modal fade" role="dialog">
				  <div class="modal-dialog">

				    <!-- Modal content-->
				    <div class="modal-content">
				      <div class="modal-header bg-deafult">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h4 class="modal-title">Replacement</h4>
				      </div>
				      <div class="modal-body">
				      	<div class="replace_top">
				      		<div class="row">
				      			<div class="col-sm-5 text-left"><b>Replacement Token:</b> <?php echo $replace->id; ?></div>
				      			<div class="col-sm-3 text-center"><b>Invoice No:</b> <?php echo $replace->invoice_no; ?></div>
				      			<div class="col-sm-4 text-right"><b>Date:</b> <?php echo date("d-m-Y",strtotime($replace->date)); ?></div>
				      		</div>
				      	</div>
				      	<br>
				        <div class="row">
				        	<div class="col-sm-12">
				        		<h3 class="text-center">  Previous Item</h3>
				        	<ul class="replace_ul">
				        		<li>Barcode:</li>
				        		<li><?php echo $previous_item["barcode"]; ?></li>

				        		<li>Product:</li>
				        		<li><?php echo $previous_item["product_description"]; ?></li>

				        		<li>Quantity:</li>
				        		<li><?php echo $previous_item["quantity"]." ".$previous_item["uom"]; ?></li>

				        		<li>Price Per Unit:</li>
				        		<li><?php echo $previous_item["price_per_unit"]; ?></li>

				        		<li>Amount:</li>
				        		<li><?php echo $previous_item["amount"]; ?></li>
				        	</ul>

				        <h3 class="text-center">  Replaced Item</h3>

				        	<ul class="replace_ul">
				        		<li>Barcode:</li>
				        		<li><?php echo $replaced_item["barcode"]; ?></li>

				        		<li>Product:</li>
				        		<li><?php echo $replaced_item["product_description"]; ?></li>

				        		<li>Quantity:</li>
				        		<li><?php echo $replaced_item["quantity"]." ".$replaced_item["uom"]; ?></li>

				        		<li>Price Per Unit:</li>
				        		<li><?php echo $replaced_item["price_per_unit"]; ?></li>

				        		<li>Amount:</li>
				        		<li><?php echo $replaced_item["amount"]; ?></li>
							</ul>
				      </div>
				        	</div>
				        </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>

				  </div>
				</div>



		<?php endforeach; ?>			
					</tbody>
				</table>



				


				</div>
			</div>
		</div>
	</div>

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
