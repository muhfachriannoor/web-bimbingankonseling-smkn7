<?php $this->load->view('header'); ?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h4 class="page-title">Edit Data Mail</h4>
			</div>
		</div>
		<div class="content">
			<div class="row">
				<div class="col-md-12">
					<form method="post" action="<?php echo base_url('backend/mail/edit_mail_proses/' . $data->mid); ?>" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label>Kelas</label>
									<select name="kid" id="kode" class="select form-control" required>
										<option value="-" disabled="disabled" hidden="hidden" selected="selected">-- PILIH KELAS --</option>
										<?php
										$cek = $this->db->query("SELECT * FROM tb_kelas WHERE status='1'");
										foreach ($cek->result() as $row) {
										?>
											<option value="<?php echo $row->kid ?>" <?= ($data->kid == $row->kid) ? 'selected="selected"' : ''; ?>><?php echo $row->nama_kelas; ?></option>
										<?php } ?>
									</select>
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Nama Wali Kelas</label>
									<div id="nama_guru">
										<input type="text" name="nama_guru" class="form-control" value="<?= $data->nama_guru; ?>" readonly>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Email</label>
									<div id="email">
										<input type="email" name="email" class="form-control" value="<?= $data->email; ?>" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-offset-2 col-md-4">
								<div class="form-group">
									<label>Subjek</label>
									<input type="text" name="subjek" class="form-control" placeholder="Subjek" value="<?php echo $data->subjek; ?>" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>File</label>
									<input type="file" name="file" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-offset-3 col-md-6">
								<div class="form-group">
									<label>Keterangan / Isi</label>
									<textarea name="isi" class="textarea"><?php echo $data->isi; ?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group center">
										<button type="submit" class="btn btn-success" onclick="return confirm('Apa data sudah benar?')">Save</button>
										<button type="reset" class="btn btn-primary">Reset</button>
										<a class="btn btn-warning" href="<?php echo base_url('backend/mail_show'); ?>">Back</a>
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