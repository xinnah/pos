<?php require_once 'start.php'; ?>
<?php 
	use App\Utility\Utility;
	use App\Account\Account;
	use App\Supplier\Supplier;
  	use App\Connection\Connection;

  	$account = new Account();

  	if(strtolower($_SERVER["REQUEST_METHOD"]) == "post"){
  		$overheads = $account->all_overhead_cost($_REQUEST);

  	}else{
  		$overheads = $account->all_overhead_cost();

  	}

  	$months = $account->show_overhead_month();
  	$year = $account->show_overhead_year();

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
					<h2>Overheads</h2>
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
					  <div class="panel-heading"><h4 style="text-align:center;">Overheads</h4></div>
					  	
					  	<div class="panel-body">
							<form class="form-inline" role="form" action="overheads.php" method="post">
								<div class="form-group">
									<input type="text" class="form-control" name="month" id="month" placeholder="Month" value="<?php if(isset($_REQUEST["month"])){echo $_REQUEST["month"];}  ?>">
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="year" id="year" placeholder="Year" value="<?php if(isset($_REQUEST["year"])){echo $_REQUEST["year"];}  ?>">
								</div>
									<button type="submit" class="btn btn-default">Search</button>
							</form>
							<br>
							<div class="table-responsive">
							  <table class="table">
							    <tr style="background: #2BAEA8;">
							    	<th>Sl No.</th>
							    	<th>Date</th>
							    	<th>Cost Label</th>
							    	<th>Notes</th>
							    	<th>Cost Value</th>
							    	
							    </tr>
							    <?php
							    	$total = 0;
							    	$i = 0;
							    	foreach ($overheads as $overhead) {
							    		$i++;
							    ?>
							    <tr>
							    	<td><?php echo $i;  ?></td>
							    	<td><?php echo date("d-m-Y", strtotime($overhead->date));  ?></td>
							    	<td><?php echo $overhead->cost_label;  ?></td>
							    	<td><?php echo $overhead->notes;  ?></td>
							    	<td><?php echo $overhead->total_cost; $total += $overhead->total_cost; ?></td>
							    </tr>
							    <?php
							    	}
							     ?>
							     <tr>
							     	<td colspan="3"></td>
							     	<td>Total</td>
							     	<td><?php echo $total; ?></td>
							     </tr>
							  </table>
							</div><!--  -->	
							
						</div>
						<a href="accounts.php"><input class="btn btn-success btn-lg" type="submit" name="add" value="Ok"style="margin: 15px auto;margin-left: 323px;"></a>
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