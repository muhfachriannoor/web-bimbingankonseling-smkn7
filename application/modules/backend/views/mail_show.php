<?php $this->load->view('header');?>
<div id="content">
	<div class="container">
	  	<div class="row">
	    	<div class="col-md-12">
	    		<div class="btn-group pull-right tambah-data">
	        		<a href="<?php echo base_url('backend/mail/input_mail');?>">
	        			<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
	        		</a>
	    		</div>
	    		<h4 class="page-title">Data Mail</h4>
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
			                        <th>Kelas</th>
			                        <th>Wali Kelas</th>
	                            	<th>Email</th>
			                        <th>Waktu Mail</th>
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
			                        <td align="center"><?php echo $row->nama_kelas;?></td>
			                        <td><?php echo $row->nama_guru;?></td>
			                        <td align="center"><?php echo $row->email;?></td>
			                        <td align="center"><?php echo date('d M Y',strtotime($row->waktu_mail));?></td>
			                        <td align="center">
			                        	<?php 
			                        		if($row->status == '1'){
			                        			echo 'Terkirim';
			                        		}else{
			                        			echo 'Belum terkirim';
			                        		}
			                        	?>
			                        </td>
			                        <td align="center">
			                        	<?php if($row->status != '1'){?>
			                        	<div class="btn-group">
	                                    	<a href="#" class="btn btn-warning btn-fill action" title="Status Mail" data-toggle="dropdown">
	                                    		<i class="glyphicon glyphicon-wrench"></i>
	                                    	</a>
	                                    	<ul class="dropdown-menu">
	                                            <li><a href="<?php echo base_url('backend/mail/');?>Kirim/<?php echo $row->mid;?>" onclick="return confirm('Kirim email ke wali kelas <?php echo $row->nama_guru;?>?')">Kirim</a></li>
	                                        </ul>
                                       	</div>
                                       	<?php } ?>
			                        	<a href="<?php echo base_url('backend/mail/');?>edit_mail/<?php echo $row->mid;?>" class="btn btn-success btn-fill action" title="Ubah">
                                    		<i class="glyphicon glyphicon-edit"></i>
                                    	</a>
                                    	<a href="<?php echo base_url('backend/mail/');?>delete_mail/<?php echo $row->mid;?>" class="btn btn-danger btn-fill action" title="Hapus" onclick="return confirm('Hapus data ini?')">
                                    		<i class="glyphicon glyphicon-trash"></i>
                                    	</a>
                                    	<a href="<?php echo base_url('backend/mail/');?>detail_mail/<?php echo $row->mid;?>" class="btn btn-info btn-fill action" title="Detail">
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