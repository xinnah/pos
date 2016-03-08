<?php require_once 'start.php'; ?>

<?php include('config.php'); ?>
<?php 

	/*if(!isset($_REQUEST['id'])){
		header('location:welcome.php');
	}
	else{
		$id = $_REQUEST['id'];
	}*/
 ?>

<?php 
	
	if(isset($_POST['update'])){
		try {
			
			
			
			if(empty($_POST['name'])){
				throw new Exception("name cannot be empty!");
				
			}

			if(empty($_FILES['image']['name'])){

				$startement = $db->prepare("UPDATE logo_section SET name=? WHERE id=1");
				$startement->execute(array($_POST['name']));
				$success = "Logo Section is Update Successfully.";
			}
			else{

				$up_filename =$_FILES["image"]["name"];
				$file_basename = substr($up_filename, 0, strripos($up_filename, '.'));
				$file_ext = substr($up_filename, strripos($up_filename, '.'));
				$f1 ='1' . $file_ext;
				if(($file_ext!= '.png') && ($file_ext!= '.PNG') && ($file_ext!= '.jpg') && ($file_ext!= '.JPG') && ($file_ext!= '.jpeg') && ($file_ext!= '.JPEG') && ($file_ext!= '.gif'))
					throw new Exception("Only png, jpg, jpeg, gif format image upload!");

				$startement = $db->prepare("SELECT * FROM logo_section WHERE id=1");
				$startement->execute();
				$result = $startement->fetchAll(PDO::FETCH_ASSOC);
				foreach ($result as $row) {
					$real_path = "../uploads/logo/".$row["image"];
					unlink($real_path);
				}

				move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/logo/".$f1);

				$startement = $db->prepare("UPDATE logo_section SET image=?,name=? WHERE id=1");
				$startement->execute(array($f1,$_POST['name']));

				$success = "Logo Section is Update successfully.";
			}
			
			


		} catch (Exception $e) {
			$error_message = $e->getMessage();
		}
	}

 ?>

 <?php 

 	$startement = $db->prepare("SELECT * FROM logo_section WHERE id=1");
 	$startement->execute();
 	$result = $startement->fetchAll(PDO::FETCH_ASSOC);
 	foreach ($result as $row) {
 		
 		$image = $row['image'];
 		$name = $row['name'];
 		
 	}

  ?>

 <style type="text/css">
	.error{overflow: hidden;color: red;text-align: center;font-weight: bold;text-transform: capitalize;}
	.success{overflow: hidden;color: green;text-align: center;font-weight: bold;text-transform: capitalize;}
	.logo_image{}
</style>
 	<?php include('includes/setting_top_sidebar.php'); ?>

 	
			<div class="col-md-9 no_padding">
				<div class="panel panel-info no_margin">
					  <div class="panel-heading"><h4 style="text-align:center;">Logo Section</h4></div>
					  		
					  	<div class="panel-body">
					  		
					  		<div>

							  <!-- Nav tabs -->
							  <ul class="nav nav-tabs" role="tablist">
							    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Update Logo</a></li>
							    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">View Logo</a></li>
							    
							  </ul>

							  <!-- Tab panes -->
							  <div class="tab-content"style="min-height:200px;margin-top:10px;">
							    <div role="tabpanel" class="tab-pane active" id="home">
							    	
									<div class="error"> <?php if(isset($error_message)){echo $error_message;} ?> </div>	
									<div class="success"> <?php if(isset($success)){echo $success;} ?> </div>

							    	<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
									  <div class="form-group">
									    <label for="inputCompanyLogo3" class="col-sm-3 control-label">Company Logo :</label>
									    <div class="col-sm-9">
									      <input name="image" type="file" class="form-control" id="inputCompanyLogo3">
									      <tr><td><img class="logo_image" src="uploads/logo/<?php echo $image; ?>" alt=""></td></tr>
									    </div>
									  </div>
									  <div class="form-group">
									    <label for="inputLogoName3" class="col-sm-3 control-label">Company Name :</label>
									    <div class="col-sm-9">
									      <input name="name" type="text" class="form-control" id="inputLogoName3"value="<?php echo $name; ?>">
									    </div>
									  </div>
									  
									  <div class="form-group">
									    <div class="col-sm-offset-3 col-sm-9">
									   
									      <button name="update" type="submit" class="btn btn-success">Update</button>
									    </div>
									  </div>
									</form>
							    </div><!--  -->

							    <div role="tabpanel" class="tab-pane" id="profile">
							    	<h1 style="color:red; text-align:center;"><marquee>Coming Soon...</marquee></h1>
							    </div>
							  </div>

							</div>
							
						</div><!-- end panel body -->
					</div>
					  	
					
			</div>
			
		</div>
	</div>
</section>
<script type="text/javascript">
	$('#myTabs a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	});
</script>
	<?php include('includes/footer.php'); ?>