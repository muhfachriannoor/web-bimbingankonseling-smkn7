<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<h4 class="page-title">Tambah Data Kelas</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	    		<div class="col-md-12">
	           		<form method="post" action="<?php echo base_url('backend/kelas/input_kelas_proses');?>">
	           			<div class="row">
	           				<div class="col-md-6">
	           					<div class="form-group">
									<label>Nama Kelas</label>
									<input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas" required>
								</div>
	           				</div>
	           				<div class="col-md-6">
	           					<div class="form-group">
									<label>Wali Kelas</label>
									<select name="gid" class="select form-control" id="select_kelas" required>
										<option value="-" disabled="disabled" hidden="hidden" selected="selected">-- PILIH WALI KELAS --</option>
									<?php
	                                    $cek = $this->db->query("SELECT tb_user.uid, tb_user.username, tb_user.status_user, tb_user.level, tb_guru.* FROM tb_user INNER JOIN tb_guru ON tb_guru.username = tb_user.username WHERE tb_user.level = '3' ORDER BY tb_user.status_user DESC");
	                                    foreach ($cek->result() as $row) { 
                                	?>
										<option value="<?php echo $row->gid?>"><?php echo $row->nama_guru;?></option>
									<?php } ?>
									</select>
								</div>
	           				</div>
	           			</div>
	           			<div class="row">
	           				<div class="col-md-12">
	           					<div class="form-group center">
									<button type="submit" class="btn btn-success" onclick="return confirm('Apa data sudah benar?')">Save</button>
									<button type="reset" class="btn btn-primary">Reset</button>
									<a class="btn btn-warning" href="<?php echo base_url('backend/kelas_show');?>">Back</a>
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