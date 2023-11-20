<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<h4 class="page-title">Tambah Data Pelanggaran</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	    		<div class="col-md-12">
	           		<form method="post" action="<?= base_url('backend/pelanggaran/input_pelanggaran_proses');?>" enctype="multipart/form-data">
	           			<div class="row">
	           				<div class="col-md-6">
		           				<div class="form-group">
		           					<label>Kelas Siswa</label>
									<select name="kelas" id="kelas" class="select form-control" required>
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
		           			<div class="col-md-6">
		           				<div class="form-group">
									<label>Nama Siswa</label>
									<select name="sid" class="select form-control" id="siswa" required>
										<option value="-" disabled="disabled" hidden="hidden" selected="selected">-- PILIH SISWA --</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
		           				<div class="form-group">
		           					<label>Kategori Pelanggaran</label>
									<select name="kpid" id="kategori" class="select form-control" required>
										<option value="-" disabled="disabled" hidden="hidden" selected="selected">-- PILIH KATEGORI PELANGGARAN --</option>
										<?php
			                                $cek = $this->db->get('tb_kategori_pelanggaran');
			                                foreach ($cek->result() as $row) { 
		                               	?>
										<option value="<?php echo $row->kpid?>"><?php echo $row->nama_kategori;?></option>
										<?php } ?>
									</select>
		           				</div>
		           			</div>
		           			<div class="col-md-6">
		           				<div class="form-group">
		           					<label>Jenis Pelanggaran</label>
									<select name="jid" class="select form-control" id="jenis" required>
										<option value="-" disabled="disabled" hidden="hidden" selected="selected">-- PILIH JENIS PELANGGARAN --</option>
									</select>
		           				</div>
		           			</div>
		           		</div>
		           		<div class="row">
		           			<div class="col-md-6">
		           				<div class="form-group">
									<label>Keterangan</label>
		           					<textarea name="keterangan" class="textarea"></textarea>
		           				</div>
		           			</div>
		           			<div class="col-md-6">
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
									<a class="btn btn-warning" href="<?php echo base_url('backend/pelanggaran_show');?>">Back</a>
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