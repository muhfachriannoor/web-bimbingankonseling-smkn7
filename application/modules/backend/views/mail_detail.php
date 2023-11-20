<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    			<div class="btn-group pull-right tambah-data">
	        		<a href="<?php echo base_url('backend/mail_show');?>">
	        			<button type="button" class="btn btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Back</button>
	        		</a>
	    		</div>
	    		<h4 class="page-title">Data Mail</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	        	<ul class="detail">
		        	<div class="col-md-3">
		        		<label>Kelas : </label>
		        		<li><?php echo $row->nama_kelas;?></li>
		        		<label>Wali Kelas : </label>
		        		<li><?php echo $row->nama_guru;?></li>
		        		<label>Email : </label>
		        		<li><?php echo $row->email;?></li>
		        		<label>Waktu Mail</label>
		        		<li><?php echo date('d M Y',strtotime($row->waktu_mail));?></li>
		        		<label>Subjek : </label>
		        		<li><?php echo $row->subjek;?></li>
		        		<label>Status Mail : </label>
		        		<li>
		        			<?php 
				                if($row->status == '1'){
				                    echo 'Aktif';
				                }else{
				                    echo 'Tidak Aktif';
				                }
				            ?>
		        		</li>
		        		<a href="<?php echo base_url('upload/mail/'.$row->nama_file);?>" target="blank">
	        				<button type="button" class="btn btn-primary">Lihat Pdf</button>
	        			</a>
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