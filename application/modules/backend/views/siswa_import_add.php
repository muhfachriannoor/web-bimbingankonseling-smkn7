<?php $this->load->view('header'); ?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4 class="page-title">Import Data Siswa</h4>
			</div>
		</div>
		<div class="content">
			<div class="row">
				<div class="col-md-12">
					<form method="post" action="<?php echo base_url('backend/siswa/import_proses'); ?>" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-offset-4 col-md-4">
								<div class="form-group">
									<label>Kelas Siswa</label>
									<select name="kid" class="select form-control" required>
										<option value="-" disabled="disabled" hidden="hidden" selected="selected">-- PILIH KELAS --</option>
										<?php
										$cek = $this->db->query("SELECT * FROM tb_kelas WHERE status='1'");
										foreach ($cek->result() as $row) {
										?>
											<option value="<?php echo $row->kid ?>"><?php echo $row->nama_kelas; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-md-offset-4 col-md-4">
								<div class="form-group">
									<label>File Excel Siswa</label>
									<input type="file" name="file" class="form-control" required><br>
									<a href="<?php echo base_url('backend/siswa/download'); ?>">
										<button type="button" class="btn btn-warning">Contoh File</button>
									</a>

								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-offset-4 col-md-4">
								<div class="form-group">
									<label>File Foto Siswa</label>
									<input type="file" name="file_foto" class="form-control" required><br>
									<p class="note">(*) File Excel Siswa dengan format .csv</p>
									<p class="note">(*) File Foto Siswa dengan format .zip</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group center">
									<button type="submit" class="btn btn-success" onclick="return confirm('Apa data sudah benar?')">Save</button>
									<button type="reset" class="btn btn-primary">Reset</button>
									<a class="btn btn-warning" href="<?php echo base_url('backend/siswa_show'); ?>">Back</a>
								</div>
							</div>
						</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer'); ?>