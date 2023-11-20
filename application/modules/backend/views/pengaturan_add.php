<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<h4 class="page-title">Tambah Data Pengaturan</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	    		<div class="col-md-12">
	           		<form method="post" action="<?php echo base_url('backend/pengaturan/input_pengaturan_proses');?>">
	           			<div class="row">
	           				<div class="col-md-offset-3 col-md-6">
	           					<div class="form-group">
									<label>Nama Pengaturan</label>
									<input type="text" name="nama_pengaturan" class="form-control" placeholder="Nama Pengaturan" required>
								</div>
	           				</div>
	           			</div>
	           			<div class="row">
	           				<div class="col-md-offset-3 col-md-6">
	           					<div class="form-group">
									<label>Isi Pengaturan</label>
									<textarea name="isi" class="textarea"></textarea>
								</div>
	           				</div>
	           			</div>
	           			<div class="row">
	           				<div class="col-md-12">
	           					<div class="form-group center">
									<button type="submit" class="btn btn-success" onclick="return confirm('Apa data sudah benar?')">Save</button>
									<button type="reset" class="btn btn-primary">Reset</button>
									<a class="btn btn-warning" href="<?php echo base_url('backend/pengaturan_show');?>">Back</a>
								</div>
	           				</div>
	           			</div>
	           		</div>
	           	</form>
	        </div>
	    </div>
	</div>
</div>
<?php $this->load->view('footer');?>