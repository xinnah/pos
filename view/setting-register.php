<?php require_once 'start.php'; ?>
<?php require_once '../vendor/autoload.php' ?>
<?php include('config.php'); ?>
<?php
	use App\Connection\Connection; 
	use App\Utility\Utility; 
	use App\LoginRegistration\LoginRegistration;  
	$dbConnect = new Connection;
	// Utility::dd($_POST);
	$message = isset($dbConnect->message) ? $dbConnect->message : "";
?>

<?php
	if(isset($dbConnect) && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST["signup"])){
		if(!empty($_REQUEST["username"]) && !empty($_REQUEST["password"]) && !empty($_REQUEST["privilege"])){
			if($_REQUEST["password"] == $_REQUEST["re_password"]){
				$newUser = new LoginRegistration($_POST);
				$message = $newUser->registrationQuery();
			}else{
				$message = "<p class='error'>Password and Re-Password doesn't match!</p>";
			}
		}else{
			$message = "<p class='error'>Username/Password/Privilege can't be empty!</p>";
		}
	} 
?>



<style type="text/css">
	.message{color: black;text-align: center;font-weight: bold;}
	table{color: black;font-size: 14px;margin-top: 20px;}
	html input[disabled]{background: #fff;border: 0;}
	input{width: 100%;}
	.error{color: red;}
</style>	<!-- link include -->
<?php include('includes/setting_top_sidebar.php'); ?>

 	
			<div class="col-md-9 no_padding">
				<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Terms & Condition</h4></div>
					  		
					  	<div class="panel-body">
					  		
							<div>

							  <!-- Nav tabs -->
							  <ul class="nav nav-tabs" role="tablist">
							    <li role="presentation"  class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Add User Register</a></li>
							    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">View User Register</a></li>
							    <!-- <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Change Password</a></li> -->
							    
							    
							  </ul>

							  <!-- Tab panes -->
							  <div class="tab-content">
							    <div role="tabpanel" class="tab-pane active" id="home"style="padding:15px 50px;">
							       <form class="form-horizontal"action="setting-register.php"method="post">
							       <div class="message message_error"><?php echo $message = isset($message) ? $message : "" ?></div>
									  <div class="form-group">
										    <label for="inputCustomerName3" class="col-sm-4 no_padding control-label"> User Name : </label>
										    <div class="col-sm-8">
										      <input name="username" type="text" class="form-control" id="inputCustomerName3" placeholder="User Name " value="<?php if(isset($_POST["username"])){echo $_POST["username"];} ?>">
										    </div>
										</div>
										
										
										<div class="form-group">
										    <label for="inputCustomerphone3" class="col-sm-4 no_padding control-label">Password : </label>
										    <div class="col-sm-8">
										      <input name="password" type="password" class="form-control" id="inputCustomerphone3" placeholder="Password ">
										    </div>
										</div>
										
										
										<div class="form-group">
										    <label for="inputcustomerAddress3" class="col-sm-4 no_padding control-label">Re- Password : </label>
										    <div class="col-sm-8">
										      <input name="re_password" type="password" class="form-control" id="inputCustomerphone3" placeholder="Re-Password ">
										    </div>
										</div>
										<div class="form-group">
										    <label for="inputcustomerAddress3" class="col-sm-4 no_padding control-label">Privilege : </label>
										    <div class="col-sm-8">
										      <select class="form-control" name='privilege'>
										      	<option></option>
										      	<option value="Admin">Admin</option>
										      	<option value="Sales Man">Sales Man</option>
										      </select>
										    </div>
										</div>
										<div class="form-group">
										    <div class="col-sm-offset-4 col-sm-8">
										      	<input name="signup" type="submit" class="btn btn-success" value="Sign Up">
										    </div>
										</div>
									</form>
				    			</div>
								<div role="tabpanel" class="tab-pane " id="profile">
								<?php 
									$startementv = $db->prepare("SELECT * FROM admin WHERE id!=2");
											$startementv->execute();
											$result = $startementv->fetchAll(PDO::FETCH_ASSOC);
											foreach ($result as $row) 
								 ?>
							    	<div class="table-responsive">
									  <table class="table">
									    <tr style="background: #2BAEA8;color:#fff;">
									    	<th>User Name</th>
									    	<th>Password</th>
									    	
									    	<?php 
									     			if($row['username'] !=="admin"){?>
									     			<th>Delete</th><?php }else{
									     				echo "";
									     				} 
									     		 ?>
									    </tr>

									    <?php 

											
											foreach ($result as $row) {
												?>
									     
									     <tr>
									     	<td><?php echo $row['username']; ?></td>
									     	<td><input type="password" value="<?php echo $row['password']; ?>" disabled></td>
									     	
									     	<?php 
									     			if($row['username'] !=="admin"){?>
									     			<td>
									     		
									     				<a onclick="return confirmDelete();" href="delete_user.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a>
									     			
									     		 
									     	</td><?php }else{
									     				echo "";
									     				} 
									     		 ?>
									     </tr>
									     	<?php }
										?>
									  </table>
									</div><!--  -->

										
							    </div>		    
							  	<!-- <div role="tabpanel" class="tab-pane" id="messages">
							  		<?php //include('update_password.php'); ?>
							  	</div> -->

							</div>
							
						</div><!-- end panel body -->
					</div>
					  	
					
			</div>
			
		</div>                      
	</div>
</section>
<script type='text/javascript'>
	function confirmDelete()
	{
		return confirm("Do you sure want to delete this user?");
	}
</script>
<script type="text/javascript">
	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
  e.target
  e.relatedTarget 
})
</script>
	<?php include('includes/footer.php'); ?>