<?php require_once 'start.php'; ?>
	<?php include('config.php'); ?>
	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
	<link href="css/jquery-ui.min.css" rel="stylesheet">
	<link href="css/datepicker.css" rel="stylesheet">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
	<style type="text/css">
		tbody th{ font-weight: normal;}
	
	</style>

<?php 
	
	if(!isset($_GET['customer_id'])){
		header('Location:customer_payment.php');
	}else{
		$customer_id = $_REQUEST['customer_id'];
	}


 ?>

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
					<h2>Customer Payment History</h2>
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
<section class="view_container_content">
	<div class="container content">
		<div class="cus_pay_his_container"style="font-size:14px;">
			<div class="row"style="padding:5px;">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					
					<div class="clearfix"></div>
					<br /><br />
					
					<table id="example" class="table table-striped table-bordered">
					  <thead>
					    <tr style="background: #2BAEA8;">
					    	<th>Sl No.</th>
					    	<th>Date</th>
					    	<th>Time</th>
					    	<th>Amount</th>
					    	<th>Notes</th>
					    	<th>Received By</th>
					    	
					    </tr>
					  </thead>
					  
					  <tbody> 
					  <?php 
					  	$i=0;
					  	$data["pay_time_date"] = date("Y-m-d H:i:s",time());
					  	$startement = $db->prepare("SELECT * FROM customer_payment WHERE customer_id=? ORDER BY id DESC");
				            $startement->execute(array($customer_id));
				            $result = $startement->fetchAll(PDO::FETCH_ASSOC);
				            foreach ($result as $row) {
				            	$i++;
					   ?> 
					    <tr>
					    	<td><?php echo $i; ?></td>
					    	<td><?php echo date("d-m-Y",strtotime($row['pay_time_date']));  ?></td>
					    	<th><?php echo date("H:i a",strtotime($row['pay_time_date']));  ?></th>
					    	<th><?php echo $row['pay_amount']; ?></th>
					    	<th><?php echo $row['notes']; ?></th>
					    	<th><?php echo $row['received_by']; ?></th>
					    	
					    	

					    </tr>
					    <?php 
					    	}
					   	?>
					    
					  </tbody>  
				            
					</table>
				
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
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="js/jquery.min.js"></script>

    <script src="js/bootstrap-datepicker-search.js"></script>
    
	<script src="js/dataTables.bootstrap-search.min.js"></script>
	<script src="js/jquery.dataTables-search.min.js"></script>
	<script src="js/script-search.js"></script>

</body>
</html>
	
	
	
