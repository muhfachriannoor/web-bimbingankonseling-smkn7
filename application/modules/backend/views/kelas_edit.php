<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<h4 class="page-title">Edit Data Kelas</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	    		<div class="col-md-12">
	           		<form method="post" action="<?php echo base_url('backend/kelas/edit_kelas_proses/'.$row->kid);?>">
	           			<div class="row">
	           				<div class="col-md-6">
	           					<div class="form-group">
									<label>Nama Kelas</label>
									<input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas" required value="<?php echo $row->nama_kelas;?>">
								</div>
	           				</div>
	           				<div class="col-md-6">
	           					<div class="form-group">
									<label>Wali Kelas</label>
									<select name="gid" class="select form-control" required>
										<option value="-" disabled="disabled" hidden="hidden">-- PILIH WALI KELAS --</option>
									<?php
	                                    $cek = $this->db->get('tb_guru');
	                                    foreach ($cek->result() as $data) { 
                                	?>
										<option <?php if($row->gid == $data->gid){echo 'selected';}?> value="<?php echo $data->gid;?>"><?php echo $data->nama_guru;?></option>
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