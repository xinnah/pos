<?php require_once 'start.php'; ?>
	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<!-- jquery ajax live search -->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#customer_name").keyup(function(){
			var customer_name = $("#customer_name").val();
			$.ajax({
				type:"POST",
				url:"delivery_sale_order_search_result.php",
				data:{customer_name:customer_name},
				success:function(res){
					$("#userslist").html(res);
				}
			});
		});
	});
</script>
<!-- end Search Sales Orders -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#username1").keyup(function(){
			var username1 = $("#username1").val();
			$.ajax({
				type:"POST",
				url:"delivery_receipts_search_result.php",
				data:{username1:username1},
				success:function(res){
					$("#userslist1").html(res);
				}
			});
		});
	});
</script>
<!-- end Search Delivery Receipts -->
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
	<div class="container">
	<!-- 	<?php //include('includes/admin_navigationbar.php'); ?>  -->
	</div>
	
</header><!--  -->
<!-- nav start -->

<section style="width:100%;overflow:hidden;min-height: 500px;">
	<div class="container no_padding">
		<div class="row no_padding">
			<div class="col-md-12">
				<div class="sales_manager_content">
					<div class="sales_point">
						<h2>delivery against order</h2>
					</div><!--  -->
					
					<div class="row no_padding">
						<div class="col-md-6 no_padding">
							<div class="search_sO">
								<form class="navbar-form" role="search"style="width:94%;">
							        <div class="form-group">
							        	<label>Search Sales Orders :</label>
							          <input type="text" class="form-control" name="username" placeholder="Search" id="customer_name"><i class="fa fa-search"></i>
							        </div>
							        
							    </form>
							</div><!--  -->
						</div>	
						<div class="col-md-6 no_padding">
							<div class="search_dR">
								<form class="navbar-form" role="search"style="width:94%;">
							        <div class="form-group">
							        	<label>Search Delivery Receipts :</label>
							          <input type="text" class="form-control" name="username1" placeholder="Search" id="username1"><i class="fa fa-search"></i>
							        </div>
							        
							    </form>
							</div><!--  -->
						</div>	
					</div>
					
				</div><!--  -->

				<div class="replacement_content_container">
					<div class="row no_padding no_margin">
						<div class="col-md-6 no_padding">
							<div id="userslist"></div>
						</div><!--  -->

						<div class="col-md-6 no_padding">
							<div id="userslist1"></div>
						</div><!--  -->
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>
