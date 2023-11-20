<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="shortcut icon" href="<?php echo base_url('assets/backend/images/logo.png');?>">
  <title>Halaman Login</title>

  <link href="<?php echo base_url('assets/backend/');?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/backend/');?>css/login.css" rel="stylesheet">
</head>
<body>
<div class="col-md-4 col-md-offset-4 login-page">

  <div class="login-form">
    <div class="logo"></div>

    <form action="<?php echo base_url('login/cek_login');?>" class="form-login" method="POST">
      <h3 class="title">Login Sistem BK</h3>
      <?php echo $this->session->flashdata('alert');?>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
        </div>

        <button class="btn btn-block">login</button>
      </form>
  </div>
</div>
</body>
</html>