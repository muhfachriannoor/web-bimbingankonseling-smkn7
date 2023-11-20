<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<h4 class="page-title">Tambah Data Siswa</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	    		<div class="col-md-12">
	    			<?php echo $this->session->flashdata('alert');?>
	           		<form method="post" action="<?php echo base_url('backend/siswa/input_siswa_proses');?>" enctype="multipart/form-data">
	           			<div class="row">
	           				<div class="col-md-6">
	           					<div class="form-group">
									<label>Nisn</label>
									<input type="text" maxlength="10" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Max 10" name="nisn" required>
								</div>
	           				</div>
	           				<div class="col-md-6">
	           					<div class="form-group">
									<label>Nama Siswa</label>
									<input type="text" class="form-control" name="nama_siswa" placeholder="Nama lengkap siswa" required>
								</div>
	           				</div>
	           			</div>
	           			<div class="row">
	           				<div class="col-md-4">
	           					<div class="form-group">
									<label>Jenis Kelamin</label>
									<select name="jk" class="form-control" required>
										<option value="-" disabled="disabled" hidden="hidden" selected="selected">-- PILIH JENIS KELAMIN --</option>
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
	           				</div>
	           				<div class="col-md-4">
	           					<div class="form-group">
									<label>Kelas</label>
									<select name="kid" class="select form-control" required>
										<option value="-" disabled="disabled" hidden="hidden" selected="selected">-- PILIH KELAS --</option>
									<?php
	                                    $cek = $this->db->query("SELECT * FROM tb_kelas WHERE status='1'");
	                                    foreach ($cek->result() as $row) { 
                                	?>
										<option value="<?php echo $row->kid?>"><?php echo $row->nama_kelas;?></option>
									<?php } ?>
									</select>
								</div>
	           				</div>
	           				<div class="col-md-4">
	           					<div class="form-group">
									<label>Foto</label>
									<input type="file" name="foto" class="form-control">
								</div>
	           				</div>
	           			</div>
	           			<div class="row">
	           				<div class="col-md-12">
	           					<div class="form-group center">
									<button type="submit" class="btn btn-success" onclick="return confirm('Apa data sudah benar?')">Save</button>
									<button type="reset" class="btn btn-primary">Reset</button>
									<a class="btn btn-warning" href="<?php echo base_url('backend/siswa_show');?>">Back</a>
								</div>
	           				</div>
	           			</div>
	           		</div>
	           	</form>
	        </div>
	    </div>
	</div>
</div>
<script>
	function hanyaAngka(evt) {
		var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
		    return false;
		return true;
	}
</script>

<?php $this->load->view('footer');?>