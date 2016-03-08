<?php require_once 'start.php'; ?>

<?php 
    use App\Utility\Utility;
    use App\Inventory\Inventory; 
    $inventory = new Inventory();

    if(isset($_REQUEST["submit"])){
        $inventory->import_csv($_FILES["csv"]);
    }elseif(isset($_REQUEST["download"])){
        $inventory->export_csv();
    }
?>
<?php include('includes/all_link_body.php'); ?>

<style type="text/css">
	.fa{font-size: 15px;}
	p{color: red;text-align: center;}
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
					<h2>Add Item From CSV</h2>
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
							  

<section style="min-height:503px;">
	<div class="container">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8 no_padding">
				<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">CSV</h4></div>
					  		
					  	<div class="panel-body">
					  		<?php echo Utility::message(); ?>
					  		<div>

							  <!-- Nav tabs -->
							  <ul class="nav nav-tabs" role="tablist">
							    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">CSV Upload</a></li>
							    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">CSV Download</a></li>
							    
							  </ul>

							  <!-- Tab panes -->
							  <div class="tab-content"style="min-height:200px;margin-top:10px;">
							    <div role="tabpanel" class="tab-pane active" id="home">
							    	
							    	<form class="form-horizontal" action="add_item_from_csv.php" method="post" enctype="multipart/form-data" >
									  <div class="form-group">
									    <label for="inputProductName3" class="col-sm-4 control-label">Choose CSV File:</label>
									    <div class="col-sm-8">
									      <input type="file" name="csv" class="form-control" id="inputProductName3" value="" >
									    </div>
									  </div>
									  
									  <div class="form-group">
									    <div class="col-sm-offset-4 col-sm-8">
									      <button class="btn btn-success" type="submit" name="submit">Upload</button>
									    </div>
									  </div>
									</form>
							    </div><!--  -->

							    <div role="tabpanel" class="tab-pane" id="profile">
							    <form class="form-horizontal" action="add_item_from_csv.php" method="post" enctype="multipart/form-data" >
							    	<div class="form-group">
									    <div class="col-sm-offset-5 col-sm-7">
									      <button class="btn btn-success" type="submit" name="download">Download</button>
									    </div>
									  </div>
								</form>
							    </div>
							  </div>

							</div>
							
						</div><!-- end panel body -->
					</div>
					  	
					
			</div>
			<div class="col-md-2"></div>	
			
		</div>
	</div>
</section>
   
   <?php include('includes/footer.php'); ?>
