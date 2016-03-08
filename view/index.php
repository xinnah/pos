
<?php session_start(); ?>

<?php require_once '../vendor/autoload.php' ?>
<?php
	use App\Connection\Connection; 
	use App\Utility\Utility; 
	use App\LoginRegistration\LoginRegistration;  
	$dbConnect = new Connection;
	// Utility::dd($dbConnect);
	$message = isset($dbConnect->message) ? $dbConnect->message : "";
?>
<?php 
	if(isset($_SESSION["username"])){
		$_SESSION["username"] = NULL;
	}
 ?>
<?php
	if(isset($dbConnect) && $_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST["login"])){
		if(!empty($_REQUEST["username"]) && !empty($_REQUEST["password"])){
			$newUser = new LoginRegistration($_POST);
			$dbUser = $newUser->loginQuery();
			if($dbUser){
				if($dbUser["username"] == $newUser->username && password_verify($newUser->password,$dbUser["password"])){
					$_SESSION["username"] = $dbUser["username"];
					$_SESSION["privilege"] = $dbUser["privilege"];
					
						Utility::redirect("welcome.php");
					
					
				}else{
					$message = "Username/Password is incorrect!";
				}
			}else{
				$message = "There is no user like this!";
			}
		}else{
			$message = "Username/Password can't be empty";
		}
	} 
	
?>
<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Binary Pos</title>
		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="css/font.css">
		<link rel="stylesheet" type="text/css" href="css/ardestine.css">
		<!-- Custom CSS -->
		
		<!-- <link rel="icon" type="image/png" href="images/icon-sm.png"> -->
		<link rel="stylesheet" href="css/style.css" >
		<link rel="stylesheet" href="css/responsive.css" >
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			<![endif]-->
	

	</head>
	<body style="background: -webkit-linear-gradient(left,rgb(188, 188, 188),#ddd,#ddd,#999);background: -moz-linear-gradient(left,rgb(188, 188, 188),#ddd,#ddd,#999);background: -o-linear-gradient(left,rgb(188, 188, 188),#ddd,#ddd,#999);">
	<section class="login_section">
		<div class="container">
			<div class="row">
				<div class="col-md-6"style="margin:0 auto;">
					<h3><img src="img/logo.png"alt="logo"> Binary Pos</h3><span>V.1.0.0</span>
					<form class="form-horizontal" action="index.php" method="post">
					<div class="message message_error"><?php echo $message = isset($message) ? $message : "" ?></div>
					  <div class="form-group">
					    <label for="inputEmail3" class="col-sm-6 control-label">User Name:</label>
					    <div class="col-sm-6">
					      <input name="username" type="text" class="form-control" id="inputEmail3" placeholder="User Name" value="<?php if(isset($_POST["username"])){echo $_POST["username"];} ?>"> <i class="fa fa-user email"></i> 
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-6 control-label">Password:</label>
					    <div class="col-sm-6">
					      <input name="password" type="password" class="form-control" id="inputPassword3" placeholder="Password"><i class="fa fa-lock password"></i>
					    </div>
					  </div>
					  
					  <div class="form-group">
					    <div class="col-sm-offset-6 col-sm-6">
					    	<input name="login" type="submit" class="btn navbar-inverse singin" value="Sign in">
					    </div>
					  </div>
					</form>

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
							<p>Copyright &copy; 2015 <a href="http://www.binary-logic.net" target="_blank">Binary Logic</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>	



<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>