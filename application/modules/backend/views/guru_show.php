<?php $this->load->view('header'); ?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="btn-group pull-right tambah-data">
					<a href="<?php echo base_url('backend/guru/input_guru'); ?>">
						<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
					</a>
					<a href="<?php echo base_url('backend/guru/import'); ?>">
						<button type="button" class="btn btn-success"><span class="glyphicon glyphicon-open-file"></span> Import Guru</button>
					</a>
				</div>
				<h4 class="page-title">Data Guru</h4>
			</div>
		</div>
		<div class="content">
			<div class="row">
				<div class="col-sm-12">
					<?php echo $this->session->flashdata('alert'); ?>
					<div class="table-responsive">
						<table class="table table-striped table-bordered data-table">
							<thead>
								<tr>
									<th width="3%" align="center">No</th>
									<th>Nomor Induk</th>
									<th>Nama Guru</th>
									<th>Username</th>
									<th>Level Akun</th>
									<th>Status Akun</th>
									<th width="17%">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($show as $row) :
									if ($row->level != 1) :
								?>
										<tr>
											<td align="center"><?php echo $no++; ?></td>
											<td><?php echo $row->nomor_induk; ?></td>
											<td><?php echo $row->nama_guru; ?></td>
											<td><?php echo $row->username; ?></td>
											<td align="center">
												<?php
												if ($row->level == '2') {
													echo 'Staff';
												} elseif ($row->level == '3') {
													echo 'Wali Kelas';
												} else {
													echo 'User Biasa';
												}
												?>
											</td>
											<td align="center">
												<?php
												if ($row->status_user == '1') {
													echo 'Aktif';
												} else {
													echo 'Tidak Aktif';
												}
												?>
											</td>
											<td>
												<div class="btn-group">
													<a href="#" class="btn btn-warning btn-fill action" title="Status Akun" data-toggle="dropdown">
														<i class="glyphicon glyphicon-wrench"></i>
													</a>
													<ul class="dropdown-menu">
														<li><a href="<?php echo base_url('backend/guru/'); ?>Aktif/<?php echo $row->uid; ?>" onclick="return confirm('Aktifkan akun <?php echo $row->username; ?>?')">Aktifkan</a></li>
														<li><a href="<?php echo base_url('backend/guru/'); ?>TidakAktif/<?php echo $row->uid; ?>" onclick="return confirm('Non-aktifkan akun <?php echo $row->username; ?>?')">Non-aktifkan</a></li>
													</ul>
												</div>
												<a href="<?php echo base_url('backend/guru/'); ?>edit_guru/<?php echo $row->gid; ?>" class="btn btn-success btn-fill action" title="Ubah">
													<i class="glyphicon glyphicon-edit"></i>
												</a>
												<a href="<?php echo base_url('backend/guru/'); ?>delete_guru/<?php echo $row->username; ?>" class="btn btn-danger btn-fill action" title="Hapus" onclick="return confirm('Hapus data ini?')">
													<i class="glyphicon glyphicon-trash"></i>
												</a>
												<a href="<?php echo base_url('backend/guru/'); ?>detail_guru/<?php echo $row->gid; ?>" class="btn btn-info btn-fill action" title="Detail">
													<i class="glyphicon glyphicon-list-alt"></i>
												</a>
											</td>
										</tr>
								<?php endif;
								endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $this->load->view('footer2'); ?>