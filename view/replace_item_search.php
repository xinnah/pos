<?php require_once 'start.php'; ?>
<?php use App\Utility\Utility; ?>
<?php use App\Replacement\Replacement; ?>
<?php 
    
    $obj = new Replacement;
    if ($obj->replace_item_search($_REQUEST["search"]) == false) {
    	echo "Item Not Found";
    }else{
    	echo '';
    }
	// $num = ltrim( -11,"-");
	// $num -=19;

	// echo $num;
?>


