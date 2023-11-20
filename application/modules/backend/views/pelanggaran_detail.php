<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<div class="btn-group pull-right tambah-data">
	        		<a href="<?php echo base_url('backend/pelanggaran_show');?>">
	        			<button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Back</button>
	        		</a>
	    		</div>
	    		<h4 class="page-title">Data Pelanggaran</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	    		<div class="col-md-4">
	    			<?php if($row->foto_pelanggaran == ''){?>
	    			<img src="<?php echo base_url('assets/backend/images/image.svg');?>">
	    			<?php }else{?>
	   				<img src="<?php echo base_url('upload/pelanggaran/'). $row->foto_pelanggaran;?>" class="img-rounded">
	   				<?php } ?>
	        	</div>
	        	<ul class="detail">
		        	<div class="col-md-8">
		        		<div class="row">
			        		<div class="col-md-6">
			        			<label>Nama Siswa : </label>
				        		<li><?php echo $row->nama_siswa;?></li>
				        		<label>Waktu Pelanggaran : </label>
				        		<li><?php echo date('d M Y',strtotime($row->waktu_pelanggaran));?></li>
				        		<label>User yang menambahkan :</label>
				        		<li><?php echo $row->username;?></li>
			        		</div>
			        		<div class="col-md-6">
			        			<label>Kategori Pelanggaran : </label>
			        			<li><?php echo $row->nama_kategori;?></li>
			        			<label>Jenis Pelanggaran : </label>
				        		<li><?php echo $row->jenis_pelanggaran;?></li>
				        		<label>Status Pelanggaran : </label>
				        		<li>
				        			<?php 
						                if($row->status == '1'){
						                    echo 'Terselesaikan';
						                }else{
						                    echo 'Belum terselesaikan';
						                }
						            ?>
				        		</li>
			        		</div>
		        		</div>
		        		<div class="row">
		        			<div class="col-md-12">
		        				<label>Keterangan : </label>
		        				<li align="justify"><?php echo $row->keterangan;?></li>
		        			</div>
		        		</div>
		        	</div>
	        	</ul>
	    	</div>
		</div>
	</div>

	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
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
		        	<div class="col-md-8">
		        		<div class="row">
			        		<div class="col-md-6">
			        			<label>NISN : </label>
				        		<li><?php echo $row->nisn;?></li>
				        		<label>Jenis Kelamin : </label>
				        		<li><?php echo $row->jenis_kelamin;?></li>
				        		<label>Wali Kelas :</label>
				        		<li><?php echo $row->nama_guru;?></li>
			        		</div>
			        		<div class="col-md-6">
			        			<label>Nama Siswa : </label>
				        		<li><?php echo $row->nama_siswa;?></li>
				        		<label>Kelas : </label>
				        		<li><?php echo $row->nama_kelas;?></li>
			        		</div>
		        		</div>
		        	</div>
	        	</ul>
	    	</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer');?>