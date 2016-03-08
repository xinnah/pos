

<div id="print">
	
	<?php
	 include('bar128.php');
	 echo '<div style="padding:5px;margin:5px auto;width:135px;">';
	 echo bar128(stripslashes($_POST['bar']));
	 echo '</div>';
	?>

</div> 
<button name="confirm_barcode" onclick="printDiv('print')"style="width: 10%;margin-left: 611px;padding: 8px;background: #2BABD2;border: 0;border-radius: 50px;color: #fff;text-transform: uppercase;text-shadow: 1px 4px 2px #000;cursor:pointer;">Print
	<script>
        function printDiv(divName) {
           var printContents = document.getElementById(divName).innerHTML;
           var originalContents = document.body.innerHTML;

           document.body.innerHTML = printContents;

           window.print();

           document.body.innerHTML = originalContents;
            //document.getElementById('print').innerHTML = inputBox.value;
      }
  </script>
</button>
 <a href="barcode.php"><button name="confirm" style="width: 10%;margin-left: 611px;padding: 8px;background: #4EB376;border: 0;border-radius: 50px;color: #fff;text-transform: uppercase;text-shadow: 1px 4px 2px #000;cursor: pointer;margin-top: 35px;">Back</button></a>
