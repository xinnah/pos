<?php
error_reporting(0);
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'pos'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
	if(!isset($_SESSION["username"])){
		header("Location: index.php");
	}

 ?>
	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<!-- jquery ajax live search -->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#barcode").keyup(function(){
			var barcode = $("#barcode").val();
			$.ajax({
				type:"POST",
				url:"replacement_search_result.php",
				data:{barcode:barcode},
				success:function(res){
					$("#userslist").html(res);
				}
			});
		});
	});
</script>
<!-- jquery ajax live search end -->
<!-- search phone number -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#customer_phone").keyup(function(){
			var customer_phone = $("#customer_phone").val();
			$.ajax({
				type:"POST",
				url:"replacement_search_phone_number.php",
				data:{customer_phone:customer_phone},
				success:function(res){
					$("#usersphone").html(res);
				}
			});
		});
	});
</script>



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
						<h2>replacement</h2>
					</div><!--  -->
					
					<div class="row">
						<div class="col-md-6 no_padding">
							<div id="crop">
								<div class="search_invoice">
									<form class="navbar-form" role="search">
								        <div class="form-group">
								          <label>Search For Invoice :</label>
								          <input type="text" class="form-control" name="username" placeholder="Type The Barcode.." id="barcode"><i class="fa fa-search"></i>
								        </div>
								        
								    </form>
								</div>
						
							</div><!--  -->
						</div>
						<div class="col-md-6 no_padding">
							<div class="search_invoice">
								<form class="navbar-form" role="search"style="width:94%;">
							        <div class="form-group">
							        	<label>Search For Invoice :</label>
							          <input type="text" class="form-control" name="customer_phone" placeholder="Type The Customer Phone Number.." id="customer_phone"><i class="fa fa-search"></i>
							        </div>
							        
							    </form>
							</div><!--  -->
						</div>
					</div>
					
				</div><!--  -->

				<div class="replacement_content_container">
					<div class="row">
						<div id="replacementMain"style="overflow:hidden;margin-bottom:35px;">
							<div class="col-md-6">
								<div id="userslist"></div>
							</div><!--  -->
							<div class="col-md-6">
								<div id="usersphone"></div>
							</div><!--  -->
						</div><!--  -->
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

	<?php include('includes/footer.php'); ?>
