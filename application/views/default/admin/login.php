<html >
<head>
  <meta charset="UTF-8">
    <title>Sistem Administrasi Pengelolaan Keuangan Sekolah Tinggi Ilmu Manajemen Logistik</title>
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
  <link href="<?php echo base_url();?>templates/default/admin/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url();?>templates/default/admin/css/login.css">
  <style type="text/css">
  .btn-primary {
    background: #F60;
    border: #F90;
    border-radius: 0px;
    }
  .btn-primary:hover {
    background: #F90;
  }
  .form-control {
    border-radius: 0px;

  }

  </style>
</head>


<body>
  <div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title"></h1>
              <!-- ========== Flashdata ========== -->
          <?php if ($this->session->flashdata('warning') || $this->session->flashdata('error')) { ?>
            <?php if ($this->session->flashdata('warning')) { ?>
            <center>
              <div class="alert alert-warning alert--block">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('warning'); ?>
              </div>
            </center>
            <?php } else { ?>
            <div class="alert alert-danger alert--block">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php echo $this->session->flashdata('error'); ?>
            </div>
            <?php } ?>
          <?php } ?>
      <!-- ========== End Flashdata ========== -->
            <div class="account-wall">
                <img class="profile-img" src="<?php echo base_url();?>templates/default/admin/plugins/images/logo-pos.png"
                    alt="">
            <h1 class="text-center login-title">Login Administrator</h1>
                <form  method="post" action="<?php echo site_url();?>login/ceklogin" class="form-signin">
                <input type="text" name="admin_username" class="form-control" placeholder="Username" required autofocus>
                <input type="password" name="admin_password" class="form-control" placeholder="Password" required>
                <input type="submit" class="btn btn-lg btn-primary btn-block" name="masuk" value="Login">
               <center><a href="<?php echo $loginURL; ?>"><img src="<?php echo base_url().'assets/images/glogin.png'; ?>" width="200"/></center></a>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
