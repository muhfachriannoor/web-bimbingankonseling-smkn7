<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<div class="btn-group pull-right tambah-data">
	        		<a href="<?php echo base_url('backend/pengaturan_show');?>">
	        			<button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Back</button>
	        		</a>
	    		</div>
	    		<h4 class="page-title">Data Pengaturan</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	        	<ul class="detail">
		        	<div class="col-md-3">
		        		<label>Nama Pengaturan : </label>
		        		<li><?php echo $row->nama_pengaturan;?></li>
		        		<label>Waktu Pengaturan : </label>
		        		<li><?php echo date('d M Y',strtotime($row->waktu_ubah));?></li>
		        		<label>Status Pengaturan : </label>
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
		        	<div class="col-md-9">
		        		<label>Isi : </label>
		        		<li align="justify"><?php echo $row->isi;?></li>
		        	</div>
	        	</ul>
	    	</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer');?>