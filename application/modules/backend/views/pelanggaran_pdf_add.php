<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<h4 class="page-title">Buat pdf pelanggaran</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	    		<div class="col-md-12">
	           		<form method="post" action="<?php echo base_url('backend/pdfpelanggaran/index');?>" enctype="multipart/form-data">
	           			<div class="row">
	           				<div class="col-md-4">
		           				<div class="form-group">
		           					<label>Kelas</label>
									<select name="kelas" class="select form-control" required>
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
									<label>Dari Tanggal</label>
									<div class="input-group">
										<input type="text" name="dari_tanggal" class="form-control datepicker" required>
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									</div>
								</div>
							</div>
							<div class="col-md-4">
		           				<div class="form-group">
									<label>Sampai Tanggal</label>
									<div class="input-group">
										<input type="text" name="sampai_tanggal" class="form-control datepicker" required>
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									</div>
								</div>
							</div>
						</div><br>
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
<?php $this->load->view('footer2');?>