<footer class="main_footer_section">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-7">
							<p>Korea IT</p>
						</div>
						<div class="col-sm-2">
							<p>Binary Pos <span>v 1.0.0</span> </p>
						</div>
						<div class="col-sm-3">
							<p>Copyright &copy; 2015 <a href="www.binary-logic.net">Binary Logic</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
<script src="js/wow.min.js"></script>
<script type="text/javascript" src="js/scriptanother.js"></script>

<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script src="js/jquery-ui.min.js"></script>
    
    <script src="js/bootstrap-datepicker.js"></script>
    
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>



<script type="text/javascript">
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
	});/**/
	
	
</script>
<script>
   $(document).ready(function(){
	   $(window).bind('scroll', function() {
	   var navHeight = $( window ).height() - 550;
			 if ($(window).scrollTop() > navHeight) {
				 $('nav').addClass('fixed');
			 }
			 else {
				 $('nav').removeClass('fixed');
			 }
		});
	});/*end scroll*/
   $('#myModal').on('shown.bs.modal', function () {
	  $('#myInput').focus()
	});/*end modal*/

</script>

</body>
</html>