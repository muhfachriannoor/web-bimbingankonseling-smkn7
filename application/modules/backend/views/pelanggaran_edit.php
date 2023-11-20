<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<h4 class="page-title">Edit Data Pelanggaran</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	    		<div class="col-md-12">
	           		<form method="post" action="<?php echo base_url('backend/pelanggaran/edit_pelanggaran_proses/'.$data->pid);?>" enctype="multipart/form-data">
	           			<div class="row">
	           				<div class="col-md-6">
		           				<div class="form-group">
		           					<label>Kelas Siswa</label>
									<select name="kid" id="kelas" class="select form-control" required>
										<option value="-" disabled="disabled" hidden="hidden" selected="selected">-- PILIH KELAS --</option>
										<?php
											$cek = $this->db->query("SELECT * FROM tb_kelas WHERE status='1'");
			                                foreach ($cek->result() as $kelas) { 
										?>
										<option <?php if($data->kid == $kelas->kid){echo 'selected';}?> value="<?php echo $kelas->kid;?>"><?php echo $kelas->nama_kelas;?></option>
										<?php } ?>
									</select>
		           				</div>
		           			</div>
		           			<div class="col-md-6">
		           				<div class="form-group">
									<label>Nama Siswa</label>
									<select name="sid" class="select form-control" id="siswa" required>
										<option value="-" disabled="disabled" hidden="hidden" selected="selected">-- PILIH SISWA --</option>
										<?php
											$cek = $this->db->query("SELECT * FROM tb_siswa WHERE kid='$data->kid'");
			                                foreach ($cek->result() as $siswa) {  	
										?>
										<option <?php if($data->sid == $siswa->sid){echo 'selected';}?> value="<?php echo $siswa->sid;?>"><?php echo $siswa->nama_siswa;?></option>
										<?php } ?>
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
			                                foreach ($cek->result() as $kategori) { 
		                               	?>
										<option <?php if($data->kpid == $kategori->kpid){echo 'selected';}?> value="<?php echo $kategori->kpid;?>"><?php echo $kategori->nama_kategori;?></option>
										<?php } ?>
									</select>
		           				</div>
		           			</div>
		           			<div class="col-md-6">
		           				<div class="form-group">
		           					<label>Jenis Pelanggaran</label>
									<select name="jid" class="select form-control" id="jenis" required>
										<option value="-" disabled="disabled" hidden="hidden" selected="selected">-- PILIH JENIS PELANGGARAN --</option>
										<?php
											$cek = $this->db->get('tb_jenis_pelanggaran');
			                                foreach ($cek->result() as $jenis) {  	
										?>
										<option <?php if($data->jid == $jenis->jid){echo 'selected';}?> value="<?php echo $jenis->jid;?>"><?php echo $jenis->jenis_pelanggaran;?></option>
										<?php } ?>
									</select>
		           				</div>
		           			</div>
		           		</div>
		           		<div class="row">
		           			<div class="col-md-6">
		           				<div class="form-group">
									<label>Keterangan</label>
		           					<textarea name="keterangan" class="textarea"><?php echo $data->keterangan;?></textarea>
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