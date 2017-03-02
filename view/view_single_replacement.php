<?php
error_reporting(0);
    session_start();
    include_once $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'pos'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';
	if(!isset($_SESSION["username"])){
		header("Location: index.php");
	}

 ?>
<?php 
	use App\Utility\Utility;
	use App\Replacement\Replacement;
	use App\Customer\Customer;

	$customers = new Customer;
	$replacement = new Replacement;

	if(isset($_REQUEST["id"])){
		$id = $_REQUEST["id"];
		$replacements = $replacement->show_replacement($id);
		$customer = $customers->show_customer($replacements->customer_id);
	}
?>

<!-- link include -->
<?php include('includes/all_link_body.php'); ?>
<link rel="stylesheet" type="text/css" href="css/print.css">
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
					<h2>Quotation</h2>

				</div><!--  -->
				<div class="navbar navbar-default" role="navigation">
				  <div class="container">
				    <!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      
				    </div>

				    <!-- Collect the nav links, forms, and other content for toggling -->
				    <div class="collapse navbar-collapse no_padding" id="bs-example-navbar-collapse-1">
				    	
				      <ul class="nav navbar-nav">
				      	
				        <li class=""><a href="add_quotation.php" data-toggle="tooltip" data-placement="bottom" title="Add"><img src="img/icon/add.png"> </a></li>
				        <li class=""><a href="#" data-toggle="tooltip" data-placement="bottom" title="Delete"><img src="img/icon/Files-Delete-File-icon.png"></a></li>
				        <li class=""><a href="replacement.php" data-toggle="tooltip" data-placement="bottom" title="Replacement"><img src="img/icon/refresh-icon.png"></a></li>
				        <li><h3 class="bdt_price">BDT <p class="navbar_total_price" name="spTotalPrice"><b><output id="total5" for="change">0</output></b></p>.00</h3></li>
				      </ul>
				      
				      <ul class="nav navbar-nav navbar-right">

				        <!-- <li class=""><a href="#" data-toggle="tooltip" data-placement="bottom" title="Barcode"><img src="img/icon/barcode-scanner_318-47243.png"></a></li> -->
				        <li>
				            <img src="img/icon/barcode-scanner_318-47243.png" class="barcode fa fa-search barcode-btn">
				            <div class="barcode-open" style="display:none;" >
				              <div class="input-group animated fadeInDown" >
				                <input type="text" class="form-control" placeholder="Search" style="border-radius: 5px;width:195px;padding-right: 39px;">
				                <span class="input-group-btn">
				                  <button class="btn-u" type="button"style="border-color: #6899B2;">Go</button>
				                </span>
				              </div>
				            </div>    
				        </li>
				        <li class=""><a href="#" data-toggle="tooltip" data-placement="bottom" title="View"><img src="img/icon/86-Folder-512.png"></a></li>
				        <li>
				            <img src="img/icon/search.png" class="search fa fa-search search-btn">
				            <div class="search-open" style="display:none;" >
				              <div class="input-group animated fadeInDown" >
				                <input type="text" class="form-control" placeholder="Search" style="border-radius: 5px;width:195px;padding-right: 39px;">
				                <span class="input-group-btn">
				                  <button class="btn-u" type="button"style="border-color: #6899B2;">Go</button>
				                </span>
				              </div>
				            </div>    
				        </li>
				        
				      </ul>
				    </div><!-- /.navbar-collapse -->
				  </div><!-- /.container-fluid -->
				</div> 

				 
			</div>
		</div>
	</div>
</header><!--  -->
<section class="view_container_content">
	<div class="container" style="background:#fff;border-radius: 10px;">
		<div class="row">
			<div class="col-md-12 no_padding">
				<div class="all_page">
					<div id="print">
						<div class="logo_section">
							<div class="logo_left">
								<h3>Korea IT</h3>
								<p style="margin-bottom:10px;">Nikunja-2 Khilkhet Dhaka</p>
							</div><hr>
							<div class="invoice_right">
								<div class="quo">
									<p class="left">Invoice No.</p>
									<p class="right">KITIN - <?php echo $replacements->invoice_no; ?></p>
								</div>
								
							</div>
						</div>
						<div class="address_section">
							
							<div class="left_section">
								<div class="cus_date">
									<p class="left">Date:</p>
									<p class="right"><?php echo date("d-m-Y",strtotime($replacements->date)); ?></p>
								</div>
								<div class="cus_name">
									
									<p class="left">Customer Name:</p>
									<p class="right"><?php echo  $customer->customer_name; ?></p>
								</div>
								<div class="cus_phone">
									<p class="left">Customer Phone:</p>
									<p class="right"><?php echo  $customer->customer_phone; ?></p>
								</div>
								<div class="cus_address">
									<p class="left">Customer Adress:</p>
									<p class="right"><?php echo  $customer->customer_address; ?></p>
								</div>
								
							</div>
							<div class="right_section">
								<div class="notes">
									<p>Notes:</p>
									<p><?php echo $replacements->notes; ?></p>
								</div>
							</div>
						</div>
						<?php 
							$previous_item = unserialize($replacements->previous_item);
						 ?>
						<div class="replace_section">
							<div class="to_be_replace_section">
								<h3>To Be Replace</h3>
								<div class="single_show_item">			
									<p class="left">Barcode :</p>
									<p class="right"><?php echo $previous_item["barcode"]; ?></p>
								</div>
								<div class="single_show_item">			
									<p class="left">Product Description :</p>
									<p class="right"><?php echo $previous_item["product_description"]; ?></p>
								</div>
								<div class="single_show_item">			
									<p class="left">UOM :</p>
									<p class="right"><?php echo $previous_item["uom"]; ?></p>
								</div>
								<div class="single_show_item">			
									<p class="left">Cost Per Unit :</p>
									<p class="right"><?php echo $previous_item["cost_per_unit"]; ?></p>
								</div>
								<div class="single_show_item">			
									<p class="left">Price Per Unit :</p>
									<p class="right"><?php echo $previous_item["price_per_unit"]; ?></p>
								</div>
								<div class="single_show_item">			
									<p class="left">Quantity :</p>
									<p class="right"><?php echo $previous_item["quantity"]; ?></p>
								</div>
								<div class="single_show_item">			
									<p class="left">Price :</p>
									<p class="right"><?php echo $previous_item["amount"]; ?></p>
								</div>
							</div>
							<?php 
								$replaced_item = unserialize($replacements->replaced_item);
							 ?>
							<div class="replaced_by_section">
								<h3>Replaced By</h3>
								<div class="single_show_item">			
									<p class="left">Barcode :</p>
									<p class="right"><?php echo $replaced_item["barcode"]; ?></p>
								</div>
								<div class="single_show_item">			
									<p class="left">Product Description :</p>
									<p class="right"><?php echo $replaced_item["product_description"]; ?></p>
								</div>
								<div class="single_show_item">			
									<p class="left">UOM :</p>
									<p class="right"><?php echo $replaced_item["uom"]; ?></p>
								</div>
								<div class="single_show_item">			
									<p class="left">Cost Per Unit :</p>
									<p class="right"><?php echo $replaced_item["cost_per_unit"]; ?></p>
								</div>
								<div class="single_show_item">			
									<p class="left">Price Per Unit :</p>
									<p class="right"><?php echo $replaced_item["price_per_unit"]; ?></p>
								</div>
								<div class="single_show_item">			
									<p class="left">Quantity :</p>
									<p class="right"><?php echo $replaced_item["quantity"]; ?></p>
								</div>
								<div class="single_show_item">			
									<p class="left">Price :</p>
									<p class="right"><?php echo $replaced_item["amount"]; ?></p>
								</div>
							</div>
						</div>
						
						<div class="total_amout_section">
							<div class="single_amount_section">
								<p class="left">Vat :</p>
								<p><?php echo $replacements->vat; ?></p>
							</div>
							<div class="single_amount_section">

								<?php if($replacements->amount_to_be_adjusted < 0) : ?>
								<p class="left">Amount Due :</p>
								<p><?php echo $amount = ltrim($replacements->amount_to_be_adjusted,"-"); ?> (
									<script src="js/inWords.js"></script>
									<b><script>

										document.write(inWords(<?php echo $amount; ?>));
									</script></b>)
								</p>
							<?php else : ?>
								<p class="left">Return Amount :</p>
								<p><?php echo $amount = $replacements->amount_to_be_adjusted; ?>  (
									<script src="js/inWords.js"></script>
									<b><script>
										document.write(inWords(<?php echo $amount; ?>));
									</script></b>)
								</p>
							<?php endif; ?>
							</div>
						</div>
						
						<div class="signer_section">
							<div class="left_signer_customer pull_left">
								customer<br>(Sign & Date)
							</div>
							<div class="right_signer_sales pull_right">
								sales person<br>(Sign & Date)
							</div>
						</div>
					</div>	
						<div class="bottom_section">
							<!-- <a href="update_quotation.php"><input class="btn btn-info pull-left" type="submit" value="update" name=""></a> -->
							<a href="replacement.php" class="btn btn-info pull-left">New Replace</a>
							<button class="btn btn-success pull-right"name="confirm_invoice" onclick="printDiv('print')">Print
								<script>
					                function printDiv(divName) {
					                   var printContents = document.getElementById(divName).innerHTML;
					                   var originalContents = document.body.innerHTML;

					                   document.body.innerHTML = printContents;

					                   window.print();

					                   document.body.innerHTML = originalContents;
					                    //document.getElementById('print').innerHTML = inputBox.value;
					              }
					          </script>
							</button>
							
						</div>
				</div>
			</div>
		</div>
	</div>
</section>	

	<?php include('includes/footer.php'); ?>