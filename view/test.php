<?php require_once 'start.php'; ?>
<?php use App\Utility\Utility; ?>
<?php use App\Replacement\Replacement; ?>
<?php 
    
    // Utility::dd($_REQUEST);
    $obj = new Replacement;
    $obj->create_replacement($_REQUEST);
	// $num = ltrim( -11,"-");
	// $num -=19;

	// echo $num;
?>


