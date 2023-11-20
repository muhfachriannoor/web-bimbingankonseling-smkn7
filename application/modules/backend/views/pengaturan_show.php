<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<div class="btn-group pull-right tambah-data">
	        		<a href="<?php echo base_url('backend/pengaturan/input_pengaturan');?>">
	        			<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
	        		</a>
	    		</div>
	    		<h4 class="page-title">Data Pengaturan</h4>
	  		</div>
		</div>
		<div class="content">
			<div class="row">
	    		<div class="col-sm-12">
	    			<?php echo $this->session->flashdata('alert');?>
	           		<div class="table-responsive">
	                	<table class="table table-striped table-bordered data-table">
	                		<thead>
	                    		<tr>
	                        		<th width="3%" align="center">No</th>
	                            	<th>Nama Pengaturan</th>
			                        <th width="18%">Isi</th>
			                        <th>Tanggal Pengaturan</th>
			                        <th>Status</th>
	                            	<th width="17%">Action</th>
	                    		</tr>
	                    	</thead>
	                    	<tbody>
	                    	<?php
                        		$no = 1;
                        		foreach ($show as $row) {
                    		?>
	                    		<tr>
			                        <td align="center"><?php echo $no++;?></td>
			                        <td><?php echo $row->nama_pengaturan;?></td>
			                        <td>
			                        	<?php $text = $row->isi; $text = character_limiter($text,10);?>
                            			<?php echo $text;?>
			                        </td>
			                        <td align="center"><?php echo date('d M Y',strtotime($row->waktu_ubah));?></td>
			                        <td align="center">
			                        	<?php 
			                        		if($row->status == '1'){
			                        			echo 'Aktif';
			                        		}else{
			                        			echo 'Tidak Aktif';
			                        		}
			                        	?>
			                        </td>
			                       <td>
			                        	<div class="btn-group">
	                                    	<a href="#" class="btn btn-warning btn-fill action" title="Status Pengaturan" data-toggle="dropdown">
	                                    		<i class="glyphicon glyphicon-wrench"></i>
	                                    	</a>
	                                    	<ul class="dropdown-menu">
	                                            <li><a href="<?php echo base_url('backend/pengaturan/');?>Aktif/<?php echo $row->peid;?>" onclick="return confirm('Aktifkan pengaturan <?php echo $row->nama_pengaturan;?>?')">Aktifkan</a></li>
	                                            <li><a href="<?php echo base_url('backend/pengaturan/');?>TidakAktif/<?php echo $row->peid;?>" onclick="return confirm('Non-aktifkan pengaturan <?php echo $row->nama_pengaturan;?>?')">Non-aktifkan</a></li>
	                                        </ul>
                                       	</div>
			                        	<a href="<?php echo base_url('backend/pengaturan/');?>edit_pengaturan/<?php echo $row->peid;?>" class="btn btn-success btn-fill action" title="Ubah">
                                    		<i class="glyphicon glyphicon-edit"></i>
                                    	</a>
                                    	<a href="<?php echo base_url('backend/pengaturan/');?>delete_pengaturan/<?php echo $row->peid;?>" class="btn btn-danger btn-fill action" title="Hapus" onclick="return confirm('Hapus data ini?')">
                                    		<i class="glyphicon glyphicon-trash"></i>
                                    	</a>
                                    	<a href="<?php echo base_url('backend/pengaturan/');?>detail_pengaturan/<?php echo $row->peid;?>" class="btn btn-info btn-fill action" title="Detail">
                                    		<i class="glyphicon glyphicon-list-alt"></i>
                                    	</a>
			                        </td>
	                        	</tr>
	                        <?php } ?>
	                    	</tbody>
	                	</table>
	            	</div>
	        	</div>
	    	</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer2');?>