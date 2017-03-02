<?php include_once 'start.php';?>
<?php 
	use App\Utility\Utility;
	use App\Replacement\Replacement;
	use App\Customer\Customer;

	$customer = new Customer;
	
    $replacement_data = array();
    if(count($_REQUEST) > 0){
	    foreach ($_REQUEST as $key => $value) {

	        if($key == "barcode"){
	          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
	            $replacement_data[$key] = implode(" , ", $_REQUEST[$key]);
	          }
	        }elseif($key == "product_description"){
	          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
	            $replacement_data[$key] = implode(" , ", $_REQUEST[$key]);
	          }
	        }elseif($key == "uom"){
	          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
	            $replacement_data[$key] = implode(" , ", $_REQUEST[$key]);
	          }
	        }elseif($key == "cost_per_unit"){
	          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
	            $replacement_data[$key] = implode(" , ", $_REQUEST[$key]);
	          }
	        }elseif($key == "price_per_unit"){
	          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
	            $replacement_data[$key] = implode(" , ", $_REQUEST[$key]);
	          }
	        }elseif($key == "quantity"){
	          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
	            $replacement_data[$key] = implode(" , ", $_REQUEST[$key]);
	          }
	        }elseif($key == "amount"){
	          foreach ($_REQUEST[$key] as $customer_key => $customer_value) {
	            $replacement_data[$key] = implode(" , ", $_REQUEST[$key]);
	          }
	        }else{
	          $replacement_data[$key] = $value;
	        }
	    }
    }

    if(isset($replacement_data["customer_id"])){
    	$customer_info = $customer->show_customer($replacement_data["customer_id"]);
    }
    $replacement = new Replacement;
	$previous_item = $replacement->show_replcement_history($replacement_data["invoice_no"],$replacement_data["product_description"]);
	$total = 0;
	foreach($previous_item  as $key ){
		$prev_item = unserialize($key->previous_item);
		$total += trim($prev_item["quantity"]);
	};
		

    
    // Utility::d($_REQUEST["replaced_item"]["uom"]);
    $obj = new Replacement;
    $obj->create_replacement($_REQUEST);
?>
	<!-- link include -->
	<?php include('includes/all_link_body.php'); ?>
<style type="text/css">
	.form-inline .form-group {margin-bottom: 20px;float: right;font-size: 13px;}
	.form-inline .input-group {float: right;}
</style>
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
	
	  		/**/
			
$(document).on('focus','.autocomplete_txt',function(){
	type = $(this).data('type');
	
	if(type =='barcode' )autoTypeNo=0;
	if(type =='product_name' )autoTypeNo=1; 	
	
	$(this).autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : 'ajax.php',
				dataType: "json",
				method: 'post',
				data: {
				   name_startsWith: request.term,
				   type: type
				},
				 success: function( data ) {
					 response( $.map( data, function( item ) {
					 	var code = item.split("|");
						return {
							label: code[autoTypeNo],
							value: code[autoTypeNo],
							data : item
						}
					}));
				}
			});
		},
		autoFocus: true,	      	
		minLength: 0,
		appendTo: "#modal-fullscreen",
		select: function( event, ui ) {
			var names = ui.item.data.split("|");
			id_arr = $(this).attr('id');
	  		id = id_arr.split("_");
	  		console.log(names, id);



	  		
			$('#itemNo_'+id[1]).val(names[0]);
			$('#itemName_'+id[1]).val(names[1]);
			$('#uom_'+id[1]).val(names[4]);
			$('#quantity2_'+id[1]).val(1);
			$('#price2_'+id[1]).val(names[3]);
			$('#price1_'+id[1]).val(names[2]);
			
			$('#total2_'+id[1]).val( 1*names[3] );
			calculateTotal();
		}		      	
	});
});

//price change
$(document).on('change keyup blur','.changesNo',function(){
	id_arr = $(this).attr('id');
	id = id_arr.split("_");
	quantity = $('#quantity2_'+id[1]).val();
	price = $('#price2_'+id[1]).val();
	
	if( quantity!='' && price !='' ) $('#total2_'+id[1]).val( -(parseFloat(price)*parseFloat(quantity)).toFixed(0) );
		
	calculateTotal();
});

$(document).on('change keyup blur','#tax',function(){
	calculateTotal();
});




/**/
</script>    


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
					<h2>Replacement</h2>
				</div><!--  -->
				 <div class="container">
				<div class="navbar navbar-default" role="navigation">
				  <div class="container-fluid">
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
				      	
				        <li class=""><a href="sales_order.php" data-toggle="tooltip" data-placement="bottom" title="Add"><img src="img/icon/add.png"> </a></li>
				        <li class=""><a href="#" data-toggle="tooltip" data-placement="bottom" title="Delete"><img src="img/icon/Files-Delete-File-icon.png"></a></li>
				        <li class=""><a href="replacement.php" data-toggle="tooltip" data-placement="bottom" title="Replacement"><img src="img/icon/refresh-icon.png"></a></li>
				        <li><h3 class="bdt_price">BDT <output class="form-control amountDue disabled top_total" value="0" id="amountDue" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">.00</h3></li>
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
	</div>
</header><!--  -->
<section class="view_container_content">
	<div class="container-fulid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12 no_padding">
					<div class="panel panel-info no_margin">
						<div class="panel-heading"><h4 style="text-align:center;">Replacement</h4></div>
						  	<form name="myForm" class="form-horizontal" action="single_replace_item.php" method="post">
						  		<div class="panel-body">
						  			<div class="row">
						  				<div class="col-md-6 col-sm-6">
						  					<div class="form-group">
											    <label class="col-sm-4 control-label ">Date:</label>
											    <div class="col-sm-8">
											      <input name="date" type="date" class="form-control" id="inputDate3" placeholder="Date" required>
											      <input type="hidden" name="customer_id" value="<?php if(isset($replacement_data["customer_id"])){echo $replacement_data["customer_id"];}  ?>">
											    </div>
											</div>
											<div class="form-group">
											    <label class="col-sm-4 control-label ">Customer Name : </label>
											    <div class="col-sm-8">
											      <input name="" type="text" class="form-control" placeholder="Customer Name " value="<?php if(isset($customer_info->customer_name)){echo $customer_info->customer_name;} ?>" readonly>
											    </div>
											</div>
											<div class="form-group">
											    <label class="col-sm-4 control-label">Customer Address: </label>
											    <div class="col-sm-8">
											      <textarea name="" class="form-control" rows="3" readonly><?php if(isset($customer_info->customer_address)){echo $customer_info->customer_address;} ?></textarea>
											    </div>
											 </div>
						  				</div>
						  				<div class="col-md-6 col-sm-6">
						  					<div class="form-group">
											    <label class="col-sm-4 control-label">Invoice No. :</label>
											   
											    <div id="likes" class="col-sm-8">
											    	<input type="text" name="invoice_no" class="form-control" value="<?php if(isset($replacement_data["invoice_no"])){echo $replacement_data["invoice_no"];}  ?>" readonly>
												</div>
												
											</div>
											<div class="form-group">
											    <label class="col-sm-4 control-label">Customer Phone : </label>
											    <div class="col-sm-8">
											      <input name="" type="tel" class="form-control"placeholder="Phone " value="<?php if(isset($customer_info->customer_phone)){echo $customer_info->customer_phone;} ?>" readonly>
											      
											    </div>
											</div>
											<div class="form-group">
											    <label class="col-sm-4 control-label">Notes : </label>
											    <div class="col-sm-8">
											      <textarea name="notes" class="form-control" rows="3"></textarea>
											    </div>
											</div>
						  				</div>
						  			</div>
								
								<div class="view_center_folwchart">
									<div class='row'>
							      		<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'>
<table class="table table-bordered table-hover" id="table_auto">
<thead>
<tr>
	<th colspan="9" style="background:#EF4C4C;color:#fff;font-size:16px;">To Be Replace</th>
	<th colspan="8" style="background:#5CB85C;color:#fff;font-size:16px;">Replaced By</th>
</tr>
<tr style="background:#EEEEEE;color:#000;">
	
	<th width="5%">Barcode</th>
	<th width="4%">Product Description</th>
	<th width="5%">uom</th>
	<th width="5%">Cost Per Unit</th>
	<th width="5%">price</th>
	<th width="5%">Quantity</th>
	<th width="5%">Total</th>
	<th width="5%">Replace Qty</th>

	<th width="5%">Already Replace</th>

	<th width="10%">Barcode</th>
	<th width="6%">Product Description</th>
	<th width="5%">uom</th>
	<th width="7%">Cost Per Unit</th>
	<th width="8%">price</th>
	<th width="5%">Avaliable Quantity</th>
	<th width="5%">Quantity</th>
	<th width="10%">Total</th>
</tr>
</thead>
<tbody>

<tr>
	
	<td>
		<input type= "text" disabled="disabled" name="" class="form-control" value="<?php if(isset($replacement_data["barcode"])){echo $replacement_data["barcode"];}  ?>">

		<input type="hidden" name="previous_item[barcode]" class="form-control" value="<?php if(isset($replacement_data["barcode"])){echo $replacement_data["barcode"];}  ?>">
	</td>
	
	<td>
		<input type= "text" disabled="disabled" name="" class="form-control" value="<?php if(isset($replacement_data["product_description"])){echo $replacement_data["product_description"];}  ?>">

		<input type="hidden" name="previous_item[product_description]" class="form-control" value="<?php if(isset($replacement_data["product_description"])){echo $replacement_data["product_description"];}  ?>">
		
	</td>
	<td>
		<input type= "text" disabled="disabled" class="form-control" name="" value="<?php if(isset($replacement_data["uom"])){echo $replacement_data["uom"];}  ?>">

		<input type="hidden" name="previous_item[uom]" class="form-control" value="<?php if(isset($replacement_data["uom"])){echo $replacement_data["uom"];}  ?>">
		
	</td>
	<td>
		<input type= "text" disabled="disabled" class="form-control" name="" value="<?php if(isset($replacement_data["cost_per_unit"])){echo $replacement_data["cost_per_unit"];}  ?>">

		<input type="hidden" name="previous_item[cost_per_unit]" class="form-control" value="<?php if(isset($replacement_data["cost_per_unit"])){echo $replacement_data["cost_per_unit"];}  ?>">
		
	</td>
	<td>
		<input type= "text" disabled="disabled" step="0.1" class="form-control" name="" value="<?php if(isset($replacement_data["price_per_unit"])){echo $replacement_data["price_per_unit"];}  ?>">

		<!-- <input type="hidden" name="previous_item[price_per_unit]" class="form-control" value="<?php //if(isset($replacement_data["price_per_unit"])){echo $replacement_data["price_per_unit"];}  ?>"> -->

		<input type="hidden" min="0" name="previous_item[price_per_unit]" id="price2_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"value="<?php if(isset($replacement_data["price_per_unit"])){echo $replacement_data["price_per_unit"];}  ?>">
		
	</td>
	<td>
	<?php 
		$sub_quantity = $replacement_data["quantity"] - $total;
	 ?>
		<input type= "text" disabled="disabled" class="form-control" name="" value="<?php if(isset($replacement_data["quantity"])){echo $replacement_data["quantity"];}  ?>">

			
		
	</td>
	<td>
		<input name="" type="text" disabled="disabled" class="form-control" id="" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" value="<?php if(isset($replacement_data["amount"])){echo $replacement_data["amount"];}  ?>">

		<!-- <input type="hidden"  class="form-control" value="<?php// if(isset($replacement_data["amount"])){echo $replacement_data["amount"];}  ?>"> -->

		<input type="hidden" min="0"name="previous_item[amount]"  id="total2_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"  readonly>
		
	</td>
	

	<td><input type="number" min="0" max='<?php echo intval($sub_quantity);?>' name="previous_item[quantity]"  id="quantity2_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"></td>
	
	
	<td>
	<input type="text" class="form-control"value="<?php 
		if(!empty($total)) :
			echo $total;
		else :
			echo 0;
		endif; 
	?>" readonly>
	</td>
	

	
	<!-- Replaced By -->


	<td><input type="text" data-type="barcode" name="replaced_item[barcode]" id="itemNo_1" class="form-control autocomplete_txt" autocomplete="off">
	

	</td>
	
	<td>
		<input type="text" data-type="product_name" name="replaced_item[product_description]" id="itemName_1" class="form-control autocomplete_txt" autocomplete="off"  required>
		
	</td>
	<td>
		<input type="text" data-type="uom" name="replaced_item[uom]" id="uom_1" class="form-control autocomplete_txt" autocomplete="off" readonly>
		
	</td>
	<td>
		<input type="number" min="0" name="replaced_item[cost_per_unit]" id="price1_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
		
	</td>
	<td>
		<input type="number" min="0" name="replaced_item[price_per_unit]" id="price_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
		
	</td>
	<td>
		<input type="number" min="0" name="" id="quantity_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly="readonly">
		
	</td>
	<td>
		<input type="number" min="0" name="replaced_item[quantity]" id="quantity4_1" class="form-control changesNo" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
	</td>
	<td>
		<input type="number" min="0" name="replaced_item[amount]" id="total_1" class="form-control totalLinePrice" autocomplete="off" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"  readonly>
		
	</td>
</tr>
<tr>
	
	
</tr>
</tbody>
</table>
							      		</div>
							      	</div>
							      	<div class='row'>	
							      		<div class='col-xs-12 col-sm-8 col-md-8 col-lg-8'>
							      			
											
							      		</div>
							      		<div class='col-xs-12 col-sm-4 col-md-4 col-lg-4' style="padding-left:0;margin: 0px -14px;">
											<span class="form-inline">
											<div class="form-group">
													<label><!-- Total: &nbsp; --></label>
													<div class="input-group">
														<!-- <div class="input-group-addon currency">৳</div> -->
														<input value="" type="hidden" class="form-control" name="" id="subTotal" placeholder="Subtotal" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
													</div>
												</div>
											<div class="form-group">

												<input type="hidden" name="cost_adjusted">
												<input type="hidden" name="amount_to_be_adjusted">
												<label>Vat: &nbsp;</label>
												<div class="input-group">
													
													<input value="" type="number" min="0" class="form-control" name="" id="tax" placeholder="Vat" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"><div class="input-group-addon">%</div>
												</div>
											</div>
											<div class="form-group">
												<label>Vat Amount: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon currency">৳</div>
													<input value="" type="number" min="0" class="form-control" name="vat" id="taxAmount" placeholder="Vat" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" readonly>
													
												</div>
											</div>
											<div class="form-group">
												<label><!-- Sub Total: &nbsp; --></label>
												<div class="input-group">
													<!-- <div class="input-group-addon currency">৳</div> -->
													<input value="" type="hidden" class="form-control" name="" id="totalAftertax" placeholder="Total" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
											<div class="form-group">
												<label><!-- Delivery Charge: &nbsp; --></label>
												<div class="input-group">
													<!-- <div class="input-group-addon currency">৳</div> -->
													<input value="" type="hidden" class="form-control" name="" id="amountPaid1" placeholder="Delivery Charge" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
													
												</div>
											</div>
											<div class="form-group">
												<!-- <label>Amount Paid: &nbsp;</label> -->
												<div class="input-group">
													<!-- <div class="input-group-addon currency">৳</div> -->
													<input value="" type="hidden" min="0" class="form-control" name="" id="amountPaid" placeholder="Amount Paid" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;">
												</div>
											</div>
											<div class="form-group">
												<label>Amount Due: &nbsp;</label>
												<div class="input-group">
													<div class="input-group-addon currency">৳</div>
													<input value="" type="number"  class="form-control amountDue" name="due"  id="amountDue" placeholder="Amount Due" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;"  readonly>
												</div>
											</div>
										</span>

										</div>
							      	</div>

								</div>
								<div class="confim_button">
									<a href="view_single_replacement.php"></a><button type="submit" id="submit" class="btn btn-success btn-lg" name="">Confirm</button></a>
								</div>
							</div>
						</form>	
							
					</div><!-- end panel body -->
						  	
						

				</div>
				
			</div>
		</div>
		<!-- <div class="col-md-2"></div> -->
	</div>
</section>
	<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
	<script src="js/script_replace.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#quantity2_1").keyup(function(){
			var replace_max_value = $(this).attr('max');
			var replace_quantity_value = $(this).val();
			if(replace_quantity_value < 0){
				$(this).val('0');
			}
			else if(replace_quantity_value > replace_max_value){
				$(this).val(replace_max_value);
			}
		});


		$('#itemNo_1').keyup(function(){
			var search = $(this).val();

			$.post("replace_item_search.php",{'search':search},function(data){
				$('.show').text(data);
			});

		});
		$('#quantity2_1').change(function(){
			var prev_item_quantity = $('#quantity2_1').val();
			if(prev_item_quantity > 0){
				$('#submit').removeAttr('disabled');
			}else if(prev_item_quantity <= 0){
				$('#submit').attr('disabled','disabled');
			}
		});


		$('#itemNo_1, #itemName_1').focusout(function(){
			var replace_item_uom = $('#uom_1').val();
			var item_quantity = $('#quantity_1').val();
			if(replace_item_uom != '' ){
				$('#submit').removeAttr('disabled');
			}else{
				$('#submit').attr('disabled','disabled');
			}
						
			if(parseInt(item_quantity) > 0){
				$('#submit').removeAttr('disabled');
			}else if(parseInt(item_quantity) <= 0){
				$('#submit').attr('disabled','disabled');
			}
		});

		// $('#quantity_1').change(function(){
		// 	var item_quantity = $('#quantity_1').val();
		// 	alert('dfd');
		// 	if(item_quantity > 0){
		// 		$('#submit').removeAttr('disabled');
		// 	}else if(item_quantity <= 0){

		// 		$('#submit').attr('disabled','disabled');
		// 	}
		// });



		
	});
</script>
<script>
	$('#quantity4_1').change(function(){
		var quantity1 = $('#quantity_1').val();
		var quantity4 = $('#quantity4_1').val();
		$('#quantity4_1').attr({'max':quantity1,'min':0});
	})

	$('#quantity4_1').focusout(function(){
		var quantity1 = $('#quantity_1').val();
		var quantity4 = $('#quantity4_1').val();

		if(parseInt(quantity1) < parseInt(quantity4)){
			alert("Your store doesn't have sufficient stock");
			$('#quantity4_1').val(quantity1);
		}
	})
		
</script>
<?php include('includes/footer.php'); ?>