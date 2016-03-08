<?php require_once 'start.php'; ?>
	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<!-- jquery ajax live search -->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#customer_phone").keyup(function(){
			var customer_phone = $("#customer_phone").val();
			
			
			$.ajax({
				type:"POST",
				url:"invoice_search_result.php",
				data:{customer_phone:customer_phone},
				success:function(res){
					$("#userslist").html(res);
				}
			});
		});
	});
</script>
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
	<div class="container">
	<!-- 	<?php //include('includes/admin_navigationbar.php'); ?>  -->
	</div>
	
</header><!--  -->
<!-- nav start -->

<section style="width:100%;overflow:hidden;min-height: 500px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="sales_manager_content">
					<div class="sales_point">
						<h2>search invoice</h2>
					</div><!--  -->
					
					<div id="crop">
						<div class="search_invoice">
							<form class="navbar-form" role="search">
						        <div class="form-group">
						        	<label>Search For Invoice :</label>
						          <input type="text" class="form-control" name="username" placeholder="Type The Customer Phone Number.." id="customer_phone"><i class="fa fa-search"></i>
						        </div>
						        
						    </form>
						</div>
						<div id="userslist"></div>
					</div><!--  -->
					
				</div><!--  -->

				
			</div>
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>
