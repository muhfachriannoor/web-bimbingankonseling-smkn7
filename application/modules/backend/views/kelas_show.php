<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<div class="btn-group pull-right tambah-data">
	        		<a href="<?php echo base_url('backend/kelas/input_kelas');?>">
	        			<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
	        		</a>
	    		</div>
	    		<h4 class="page-title">Data Kelas</h4>
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
	                            	<th>Nama Kelas</th>
			                        <th>Wali Kelas</th>
			                        <th>Status</th>
	                            	<th width="17%">Action</th>
	                    		</tr>
	                    	</thead>
	                    	<tbody>
	                    	<?php
                        		foreach ($show as $no => $row) {
                        			$query = $this->db->get_where('tb_guru', array('gid' => $row->gid))->row();
                    		?>
	                    		<tr>
			                        <td align="center"><?php echo $no+1;?></td>
			                        <td><?php echo $row->nama_kelas;?></td>
			                        <td>
			                        	<?php 
	                        				if($row->gid != 0){
	                        					echo $query->nama_guru;
	                        				}else{
	                        					echo "-";
	                        				}
	                        			?>
			                        </td>
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
	                                    	<a href="#" class="btn btn-warning btn-fill action" title="Status Kelas" data-toggle="dropdown">
	                                    		<i class="glyphicon glyphicon-wrench"></i>
	                                    	</a>
	                                    	<ul class="dropdown-menu">
	                                            <li><a href="<?php echo base_url('backend/kelas/');?>Aktif/<?php echo $row->kid;?>" onclick="return confirm('Aktifkan kelas <?php echo $row->nama_kelas;?>?')">Aktifkan</a></li>
	                                            <li><a href="<?php echo base_url('backend/kelas/');?>TidakAktif/<?php echo $row->kid;?>" onclick="return confirm('Non-aktifkan kelas <?php echo $row->nama_kelas;?>?')">Non-aktifkan</a></li>
	                                        </ul>
                                       	</div>
			                        	<a href="<?php echo base_url('backend/kelas/');?>edit_kelas/<?php echo $row->kid;?>" class="btn btn-success btn-fill action" title="Ubah">
                                    		<i class="glyphicon glyphicon-edit"></i>
                                    	</a>
                                    	<a href="<?php echo base_url('backend/kelas/');?>delete_kelas/<?php echo $row->kid;?>" class="btn btn-danger btn-fill action" title="Hapus" onclick="return confirm('Hapus data ini?')">
                                    		<i class="glyphicon glyphicon-trash"></i>
                                    	</a>
                                    	<a href="<?php echo base_url('backend/kelas/');?>detail_kelas/<?php echo $row->gid;?>/<?php echo $row->kid;?>" class="btn btn-info btn-fill action" title="Detail">
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