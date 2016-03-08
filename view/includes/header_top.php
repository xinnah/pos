<?php include('config.php'); ?>
<?php  ?>
<style type="text/css">
	h3{text-transform: capitalize;}
	h1{text-transform: capitalize;}
	img{width: 45px;height: 45px;}
</style>
<div class="header_top">
	<div class="col-md-8">
		<?php 

		 	$startement = $db->prepare("SELECT * FROM logo_section WHERE id=1");
		 	$startement->execute();
		 	$result = $startement->fetchAll(PDO::FETCH_ASSOC);
		 	foreach ($result as $row) {
		 		
		 		$image = $row['image'];
		 		$name = $row['name'];
		 		
		 	}

		  ?>
		<a href="#"><img src="uploads/logo/<?php echo $image; ?>" alt="logo"><h1> <?php echo $name; ?></h1></a>
	</div>
	<div class="col-md-4">
		<ul class="header_top_aside">
			<li><h3>welcome <?php if(isset($_SESSION["username"])){echo $_SESSION["username"];} ?></h3></li>
			<li style="float:right"><a href="index.php">Logout</a></li>
		</ul>
	</div>
</div><!--  -->