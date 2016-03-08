<?php require_once 'start.php'; ?>
<?php include('config.php'); ?>

<?php 
	
	if(!isset($_REQUEST['id'])){
		header("location: setting-register.php");
	}else{
		$id = $_REQUEST['id'];
	}

 ?>

 <?php 

 	$startement = $db->prepare("DELETE FROM admin WHERE id=? ");
 	$startement->execute(array($id));
 	header("location: setting-register.php");

  ?>