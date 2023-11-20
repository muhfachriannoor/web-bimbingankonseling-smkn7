<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<div class="btn-group pull-right tambah-data">
	        		<a href="<?php echo base_url('backend/siswa_show');?>">
	        			<button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Back</button>
	        		</a>
	    		</div>
	    		<h4 class="page-title">Data Siswa</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	    		<div class="col-md-4">
	    			<?php if($row->foto_siswa == ''){?>
	    			<img src="<?php echo base_url('assets/backend/images/image.svg');?>">
	    			<?php }else{?>
	   				<img src="<?php echo base_url('upload/siswa/'). $row->foto_siswa;?>" class="img-rounded">
	   				<?php } ?>
	        	</div>
	        	<ul class="detail">
		        	<div class="col-md-4">
		        		<label>NISN : </label>
		        		<li><?php echo $row->nisn;?></li>
		        		<label>Nama Siswa : </label>
		        		<li><?php echo $row->nama_siswa;?></li>
		        		<label>Kelas : </label>
		        		<li><?php echo $row->nama_kelas;?></li>
		        	</div>
		        	<div class="col-md-4">
		        		<label>Jenis Kelamin : </label>
		        		<li><?php echo $row->jenis_kelamin;?></li>
		        	</div>
	        	</ul>
	    	</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer');?>