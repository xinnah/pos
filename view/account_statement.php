<?php require_once 'start.php'; ?>
<?php 
	use App\Utility\Utility;
	use App\Account\Account;
	use App\Supplier\Supplier;
  	use App\Connection\Connection;

  	$account = new Account();

  	if(strtolower($_SERVER["REQUEST_METHOD"]) == "post"){
  		$invoices = $account->all_invoice_cost($_REQUEST);
  		$overheads = $account->all_overhead_cost($_REQUEST);

  		$replacements = $account->all_replacement($_REQUEST);
  	}else{
  		$invoices = $account->all_invoice_cost();
  		$overheads = $account->all_overhead_cost();

  		$replacements = $account->all_replacement();

  	}
  	// Utility::dd($invoices);
  	$months = $account->show_invoice_month();
  	$year = $account->show_invoice_year();

 ?>
 	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>

<style type="text/css">
	.customer_info .form-group{border: 1px solid #ccc; padding: 2px;}
	.customer_info .form-group label{text-align: right;}
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
					<h2>Account Statement</h2>
				</div><!--  -->
				 <div class="container">
					
				<!-- 	<?php 
					//include('includes/admin_navigationbar.php'); ?> 
				 
				   -->
				</div>
			</div>
		</div>
	</div>
	
</header><!--  -->
<section class="view_container_content">

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
					
				
			</div><!--  -->
			<div class="col-md-8 no_padding">
				<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Account Statement</h4></div>
					  	
					  		<div class="panel-body">
						  		<form class="form-inline" role="form" action="account_statement.php" method="post">
								  <div class="form-group">
								    <input type="text" class="form-control" name="month" id="month" placeholder="Month" value="<?php if(isset($_REQUEST["month"])){echo $_REQUEST["month"];}  ?>">
								  </div>
								  <div class="form-group">
								    <input type="text" class="form-control" name="year" id="year" placeholder="Year" value="<?php if(isset($_REQUEST["year"])){echo $_REQUEST["year"];}  ?>">
								  </div>
								  <button type="submit" class="btn btn-default">Search</button>
								</form>
								<br>
					  			<?php 
							    	$cost_amount = 0;
							    	foreach ($invoices as $invoice) {
							    		$cost_amount += array_sum(explode(",", $invoice->cost_amount));
							    	}

							    	$amount = 0;
							    	foreach ($invoices as $invoice) {
							    		$amount += array_sum(explode(",", $invoice->amount));
							    	}


							    	$overheads_total = 0;
							    	foreach ($overheads as $overhead) {
							    		$overheads_total += $overhead->total_cost;
							    	}

							    	$replacements_cost_adjusted = 0;
							    	$replacements_amount_adjusted = 0;
							    	foreach ($replacements as $replacement) {
							    		$replacements_cost_adjusted += $replacement->cost_adjusted;
							    		$replacements_amount_adjusted += $replacement->amount_to_be_adjusted;
							    	}
							     ?>
								<form class="form-horizontal" action="accounts.php" method="POST">
								  <div class="customer_info">
									  
									  <div class="form-group">
										    <label for="inputsupplierName3" class="col-sm-4 control-label">Total Price Of Sold Items :</label>
										    <div class="col-sm-8">
										      <?php echo $amount -= $replacements_amount_adjusted; ?>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputsupplierPhone4" class="col-sm-4 control-label">Total Cost Of Sold Items :</label>
										    <div class="col-sm-8">
										      <?php echo $cost_amount -= $replacements_cost_adjusted;
										       ?>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputPORefNo4" class="col-sm-4 control-label">Gross Profit:</label>
										    <div class="col-sm-8">
										      <?php echo $gross_profit = $amount-$cost_amount; ?>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputBar4" class="col-sm-4 control-label">Overhead Cost :</label>
										    <div class="col-sm-8">
										      <?php echo $overheads_total; ?>
										    </div>
									  </div>
									  <div class="form-group">
										    <label for="inputName4" class="col-sm-4 control-label">Net Profit :</label>
										    <div class="col-sm-8">
										      <?php echo $gross_profit-$overheads_total; ?>
										    </div>
									  </div>
									  
									</div>
								  
									<a href="accounts.php"><button class="btn btn-success btn-lg"style="margin: 15px auto;margin-left: 323px;">OK</button></a>
								</form>
							
						</div>
					</div><!-- end panel body -->
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
    	"January",
	    "February",
	    "March",
	    "April",
	    "May",
	    "June",
	    "July",
	    "August",
	    "September",
	    "October",
	    "November",
	    "December"
    ];
    $( "#month" ).autocomplete({
      source: availableMontha
    });

    var availableYears = [
      "2016",
      "2017",
      "2018",
      "2019",
      "2020",
      "2021",
      "2022",
      "2023",
      "2024",
      "2025"

    ];
    $( "#year" ).autocomplete({
      source: availableYears
    });
  });
  </script>
</body>
</html>