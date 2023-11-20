<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<div class="btn-group pull-right tambah-data">
	        		<a href="<?php echo base_url('backend/guru_show');?>">
	        			<button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Back</button>
	        		</a>
	    		</div>
	    		<h4 class="page-title">Data Guru</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	    		<div class="col-md-4">
	   				<?php if($row->foto_guru == ''){?>
	    			<img src="<?php echo base_url('assets/backend/images/image.svg');?>">
	    			<?php }else{?>
	   				<img src="<?php echo base_url('upload/guru/'). $row->foto_guru;?>" class="img-rounded">
	   				<?php } ?>
	        	</div>
	        	<ul class="detail">
		        	<div class="col-md-4">
		        		<label>Nomor Induk : </label>
		        		<li><?php echo $row->nomor_induk;?></li>
		        		<label>Email : </label>
		        		<li><?php echo $row->email;?></li>
		        		<label>Level Akun : </label>
		        		<li>
		        			<?php 
				                if($row->level == '1'){
				                    echo 'Admin';
				                }elseif($row->level == '2'){
				                    echo 'Staff';
				                }elseif($row->level == '3'){
				                    echo 'Wali Kelas';
				                }else{
				                   	echo 'User Biasa';
				                }
				            ?>
		        		</li>
		        	</div>
		        	<div class="col-md-4">
		        		<label>Nama Guru : </label>
		        		<li><?php echo $row->nama_guru;?></li>
		        		<label>Username : </label>
		        		<li><?php echo $row->username;?></li>
		        		<label>Status Akun : </label>
		        		<li>
		        			<?php 
				                if($row->status_user == '1'){
				                    echo 'Aktif';
				                }else{
				                    echo 'Tidak Aktif';
				                }
				            ?>
		        		</li>
		        	</div>
	        	</ul>
	    	</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer');?>