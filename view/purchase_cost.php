<?php require_once 'start.php'; ?>
<?php 
	use App\Utility\Utility;
	use App\Account\Account;
	use App\Supplier\Supplier;
  	use App\Connection\Connection;

  	$account = new Account();
	$suppliers = new Supplier();

  	if(strtolower($_SERVER["REQUEST_METHOD"]) == "post"){
  		$purchase_orders = $account->all_purchase_order_cost($_REQUEST);
  	}else{
  		$purchase_orders = $account->all_purchase_order_cost();

  	}

  	$months = $account->show_purchase_order_month();
  	$year = $account->show_purchase_order_year();

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
					<h2>Purchase Cost</h2>
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

			<div class="col-md-4 no_padding">

				<div class="accounts_manager_left">
					<ul>
						<li> <button class="btn btn-info" style="width:90%;margin: 1px 0;"><a href="purchase_cost.php">Purchase</a> </button></li>
						<li><button class="btn btn-info" style="width:90%;margin: 1px 0;"><a href="overheads.php">Overheads</a> </button></li>
						<li><button class="btn btn-info" style="width:90%;margin: 1px 0;"><a href="sales_cost.php">Sales</a> </button></li>

						<li><button class="btn btn-info" style="width:90%;margin: 1px 0;"><a href="account_statement.php"> Account Statement</a> </button></li>
						
						
					</ul>
				</div>

					

			</div>
			<div class="col-md-8 no_padding">
				<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Purchase Cost</h4></div>
					  		
					  	<div class="panel-body">
					  		<div class="top_month_section">
						  		<form class="form-inline" role="form" action="purchase_cost.php" method="post">
								  <div class="form-group">
								    <input type="text" class="form-control" name="month" id="month" placeholder="Month" value="<?php if(isset($_REQUEST["month"])){echo $_REQUEST["month"];}  ?>">
								  </div>
								  <div class="form-group">
								    <input type="text" class="form-control" name="year" id="year" placeholder="Year" value="<?php if(isset($_REQUEST["year"])){echo $_REQUEST["year"];}  ?>">
								  </div>
								  <button type="submit" class="btn btn-default">Search</button>
								</form>
						  	</div>
						  	<br>
							<div class="table-responsive">
							  <table class="table">
							    <tr style="background: #2BAEA8;">
							    	<th>Sl No.</th>
							    	<th>P.O No. </th>
							    	<th>Date</th>
							    	<th>Supplier Name</th>
							    	<th>Purchase Costing</th>
							    </tr>
							    <?php 
							    	
							    	$sl = 1;
							    	$total = 0;
							    	foreach ($purchase_orders as $purchase_order) {
							    ?>
								    <tr>
								    	<td><?php echo $sl++; ?></td>
								    	<td><?php echo $purchase_order->purchase_order_no; ?></td>
								    	<td><?php echo date("d-m-Y",strtotime($purchase_order->po_date)); ?></td>
								    	<td><?php $supplier = $suppliers->show_supplier($purchase_order->supplier_id); ?>
								    	<?php if(isset($supplier->supplier_name)){ echo $supplier->supplier_name;} ?>
								    	</td>
								    	<td><?php echo $purchase_order->total; $total += $purchase_order->total; ?></td>
								    	
								    </tr>
							    <?php
							    	}
							     ?>
							     <tr>
							     	<td colspan="3"></td>
							     	<td>Total:</td>
							     	<td><?php echo $total; ?></td>
							     </tr>
							  </table>
							</div><!--  -->	
							<a href="accounts.php"><input class="btn btn-success btn-lg" type="submit" name="add" value="Ok"style="margin: 15px auto;margin-left: 323px;"></a>
						</div><!-- end panel body -->
					</div>
					  	
					
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
<script src="js/wow.min.js"></script>
<script type="text/javascript" src="js/scriptanother.js"></script>

<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<script src="js/jquery-ui.min.js"></script>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script src="js/bootstrap-datepicker.js"></script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>



<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
	});/**/
	
	
</script>
<script>
   $(document).ready(function(){
	   $(window).bind('scroll', function() {
	   var navHeight = $( window ).height() - 550;
			 if ($(window).scrollTop() > navHeight) {
				 $('nav').addClass('fixed');
			 }
			 else {
				 $('nav').removeClass('fixed');
			 }
		});
	});/*end scroll*/
   $('#myModal').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	});/*end modal*/

</script>
<script>
  $(function() {
    var availableMontha = [
      <?php echo '"'.implode('", "', $months).'"'; ?>
    ];
    $( "#month" ).autocomplete({
      source: availableMontha
    });

    var availableYears = [
      <?php echo '"'.implode('", "', $year).'"'; ?>
    ];
    $( "#year" ).autocomplete({
      source: availableYears
    });
  });
  </script>
</body>
</html>