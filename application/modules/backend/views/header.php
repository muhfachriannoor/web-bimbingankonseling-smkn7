<!DOCTYPE html>
<html>

<head>
  <link rel="shortcut icon" href="<?php echo base_url('assets/backend/images/logo.png'); ?>">
  <title><?php echo $title; ?>&nbsp;| SISTEM BK</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://fonts.googleapis.com/css?family=Zilla+Slab" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/backend/css/'); ?>bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/backend/css/'); ?>datepicker.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/backend/css/'); ?>dashboard.css">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/backend/select2/'); ?>select2.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/backend/css/'); ?>jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/backend/DataTables/'); ?>media/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/backend/DataTables/'); ?>media/css/dataTables.bootstrap.css">

</head>

<body>

  <div id="container">

    <div id="navbar">
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="logo" href="#">
              <img src="<?php echo base_url('assets/backend/images/logo.png'); ?>" alt="">
              <p>sistem bk</p>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php
            $level = $this->session->userdata('level');
            if ($level == 1) {
            ?>
              <ul class="nav navbar-nav menu-align">
                <li><a href="<?php echo base_url('backend'); ?>"><span class="glyphicon glyphicon-dashboard"></span> dashboard</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-duplicate"></span> data-data <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url('backend/guru_show'); ?>">data guru</a></li>
                    <li><a href="<?php echo base_url('backend/kelas_show'); ?>">data kelas</a></li>
                    <li><a href="<?php echo base_url('backend/siswa_show'); ?>">data siswa</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url('backend/kategoripelanggaran_show'); ?>">data kategori pelanggaran</a></li>
                    <li><a href="<?php echo base_url('backend/jenispelanggaran_show'); ?>">data jenis pelanggaran</a></li>
                    <li><a href="<?php echo base_url('backend/pelanggaran_show'); ?>">data pelanggaran</a></li>
                    <li><a href="<?php echo base_url('backend/pengaturan_show'); ?>">data pengaturan</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo base_url('backend/mail_show'); ?>"><span class="glyphicon glyphicon-envelope"></span> mail</a></li>
              </ul>
            <?php } elseif ($level == 2) { ?>
              <ul class="nav navbar-nav menu-align">
                <li><a href="<?php echo base_url('backend'); ?>"><span class="glyphicon glyphicon-dashboard"></span> dashboard</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-duplicate"></span> data-data <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url('backend/kelas_show'); ?>">data kelas</a></li>
                    <li><a href="<?php echo base_url('backend/siswa_show'); ?>">data siswa</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url('backend/kategoripelanggaran_show'); ?>">data kategori pelanggaran</a></li>
                    <li><a href="<?php echo base_url('backend/jenispelanggaran_show'); ?>">data jenis pelanggaran</a></li>
                    <li><a href="<?php echo base_url('backend/pelanggaran_show'); ?>">data pelanggaran</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo base_url('backend/mail_show'); ?>"><span class="glyphicon glyphicon-envelope"></span> mail</a></li>
              </ul>
            <?php } elseif ($level == 3 or $level == 4) { ?>
              <ul class="nav navbar-nav menu-align">
                <li><a href="<?php echo base_url('backend/index'); ?>"><span class="glyphicon glyphicon-dashboard"></span> dashboard</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-duplicate"></span> data-data <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url('backend/pelanggaran_show'); ?>">data pelanggaran</a></li>
                  </ul>
                </li>
              </ul>
            <?php } else { ?>
              <ul class="nav navbar-nav menu-align">
                <li><a href="<?php echo base_url('backend/index'); ?>"><span class="glyphicon glyphicon-dashboard"></span> dashboard</a></li>
              </ul>
            <?php } ?>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">

                <?php
                if ($level == 1 or $level == 2 or $level == 3 or $level == 4) {
                  $uid = $this->session->userdata('uid');
                  $this->db->where('uid', $uid);
                  $query = $this->db->get('tb_user');
                  $test = $query->row();
                  $this->db->where('username', $test->username);
                  $query2 = $this->db->get('tb_guru');
                  $foto_user = $query2->row();
                ?>
                  <a href="#" class="dropdown-toggle user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img id="user-foto" src="<?php echo ($foto_user->foto_guru == "") ? base_url('assets/backend/images/user.png') : base_url('upload/guru/') . $foto_user->foto_guru; ?>" alt=""></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url('backend/'); ?>user_edit/<?php echo $this->session->userdata('uid'); ?>">Edit Akun</a></li>
                    <li><a href="<?php echo base_url('login/logout'); ?>">Keluar</a></li>
                  </ul>
                <?php
                } elseif ($level == 5) {
                  $uid = $this->session->userdata('uid');
                  $this->db->where('uid', $uid);
                  $query = $this->db->get('tb_user');
                  $test = $query->row();
                  $this->db->where('username', $test->username);
                  $query2 = $this->db->get('tb_siswa');
                  $foto_user = $query2->row();
                ?>
                  <a href="#" class="dropdown-toggle user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img id="user-foto" src="<?php echo ($foto_user->foto_siswa == "") ? base_url('assets/backend/images/user.png') : base_url('upload/siswa/') . $foto_user->foto_siswa; ?>" alt=""></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url('backend/'); ?>siswa_edit/<?php echo $this->session->userdata('uid'); ?>">Edit Akun</a></li>
                    <li><a href="<?php echo base_url('login/logout'); ?>">Keluar</a></li>
                  </ul>
                <?php } ?>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>