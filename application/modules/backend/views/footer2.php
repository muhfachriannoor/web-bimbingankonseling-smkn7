<?php  ?>
	<div id="footer">
		<div class="container">
			<p>&copy; <?php echo date('Y');?> Rpl Programmer team <img src="<?php echo base_url('assets/backend/images/rpl.png');?>" alt=""> Some Right Reserved </p>
		</div>
	  </div>

</div><!-- TUTUP id="container" di file header.php-->
<script type="text/javascript" src="<?php echo base_url('assets/backend/js/');?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/js/');?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/DataTables/');?>media/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/DataTables/');?>media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/js/');?>bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/select2/');?>select2.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.data-table').DataTable();
	});

	$(function() {
	    $('.datepicker').datepicker({
	        format: 'yyyy-mm-dd',
	        autoclose: true,
	        todayHighlight: true
	    })
	});

	$(document).ready(function() { 
		$("select.select").select2(); 
	});
</script>
</body>
</html>