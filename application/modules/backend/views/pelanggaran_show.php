<?php $this->load->view('header'); ?>
<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="btn-group pull-right tambah-data">
					<?php if ($this->session->userdata('level') == 1 or $this->session->userdata('level') == 2) { ?>
						<a href="<?php echo base_url('backend/pelanggaran/input_pelanggaran'); ?>">
							<button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
						</a>
						<a href="<?php echo base_url('backend/pelanggaran/pdf'); ?>">
							<button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-file"></span> Buat Pdf</button>
						</a>
					<?php } ?>
				</div>
				<h4 class="page-title">Data Pelanggaran</h4>
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
									<th>Nama Siswa</th>
									<th>Kelas Siswa</th>
									<th>Jenis Pelanggaran</th>
									<th>User</th>
									<th>Waktu Pelanggaran</th>
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
										<td align="center"><?php echo $no++; ?></td>
										<td><?php echo $row->nama_siswa; ?></td>
										<td align="center"><?php echo $row->nama_kelas; ?></td>
										<td><?php echo $row->jenis_pelanggaran; ?></td>
										<td><?php echo $row->username; ?></td>
										<td align="center"><?php echo date('d M Y', strtotime($row->waktu_pelanggaran)); ?></td>
										<td>
											<?php
											if ($row->status == '1') {
												echo 'Terselesaikan';
											} else {
												echo 'Belum terselesaikan';
											}
											?>
										</td>
										<td align="center">
											<?php if ($this->session->userdata('level') == '1' || $this->session->userdata('level') == '2') { ?>
												<div class="btn-group">
													<a href="#" class="btn btn-warning btn-fill action" title="Status Pelanggaran" data-toggle="dropdown">
														<i class="glyphicon glyphicon-wrench"></i>
													</a>
													<ul class="dropdown-menu">
														<li><a href="<?php echo base_url('backend/pelanggaran/'); ?>Selesai/<?php echo $row->pid; ?>" onclick="return confirm('Selesaikan pelanggaran siswa <?php echo $row->nama_siswa; ?>?')">Terselesaikan</a></li>
														<li><a href="<?php echo base_url('backend/pelanggaran/'); ?>TidakSelesai/<?php echo $row->pid; ?>" onclick="return confirm('Belum terselesaikan siswa <?php echo $row->nama_siswa; ?>?')">Belum Terselesaikan</a></li>
													</ul>
												</div>
												<a href="<?php echo base_url('backend/pelanggaran/'); ?>edit_pelanggaran/<?php echo $row->pid; ?>" class="btn btn-success btn-fill action" title="Ubah">
													<i class="glyphicon glyphicon-edit"></i>
												</a>
												<a href="<?php echo base_url('backend/pelanggaran/'); ?>delete_pelanggaran/<?php echo $row->pid; ?>" class="btn btn-danger btn-fill action" title="Hapus" onclick="return confirm('Hapus data ini?')">
													<i class="glyphicon glyphicon-trash"></i>
												</a>
												<a href="<?php echo base_url('backend/pelanggaran/'); ?>detail_pelanggaran/<?php echo $row->pid; ?>" class="btn btn-info btn-fill action" title="Detail">
													<i class="glyphicon glyphicon-list-alt"></i>
												</a>
											<?php } elseif ($this->session->userdata('uid') == $row->uid) { ?>
												<a href="<?php echo base_url('backend/pelanggaran/'); ?>edit_pelanggaran/<?php echo $row->pid; ?>" class="btn btn-success btn-fill action" title="Ubah">
													<i class="glyphicon glyphicon-edit"></i>
												</a>
												<a href="<?php echo base_url('backend/pelanggaran/'); ?>detail_pelanggaran/<?php echo $row->pid; ?>" class="btn btn-info btn-fill action" title="Detail">
													<i class="glyphicon glyphicon-list-alt"></i>
												</a>
											<?php } ?>
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
<?php $this->load->view('footer2'); ?>