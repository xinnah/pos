<?php require_once '../vendor/autoload.php' ?>
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
		if(!empty($_REQUEST["username"]) && !empty($_REQUEST["password"])){
			if($_REQUEST["password"] == $_REQUEST["re_password"]){
				$newUser = new LoginRegistration($_POST);
				$message = $newUser->registrationQuery();
			}else{
				$message = "Password and Re-Password doesn't match!";
			}
		}else{
			$message = "Username/Password can't be empty";
		}
	} 
?>



	<!-- link include -->
<?php include('includes/all_link_body.php'); ?>


<header class="header_section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php include('includes/header_top.php'); ?>

				
				 
			</div>
		</div>
	<div class="message message_error"><?php echo $message = isset($message) ? $message : "" ?></div>
				
	</div>
</header><!--  -->
<section class="view_container_content">
	<div class="container" style="background:#fff;width:50%;float:left;margin-left:110px;">
		<div class="row">
			<div class="col-md-12 no_padding">
					<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Register</h4></div>
					  	
					  		<div class="panel-body">
							
								<div class="view_address" style="width:100%;">
								<form class="form-horizontal" action="register.php" method="post">	
									<div class="view_a_name">
										<div class="form-group">
										    <label for="inputCustomerName3" class="col-sm-3 no_padding control-label">User Name : </label>
										    <div class="col-sm-9">
										      <input name="username" type="text" class="form-control" id="inputCustomerName3" placeholder="User Name " value="<?php if(isset($_POST["username"])){echo $_POST["username"];} ?>">
										    </div>
										 </div>
									</div>
									<div class="view_a_phone">
										<div class="form-group">
										    <label for="inputCustomerphone3" class="col-sm-3 no_padding control-label">Password : </label>
										    <div class="col-sm-9">
										      <input name="password" type="password" class="form-control" id="inputCustomerphone3" placeholder="Password ">
										    </div>
										 </div>
									</div>
									<div class="view_a_address">
										<div class="form-group">
										    <label for="inputcustomerAddress3" class="col-sm-3 no_padding control-label">Re- Password : </label>
										    <div class="col-sm-9">
										      <input name="re_password" type="password" class="form-control" id="inputCustomerphone3" placeholder="Re-Password ">
										    </div>
										 </div>
									</div>
									<div class="form-group">
									    <div class="col-sm-offset-3 col-sm-9">
									      <input name="signup" type="submit" class="btn btn-default" value="Sign Up"></input>
									    </div>
									</div>
								</form>
								</div><!--  -->
							</div><!-- end panel body -->
					  	</div>
					

			</div>
		</div>
	</div>
</section>

	<footer class="footer_section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-7">
							<p>Korea IT</p>
						</div>
						<div class="col-sm-2">
							<p>Binary Pos <span>v 1.0.0</span> </p>
						</div>
						<div class="col-sm-3">
							<p>Copyright &copy; 2015 <a href="www.binary-logic.net">Binary Logic</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>