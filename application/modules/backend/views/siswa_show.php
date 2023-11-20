<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<div class="btn-group pull-right tambah-data">
	        		<a href="<?php echo base_url('backend/siswa/input_siswa');?>">
	        			<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
	        		</a>
	        		<a href="<?php echo base_url('backend/siswa/import');?>">
	        			<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-open-file"></span> Import Siswa</button>
	        		</a>
	    		</div>
	    		<h4 class="page-title">Data Siswa</h4>
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
	                            	<th>Nisn</th>
			                        <th>Nama Siswa</th>
			                        <th>Jenis Kelamin</th>
			                        <th>Kelas</th>
	                            	<th width="16%">Action</th>
	                    		</tr>
	                    	</thead>
	                    	<tbody>
	                    	<?php
                        		$no = 1;
                        		foreach ($show as $row) {
                    		?>
	                    		<tr>
			                        <td align="center"><?php echo $no++;?></td>
			                        <td><?php echo $row->nisn;?></td>
			                        <td><?php echo $row->nama_siswa;?></td>
			                        <td align="center"><?php echo $row->jenis_kelamin;?></td>
			                        <td align="center"><?php echo $row->nama_kelas;?></td>
			                        <td align="center">
			                        	<a href="<?php echo base_url('backend/siswa/');?>edit_siswa/<?php echo $row->sid;?>" class="btn btn-success btn-fill action" title="Ubah">
                                    		<i class="glyphicon glyphicon-edit"></i>
                                    	</a>
                                    	<a href="<?php echo base_url('backend/siswa/');?>delete_siswa/<?php echo $row->sid;?>" class="btn btn-danger btn-fill action" title="Hapus" onclick="return confirm('Hapus data ini?')">
                                    		<i class="glyphicon glyphicon-trash"></i>
                                    	</a>
                                    	<a href="<?php echo base_url('backend/siswa/');?>detail_siswa/<?php echo $row->sid;?>" class="btn btn-info btn-fill action" title="Detail">
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