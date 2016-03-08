<?php require_once 'start.php'; ?>
<?php include('config.php'); ?>

<?php 
	
	if(!isset($_REQUEST['sl_no'])){
		header("location: price_list.php");
	}else{
		$id = $_REQUEST['sl_no'];
	}

 ?>

 <?php 

 	$startement = $db->prepare("DELETE FROM inventory WHERE sl_no=? ");
 	$startement->execute(array($id));
 	header("location: price_list.php");

  ?>