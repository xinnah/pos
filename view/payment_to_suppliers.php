<?php require_once 'start.php'; 
	use App\Utility\Utility;
?>
	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<!-- jquery ajax live search -->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#supplier_name").keyup(function(){
			var supplier_name = $("#supplier_name").val();
			$.ajax({
				type:"POST",
				url:"payment_to_suppliers_result.php",
				data:{supplier_name:supplier_name},
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
						<h2>Supplier Payments</h2>
					</div><!--  -->
					
					<div id="crop">
						<div class="search_invoice center_search_long">
							<form class="navbar-form" role="search">
						        <div class="form-group">
						        	<label>Search Supplier Payments:</label>
						          <input type="text" class="form-control" name="username" placeholder="Type Supplier Name.." id="supplier_name"><i class="fa fa-search"></i>
						        </div>
						        
						    </form>
						</div>
						<?php echo Utility::message(); ?>
						<div id="userslist"></div>
					</div><!--  -->
					
				</div><!--  -->

				
			</div>
		</div>
	</div>
</section>
<?php include('includes/footer.php'); ?>
