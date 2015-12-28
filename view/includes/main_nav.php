<div class="container-fluid no_padding">
<nav class="navbar navbar-inverse">
	  <div class="container">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	<?php
	            $full_name = $_SERVER['PHP_SELF'];
	            $name_array = explode('/',$full_name);
	            $count = count($name_array);
	            $page_name = $name_array[$count-1];
	        ?>

	        <li class="<?php echo ($page_name=='welcome.php')?'active':'';?>"><a href="welcome.php">POS</a></li>
	        <li class="<?php echo ($page_name=='sales_manager.php')?'active':'';?>"><a href="sales_manager.php">SALES</a></li>
	        <li class="<?php echo ($page_name=='replacement.php')?'active':'';?>"><a href="replacement.php">REPLACEMENT</a></li>
	        <li class="<?php echo ($page_name=='purchase.php')?'active':'';?>"><a href="purchase.php">PURCHASE</a></li>
	        
	        <li class="<?php echo ($page_name=='inventory.php')?'active':'';?>"><a href="inventory.php">INVENTORY</a></li>
	        <li><a href="#">ACCOUNTS</a></li>
	        <li class="<?php echo ($page_name=='overhead_costs.php')?'active':'';?>"><a href="overhead_costs.php">OVERHEAD COSTS</a></li>
	        <li><a href="#">REPORTS</a></li>
	        <li><a href="#">BARCODE GENERATOR</a></li>
	        
	      </ul>
	      
	      
	    </div><!-- /.navbar-collapse -->
	  </div><!-- end container -->
	</nav><!-- nav end -->
	</div><!-- /.container-fluid -->