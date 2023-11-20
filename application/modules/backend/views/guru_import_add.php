<?php $this->load->view('header'); ?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4 class="page-title">Import Data Guru</h4>
			</div>
		</div>
		<div class="content">
			<div class="row">
				<div class="col-md-12">
					<form method="post" action="<?php echo base_url('backend/guru/import_proses'); ?>" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-offset-4 col-md-4">
								<div class="form-group">
									<label>File Excel Guru</label>
									<input type="file" name="file" class="form-control" required><br>
									<a href="<?php echo base_url('backend/guru/download'); ?>">
										<button type="button" class="btn btn-warning">Contoh File</button>
									</a>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-offset-4 col-md-4">
								<div class="form-group">
									<label>File Foto Guru</label>
									<input type="file" name="file_foto" class="form-control" required><br>
									<p class="note">(*) File Excel Guru dengan format .csv</p>
									<p class="note">(*) File Foto Guru dengan format .zip</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group center">
									<button type="submit" class="btn btn-success" onclick="return confirm('Apa data sudah benar?')">Save</button>
									<button type="reset" class="btn btn-primary">Reset</button>
									<a class="btn btn-warning" href="<?php echo base_url('backend/guru_show'); ?>">Back</a>
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

<?php $this->load->view('footer'); ?>