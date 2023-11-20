<?php  ?>
	<div id="footer">
		<div class="container">
			<p>&copy; <?php echo date('Y');?> Rpl Programmer team <img src="<?php echo base_url('assets/backend/images/rpl.png');?>" alt=""> Some Right Reserved </p>
		</div>
	  </div>

</div><!-- TUTUP id="container" di file header.php-->
<script type="text/javascript" src="<?php echo base_url('assets/backend/js/');?>jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/js/');?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/js/');?>jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/select2/');?>select2.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/tinymce/js/tinymce/');?>tinymce.min.js"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/598ade46dbb01a218b4db7cc/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<script type="text/javascript">
	var base_url = 'http://localhost/smkn7_bk/';
	$(document).ready(function() { 
		$("select.select").select2(); 
	});

	$(document).ready(function(){
		$("#kelas").change(function(){
			var kelas = $("#kelas").val();
			$.ajax({
				url:base_url+"backend/pelanggaran/datasiswa/"+kelas,
				success:function(data){
					$("#siswa").html(data);
				}
			});
		});
	});

	$(document).ready(function(){
		$("#kategori").change(function(){
			var kategori = $("#kategori").val();
			$.ajax({
				url:base_url+"backend/pelanggaran/datajenispelanggaran/"+kategori,
				success:function(data){
					$("#jenis").html(data);
				}
			});
		});
	});

	tinymce.init({
	    selector: ".textarea",
	    height: 200,
	    plugins: [
	        "advlist autolink lists link image charmap print preview anchor",
	        "searchreplace visualblocks code fullscreen",
	        "insertdatetime media table contextmenu paste"
	    ],
	    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});

    $('#kode').change(function(){
      var kode_id = $('#kode').val();
      if(kode_id){
        $.ajax({
          url:"<?php echo site_url('backend/mail/datakelas'); ?>",
          method:"POST",
          data:{kode_id:kode_id},
          success:function(data)
          {
          	var data = $.parseJSON(data);
            $('#nama_guru').html(data.nama_guru);
            $('#email').html(data.email);
          }
        });
      }else{
        $('#nama_guru').html('<input type="text" name="nama_guru" class="form-control" readonly>');
        $('#email').html('<input type="email" name="email" class="form-control" readonly>');
      }
    });
</script>

</body>
</html>