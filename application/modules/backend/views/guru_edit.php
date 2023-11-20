<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<h4 class="page-title">Edit Data Guru</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	    		<div class="col-md-12">
	    			<?php echo $this->session->flashdata('alert');?>
	           		<form method="post" action="<?php echo base_url('backend/guru/edit_guru_proses/'.$row->uid);?>" enctype="multipart/form-data">
	           			<div class="row">
	           				<div class="col-md-3">
	           					<div class="form-group">
									<label>Nomor Induk</label>
									<input type="text" maxlength="15" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Max 15" name="nomor_induk" required value="<?php echo $row->nomor_induk;?>">
								</div>
	           				</div>
	           				<div class="col-md-3">
	           					<div class="form-group">
									<label>Nama Guru</label>
									<input type="text" class="form-control" name="nama_guru" placeholder="Nama lengkap guru" required value="<?php echo $row->nama_guru;?>">
								</div>
	           				</div>
	           				<div class="col-md-3">
	           					<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" name="email" placeholder="example@mail.com" required value="<?php echo $row->email;?>">
								</div>
	           				</div>
	           				<div class="col-md-3">
	           					<div class="form-group">
									<label>Foto</label>
									<input type="file" name="foto" class="form-control">
								</div>
	           				</div>
	           			</div>
	           			<div class="row">
	           				<div class="col-md-3">
	           					<div class="form-group">
	           						<label>Username</label>
	           						<input type="text" class="form-control" name="username" placeholder="Username" required value="<?php echo $row->username;?>">
	           						<input type="hidden" name="h_username" value="<?php echo $row->username;?>">
	           					</div>
	           				</div>
	           				<div class="col-md-3">
	           					<div class="form-group">
	           						<label>Password</label>
	           						<input type="password" class="form-control" name="password" placeholder="******">
	           					</div>
	           				</div>
	           				<div class="col-md-3">
	           					<div class="form-group">
	           						<label>Konfirmasi Password</label>
	           						<input type="password" class="form-control" name="r_password" placeholder="Konfirmasi Password">
	           					</div>
	           				</div>
	           				<div class="col-md-3">
	           					<div class="form-group">
	           						<label>Level</label>
									<select class="form-control" name="level" required>
        								<option <?php if($row->level == '1'){ echo 'selected'; } ?> value="1">Admin</option>
        								<option <?php if($row->level == '2'){ echo 'selected'; } ?> value="2">Staff</option>
        								<option <?php if($row->level == '3'){ echo 'selected'; } ?> value="3">Wali Kelas</option>
        								<option <?php if($row->level == '4'){ echo 'selected'; } ?> value="4">User Biasa</option>
      								</select>
	           					</div>
	           				</div>
	           			</div>
	           			<div class="row">
	           				<div class="col-md-12"><br>
	           					<input type="hidden" name="id" value="<?php echo $row->gid;?>">
	           					<div class="form-group center">
									<button type="submit" class="btn btn-success" onclick="return confirm('Apa data sudah benar?')">Save</button>
									<button type="reset" class="btn btn-primary">Reset</button>
									<a class="btn btn-warning" href="<?php echo base_url('backend/guru_show');?>">Back</a>
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
<?php $this->load->view('footer');?>