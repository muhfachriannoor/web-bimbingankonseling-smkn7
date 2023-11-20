<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<h4 class="page-title">Edit Data Jenis Pelanggaran</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	    		<div class="col-md-12">
	           		<form method="post" action="<?php echo base_url('backend/jenispelanggaran/edit_jenispelanggaran_proses/'.$row->jid);?>">
	           			<div class="row">
	           				<div class="col-md-offset-3 col-md-6">
	           					<div class="form-group">
									<label>Kategori Pelanggaran</label>
									<select name="kpid" class="select form-control" required>
										<option value="-" disabled="disabled" hidden="hidden" selected="selected">-- PILIH KATEGORI PELANGGARAN --</option>
									<?php
	                                    $cek = $this->db->query("SELECT * FROM tb_kategori_pelanggaran");
	                                    foreach ($cek->result() as $data) { 
                                	?>
										<option <?php if($row->kpid == $data->kpid){echo 'selected';}?> value="<?php echo $data->kpid;?>"><?php echo $data->nama_kategori;?></option>
									<?php } ?>
									</select>
								</div>
	           				</div>
	           				<div class="col-md-offset-3 col-md-6">
	           					<div class="form-group">
									<label>Jenis Pelanggaran</label>
									<input type="text" name="jenis_pelanggaran" class="form-control" placeholder="Nama Jenis Pelanggaran" required value="<?php echo $row->jenis_pelanggaran;?>">
								</div>
	           				</div>
	           			</div>
	           			<div class="row">
	           				<div class="col-md-12">
	           					<div class="form-group center">
									<button type="submit" class="btn btn-success" onclick="return confirm('Apa data sudah benar?')">Save</button>
									<button type="reset" class="btn btn-primary">Reset</button>
									<a class="btn btn-warning" href="<?php echo base_url('backend/jenispelanggaran_show');?>">Back</a>
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