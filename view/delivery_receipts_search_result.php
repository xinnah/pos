<?php require_once 'start.php'; ?>
<?php include('config.php'); ?>


<?php 
if(isset($_POST['username1']) && $_POST['username1']!=""){
	$startement = $db->prepare("SELECT * FROM customer WHERE username1 LIKE :username1");
	$startement->execute(array(
		'username1'=>'%'.$_POST['username1'].'%'
		));
	if($startement->rowCount()==0){
		echo '<h1 style="color:red;text-align:center;">no customer was found !!</h1>';
	}else{
		while ($row=$startement->fetch()) {
			?>

			<div class="original_invoice" style="margin:10px 10px;">
				<div class="panel panel-info no_margin">
				  <div class="panel-heading"><h4>Delivery Receipts</h4></div>
				  <div class="panel-body" style="padding:5px;">

				    <div class="view_center_folwchart">
						<div class="panel panel-info no_margin"style="border:0;">
						  <div class="panel-body no_padding">
						    <div class="table-responsive">
							  <table class="table">
							    <tr style="background: #2BAEA8;">
							    	<th style="width:62px;">Date :</th>
							    	<th style="width:145px;">Order No</th>
							    	<th style="width:62px;">Receipt No</th>
							    	<th style="width:62px;">Customer</th>
							    	<th style="width:62px;">Amount</th>
							    	<th style="width:62px;">&nbsp;</th>
							    	<th style="width:62px;">&nbsp;</th>
							    	<th style="width:62px;">&nbsp;</th>
							    </tr>
							    <tr>
							    	<td>1-1-15</td>
							    	<td>15</td>
							    	<td>5</td>
							    	<td><?php echo $row['username1']; ?></td>
							    	<td>100 Tk.</td>
							    	<td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">View</a>

							    	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title" id="myModalLabel">Delivery Receipts</h4>
									      </div>
									      <div class="modal-body">
									        ...
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									        <button type="button" class="btn btn-primary">Save changes</button>
									      </div>
									    </div>
									  </div>
									</div><!--  -->

							    	</td>

							    	


							    	<td><a href="#" class="btn btn-info">Update</a></td>
							    	<td><a href="#" class="btn btn-success">Print</a></td>
							    </tr>
							    
							  </table>
							</div><!--  -->
							
						  </div>									  
						</div>
					</div><!--  -->
				  </div>									  
				</div>
			</div>


			<?php
		}
	}
}else{
	echo "";
}
	
 ?>

