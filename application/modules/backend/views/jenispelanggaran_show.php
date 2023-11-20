<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<div class="btn-group pull-right tambah-data">
	        		<a href="<?php echo base_url('backend/jenispelanggaran/input_jenispelanggaran');?>">
	        			<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
	        		</a>
	    		</div>
	    		<h4 class="page-title">Data Jenis Pelanggaran</h4>
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
	                            	<th>Kategori Pelanggaran</th>
	                            	<th>Jenis Pelanggaran</th>
	                            	<th width="12%">Action</th>
	                    		</tr>
	                    	</thead>
	                    	<tbody>
	                    	<?php
                        		$no = 1;
                        		foreach ($show as $row) {
                    		?>
	                    		<tr>
			                        <td align="center"><?php echo $no++;?></td>
			                        <td align="center"><?php echo $row->nama_kategori;?></td>
			                        <td align="center"><?php echo $row->jenis_pelanggaran;?></td>
			                       	<td align="center">
			                        	<a href="<?php echo base_url('backend/jenispelanggaran/');?>edit_jenispelanggaran/<?php echo $row->jid;?>" class="btn btn-success btn-fill action" title="Ubah">
                                    		<i class="glyphicon glyphicon-edit"></i>
                                    	</a>
                                    	<a href="<?php echo base_url('backend/jenispelanggaran/');?>delete_jenispelanggaran/<?php echo $row->jid;?>" class="btn btn-danger btn-fill action" title="Hapus" onclick="return confirm('Hapus data ini?')">
                                    		<i class="glyphicon glyphicon-trash"></i>
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