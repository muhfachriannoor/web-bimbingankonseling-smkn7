<?php $this->load->view('header'); ?>
<div id="content">
	<div class="container">
		<?php
		$level = $this->session->userdata('level');
		if ($level == 1) {
		?>
			<div class="row">
				<div class="col-md-12">
					<h4 class="page-title">Dashboard</h4>
				</div>
			</div>
			<?php echo $this->session->flashdata('alert'); ?>
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-yellow">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="gly gly-5x"><img src="<?php echo base_url('assets/backend/images/teacher-white.png'); ?>"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="title-rows"><?php echo $guru->num_rows(); ?></div>
									<div>Data Guru</div>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('backend/guru_show'); ?>">
							<div class="panel-footer">
								<span class="pull-left">Tampilkan Semua</span>
								<span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="panel panel-green">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="gly gly-5x"><img src="<?php echo base_url('assets/backend/images/classroom-white.png'); ?>"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="title-rows"><?php echo $kelas->num_rows(); ?></div>
									<div>Data Kelas</div>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('backend/kelas_show'); ?>">
							<div class="panel-footer">
								<span class="pull-left">Tampilkan Semua</span>
								<span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="panel panel-blue">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="gly gly-5x"><img src="<?php echo base_url('assets/backend/images/student-white.png'); ?>"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="title-rows"><?php echo $siswa->num_rows(); ?></div>
									<div>Data Siswa</div>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('backend/siswa_show'); ?>">
							<div class="panel-footer">
								<span class="pull-left">Tampilkan Semua</span>
								<span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-wisteria">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="gly gly-5x"><img src="<?php echo base_url('assets/backend/images/category-white.png'); ?>"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="title-rows"><?php echo $kategoripelanggaran->num_rows(); ?></div>
									<div>Data Kategori Pelanggaran</div>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('backend/kategoripelanggaran_show'); ?>">
							<div class="panel-footer">
								<span class="pull-left">Tampilkan Semua</span>
								<span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>


				<div class="col-md-4">
					<div class="panel panel-lightblue">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="gly gly-5x"><img src="<?php echo base_url('assets/backend/images/list-white.png'); ?>"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="title-rows"><?php echo $jenispelanggaran->num_rows(); ?></div>
									<div>Data Jenis Pelanggaran</div>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('backend/jenispelanggaran_show'); ?>">
							<div class="panel-footer">
								<span class="pull-left">Tampilkan Semua</span>
								<span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="gly gly-5x"><img src="<?php echo base_url('assets/backend/images/warning-white.png'); ?>"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="title-rows"><?php echo $pelanggaran->num_rows(); ?></div>
									<div>Data Pelanggaran</div>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('backend/pelanggaran_show'); ?>">
							<div class="panel-footer">
								<span class="pull-left">Tampilkan Semua</span>
								<span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-offset-2 col-md-4">
					<div class="panel panel-grey">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="gly gly-5x"><img src="<?php echo base_url('assets/backend/images/settings-white.png'); ?>"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="title-rows"><?php echo $pengaturan->num_rows(); ?></div>
									<div>Data Pengaturan</div>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('backend/pengaturan_show'); ?>">
							<div class="panel-footer">
								<span class="pull-left">Tampilkan Semua</span>
								<span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="panel panel-purple">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="gly gly-5x"><img src="<?php echo base_url('assets/backend/images/mail-white.png'); ?>"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="title-rows"><?php echo $mail->num_rows(); ?></div>
									<div>Mail</div>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('backend/mail_show'); ?>">
							<div class="panel-footer">
								<span class="pull-left">Tampilkan Semua</span>
								<span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		<?php } elseif ($level == 2) { ?>
			<div class="row">
				<div class="col-md-12">
					<h4 class="page-title">Dashboard</h4>
				</div>
			</div>
			<?php echo $this->session->flashdata('alert'); ?>
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-green">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="gly gly-5x"><img src="<?php echo base_url('assets/backend/images/classroom-white.png'); ?>"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="title-rows"><?php echo $kelas->num_rows(); ?></div>
									<div>Data Kelas</div>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('backend/kelas_show'); ?>">
							<div class="panel-footer">
								<span class="pull-left">Tampilkan Semua</span>
								<span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="panel panel-blue">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="gly gly-5x"><img src="<?php echo base_url('assets/backend/images/student-white.png'); ?>"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="title-rows"><?php echo $siswa->num_rows(); ?></div>
									<div>Data Siswa</div>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('backend/siswa_show'); ?>">
							<div class="panel-footer">
								<span class="pull-left">Tampilkan Semua</span>
								<span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="panel panel-wisteria">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="gly gly-5x"><img src="<?php echo base_url('assets/backend/images/category-white.png'); ?>"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="title-rows"><?php echo $kategoripelanggaran->num_rows(); ?></div>
									<div>Data Kategori Pelanggaran</div>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('backend/kategoripelanggaran_show'); ?>">
							<div class="panel-footer">
								<span class="pull-left">Tampilkan Semua</span>
								<span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-lightblue">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="gly gly-5x"><img src="<?php echo base_url('assets/backend/images/list-white.png'); ?>"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="title-rows"><?php echo $jenispelanggaran->num_rows(); ?></div>
									<div>Data Jenis Pelanggaran</div>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('backend/jenispelanggaran_show'); ?>">
							<div class="panel-footer">
								<span class="pull-left">Tampilkan Semua</span>
								<span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="gly gly-5x"><img src="<?php echo base_url('assets/backend/images/warning-white.png'); ?>"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="title-rows"><?php echo $pelanggaran->num_rows(); ?></div>
									<div>Data Pelanggaran</div>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('backend/pelanggaran_show'); ?>">
							<div class="panel-footer">
								<span class="pull-left">Tampilkan Semua</span>
								<span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>

				<div class="col-md-4">
					<div class="panel panel-purple">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="gly gly-5x"><img src="<?php echo base_url('assets/backend/images/mail-white.png'); ?>"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="title-rows"><?php echo $mail->num_rows(); ?></div>
									<div>Mail</div>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('backend/mail_show'); ?>">
							<div class="panel-footer">
								<span class="pull-left">Tampilkan Semua</span>
								<span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		<?php } elseif ($level == 3 or $level == 4) { ?>
			<div class="row">
				<div class="col-md-12">
					<h4 class="page-title">Dashboard</h4>
				</div>
			</div>
			<?php echo $this->session->flashdata('alert'); ?>
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="gly gly-5x"><img src="<?php echo base_url('assets/backend/images/warning-white.png'); ?>"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class="title-rows"><?php echo $pelanggaran->num_rows(); ?></div>
									<div>Data Pelanggaran</div>
								</div>
							</div>
						</div>
						<a href="<?php echo base_url('backend/pelanggaran_show'); ?>">
							<div class="panel-footer">
								<span class="pull-left">Tampilkan Semua</span>
								<span class="pull-right"><i class="glyphicon glyphicon-chevron-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<?php } else {
			$uid = $this->session->userdata('uid');
			$this->db->where('uid', $uid);
			$query = $this->db->get('tb_user');
			$test = $query->row();
			$query2 = $this->db->query("SELECT tb_user.uid, tb_user.status_user, tb_user.username, tb_kelas.nama_kelas, tb_siswa.* FROM ((tb_siswa INNER JOIN tb_user ON tb_user.username = tb_siswa.username) INNER JOIN tb_kelas ON tb_kelas.kid = tb_siswa.kid) WHERE tb_siswa.username='$test->username'");
			$test2 = $query2->row();
			$test3 = login_kelas($test2->nama_kelas);
			if ($test3 == 'XII') {
			?>
				<div class="content" style="margin-top:15px;">
					<?php echo $this->session->flashdata('alert'); ?>
					<div class="row">
						<div class="col-md-12">
							<h4 class="page-title-siswa text-center">angket kebutuhan peserta didik ( kelas 12 )</h4>
							<div class="form-group">
								<label class="col-sm-1 siswa-atas control-label">NAMA :</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="nama_siswa" value="<?= $test2->nama_siswa; ?>" readonly>
								</div>
								<label class="col-sm-1 siswa-atas control-label">KELAS :</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="nama_kelas" value="<?= $test2->nama_kelas; ?>" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 siswa-atas"><u>Petunjuk :</u></label>
							</div>
							<div class="row">
								<div class="col-md-12">
									<ol class="petunjuk-siswa">
										<li>Dibawah ini bukan alat test, tetapi angket kebutuhan untuk membuat program layanan bimbingan dan konseling.</li>
										<li>Jawaban Anda sangat bermanfaat untuk pembuatan program layanan BK di sekolah.</li>
										<li>Pilihlah jawaban yang paling sesuai dengan kondisi Anda saat ini, dengan cara memberikan tanda (√) pada kolom Ya/Tidak.</li>
										<li>Jawaban Anda akan kami rahasiakan, untuk itu jawablah dengan benar dan sungguh-sungguh.</li>
									</ol>
								</div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<form action="#" method="post">
								<div class="container-fluid">
									<div class="row soal">
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>1. Saya belum paham bentuk toleransi dan kerjasama antar umat beragama</p>
											<div class="input-soal">
												<input type="radio" name="1" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="1" required> Tidak
											</div>
										</div>
									</div>
									<div class="row soal">
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>2. Kualitas ibadah saya masih rendah pada Tuhan YME</p>
											<div class="input-soal">
												<input type="radio" name="2" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="2" required> Tidak
											</div>
										</div>
									</div>
									<div class="row soal">
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>3. Saya masih sering terbawa arus pergaulan yang kurang baik</p>
											<div class="input-soal">
												<input type="radio" name="3" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="3" required> Tidak
											</div>
										</div>
									</div>
									<div class="row soal">
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>4. Saya kadang-kadang sering melanggar budaya tata tertib berlalu lintas</p>
											<div class="input-soal">
												<input type="radio" name="4" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="4" required> Tidak
											</div>
										</div>
									</div>
									<div class="row soal">
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>5. Saya masih sulit untuk mengendalikan emosi</p>
											<div class="input-soal">
												<input type="radio" name="5" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="5" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>6. Saya merasa tertekan (stress) akan menghadapi USBN / Ujian Nasional</p>
											<div class="input-soal">
												<input type="radio" name="6" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="6" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>7. Saya merasa khawatir/takut tidak dapat lulus sekolah</p>
											<div class="input-soal">
												<input type="radio" name="7" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="7" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>8. Saya kurang mendapatkan motivasi dari tokoh-tokoh yang bisa menginspirasi hidup saya</p>
											<div class="input-soal">
												<input type="radio" name="8" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="8" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>9. Saya masih sulit mengendalikan ketergantungan main games atau games online</p>
											<div class="input-soal">
												<input type="radio" name="9" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="9" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>10. Saya merasa sulit menghilangkan kebiasaan merokok</p>
											<div class="input-soal">
												<input type="radio" name="10" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="10" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>11. Saya merasa tidak nyaman tinggal di rumah sendiri</p>
											<div class="input-soal">
												<input type="radio" name="11" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="11" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>12. Saya merasa sulit menghilangkan kebiasaan keluar malam (bermain,begadang)</p>
											<div class="input-soal">
												<input type="radio" name="12" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="12" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>13. Kondisi keluarga saya sedang tidak harmonis</p>
											<div class="input-soal">
												<input type="radio" name="13" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="13" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>14. Saya belum tahu cara menjaga kesehatan agar tetap fit menghadapi waktu ujian</p>
											<div class="input-soal">
												<input type="radio" name="14" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="14" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>15. Saya jenuh dan enggan masuk sekolah</p>
											<div class="input-soal">
												<input type="radio" name="15" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="15" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>16. Saya belum tahu dampak Pernikahan di usia dini/usia muda</p>
											<div class="input-soal">
												<input type="radio" name="16" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="16" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>17. Saya belum tahu lebih banyak akibat tawuran di kalangan pelajar</p>
											<div class="input-soal">
												<input type="radio" name="17" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="17" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>18. Saya kadang masih lupa mengucapkan kata maaf, tolong dan terimakasih dalam pergaulan</p>
											<div class="input-soal">
												<input type="radio" name="18" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="18" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>19. Saya masih merasa belum lancar berkomunikasi di hadapan banyak orang</p>
											<div class="input-soal">
												<input type="radio" name="19" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="19" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>20. Saya belum aktif mengikuti organisasi/kegiatan di lingkungan tempat tinggal</p>
											<div class="input-soal">
												<input type="radio" name="20" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="20" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>21. Saya merasa belum paham tentang jenis obat-obat terlarang yang terbaru</p>
											<div class="input-soal">
												<input type="radio" name="21" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="21" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>22. Saya sulit meninggalkan ketergantungan dengan media sosial (fb, wa, ig, dll)</p>
											<div class="input-soal">
												<input type="radio" name="22" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="22" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>23. Saya ingin menyelesaikan konflik dengan sahabat dekat (pacar)</p>
											<div class="input-soal">
												<input type="radio" name="23" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="23" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>24. Saya masih belum bisa menjaga sebuah persahabatan agar tetap langgeng</p>
											<div class="input-soal">
												<input type="radio" name="24" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="24" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>25. Saya belum tahu dampak atau akibat dari Sek Bebas, LGBT dan HIV/AIDS</p>
											<div class="input-soal">
												<input type="radio" name="25" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="25" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>26. Saya belum memahami peran laki-laki dan perempuan dalam norma hidup bermasyarakat</p>
											<div class="input-soal">
												<input type="radio" name="26" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="26" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>27. Saya ingin mengerti peran IQ,EQ,AQ,CQ dan SQ dalam belajar</p>
											<div class="input-soal">
												<input type="radio" name="27" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="27" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>28. Saya belum paham peran macam-macam kecerdasan dalam belajar</p>
											<div class="input-soal">
												<input type="radio" name="28" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="28" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>29. Saya belum bisa memanfaatkan teknologi informasi untuk meraih prestasi belajar</p>
											<div class="input-soal">
												<input type="radio" name="29" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="29" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>30. Saya belum menguasai kiat sukses dalam menghadapi ujian</p>
											<div class="input-soal">
												<input type="radio" name="30" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="30" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>31. Kadang-kadang saya merasa semangat belajarnya menurun</p>
											<div class="input-soal">
												<input type="radio" name="31" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="31" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>32. Saya belum bisa mengevaluasi hasil prestasi belajar</p>
											<div class="input-soal">
												<input type="radio" name="32" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="32" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>33. Saya merasa belum paham strategi belajar dari berbagai sumber belajar</p>
											<div class="input-soal">
												<input type="radio" name="33" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="33" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>34. Saya belum mampu hidup hemat</p>
											<div class="input-soal">
												<input type="radio" name="34" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="34" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>35. Saya masih bingung apakah bisa menyelesaikan studi sampai lulus karena masalah ekonomi keluarga</p>
											<div class="input-soal">
												<input type="radio" name="35" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="35" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>36. Daya kreatifitas dan inovasi yang saya miliki masih rendah</p>
											<div class="input-soal">
												<input type="radio" name="36" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="36" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>37. Saya belum tahu strategi di terima bekerja di perusahaan yang sesuai dengan program keahlian</p>
											<div class="input-soal">
												<input type="radio" name="37" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="37" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>38. Saya belum tahu pilihan karir yang sesuai dengan tipe kepribadian yang dimiliki</p>
											<div class="input-soal">
												<input type="radio" name="38" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="38" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>39. Saya belum menemukan cara terbaik untuk meraih sukses dimasa depan</p>
											<div class="input-soal">
												<input type="radio" name="39" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="39" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>40. Saya masih bingung menentukan pilihan profesi/pekerjaan di masa depan</p>
											<div class="input-soal">
												<input type="radio" name="40" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="40" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>41. Saya merasa belum tahu profesi pekerjaan dalam meningkatkan taraf hidup</p>
											<div class="input-soal">
												<input type="radio" name="41" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="41" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>42. Saya belum tahu tata cara bekerja ke luar negeri</p>
											<div class="input-soal">
												<input type="radio" name="42" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="42" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>43. Saya belum paham hubungan potensi, minat, bakat, kemampuan dan program keahlian</p>
											<div class="input-soal">
												<input type="radio" name="43" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="43" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>44. Saya belum mengerti prosedur melamar pekerjaan</p>
											<div class="input-soal">
												<input type="radio" name="44" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="44" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>45. Saya belum tahu berbagai macam tes seleksi pegawai baru</p>
											<div class="input-soal">
												<input type="radio" name="45" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="45" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>46. Cita-cita atau rencana karir saya masih belum berubah-rubah</p>
											<div class="input-soal">
												<input type="radio" name="46" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="46" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>47. Saya belum tahu cara menentukan pilihan karir setelah lulus dari SMK/MAK</p>
											<div class="input-soal">
												<input type="radio" name="47" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="47" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>48. Saya bingung memilih lembaga kursus pelatihan untuk masa depan</p>
											<div class="input-soal">
												<input type="radio" name="48" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="48" required> Tidak
											</div>
										</div>
										<div class="col-xs-12 col-lg-12 soalnya">
											<p>49. Setelah lulus SMK/MAK saya ingin bekerja untuk membantu ekonomi orang tua</p>
											<div class="input-soal">
												<input type="radio" name="49" required> Ya
											</div>
											<div class="input-soal">
												<input type="radio" name="49" required> Tidak
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group center">
											<button type="submit" class="btn btn-success">Save</button>
											<button type="reset" class="btn btn-primary">Reset</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				<?php } elseif ($test3 == 'XI') { ?>
					<div class="content" style="margin-top:15px;">
						<?php echo $this->session->flashdata('alert'); ?>
						<div class="row">
							<div class="col-md-12">
								<h4 class="page-title-siswa text-center">angket kebutuhan peserta didik ( kelas 11 )</h4>
								<div class="form-group">
									<label class="col-sm-1 siswa-atas control-label">NAMA :</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="nama_siswa" value="<?= $test2->nama_siswa; ?>" readonly>
									</div>
									<label class="col-sm-1 siswa-atas control-label">KELAS :</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="nama_kelas" value="<?= $test2->nama_kelas; ?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 siswa-atas"><u>Petunjuk :</u></label>
								</div>
								<div class="row">
									<div class="col-md-12">
										<ol class="petunjuk-siswa">
											<li>Dibawah ini bukan alat test, tetapi angket kebutuhan untuk membuat program layanan bimbingan dan konseling.</li>
											<li>Jawaban Anda sangat bermanfaat untuk pembuatan program layanan BK di sekolah.</li>
											<li>Pilihlah jawaban yang paling sesuai dengan kondisi Anda saat ini, dengan cara memberikan tanda (√) pada kolom Ya/Tidak.</li>
											<li>Jawaban Anda akan kami rahasiakan, untuk itu jawablah dengan benar dan sungguh-sungguh.</li>
										</ol>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<form action="#" method="post">
									<div class="container-fluid">
										<div class="row soal">
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>1. Kualitas ibadah saya pada Tuhan YME masih belum baik</p>
												<div class="input-soal">
													<input type="radio" name="1" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="1" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>2. Saya kadang lupa bersyukur atas nikmat dan karunia dari Tuhan YME</p>
												<div class="input-soal">
													<input type="radio" name="2" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="2" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>3. Saya merasa masih sulit untuk selalu berpikir positif</p>
												<div class="input-soal">
													<input type="radio" name="3" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="3" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>4. Saya kadang-kadang masih suka menyontek pada waktu tes/ujian</p>
												<div class="input-soal">
													<input type="radio" name="4" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="4" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>5. Saya belum tahu cara mengendalikan emosi dengan baik</p>
												<div class="input-soal">
													<input type="radio" name="5" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="5" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>6. Saya belum paham tentang mekanisme pertahanan diri</p>
												<div class="input-soal">
													<input type="radio" name="6" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="6" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>7. Saya belum tahu cara mengatur waktu yang baik</p>
												<div class="input-soal">
													<input type="radio" name="7" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="7" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>8. Saya merasa masih sedikit pemahaman tentang kesehatan reproduksi remaja</p>
												<div class="input-soal">
													<input type="radio" name="8" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="8" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>9. Saya belum mengetahui banyak tentang jenis obat-obat terlarang serta dampaknya</p>
												<div class="input-soal">
													<input type="radio" name="9" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="9" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>10. Saya merasa masih sedikit pengetahuan tentang ilmu kepemimpinan</p>
												<div class="input-soal">
													<input type="radio" name="10" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="10" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>11. Saya belum paham tentang mental disorder dan permasalahannya</p>
												<div class="input-soal">
													<input type="radio" name="11" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="11" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>12. Saya jenuh dan enggan masuk sekolah</p>
												<div class="input-soal">
													<input type="radio" name="12" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="12" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>13. Saya merasa sulit menghilangkan kebiasaan keluar malam (bermain,begadang)</p>
												<div class="input-soal">
													<input type="radio" name="13" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="13" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>14. Saya kadang lupa membuang sampah sembarangan</p>
												<div class="input-soal">
													<input type="radio" name="14" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="14" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>15. Saya tidak suka kalau disuruh antri, sementara yang lain tidak mau tertib untuk antri</p>
												<div class="input-soal">
													<input type="radio" name="15" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="15" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>16. Saya sedang memiliki masalah dengan teman dekat (pacar)</p>
												<div class="input-soal">
													<input type="radio" name="16" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="16" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>17. Saya belum bisa memiliki kepekaan diri dan sosial</p>
												<div class="input-soal">
													<input type="radio" name="17" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="17" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>18. Saya belum tahu cara berkomunikasi yang efektif</p>
												<div class="input-soal">
													<input type="radio" name="18" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="18" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>19. Saya belum paham yang harus dilakukan dengan adanya pemanasan global</p>
												<div class="input-soal">
													<input type="radio" name="19" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="19" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>20. Saya belum memahami etika dan budaya tertib berlalu lintas</p>
												<div class="input-soal">
													<input type="radio" name="20" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="20" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>21. Saya merasa sulit mematuhi tata tertib sekolah</p>
												<div class="input-soal">
													<input type="radio" name="21" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="21" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>22. Saya kadang masih lupa mengucapkan kata maaf, tolong dan terimakasih dalam pergaulan</p>
												<div class="input-soal">
													<input type="radio" name="22" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="22" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>23. Saya merasa sulit mengendalikan ketergantungan pada medsos (fb, wa, dll)</p>
												<div class="input-soal">
													<input type="radio" name="23" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="23" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>24. Saya belum memahami etika dalam bergaul</p>
												<div class="input-soal">
													<input type="radio" name="24" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="24" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>25. Saya belum tahu cara menjaga persahabatan agar tetap langgeng</p>
												<div class="input-soal">
													<input type="radio" name="25" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="25" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>26. Saya merasa saat ini belum banyak memiliki teman</p>
												<div class="input-soal">
													<input type="radio" name="26" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="26" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>27. Saya masih sering terbawa arus pergaulan yang kurang baik</p>
												<div class="input-soal">
													<input type="radio" name="27" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="27" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>28. Saya belum tahu tentang bentuk-bentuk kenakalan remaja saat ini dan cara mensikapinya</p>
												<div class="input-soal">
													<input type="radio" name="28" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="28" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>29. Saya belum memahami tawuran pelajar dan akibatnya</p>
												<div class="input-soal">
													<input type="radio" name="29" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="29" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>30. Saya belum memahami peran sosial pria dan wanita dengan norma yang ada di masyarakat</p>
												<div class="input-soal">
													<input type="radio" name="30" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="30" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>31. Saya belum paham tentang dampak Sek Bebas, LGBT dan HIV/AIDS</p>
												<div class="input-soal">
													<input type="radio" name="31" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="31" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>32. Saya merasa belum menemukan cara belajar yang efektif</p>
												<div class="input-soal">
													<input type="radio" name="32" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="32" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>33. Saya belum bisa membuat peta pikiran (mind mapping)</p>
												<div class="input-soal">
													<input type="radio" name="33" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="33" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>34. Saya belum paham cara kerja otak kiri dan otak kanan</p>
												<div class="input-soal">
													<input type="radio" name="34" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="34" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>35. Saya belum tahu cara untuk membangkitkan semangat belajar</p>
												<div class="input-soal">
													<input type="radio" name="35" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="35" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>36. Saya masih suka menunda-nunda tugas sekolah/pekerjaan rumah (PR)</p>
												<div class="input-soal">
													<input type="radio" name="36" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="36" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>37. Saya merasa kesulitan dalam memahami pelajaran tertentu</p>
												<div class="input-soal">
													<input type="radio" name="37" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="37" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>38. Saya semangat belajar, kalau ada test atau ujian saja</p>
												<div class="input-soal">
													<input type="radio" name="38" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="38" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>39. Saya merasa sulit untuk belajar kelompok</p>
												<div class="input-soal">
													<input type="radio" name="39" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="39" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>40. Saya belum paham cara memilih lembaga bimbingan belajar yang baik</p>
												<div class="input-soal">
													<input type="radio" name="40" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="40" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>41. Saya belum dapat memanfaatkan teknologi informasi untuk belajar</p>
												<div class="input-soal">
													<input type="radio" name="41" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="41" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>42. Saya masih belum bisa belajar secara rutin</p>
												<div class="input-soal">
													<input type="radio" name="42" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="42" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>43. Saya merasa takut bertanya atau menjawab di kelas</p>
												<div class="input-soal">
													<input type="radio" name="43" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="43" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>44. Saya jarang sekali mengunjungi perpustakaan untuk membaca</p>
												<div class="input-soal">
													<input type="radio" name="44" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="44" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>45. Saya terpaksa harus bekerja untuk mengcukupi kebutuhan hidup</p>
												<div class="input-soal">
													<input type="radio" name="45" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="45" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>46. Saya merasa belum banyak tahu tentang jenis-jenis profesi/pekerjaan di masyarakat</p>
												<div class="input-soal">
													<input type="radio" name="46" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="46" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>47. Saya belum mengetahui tentang dunia usaha / dunia industri</p>
												<div class="input-soal">
													<input type="radio" name="47" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="47" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>48. Saya belum paham hubungan antara bakat, minat, pendidikan dan pekerjaan</p>
												<div class="input-soal">
													<input type="radio" name="48" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="48" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>49. Saya masih memiliki keraguan dengan pilihan cita-cita/karir masa depan</p>
												<div class="input-soal">
													<input type="radio" name="49" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="49" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>50. Saya belum memahami tentang program prakerin di SMK</p>
												<div class="input-soal">
													<input type="radio" name="50" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="50" required> Tidak
												</div>
											</div>
										</div>
									</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group center">
										<button type="submit" class="btn btn-success">Save</button>
										<button type="reset" class="btn btn-primary">Reset</button>
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>
				<?php } elseif ($test3 == 'X') { ?>
					<div class="content" style="margin-top:15px">
						<div class="row">
							<div class="col-md-12">
								<h4 class="page-title-siswa text-center">angket kebutuhan peserta didik ( kelas 10 )</h4>
								<div class="form-group">
									<label class="col-sm-1 siswa-atas control-label">NAMA :</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="nama_siswa" value="<?= $test2->nama_siswa; ?>" readonly>
									</div>
									<label class="col-sm-1 siswa-atas control-label">KELAS :</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" name="nama_kelas" value="<?= $test2->nama_kelas; ?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 siswa-atas"><u>Petunjuk :</u></label>
								</div>
								<div class="row">
									<div class="col-md-12">
										<ol class="petunjuk-siswa">
											<li>Dibawah ini bukan alat test, tetapi angket kebutuhan untuk membuat program layanan bimbingan dan konseling.</li>
											<li>Jawaban Anda sangat bermanfaat untuk pembuatan program layanan BK di sekolah.</li>
											<li>Pilihlah jawaban yang paling sesuai dengan kondisi Anda saat ini, dengan cara memberikan tanda (√) pada kolom Ya/Tidak.</li>
											<li>Jawaban Anda akan kami rahasiakan, untuk itu jawablah dengan benar dan sungguh-sungguh.</li>
										</ol>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-md-12">
								<form action="#" method="post">
									<div class="container-fluid">
										<div class="row soal">
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>1. Saya merasa belum disiplin dalam beribadah pada Tuhan YME</p>
												<div class="input-soal">
													<input type="radio" name="1" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="1" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>2. Saya kadang-kadang berperilaku dan bertutur kata tidak jujur</p>
												<div class="input-soal">
													<input type="radio" name="2" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="2" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>3. Saya kadang-kadang masih suka menyontek pada waktu tes</p>
												<div class="input-soal">
													<input type="radio" name="3" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="3" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>4. Saya merasa belum bisa mengendalikan emosi dengan baik</p>
												<div class="input-soal">
													<input type="radio" name="4" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="4" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>5. Saya belum paham tentang sikap dan perilaku asertif</p>
												<div class="input-soal">
													<input type="radio" name="5" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="5" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>6. Saya belum tahu cara mengenal dan memahami diri sendiri</p>
												<div class="input-soal">
													<input type="radio" name="6" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="6" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>7. Saya belum memahami potensi diri</p>
												<div class="input-soal">
													<input type="radio" name="7" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="7" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>8. Saya belum tahu perubahan dan permasalahan yang terjadi pada masa remaja</p>
												<div class="input-soal">
													<input type="radio" name="8" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="8" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>9. Saya belum mengenal tentang macam-macam kepribadian</p>
												<div class="input-soal">
													<input type="radio" name="9" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="9" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>10. Saya kurang memiliki rasa percaya diri</p>
												<div class="input-soal">
													<input type="radio" name="10" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="10" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>11. Saya kadang kurang mejaga kesehatan diri</p>
												<div class="input-soal">
													<input type="radio" name="11" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="11" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>12. Saya belum tahu ciri-ciri/sifat/prilaku pribadi yang berkarakter</p>
												<div class="input-soal">
													<input type="radio" name="12" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="12" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>13. Saya merasa kurang memiliki tanggung jawab pada diri sendiri</p>
												<div class="input-soal">
													<input type="radio" name="13" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="13" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>14. Saya kesulitan mengatur waktu belajar dan bermain</p>
												<div class="input-soal">
													<input type="radio" name="14" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="14" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>15. Kondisi orang tua saya sedang tidak harmonis</p>
												<div class="input-soal">
													<input type="radio" name="15" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="15" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>16. Saya merasa tidak betah tinggal di rumah sendiri</p>
												<div class="input-soal">
													<input type="radio" name="16" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="16" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>17. Saya mempunyai masalah dengan anggota keluarga di rumah</p>
												<div class="input-soal">
													<input type="radio" name="17" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="17" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>18. Saya belum bisa menjadi pribadi yang mandiri</p>
												<div class="input-soal">
													<input type="radio" name="18" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="18" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>19. Saya sedang memiliki konflik pribadi</p>
												<div class="input-soal">
													<input type="radio" name="19" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="19" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>20. Saya belum memahami tentang norma/cara membangun berkeluarga</p>
												<div class="input-soal">
													<input type="radio" name="20" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="20" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>21. Saya belum banyak mengenal lingkungan sekolah baru</p>
												<div class="input-soal">
													<input type="radio" name="21" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="21" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>22. Saya belum memahami tentang kenakalan remaja</p>
												<div class="input-soal">
													<input type="radio" name="22" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="22" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>23. Saya masih sedikit mengetahui tentang dampak atau bahaya rokok</p>
												<div class="input-soal">
													<input type="radio" name="23" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="23" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>24. Saya belum banyak mengenal tentang perilaku sosial yang bertanggung jawab</p>
												<div class="input-soal">
													<input type="radio" name="24" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="24" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>25. Saya belum tahu cara menjaga persahabatan agar tetap langgeng</p>
												<div class="input-soal">
													<input type="radio" name="25" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="25" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>26. Saya sukar bergaul dengan teman-teman di sekolah</p>
												<div class="input-soal">
													<input type="radio" name="26" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="26" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>27. Sering saya dianggap tidak sopan pada orang lain</p>
												<div class="input-soal">
													<input type="radio" name="27" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="27" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>28. Saya kurang memahami dampak dari media sosia</p>
												<div class="input-soal">
													<input type="radio" name="28" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="28" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>29. Saya jarang bermain/berteman di lingkungan tempat saya tinggal</p>
												<div class="input-soal">
													<input type="radio" name="29" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="29" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>30. Saya belum banyak teman atau sahabat</p>
												<div class="input-soal">
													<input type="radio" name="30" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="30" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>31. Saya kurang suka berkomunikasi dengan teman lawan jenis</p>
												<div class="input-soal">
													<input type="radio" name="31" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="31" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>32. Saya belum tahu cara belajar yang baik dan benar di SMK/MAK</p>
												<div class="input-soal">
													<input type="radio" name="32" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="32" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>33. Saya belum tahu cara meraih prestasi di sekolah</p>
												<div class="input-soal">
													<input type="radio" name="33" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="33" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>34. Saya belum paham tentang gaya belajar dan strategi yang sesuai dengannya</p>
												<div class="input-soal">
													<input type="radio" name="34" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="34" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>35. Orang tua saya tidak peduli dengan kegiatan belajar saya</p>
												<div class="input-soal">
													<input type="radio" name="35" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="35" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>36. Saya masih sering menunda-nunda tugas sekolah/pekerjaan rumah (PR)</p>
												<div class="input-soal">
													<input type="radio" name="36" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="36" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>37. Saya merasa kesulitan dalam memahami pelajaran tertentu</p>
												<div class="input-soal">
													<input type="radio" name="37" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="37" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>38. Saya belum tahu cara memanfaatkan sumber belajar</p>
												<div class="input-soal">
													<input type="radio" name="38" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="38" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>39. Saya belajarnya jika akan ada tes atau ujian saja</p>
												<div class="input-soal">
													<input type="radio" name="39" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="39" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>40. Saya belum tahu tentang struktur kurikulum yang ada di sekolah</p>
												<div class="input-soal">
													<input type="radio" name="40" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="40" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>41. Saya merasa malas belajar dan kalau belajar sering ngantuk</p>
												<div class="input-soal">
													<input type="radio" name="41" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="41" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>42. Saya belum terbiasa belajar bersama atau belajar kelompok</p>
												<div class="input-soal">
													<input type="radio" name="42" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="42" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>43. Saya belum paham cara memilih lembaga bimbingan belajar yang baik</p>
												<div class="input-soal">
													<input type="radio" name="43" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="43" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>44. Saya belum dapat memanfaatkan teknologi informasi untuk belajara</p>
												<div class="input-soal">
													<input type="radio" name="44" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="44" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>45. Saya belum tahu cara memperoleh bantuan pendidikan (beasiswa)</p>
												<div class="input-soal">
													<input type="radio" name="45" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="45" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>46. Saya terpaksa harus bekerja untuk mengcukupi kebutuhan hidup</p>
												<div class="input-soal">
													<input type="radio" name="46" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="46" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>47. Saya merasa bingung memilih kegiatan esktrakurikuler di sekolah</p>
												<div class="input-soal">
													<input type="radio" name="47" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="47" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>48. Saya merasa belum mantap pada pilihan peminatan yang diambil</p>
												<div class="input-soal">
													<input type="radio" name="48" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="48" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>49. Saya merasa belum paham hubungan antara hobi, bakat, minat, kemampuan dan karir</p>
												<div class="input-soal">
													<input type="radio" name="49" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="49" required> Tidak
												</div>
											</div>
											<div class="col-xs-12 col-lg-12 soalnya">
												<p>50. Saya belum memiliki perencanaan karir masa depan</p>
												<div class="input-soal">
													<input type="radio" name="50" required> Ya
												</div>
												<div class="input-soal">
													<input type="radio" name="50" required> Tidak
												</div>
											</div>
										</div>
									</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group center">
										<button type="submit" class="btn btn-success">Save</button>
										<button type="reset" class="btn btn-primary">Reset</button>
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>
			<?php
			}
		}
			?>
				</div>
	</div>
	<?php $this->load->view('footer'); ?>