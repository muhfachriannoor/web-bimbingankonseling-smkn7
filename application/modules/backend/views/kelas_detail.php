<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<div class="btn-group pull-right tambah-data">
	        		<a href="<?php echo base_url('backend/kelas_show');?>">
	        			<button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Back</button>
	        		</a>
	    		</div>
	    		<h4 class="page-title">Data Kelas</h4>
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
		        		<label>Nama Wali Kelas : </label>
		        		<li><?php echo $row->nama_guru;?></li>
		        		<label>Email Wali Kelas : </label>
		        		<li><?php echo $row->email;?></li>
		        		<label>Status Kelas : </label>
		        		<li>
		        			<?php 
				                if($row->status == '1'){
				                    echo 'Aktif';
				                }else{
				                    echo 'Tidak Aktif';
				                }
				            ?>
		        		</li>
		        	</div>
		        	<div class="col-md-4">
		        		<label>Nama Kelas : </label>
		        		<li><?php echo $row->nama_kelas;?></li>
		        		<label>Nomor Induk Wali Kelas : </label>
		        		<li><?php echo $row->nomor_induk;?></li>
		        	</div>
	        	</ul>
	    	</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer');?>