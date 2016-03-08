<?php require_once 'start.php'; ?>
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

<section class="accounts_section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sales_manager_content">
					<div class="sales_point">
					<h2>accounts</h2>
				</div><!--  -->
					<div class="col-md-7">
						<div class="accounts_manager_left">
							<ul>
								<li> <button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="purchase_cost.php">Purchase</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="overheads.php">Overheads</a> </button></li>
								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="sales_cost.php">Sales</a> </button></li>

								<li><button class="btn btn-info" style="width:60%;margin: 1px 0;"><a href="account_statement.php"> Account Statement</a> </button></li>
								
								
							</ul>
						</div>
					</div><!--  -->
					<div class="col-md-5">
						<div class="sales_manager_right">
							
							<div class="col-md-12">
									
								
						</div>
					</div><!--  -->
				</div>
			</div>
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>
