<!DOCTYPE html>
<html>
<head>
  <title>Data Pelanggaran <?php echo $kelasnya->nama_kelas;?></title>
  <style>
        h1,h3{
            margin:5;
        }
        #header{
            width: 100%;
        }
        #header img{
            width: 100px;
            height: 100px;
            top: 2px;
            left: 50px;
            position: absolute;
        }
        #main td img{
            object-fit: cover;
            width: 100px;
            height: 100px;
        }
        #main li{
            padding: 10px;
        }
        .align-right {
            text-align: center;
        }
        .tes{
            margin-left: 60px!important;
        }
        .tipis{
            margin-left: 30px;
            margin-right: 30px;
            border:1px solid rgb(189, 195, 199);
        }
        .double{
            margin-top: 2px;
            border-top: 5px double black;
            border-right: none;
            border-left: none;
        }
        table{
            margin: 12px!important;
        }
        .justify{
            text-align: justify;
        }
        .pull-right{
            margin-left: 500px;
            text-align: left;
        }
        .hormat{
            margin-bottom: 100px;
        }
        .img-ttd{
            width: 80%;
            height: 5%;
            object-fit: cover;
        }
  </style>
</head>
<body>
   <header id="header">
        <img src="./assets/backend/images/logo.png" alt="logo">
        <div class="container-fluid" align="center">
            <h1>Laporan Pelanggaran</h1>
            <h3><?php echo $kelasnya->nama_kelas;?></h3>
            <h3>Per-tanggal <?php echo date('d M Y',strtotime($sampai_tanggal));?></h3>
            <hr class="double">
        </div>
   </header><!-- /header -->
    <main id="main">
        <div class="container">
            <?php foreach ($data as $row) { ?>
            <table border="0" class="table-container" width="100%">            
                <tbody>
                    <tr>
                        <td class="tes" width="30%">NISN</td>
                        <td width="5%">:</td>
                        <td width="35%"><?php echo $row->nisn;?></td>
                        <td rowspan="7" width="30%" align="right">
                            <?php if($row->foto_siswa == ''){?>
                            <img src="./assets/backend/images/image.svg">
                            <?php }else{?>
                            <img src="./upload/siswa/<?php echo $row->foto_siswa;?>">
                            <?php } ?>
                            <br><br>
                            <?php if($row->foto_pelanggaran == ''){?>
                            <img src="./assets/backend/images/image.svg">
                            <?php }else{?>
                            <img src="./upload/pelanggaran/<?php echo $row->foto_pelanggaran;?>">
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tes">Nama</td>
                        <td>:</td>
                        <td><?php echo $row->nama_siswa;?></td>
                    </tr>
                    <tr>
                        <td class="tes">Kategori Pelanggaran</td>
                        <td>:</td>
                        <td><?php echo $row->nama_kategori;?></td>
                    </tr>
                    <tr>
                        <td class="tes">Jenis Pelanggaran</td>
                        <td>:</td>
                        <td><?php echo $row->jenis_pelanggaran;?></td>
                    </tr>
                    <tr>
                        <td class="tes">Waktu Pelanggaran</td>
                        <td>:</td>
                        <td><?php echo date('d M Y',strtotime($row->waktu_pelanggaran));?></td>
                    </tr>
                    <tr>
                        <td class="tes">Status</td>
                        <td>:</td>
                        <td>
                            <?php 
                                if($row->status == '1'){
                                    echo 'Terselesaikan';
                                }else{
                                    echo 'Belum terselesaikan';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="tes">Keterangan</td>
                        <td>:</td>
                        <td class="justify"><?php echo $row->keterangan;?>
                    </tr>
                </tbody>
            </table>
            <hr class="tipis">
            <?php } ?>
            <div class="pull-right">
                <p>
                    Hormat Kami,<br>
                    Kepala BK
                </p>
                <img src="./assets/backend/images/image.svg" class="img-ttd">
                <p>
                    <u>Hanafi</u><br>
                    NIP 123
                </p>
            </div>
        </div>
    </main>
    <footer>
       
    </footer>
</body>
</html>