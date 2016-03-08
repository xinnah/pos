<?php include('config.php'); ?>
<?php 

	if(!isset($_REQUEST['id'])){
		header("location: replacement.php");
	}else{
		$id = $_REQUEST['id'];
	}

 ?>
 <?php 
	
	if(isset($_POST['confirm_invoice'])){
		try {
			
			if(empty($_POST['product_to_replaced'])){
				throw new Exception("product name cannot be empty!");
				
			}
			if(empty($_POST['amount'])){
				throw new Exception("amount cannot be empty!");
				
			}
			
			else{

				$startement = $db->prepare("UPDATE result SET username=?,price=?WHERE id=?");
				$startement->execute(array($_POST["product_to_replaced"],$_POST['amount'],$id));

				$success = "customer is Update successfully.";
				header('location:replacemet_token.php');
			}
			
			


		} catch (Exception $e) {
			$error_message = $e->getMessage();
		}
	}

 ?>
<!-- ajax on click -->
<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript">
        function calc(){
            q = parseInt(document.getElementById('change').value);
            
            p = parseInt(document.getElementById('price1').value);

                
            document.getElementById('total').value= q * p;
            /* total price*/
            r = parseInt(document.getElementById('change').value);
            
            v = parseInt(document.getElementById('price1').value);

                
            document.getElementById('total1').value= 15/100*(r * v);
            /*total price + vat(15%)*/
           
            ev = parseInt(document.getElementById('total1').value);
             e = parseInt(document.getElementById('change1').value);
            tt = parseInt(document.getElementById('total').value) ;
   
            document.getElementById('total3').value= ev + e + tt;

            /*total price + vat(15%) + delivery charge*/
           
            d = parseInt(document.getElementById('total3').value);
 			w = parseInt(document.getElementById('change4').value);
                
            document.getElementById('total4').value= d - w;
            /*(total price + vat(15%) + delivery charge ) - discount*/

            a = parseInt(document.getElementById('total3').value);
 			m = parseInt(document.getElementById('change4').value);
                
            document.getElementById('total5').value= a - m;
            /*(total price + vat(15%) + delivery charge ) - discount and show admin nav bar*/
        }
        window.onload  = calc;
    </script>
<!-- ajax on click end -->
<!-- 
<script type="text/javascript">
	
	$(document).ready(function(){
		$('#replacement_update').load();
		$('#replacement_update a').click(function(){
			
			var page = $(this).attr('href');
			$('#replacement_update').load(page +'.php');

			return false;
			
		});
	});
</script>
 -->


<!-- ajax on click load function end -->
   <?php 

 	$startement = $db->prepare("SELECT * FROM result WHERE id=?");
 	$startement->execute(array($id));
 	$result = $startement->fetchAll(PDO::FETCH_ASSOC);
 	foreach ($result as $row) {
 		
 		$username = $row['username'];
 	}

  ?>
  <!-- <div id="replacement_update"> -->
<div class="replacement_token">
	<div class="panel panel-info no_margin">
	  <div class="panel-heading"><h4>replacement token</h4></div>
	  <div class="panel-body">
	    <form action="replacement_token.php?id=<?php echo $row['id']; ?>" method="POST">

	    	<div class="error"> <?php if(isset($error_message)){echo $error_message;} ?> </div>	
			<div class="success"> <?php if(isset($success)){echo $success;} ?> </div>

	    	<div class="table-responsive">
	    	<table class="table">
		    <tr style="background: #2BAEA8;">
		    	<th>product to be replaced</th>
		    	<th>Qty to be replaced</th>
		    	<th>replaced by</th>
		    	<th>Unit Price</th>
		    	<th>qty</th>
		    	<th>Cash in</th>
		    	<th>Cash out</th>
		    	<th>Amount</th>
		    </tr>
		    <tr>
		    	<td><?php echo $username; ?></td>
		    	<td><input type="text" name="qty_product_to_replaced" class="from-control"style="width:50px; height:34px;"></td>
		    	<td><input type="text" name="product_to_replaced" class="from-control" required style="width:50px; height:34px;" ></td>
		    	<td class="cart_quantity">
			        <div class="cart_quantity_button">
			            
			                <input type="number" id="price1" name="unit_price" value="0" class="form-control" onchange="calc()" style="width:80px;">
			                
			          
			        </div>
			    </td>
			    <td class="cart_quantity">
			        <div class="cart_quantity_button">
			            
			            <input type="number" id="change" name="qty" value="0" min="1" class="form-control" onchange="calc()" style="width:80px;">
			           
			        </div>
			    </td>
			    <td></td>
			    <td></td>
		    	<td class="cart_total">
			        <p class="cart_total_price"><b> Tk. <input id="total" for="change" name="amount" class="disabled" value="0"></b></p>

			    </td>
		    	
		    </tr>
		    <tr>
		    	<td colspan="6"></td>
		    	<td colspan="1">Vat(15%)</td>
		    	<td colspan="1" name="vat">
		    		<p class="cart_total_price" name="spTotalPrice"><b> Tk. <input id="total1" for="change" class="disabled" name="vat" value="0"></b></p>
		    	</td>
		    	
		    </tr>
		    <tr>
		    	<td colspan="6"></td>
		    	<td colspan="1">Delivery Charge</td>
		    	<td colspan="1" name="delivery_charge">
		    		
				        <div class="cart_quantity_button">
				            
				                <input type="number" id="change1" name="delivery_charge" value="0" class="form-control" onchange="calc()" style="width:80px;" >
				                
				           
				        </div>
		    	</td>
		    	
		    </tr>
		    <tr>
		    	<td colspan="6"></td>
		    	<td colspan="1">Total</td>
		    	<td class="cart_total">
			        <p class="cart_total_price" name="total"><b> Tk. <input id="total3" for="change" class="disabled" name="total" value="0"></b></p>

			    </td>
		    	
		    </tr>
		    <tr>
		    	<td colspan="6"></td>
		    	<td colspan="1">Paid</td>
		    	<td colspan="1" name="paid">
		    		 <div class="cart_quantity_button">
			            
			                <input type="number" id="change4" name="paid" value="0" class="form-control" onchange="calc()" style="width:80px;" >
			                
			           
			        </div>
		    	</td>
		    	
		    </tr>
		    <tr>
		    	<td colspan="6"></td>
		    	<td colspan="1">Due</td>
		    	<td class="cart_total">
			        <p class="cart_total_price" name="due"><b> Tk. <input id="total4" for="change" name="due" class="disabled" value="0"></b></p>

			    </td>
			    
		    </tr>
		  </table>
		  <a href="replacement_token.php?id=<?php echo $row['id']; ?>"><button class="btn btn-success pull-right" name="confirm_invoice">Confirm</button></a>
		</div><!--  -->
	    </form>
		
	  </div>									  
	</div>
	</div>
<!-- </div>
 -->
