<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<h4 class="page-title">Edit Akun</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	    		<div class="col-md-12">
	    			<?php echo $this->session->flashdata('alert');?>
	           		<form method="post" action="<?php echo base_url('backend/user_edit_proses/'.$row->uid);?>" enctype="multipart/form-data">
	           			<div class="row">
	           				<div class="col-md-3">
	           					<div class="form-group">
									<label>Nomor Induk</label>
									<input type="text" maxlength="15" onkeypress="return hanyaAngka(event)" class="form-control" placeholder="Max 15" name="nomor_induk" value="<?php echo $row->nomor_induk;?>" required>
								</div>
	           				</div>
	           				<div class="col-md-3">
	           					<div class="form-group">
									<label>Nama</label>
									<input type="text" class="form-control" name="nama_guru" placeholder="Nama lengkap guru" value="<?php echo $row->nama_guru;?>" required>
								</div>
	           				</div>
	           				<div class="col-md-3">
	           					<div class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" name="email" placeholder="example@gmail.com" value="<?php echo $row->email;?>" required>
								</div>
	           				</div>
	           				<div class="col-md-3">
	           					<div class="form-group">
									<label>Foto</label>
									<input type="file" name="foto">
								</div>
	           				</div>
	           			</div>
	           			<div class="row">
	           				<div class="col-md-3">
	           					<div class="form-group">
	           						<label>Username</label>
	           						<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $row->username;?>" required>
	           						<input type="hidden" name="h_username" value="<?php echo $row->username;?>">
	           					</div>
	           				</div>
	           				<div class="col-md-3">
	           					<div class="form-group">
	           						<label>Password</label>
	           						<input type="password" class="form-control" name="password" placeholder="Password">
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
	           						<select class="form-control" disabled name="level">
        								<option <?php if($row->level == '1'){ echo 'selected'; } ?> value="<?php $row->level;?>">Admin</option>
        								<option <?php if($row->level == '2'){ echo 'selected'; } ?> value="<?php $row->level;?>">Staff</option>
        								<option <?php if($row->level == '3'){ echo 'selected'; } ?> value="<?php $row->level;?>">Wali Kelas</option>
        								<option <?php if($row->level == '4'){ echo 'selected'; } ?> value="<?php $row->level;?>">User Biasa</option>
      								</select>
	           					</div>
	           				</div>
	           			</div>
	           			<div class="row">
	           				<div class="col-md-12"><br>
	           					<div class="form-group center">
									<button type="submit" class="btn btn-success" name="submit" onclick="return confirm('Apa data sudah benar?')">Save</button>
									<button type="reset" class="btn btn-primary">Reset</button>
									<a class="btn btn-warning" href="<?php echo base_url('backend/index');?>">Back</a>
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