<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aluradmi! </title>

    <link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet">
    <link href="<?php echo base_url('css/custom.css');?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">403</h1>
              <h2>Access denied</h2>
              <p>Anda Tidak Memiliki Hak Untuk Mengakses Halaman Tersebut 
              </p>
              <?php
              if ($this->user_m->cek_level() == TRUE) { ?>
                <a class="btn btn-danger" href="<?php echo site_url('admin/dashboard');?>">Kembali</a>
              <?php   
              }
              else{ ?>
                <a class="btn btn-danger" href="<?php echo site_url('dashboard');?>">Kembali</a>
              <?php }
              ?>
              
              <a class="btn btn-default" href="<?php echo site_url('login');?>">Login?</a>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

     <!-- bootstrap file -->
    <script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
    <!-- THEME  file -->
    <script type="text/javascript" src="<?php echo base_url('js/custom.min.js');?>"></script> 
  </body>
</html>