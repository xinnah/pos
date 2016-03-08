<?php require_once 'start.php'; ?>
<!-- Button trigger modal -->
<?php include('config.php') ?>
<?php 
	if(!isset($_SESSION["username"])){
		header("location:welcome.php");
		
	}else{
		$id =$_SESSION["username"];
	}
 ?>
<?php 

	if(isset($_POST['update'])){

		try{
			if(empty($_POST['username'])){
				throw new Exception("User Name cannot be empty!");
				
			}
			
			if(empty($_POST['new_password'])){
				throw new Exception("New Password cannot be empty!");
				
			}
			if(empty($_POST['confirm_new_password'])){
				throw new Exception("Confirm New Password cannot be empty!");
				
			}

			

			if($_POST['new_password'] != $_POST['confirm_new_password'] ){
				throw new Exception("New Password does not match!");
				
			}

			$new_password = password_hash($_POST['new_password'],PASSWORD_BCRYPT);

			//$result = mysql_query("UPDATE admin SET password= '$new_password' WHERE id=1");
			

			$startement = $db->prepare("UPDATE admin SET username=? || password=? WHERE id=?");
			$startement->execute(array($_POST['username'],$new_password,$id));
			$success = "Password Change success";

		}

		catch(Exception $e){
			$error_message = $e->getMessage();
		}
	}

 ?>
<?php 
  	$username = $_SESSION["username"]; 	 
 ?>


<style type="text/css">
	.fa{font-size: 15px;}
	.success{color: green;text-align: center;}
	.error{color: red;text-align: center;}

</style>

				  
  <div class="panel-body">
  <?php if(isset($error)){echo $error;} ?>
  <div class="error"> <?php if(isset($error_message)){echo $error_message;} ?> </div>	
			<div class="success"> <?php if(isset($success)){echo $success;} ?> </div>
    <form class="form-horizontal" action="" method="POST">
      <div class="form-group">
	    <label for="inputProductName3" class="col-sm-3 control-label">User Name:</label>
	    <div class="col-sm-9">
	      <input name="username" type="text" class="form-control" id="inputProductName3" value="<?php echo $username; ?>">
	    </div>
	  </div>
      
	  <div class="form-group">
	    <label for="inputNewPassword" class="col-sm-3 control-label">New Password : </label>
	    <div class="col-sm-9">
	      <input name="new_password" type="password" class="form-control" id="inputNewPassword" placeholder="New Password ">
	    </div>
	  </div>
	  
	  <div class="form-group">
	    <label for="inputConfirmPassword" class="col-sm-3 control-label">Confirm New Password : </label>
	    <div class="col-sm-9">
	      <input name="confirm_new_password" type="password" class="form-control" id="inputConfirmPassword" placeholder="Confirm New Password">
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="col-sm-offset-3 col-sm-9">
	      <button name="update" class="btn btn-success" type="submit" name="add" >Update</button>
	    </div>
	  </div>
	</form>
  </div>
				  
				
			



