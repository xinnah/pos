<style type="text/css">
	h3{text-transform: capitalize;}
</style>
<div class="header_top">
	<div class="col-md-8">
		<a href="#"><img src="img/logo.png"alt="logo"><h1> Binary Pos</h1></a>
	</div>
	<div class="col-md-4">
		<ul class="header_top_aside">
			<li><h3>welcome <?php if(isset($_SESSION["username"])){echo $_SESSION["username"];} ?></h3></li>
			<li style="float:right"><a href="index.php">Logout</a></li>
		</ul>
	</div>
</div><!--  -->