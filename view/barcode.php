<?php require_once 'start.php'; ?>
	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<!-- jquery ajax live search -->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>

<!-- jquery ajax live search end -->




<header class="header_section">
	<!-- top header -->
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php include('includes/header_top.php'); ?>
				
			</div>
		</div>
	</div><!--  -->
	<?php include('includes/main_nav.php'); ?>
	<!-- main_nav -->
	
	
</header><!--  -->
<!-- nav start -->

<section style="width:100%;overflow:hidden;min-height: 500px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sales_manager_content">
					<div class="sales_point">
						<h2>Barcode Generator</h2>
					</div><!--  -->
					
					
						<div class="search_barcode">
							<form class="form-horizontal" action="prosesbarcode.php" method="post">
						        <div class="form-group">
								    <label for="inputbarcode" class="col-sm-2 control-label">Form Input Barcode :</label>
								    <div class="col-sm-7">
								      <input type="text" name="bar" class="form-control" id="inputbarcode" placeholder="Type Barcode">
								    </div>
								  </div>
								  
								  <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button type="submit" class="btn btn-success">Add</button>
								    </div>
								  </div>
						    </form>
						</div>
					

					
					
				</div><!--  -->

				
			</div>
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>
